<?php

namespace DevCoding\Html\Attributes;

/**
 * Object representing the 'action' attribute commonly found in HTML form elements
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/form#action
 */
class ActionAttribute extends UrlAttribute
{
  /**
   * {@inheritDoc}
   */
  public static function getName(): string
  {
    return 'action';
  }
}
