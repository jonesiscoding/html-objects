<?php

namespace DevCoding\Html\Configuration;

use DevCoding\Html\Element\Base\HasHeaderInterface;
use DevCoding\Html\Element\HtmlElement;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FooterConfigurator implements OptionConfiguratorInterface
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
      $Resolver->setDefined('footer')->addAllowedTypes('footer', ['string','array',HtmlElement::class]);
    }
  }
}
