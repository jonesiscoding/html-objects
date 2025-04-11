<?php

namespace DevCoding\Html\Element\Base;

use DevCoding\Html\Element\HeaderElement;
use DevCoding\Html\Element\HtmlElementCollection;

trait HasHeaderTrait
{
  /** @var HeaderElement|null */
  protected $header;

  abstract protected function configureHeader(HeaderElement $Header);
  abstract protected function getChildren(): HtmlElementCollection;

  /**
   * @return HeaderElement|null
   */
  public function getHeader(): ?HeaderElement
  {
    if (!isset($this->header))
    {
      $this->header = $this->getChildren()->filterByTag('header')->first();
    }

    return $this->header;
  }
}
