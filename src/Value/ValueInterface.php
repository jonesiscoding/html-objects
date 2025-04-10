<?php

namespace DevCoding\Html\Value;

interface ValueInterface extends BaseValueInterface
{
  public function set($value): ValueInterface;
}
