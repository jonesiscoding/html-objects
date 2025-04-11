<?php

namespace DevCoding\Html\Attributes;

abstract class MapAttribute extends CompoundAttribute
{
  // region //////////////////////////////////////////////// Public Methods

  /**
   * Adds the given value or values to the current list
   *
   * @param string|int|float|bool $value The value or values to add
   *
   * @return $this
   */
  public function add(string $key, $value)
  {
    if (!$this->has($key))
    {
      $this->data[$key] = is_null($value) ? $value : $this->normalize($value);

      return $this;
    }

    throw new \InvalidArgumentException(sprintf('The key "%s" already exists in "%s".', $key, get_class($this)));
  }

  public function get(string $property)
  {
    if ($this->has($property))
    {
      return $this->data[$property];
    }

    throw new \InvalidArgumentException(sprintf('The key "%s" does not exists in "%s".', $property, get_class($this)));
  }

  /**
   * @param string $key
   *
   * @return $this
   */
  public function remove($key)
  {
    if ($this->has($key))
    {
      unset($this->data[$key]);
    }

    return $this;
  }

  /**
   * @param string[]|int[]|float[]|bool[] $values
   *
   * @return $this
   */
  public function set(array $values)
  {
    foreach ($values as $key => $value)
    {
      $this->add($key, $value);
    }

    return $this;
  }

  // endregion ///////////////////////////////////////////// End Public Methods
}

