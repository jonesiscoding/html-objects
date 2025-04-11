<?php

namespace DevCoding\Html\Element\Base;

interface ElementInterface extends \Stringable
{
  public function getTag(): string;
}
