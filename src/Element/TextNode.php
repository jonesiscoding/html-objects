<?php

namespace DevCoding\Html\Element;

use DevCoding\Html\Element\Base\ElementInterface;

class TextNode implements ElementInterface
{
  protected $contents;

  public function __construct(string $contents)
  {
    $this->contents = $contents;
  }

  public function __toString()
  {
    return $this->contents;
  }

  public function getTag(): string
  {
    return '';
  }
}
