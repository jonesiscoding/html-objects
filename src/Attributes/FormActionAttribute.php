<?php

namespace DevCoding\Html\Attributes;

class FormActionAttribute extends UrlAttribute
{
  public static function getName(): string
  {
    return 'formaction';
  }
}
