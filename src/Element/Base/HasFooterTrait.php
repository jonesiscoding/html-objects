<?php

namespace DevCoding\Html\Element\Base;

use DevCoding\Html\Element\FooterElement;
use DevCoding\Html\Element\HtmlElementCollection;

trait HasFooterTrait
{
  /** @var FooterElement  */
  protected FooterElement $footer;
  abstract protected function configureFooter(FooterElement $Footer);
  abstract protected function getChildren(): HtmlElementCollection;

  /**
   * @return FooterElement|null
   */
  public function getFooter(): ?FooterElement
  {
    if (!isset($this->footer))
    {
      $this->footer = $this->getChildren()->filterByTag('footer')->first();
    }

    return $this->footer;
  }
}
