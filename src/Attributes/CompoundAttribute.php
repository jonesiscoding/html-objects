<?php

namespace DevCoding\Html\Attributes;

/**
 * Base class for the ListAttribute and MapAttribute classes.  Extend those classes, not this one.
 *
 * @internal
 */
abstract class CompoundAttribute implements ObjectAttributeInterface, \Countable, \IteratorAggregate, \JsonSerializable
{
  protected array $data;
  protected string $separator;

  // region //////////////////////////////////////////////// Constructor

  /**
   * @param array  $data       The attribute entries
   * @param string $separator  The string that separates entries when displayed as a string.
   */
  public function __construct(array $data = [], $separator = ' ')
  {
    $this->data      = $data;
    $this->separator = $separator;
  }

  // endregion ///////////////////////////////////////////// End Constructor

  // region //////////////////////////////////////////////// Abstract Methods

  /**
   * @param $value
   *
   * @return mixed
   */
  abstract protected function normalize($value);

  // endregion ///////////////////////////////////////////// End Abstract Methods

  // region //////////////////////////////////////////////// Implemented Methods

  /**
   * Merges the values of the attribute, joined by the separator.
   *
   * @return string
   */
  public function __toString()
  {
    return implode($this->separator, $this->all());
  }

  public function getIterator(): \Traversable
  {
    return new \ArrayIterator($this->all());
  }

  public function jsonSerialize(): string
  {
    return json_encode($this->all());
  }

  // endregion ///////////////////////////////////////////// End Implemented Methods

  // region //////////////////////////////////////////////// Public Methods

  /**
   * Returns an array of all values
   *
   * @return array
   */
  public function all(): array
  {
    return $this->data;
  }

  /**
   * Clear all items from the list
   *
   * @return $this
   */
  public function clear()
  {
    $this->data = [];

    return $this;
  }

  /**
   * Counts the value in this attribute
   *
   * @return int
   */
  public function count(): int
  {
    return count($this->data);
  }

  /**
   * Evaluates whether this attribute has the given criteria.
   *
   * @param string $criteria  The criteria to evaluate the presence of
   *
   * @return bool
   */
  public function has(string $criteria): bool
  {
    return array_key_exists($this->normalize($criteria), $this->data);
  }

  /**
   * Evaluates whether this attribute is empty, having no values.
   *
   * @return bool
   */
  public function isEmpty(): bool
  {
    return 0 === $this->count();
  }
}
