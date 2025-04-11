<?php

namespace DevCoding\Html\Attributes;

abstract class ListAttribute extends CompoundAttribute
{
  // region //////////////////////////////////////////////// Constructor

  public function __construct(array $data = [], $separator = ' ')
  {
    parent::__construct(array_fill_keys(array_values($data), true), $separator);
  }

  // endregion ///////////////////////////////////////////// End Constructor

  // region //////////////////////////////////////////////// Public Methods

  /**
   * Adds the given value or values to the current list
   *
   *
   * @param string|array $item
   *
   * @return $this
   */
  public function add($item)
  {
    // Convert to an array to ensure we don't have multiple classes
    $list = $this->assertArray($item);

    foreach($list as $listItem)
    {
      if (!empty($listItem))
      {
        $this->data[$this->normalize($listItem)] = true;
      }
    }

    return $this;
  }

  /**
   * Returns an array of all items in the list
   *
   * @return array
   */
  public function all(): array
  {
    return array_keys(parent::all());
  }

  /**
   * @param string|array $value
   *
   * @return $this
   */
  public function remove($value)
  {
    // Convert to an array to ensure we don't have multiple values
    $list = $this->assertArray($value);

    foreach($list as $item)
    {
      if (!empty($item))
      {
        unset($this->data[$this->normalize($item)]);
      }
    }

    return $this;
  }

  /**
   * @param array $values
   *
   * @return $this
   */
  public function set(array $values)
  {
    foreach($values as $item)
    {
      $this->add($item);
    }

    return $this;
  }

  // endregion ///////////////////////////////////////////// End Public Methods

  /**
   * @param array|string $value
   *
   * @return string[]
   */
  protected function assertArray($value): array
  {
    return is_array($value) ? $value : explode(' ', $value);
  }
}
