<?php

namespace DevCoding\Html\Url;

/**
 * Object representing the 'path' portion of a URL, with convenience functions for handling slashes
 *
 * @author  AMJones <am@jonesiscoding.com>
 */
class UrlPath
{
  /** @var int Flag for Trailing Slash (path/) */
  const SLASH_TRAILING = 4;
  /** @var int Flag for Leading Slash (/path) */
  const SLASH_LEADING = 2;

  /** @var string Path Value */
  protected $path;

  /**
   * @param string $path
   */
  public function __construct(string $path)
  {
    $this->path = $path;
  }

  /**
   * @return string
   */
  public function __toString()
  {
    return $this->path;
  }

  /**
   * Appends the given path to this UrlPath
   *
   * @param string $path
   *
   * @return $this
   */
  public function append(string $path): UrlPath
  {
    $pathA = $this->clean(self::SLASH_TRAILING);
    $pathB = (new UrlPath($path))->clean(self::SLASH_LEADING);

    $this->path = $pathA . '/' . $pathB;

    return $this;
  }

  /**
   * Removes slashes from the path, returning it as a string
   *
   * @param int|mixed $flags See Class Constants
   *
   * @return string          The string without the leading, trailing, or both slashes
   */
  public function clean($flags = self::SLASH_TRAILING | self::SLASH_LEADING): string
  {
    $path = $this->path;
    if ($flags & self::SLASH_TRAILING)
    {
      $path = str_ends_with($path, '/') ? substr($path, 0, -1) : $path;
    }

    if ($flags & self::SLASH_LEADING)
    {
      $path = str_starts_with($path, '/') ? substr($path, 1) : $path;
    }

    return $path;
  }

  /**
   * Returns an array by splitting the path on / and eliminating empty values.
   *
   * @return array
   */
  public function getArrayCopy(): array
  {
    return array_filter(explode('/', $this->path));
  }

  /**
   * Determines if the path has leading, trailing, or both slashes.
   *
   * @param int|mixed $flags See Class Constants
   *
   * @return bool
   */
  public function isSlash($flags = self::SLASH_TRAILING | self::SLASH_LEADING): bool
  {
    if ($flags & self::SLASH_TRAILING && $flags & self::SLASH_LEADING)
    {
      return str_starts_with($this->path, '/') && str_ends_with($this->path, '/');
    }

    if ($flags & self::SLASH_TRAILING)
    {
      return str_ends_with($this->path, '/');
    }

    if ($flags & self::SLASH_LEADING)
    {
      return str_starts_with($this->path, '/');
    }

    return false;
  }

  /**
   * Prepends the given path to this UrlPath
   *
   * @param string $path
   *
   * @return $this
   */
  public function prepend(string $path): UrlPath
  {
    $objA = new UrlPath($path);
    $preA = $objA->isSlash(self::SLASH_LEADING);
    $preB = $this->isSlash(self::SLASH_LEADING);
    $old  = $this->clean(self::SLASH_LEADING);

    $this->path = !$preA && $preB ? '/' . $path : $path;

    return $this->append($old);
  }
}
