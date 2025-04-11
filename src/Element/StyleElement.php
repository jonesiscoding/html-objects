<?php

namespace DevCoding\Html\Element;

class StyleElement extends HtmlElement
{
  public function __construct($contents, $attr = null)
  {
    if (is_array($contents))
    {
      foreach($contents as $css)
      {
        $this->addChild($css);
      }
    }
    else
    {
      $this->addChild($contents);
    }

    if (!isset($attr['type']))
    {
      $attr['type'] = 'text/css';
    }

    parent::__construct('style', $attr);
  }
}
