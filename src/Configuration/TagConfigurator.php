<?php

namespace DevCoding\Html\Configuration;

use DevCoding\Html\Element\HtmlElement;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TagConfigurator implements OptionConfiguratorInterface
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
    if($tag = $this->getTag())
    {
      /** @noinspection PhpParamsInspection */
      $Resolver->setDefault('tag', $tag);
    }
  }

  protected function getTag(): ?string
  {
    return (new \ReflectionObject($this->Element))->getConstant('TAG') ?: null;
  }
}
