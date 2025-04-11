<?php

namespace DevCoding\Html\Css;

class CssId extends CssClass
{
  public function __construct(string $raw, string $separator = '_', bool $forceLower = false)
  {
    parent::__construct($raw, $separator, $forceLower, false);
  }
}
