<?php

namespace DevCoding\Html\Configuration;

use DevCoding\Html\Element\Base\HasHeaderInterface;
use DevCoding\Html\Element\HtmlElement;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HeaderConfigurator implements OptionConfiguratorInterface
{
  protected HtmlElement $Element;

  /**
   * @param HtmlElement $Element
   */
  public function __construct(HtmlElement $Element)
  {
    $this->Element = $Element;
  }

  public function configureOptions(OptionsResolver $Resolver): void
  {
    if ($this->Element instanceof HasHeaderInterface)
    {
      $Resolver
          ->setDefined('header')
          ->setAllowedTypes('header', ['string','array',HtmlElement::class])
      ;
    }
  }
}
