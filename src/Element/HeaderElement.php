<?php

namespace DevCoding\Html\Element;

class HeaderElement extends HtmlElement
{
  public function __construct($attr = null)
  {
    parent::__construct('header', $attr);
  }
}
