<?php

namespace DevCoding\Html\Value;

abstract class AbstractValue implements ValueInterface
{
  protected $value;

  public function __construct($value)
  {
    $this->value = $value;
  }

  public function get()
  {
    return $this->value;
  }

  public function equals($comp): bool
  {
    return $this->get() === $this::normalize($comp);
  }

  public function set($value): ValueInterface
  {
    $this->value = $this::normalize($value);

    return $this;
  }
}