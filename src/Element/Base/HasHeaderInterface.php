<?php

namespace DevCoding\Html\Element\Base;

use DevCoding\Html\Element\HeaderElement;

interface HasHeaderInterface
{
  /**
   * @return HeaderElement|null
   */
  public function getHeader(): ?HeaderElement;

  /**
   * @param HeaderElement $header
   *
   * @return mixed
   */
  public function configureHeader(HeaderElement $header);
}
