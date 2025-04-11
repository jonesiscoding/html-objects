<?php

namespace DevCoding\Html\Configuration;

use DevCoding\Html\Attributes\HtmlAttributes;

interface AttributeConfiguratorInterface
{
  public function configureAttributes(HtmlAttributes $Attr): void;
}
