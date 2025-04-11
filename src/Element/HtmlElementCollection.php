<?php

namespace DevCoding\Html\Element;

use DevCoding\Html\Element\Base\ElementInterface;
use DevCoding\Html\Value\StringObject;

/**
 *
 */
class HtmlElementCollection implements \IteratorAggregate, \Countable
{
  protected $elements = [];

  public function __construct(array $elements = [])
  {
    $this->elements = $elements;
  }

  public function __toString(): string
  {
    return implode(PHP_EOL, $this->elements);
  }

  public function getArrayCopy(): array
  {
    return $this->getIterator()->getArrayCopy();
  }

  public function count(): int
  {
    return $this->getIterator()->count();
  }

  public function first()
  {
    return reset($this->elements);
  }

  public function end()
  {
    return end($this->elements);
  }

  /**
   * @return bool
   */
  public function isEmpty(): bool
  {
    return 0 === $this->getIterator()->count();
  }

  public function prepend($input, $tag = null)
  {
    if (isset($input))
    {
      $object = $this->build($input);
      if ($tag && $index = $this->getIndex($tag))
      {
        $this->elements = array_merge(
          array_slice($this->elements, 0, $index),
          [$object],
          array_slice($this->elements, $index)
        );
      }
      else
      {
        // If no tag, or index not found, prepend to beginning
        array_unshift($this->elements, $object);
      }
    }


    return $this;
  }

  public function append($input, $tag = null)
  {
    $object = $this->build($input);
    if ($tag && $index = $this->getIndex($tag))
    {
      $index++;
      $this->elements = array_merge(
        array_slice($this->elements, 0, $index),
        [$object],
        array_slice($this->elements, $index)
      );

      return $this;
    }
    else
    {
      $this->elements[] = $object;
    }

    return $this;
  }

  /**
   * @param string $tag
   *
   * @return HtmlElementCollection
   */
  public function filterByTag(string $tag): HtmlElementCollection
  {
    $filtered = [];
    foreach($this->elements as $element)
    {
      if ($element->getTag() === $tag)
      {
        $filtered[] = $element;
      }
    }

    return new HtmlElementCollection($filtered);
  }

  public function filterByDisabled(bool $state = false)
  {
    $filtered = [];
    foreach($this->elements as $element)
    {
      $isDisabled = $this->isDisabled($element);
      if ($isDisabled && $state)
      {
        $filtered[] = $element;
      }
      elseif (!$isDisabled && !$state)
      {
        $filtered[] = $element;
      }
    }

    return new HtmlElementCollection($filtered);
  }

  public function filterByReadOnly(bool $state = false)
  {
    $filtered = [];
    foreach($this->elements as $element)
    {
      $isReadOnly = $this->isReadOnly($element);
      if ($isReadOnly && $state)
      {
        $filtered[] = $element;
      }
      elseif (!$isReadOnly && !$state)
      {
        $filtered[] = $element;
      }
    }

    return new HtmlElementCollection($filtered);
  }

  protected function build($element): ElementInterface
  {
    if ($element instanceof HtmlElement)
    {
      return $element;
    }
    elseif ($string = StringObject::normalize($element))
    {
      return new TextNode($string);
    }
    else
    {
      throw new \InvalidArgumentException(
        sprintf('The source of a "%s" must be scalar or implement a "__toString" method.', get_class($this))
      );
    }
  }

  /**
   * @param string $tag
   *
   * @return int|null
   */
  protected function getIndex(string $tag): ?int
  {
    $tag   = strtolower($tag);
    $array = array_values($this->elements);
    foreach($array as $index => $element)
    {
      if ($element->getTag() === $tag)
      {
        return $index;
      }
    }

    return null;
  }

  /**
   * @param HtmlElement $Element
   *
   * @return bool
   */
  protected function isDisabled(HtmlElement $Element): bool
  {
    if (method_exists($Element, 'isDisabled'))
    {
      return $Element->isDisabled();
    }
    elseif (!$Element->getAttributes()->has('disabled'))
    {
      return false;
    }

    return true;
  }

  /**
   * @param HtmlElement $Element
   *
   * @return bool
   */
  protected function isReadOnly(HtmlElement $Element): bool
  {
    if (method_exists($Element, 'isReadOnly'))
    {
      return $Element->isReadOnly();
    }
    elseif (!$Element->getAttributes()->has('readonly'))
    {
      return false;
    }

    return true;
  }

  /**
   * @return \ArrayIterator
   */
  public function getIterator(): \ArrayIterator
  {
    return new \ArrayIterator($this->elements);
  }
}
