<?php

namespace DevCoding\Html\Element;

use DevCoding\Html\Element\Base\HasFooterInterface;
use DevCoding\Html\Element\Base\HasHeaderInterface;

/**
 * Base class for HtmlElement objects which always includes specific child elements, such as complex components.
 */
abstract class CompoundElement extends HtmlElement
{
  /**
   * {@inheritDoc}
   */
  public function __construct(string $tag, $attr = null)
  {
    parent::__construct($tag, $attr);
  }

  abstract protected function getInner(): HtmlElementCollection;

  /**
   * @return HtmlElementCollection
   */
  final public function getChildren()
  {
    if ($this->isEmpty())
    {
      $this->children = $this->getInner();
      if ($this instanceof HasHeaderInterface)
      {
        $this->configureHeader($header = new HeaderElement());

        $this->children->prepend($header);
      }

      if ($this instanceof HasFooterInterface)
      {
        $this->configureFooter($footer = new FooterElement());

        $this->children->append($footer);
      }
    }

    return parent::getChildren();
  }

  /**
   * @param string $tag
   * @param array  $contents
   *
   * @return HtmlElement
   */
  protected function createElement($tag, $contents): HtmlElement
  {
    $children = is_array($contents) ? $contents : [$contents];

    return (new HtmlElement($tag))->setChildren($children);
  }
}
