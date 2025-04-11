<?php

namespace DevCoding\Html\Element;

class ScriptElement extends HtmlElement
{
  /** @var string */
  protected $parentTag;

  public function __construct($contents, $attr = null, $parent = 'body')
  {
    $this->parentTag = $parent;
    if (is_array($contents))
    {
      foreach($contents as $code)
      {
        $this->addChild($code);
      }
    }
    else
    {
      $this->addChild($contents);
    }

    if (!isset($attr['type']))
    {
      $attr['type'] = 'text/javascript';
    }

    parent::__construct('script', $attr);
  }

  /**
   * @return string
   */
  public function getParent(): string
  {
    return $this->parentTag;
  }
}
