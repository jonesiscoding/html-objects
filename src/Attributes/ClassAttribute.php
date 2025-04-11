<?php

namespace DevCoding\Html\Attributes;

use DevCoding\Html\Css\CssClass;

/**
 * Object representing the 'class' attribute in HTML tags, which is a space separated list of CSS classes.
 */
class ClassAttribute extends ListAttribute
{
  /**
   * @return string
   */
  public static function getName(): string
  {
    return 'class';
  }

  /**
   * Ensures that the value is valid for a CSS class name
   *
   * @param string $value   The value to normalize
   *
   * @return string         The normalized value
   */
  protected function normalize($value): string
  {
    return (string) (new CssClass($value));
  }
}
