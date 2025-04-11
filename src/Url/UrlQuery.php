<?php

namespace DevCoding\Html\Url;

use DevCoding\Html\Value\BaseValueInterface;
use Psr\Container\ContainerInterface as PsrContainerInterface;

/**
 * Object representing the 'query' portion of a URL
 *
 * @author  AMJones <am@jonesiscoding.com>
 */
class UrlQuery extends \ArrayObject implements \Stringable, PsrContainerInterface, BaseValueInterface
{
  /**
   * @param string|array $query
   */
  public function __construct($query)
  {
    parent::__construct(is_array($query) ? $query : $this->parse($query));
  }

  public function __toString(): string
  {
    try
    {
      return static::unparse($this->getArrayCopy());
    }
    catch(\Exception $e)
    {
      return $this->raw;
    }
  }

  public function get(string $id)
  {
    return $this->offsetGet($id);
  }

  public function has(string $id): bool
  {
    return $this->offsetExists($id);
  }

  /**
   * Turns the given array into a URL query string. Nested arrays are turned into PHP-Style arguments (arg[]=1&arg[]=2)
   *
   * @param array $arr    The array of values.  The top level array must be associative, any subarrays must not.
   * @param null  $pKey   Any prefixed key.  This indicates that the array of values is part of a nested array.
   *
   * @return string       The url query string.
   */
  protected static function unparse(array $arr, $pKey = null)
  {
    $str = "";
    foreach($arr as $key => $value)
    {
      $pre  = !empty($str) ? "&" : '';
      $rKey = ($pKey) ? $pKey . '[]' : $key;
      if(is_array($value))
      {
        $str .= $pre . static::unparse($value, $rKey);
      }
      else
      {
        $str .= sprintf('%s%s=%s', $pre, $rKey, $value);
      }
    }

    return $str;
  }

  /**
   * @param string $raw
   *
   * @return array
   */
  protected function parse(string $raw): array
  {
    $retval = [];
    @parse_str($raw, $retval);

    return !empty($retval) ? $retval : [];
  }

  public function equals($comp): bool
  {
    $a = $this->getArrayCopy();
    $b = ($comp instanceof self) ? $comp->getArrayCopy() : (new self($comp))->getArrayCopy();
    ksort($a);
    ksort($b);

    return self::unparse($a) === self::unparse($b);
  }

  public static function validate($input): bool
  {
    return ($q = new UrlQuery($input)) && !empty((string) $q);
  }
}
