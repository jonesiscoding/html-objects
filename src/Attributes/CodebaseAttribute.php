<?php

namespace DevCoding\Html\Attributes;

/**
 * Object representing the 'codebase' attribute commonly found in the HTML object tag, which is a URL
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/object#classid
 */
class CodebaseAttribute extends UrlAttribute
{
  /**
   * {@inheritDoc}
   */
  public static function getName(): string
  {
    return 'codebase';
  }
}
