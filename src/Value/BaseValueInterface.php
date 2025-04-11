<?php

namespace DevCoding\Html\Value;

/**
 * @internal
 */
interface BaseValueInterface extends \Stringable
{
  public function equals($comp): bool;

  public static function validate($input): bool;
}
