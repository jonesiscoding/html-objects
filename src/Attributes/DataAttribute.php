<?php

namespace DevCoding\Html\Attributes;

/**
 * Object representing the 'data' attribute, which is a URL
 */
class DataAttribute extends UrlAttribute
{
  /**
   * {@inheritDoc}
   */
  public static function getName(): string
  {
    return 'data';
  }
}
