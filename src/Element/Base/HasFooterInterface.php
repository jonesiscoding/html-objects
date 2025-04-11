<?php

namespace DevCoding\Html\Element\Base;

use DevCoding\Html\Element\FooterElement;

interface HasFooterInterface
{
  /**
   * @param FooterElement $footer
   */
  public function configureFooter(FooterElement $footer): void;

  /**
   * @return FooterElement|null
   */
  public function getFooter(): FooterElement;
}
