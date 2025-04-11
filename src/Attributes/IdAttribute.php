<?php

namespace DevCoding\Html\Attributes;

use DevCoding\Html\Css\CssId;

class IdAttribute extends CssId implements ObjectAttributeInterface
{
  public static function getName(): string
  {
    return 'id';
  }
}

