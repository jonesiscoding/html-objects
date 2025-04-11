<?php

namespace DevCoding\Html\Configuration;

use DevCoding\Html\Attributes\HtmlAttributes;
use DevCoding\Html\Element\ConfigurableElement;
use DevCoding\Html\Element\HtmlElement;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IdConfigurator implements AttributeConfiguratorInterface, OptionConfiguratorInterface
{
  protected HtmlElement $Element;

  /**
   * @param HtmlElement $Element
   */
  public function __construct(HtmlElement $Element)
  {
    $this->Element = $Element;
  }

  public function configureAttributes(HtmlAttributes $Attr): void
  {
    if ($this->Element instanceof ConfigurableElement)
    {
      if ($this->Element->hasOption('id'))
      {
        $Attr->setId($this->Element->getOption('id'));
      }
    }
  }

  public function configureOptions(OptionsResolver $Resolver): void
  {
    if ($this->Element instanceof ConfigurableElement)
    {
      if ($this->Element->isRequiresId())
      {
        $Resolver->setRequired('id');
        $Resolver->setAllowedTypes('id', ['string']);
      }
      else
      {
        $Resolver->setDefined('id');
        $Resolver->setAllowedTypes('id', ['string','null']);
      }

      $Resolver->setAllowedTypes('id', ['string']);
    }

  }
}
