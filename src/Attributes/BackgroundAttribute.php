<?php

namespace DevCoding\Html\Attributes;

/**
 * Object representing the 'background' attribute commonly found in the HTML body tag
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/body#background
 */
class BackgroundAttribute extends UrlAttribute
{
  /**
   * {@inheritDoc}
   */
  public static function getName(): string
  {
    return 'background';
  }
}
