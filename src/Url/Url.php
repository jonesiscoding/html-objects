<?php

namespace DevCoding\Html\Url;

/**
 * Object representing a parsed URL string. For the purposes of this object, only fully qualified domain names
 * or IPv4 addresses are accepted for the HOST portion of the URL.
 *
 * @property StringOb|null      $scheme
 * @property StringObject|null  $host
 * @property int|null           $port
 * @property StringObject|null  $user
 * @property StringObject|null  $pass
 * @property UrlPath|null       $path
 * @property UrlQuery|null      $query
 * @property StringObject|null  $fragment
 *
 * @author  AMJones <am@jonesiscoding.com>
 */
class Url extends \ArrayObject
{
  const HOST_REGEX = '^(?:(?:[a-z\x{00a1}-\x{ffff}0-9]-*)*[a-z\x{00a1}-\x{ffff}0-9]+)(?:\.(?:[a-z\x{00a1}-\x{ffff}0-9]-*)*[a-z\x{00a1}-\x{ffff}0-9]+)*(?:\.(?:[a-z\x{00a1}-\x{ffff}]{2,}))$';

  /** @var string[] Maps PHP_URL_* constants to their string values from parse_url */
  const MAP = [
      PHP_URL_SCHEME   => 'scheme',
      PHP_URL_HOST     => 'host',
      PHP_URL_PORT     => 'port',
      PHP_URL_USER     => 'user',
      PHP_URL_PASS     => 'pass',
      PHP_URL_PATH     => 'path',
      PHP_URL_QUERY    => 'query',
      PHP_URL_FRAGMENT => 'fragment',
  ];

  /** @var array */
  private $parts;

  /**
   * Builds object from the given string or URL
   *
   * @param string|array $string
   */
  public function __construct($string)
  {
    parent::__construct(array_fill_keys(array_values(self::MAP), null), \ArrayObject::ARRAY_AS_PROPS);

    if (is_array($string))
    {
      $parsed   = $string;
      $isScheme = isset($parsed['scheme']);
    }
    else
    {
      $string   = str_starts_with($string, '/') && !str_starts_with($string, '//') ? substr($string, 1) : $string;
      $isScheme = (bool) parse_url($string, PHP_URL_SCHEME);
      $string   = $isScheme ? $string : 'http://' . $string;
      $parsed   = is_array($string) ? $string : parse_url($string);
    }

    if (false === $parsed && is_string($string))
    {
      $string = str_starts_with($string, '/') && !str_starts_with($string, '//') ? substr($string, 1) : $string;
      $parsed = parse_url($string);
    }

    foreach(self::MAP as $key)
    {
      if ($key === self::MAP[PHP_URL_SCHEME] && isset($parsed[$key]))
      {
        // Allow URL without Scheme
        if ($isScheme)
        {
          $this->$key = $parsed[$key];
        }
      }
      elseif(isset($parsed[$key]))
      {
        $this->$key = $parsed[$key];
      }
    }

    // Allow URL without Host
    $host = $this->host ?? null;
    $path = $this->path ?? null;
    if ($host && !$this->isFullyQualifiedDomainName($host) && !$this->isIpV4($host))
    {
      $this->host = null;
      $this->path = new UrlPath('/' . $host);
      if (isset($path))
      {
        $this->path->append((string) $path);
      }
    }
  }

  /**
   * Returns this UrlParsed object as a string by compiling the parts together.
   * In the case of an exception, an empty string is returned.
   *
   * @return string
   */
  public function __toString()
  {
    try
    {
      $url = "";
      if ($scheme = $this->scheme ?? null)
      {
        $url .= $scheme . "://";
      }

      if ($user = $this->user ?? null)
      {
        $pass = isset($this->pass) ? ':' . $this->pass : "";
        $url .= $user . $pass . '@';
      }

      if ($host = $this->host ?? null)
      {
        $url .= $host;
      }

      if ($port = $this->port ?? null)
      {
        $url .= ":" . $port;
      }

      if ($path = $this->path ?? null)
      {
        $url .= $path->isSlash(UrlPath::SLASH_LEADING) ? $path : '/' . $path;
      }

      if ($query = $this->query ?? null)
      {
        $url .= "?" . $query;
      }

      if ($frag = $this->fragment ?? null)
      {
        $url .= "#" . $frag;
      }

      return $url;
    }
    catch(\Exception $e)
    {
      return '';
    }
  }

  // region //////////////////////////////////////////////// ArrayAccess Methods

  public function offsetExists($offset)
  {
    return parent::offsetExists($this->offsetNormalize($offset));
  }

  public function offsetGet($offset)
  {
    return parent::offsetGet($this->offsetNormalize($offset));
  }

  public function offsetSet($offset, $value)
  {
    $offset = $this->offsetNormalize($offset);

    if (self::MAP[PHP_URL_PATH] === $offset)
    {
      parent::offsetSet($offset, $value instanceof UrlPath ? $value : ($value ? new UrlPath($value) : null));
    }
    elseif (self::MAP[PHP_URL_QUERY] === $offset)
    {
      parent::offsetSet($offset, $value instanceof UrlQuery ? $value : ($value ? new UrlQuery($value) : null));
    }
    elseif (self::MAP[PHP_URL_PORT] === $offset)
    {
      parent::offsetSet($offset, isset($value) ? (int) $value : null);
    }
    elseif (parent::offsetExists($offset))
    {
      parent::offsetSet($offset, isset($value) ? new StringObject($value) : null);
    }
  }

  public function offsetUnset($offset)
  {
    parent::offsetUnset($this->offsetNormalize($offset));
  }

  // endregion ///////////////////////////////////////////// End ArrayAccess Methods

  /**
   * Evaluates if string given is a FQDN
   *
   * @param string $string
   *
   * @return bool
   */
  private function isFullyQualifiedDomainName(string $string): bool
  {
    return preg_match("#" . self::HOST_REGEX . "#iuS", $string);
  }

  /**
   * @param string $string
   *
   * @return bool
   */
  private function isIpV4(string $string): bool
  {
    return filter_var($string, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
  }

  /**
   * Normalizes an offset, allowing use of the PHP_URL_* constants
   *
   * @param string|int $offset
   *
   * @return string
   */
  private function offsetNormalize($offset): string
  {
    if (is_numeric($offset))
    {
      return self::MAP[$offset] ?? (string) $offset;
    }

    return $offset;
  }
}
