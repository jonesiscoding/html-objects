<?php

namespace DevCoding\Html\Element;

use DevCoding\Html\Attributes\HtmlAttributes;
use DevCoding\Html\Element\Base\ElementInterface;
use DevCoding\Html\Value\StringObject as StringLiteral;

/**
 * Object representing an HTML element, with methods for easily manipulating attributes via an HtmlAttribute object,
 * adding children, and output as an HTML tag.
 *
 * Class HtmlElement
 *
 * @author  AMJones <am@jonesiscoding.com>
 * @package Common\UtilsBundle\Object\Html
 */
class HtmlElement implements \Stringable, ElementInterface
{
  const SELF_CLOSING = ['area','base','col','command','embed','keygen','source','track','wbr','img', 'br', 'hr', 'input','link', 'meta', 'param'];

  /** @var HtmlAttributes */
  protected $attributes;
  /** @var string */
  protected $tag;
  /** @var HtmlElementCollection */
  protected $children;

  /**
   * @param string                    $tag
   * @param HtmlAttributes|array|null $attr
   */
  public function __construct(string $tag, $attr = null)
  {
    $this->tag = $tag;

    if (isset($attr))
    {
      $this->setAttributes($attr);
    }
  }

  // region //////////////////////////////////////////////// Public Methods

  /**
   * @return string
   */
  public function __toString()
  {
    try
    {
      return $this->output();
    }
    catch (\Exception $e)
    {
      return '';
    }
  }

  /**
   * Adds a child to the HtmlElement, typically another HtmlElement or a string.
   *
   * @param HtmlElement|StringLiteral|\Stringable|string $child
   *
   * @return $this
   */
  public function addChild($child)
  {
    if ($this->isSelfClosing())
    {
      $cls = get_class($this);
      $ref = HtmlElement::class !== $cls ? $cls : $this->getTag();

      throw new \InvalidArgumentException(
        sprintf("%s elements are self-closing and do not have child elements.", $ref)
      );
    }

    $this->getChildren()->append($child);

    return $this;
  }

  /**
   * Returns the HtmlAttributes object, which can then be manipulated to add/remove different attributes.
   *
   * @return HtmlAttributes
   */
  public function getAttributes(): HtmlAttributes
  {
    if (empty($this->attributes))
    {
      $this->attributes = new HtmlAttributes([]);
    }

    return $this->attributes;
  }

  /**
   * Returns an array of the child elements of this HtmlElement.
   *
   * @return HtmlElementCollection
   */
  public function getChildren()
  {
    if (!isset($this->children))
    {
      $this->children = new HtmlElementCollection([]);
    }

    return $this->children;
  }

  /**
   * Returns the children of this HtmlElement as an HTML string.
   *
   * @return string
   */
  public function getContents()
  {
    return (string) $this->getChildren();
  }

  /**
   * Returns the HTML tag used for this HtmlElement.
   *
   * @return string
   */
  public function getTag(): string
  {
    return $this->tag;
  }

  public function isEmpty(): bool
  {
    return $this->isSelfClosing() || !isset($this->children);
  }

  /**
   * Evaluates whether this HtmlElement uses a self-closing tag.
   *
   * @return bool
   */
  public function isSelfClosing()
  {
    return in_array($this->getTag(), self::SELF_CLOSING);
  }

  /**
   * Outputs the HtmlElement object as HTML with all children and attributes. Unlike the __toString method, this
   * method allows for child elements to throw Exceptions.
   *
   * @return string
   */
  public function output()
  {
    if ($this->isSelfClosing())
    {
      $tmpl = '<%s %s />';

      return sprintf($tmpl, $this->getTag(), $this->getAttributes()->__toString());
    }
    else
    {
      return sprintf(
        '<%s %s>%s</%s>',
        $this->getTag(),
        (string) $this->getAttributes(),
        $this->getContents(),
        $this->getTag()
      );
    }
  }

  /**
   * @param HtmlAttributes|array $attributes
   *
   * @return $this
   */
  public function setAttributes($attributes)
  {
    if (!$attributes instanceof HtmlAttributes)
    {
      if (is_array($attributes))
      {
        $attributes = new HtmlAttributes($attributes);
      }
      else
      {
        throw new \InvalidArgumentException('The given attributes must be an array or an HtmlAttributes object.');
      }
    }

    $this->attributes = $attributes;

    return $this;
  }

  /**
   * Sets the children of this HtmlElement, removing any previous children.
   *
   * @param HtmlElement[]|string[] $children   The children to set.
   *
   * @return HtmlElement
   */
  public function setChildren(array $children): HtmlElement
  {
    $this->children = new HtmlElementCollection($children);

    return $this;
  }

  // endregion ///////////////////////////////////////////// Public Methods
}
