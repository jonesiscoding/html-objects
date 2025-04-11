<?php

namespace DevCoding\Html\Configuration;

use Symfony\Component\OptionsResolver\OptionsResolver;

interface OptionConfiguratorInterface
{
  public function configureOptions(OptionsResolver $Resolver): void;
}
