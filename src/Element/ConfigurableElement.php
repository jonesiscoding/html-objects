<?php

namespace DevCoding\Html\Element;

use DevCoding\Html\Attributes\AttributeConfiguratorInterface;
use DevCoding\Html\Attributes\HtmlAttributes;
use DevCoding\Html\Configuration\OptionConfiguratorInterface;
use DevCoding\Html\Value\StringLiteral;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Base class for CompoundHtmlElement objects which may be configured via an array of options.
 *
 * Class ConfigurableHtmlElement
 *
 * @author  AMJones <am@jonesiscoding.com>
 * @package AppBundle\View\Component
 */
abstract class ConfigurableElement extends CompoundElement
{
  /** @var array|Options */
  protected $options;
  /** @var AttributeConfiguratorInterface[]|OptionConfiguratorInterface[] */
  protected $configurators;

  /**
   * Override to specify options instead of tag and attributes.  Any tag or attributes are specified via the 'tag' and
   * 'attr' options.  In most cases, the default tag is specified in the required configureOptions method.
   *
   * @param array $options
   */
  public function __construct($options = [], $configurators = [])
  {
    $this->configurators = $configurators;
    $this->options       = $this->resolveOptions($options);

    parent::__construct($this->options['tag'], $this->options['attr']);

    $header = $this->hasOption('header') ? $this->getOption('header') : null;
    $footer = $this->hasOption('footer') ? $this->getOption('footer') : null;
    $childs = $this->hasOption('children') ? $this->getOption('children') : null;

    if ($childs || $header || $footer)
    {
      $this->children = $childs ?? new HtmlElementCollection();

      if ($header)
      {
        $this->children->prepend($header);
      }

      if ($footer)
      {
        $this->children->append($footer);
      }
    }
  }

  /**
   * Must indicate if the object requires an HTML id attribute.
   *
   * @return bool
   */
  abstract public function isRequiresId(): bool;

  /**
   * Override to ensure that the 'id' is set for objects that require it.
   *
   * @return HtmlAttributes
   */
  public function getAttributes(): HtmlAttributes
  {
    $attr = parent::getAttributes();

    foreach($this->configurators as $configurator)
    {
      if ($configurator instanceof AttributeConfiguratorInterface)
      {
        $configurator->configureAttributes($attr, $this);
      }
    }

    return $attr;
  }

  /**
   * @param string $optionKey
   *
   * @return bool
   */
  public function hasOption(string $optionKey): bool
  {
    return isset($this->options[$optionKey]);
  }

  /**
   * @param string $optionKey
   *
   * @return mixed
   */
  public function getOption(string $optionKey)
  {
    return $this->options[$optionKey];
  }

  /**
   * Creates an OptionsResolver object, adds the 'attr', 'tag', and 'id' options as applicable, then further configures
   * the OptionsResolver using the configureOptions method.  Finally, all options are resolved and returned.
   *
   * @param array $options The unresolved options
   *
   * @return array         The resolved options
   */
  private function resolveOptions($options)
  {
    $Resolver = new OptionsResolver();
    /** @noinspection PhpParamsInspection */
    $Resolver->setDefault('attr', []);
    $Resolver->setRequired('tag');

    foreach($this->configurators as $configurator)
    {
      if ($configurator instanceof OptionConfiguratorInterface)
      {
        $configurator->configureOptions($Resolver);
      }
    }

    return $Resolver->resolve($options);
  }
}
