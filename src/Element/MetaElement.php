<?php

namespace DevCoding\Html\Element;

/**
 * Class MetaElement
 * @package AppBundle\View\Component
 */
class MetaElement extends HtmlElement
{
  /**
   * @param string       $name
   * @param string|array $content
   * @param array        $attr
   */
  public function __construct(string $name, $content, $attr = [])
  {
    if (is_array($content))
    {
      $content = implode(', ', $content);
    }

    $attr['content'] = $content;
    $attr['name']    = $name;

    parent::__construct('meta', $attr);
  }
}
