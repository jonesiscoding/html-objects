<?php

namespace DevCoding\Html\Attributes;

/**
 * Object representing the 'classid' attribute commonly found in the HTML object tag, which is a URL
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/object#classid
 */
class ClassIdAttribute extends UrlAttribute
{
  /**
   * {@inheritDoc}
   */
  public static function getName(): string
  {
    return 'classid';
  }
}
