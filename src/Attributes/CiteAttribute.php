<?php

namespace DevCoding\Html\Attributes;

/**
 * Object representing the 'cite' attribute commonly found in the HTML blockquote tag
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/blockquote#cite
 */
class CiteAttribute extends UrlAttribute
{
  public static function getName(): string
  {
    return 'cite';
  }
}
