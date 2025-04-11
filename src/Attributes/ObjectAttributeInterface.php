<?php

namespace DevCoding\Html\Attributes;

interface ObjectAttributeInterface extends \Stringable
{
  /**
   * Provides the name of this attribute, as would be used in an HTML tag.
   *
   * @return string
   */
  public static function getName(): string;
}
