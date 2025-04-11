<?php

namespace DevCoding\Html\Css;

use DevCoding\Html\Value\StringObject;

class CssClass extends StringObject
{
  protected string $raw;
  protected string $separator;
  protected bool   $forceLower;
  protected bool   $allowSpaces;

  /**
   * @param string $raw         The string
   * @param string $separator   The separator to use.  Defaults to -
   * @param bool   $forceLower  Force the result to lowercase.  Defaults to FALSE
   * @param bool   $allowSpaces Allow spaces in the result.  Defaults to FALSE
   */
  public function __construct(string $raw, string $separator = '-', bool $forceLower = true, bool $allowSpaces = false)
  {
    $this->raw         = $raw;
    $this->separator   = $separator;
    $this->forceLower  = $forceLower;
    $this->allowSpaces = $allowSpaces;

    $string = $this->transliterate();

    // Replace Spaces
    $space  = $this->allowSpaces ? '\s' : null;
    $addon  = [ $space, preg_quote($this->separator, '/') ];
    $regex  = vsprintf('/([^a-zA-Z0-9_%s%s]+)/', $addon);
    $string = preg_replace($regex, $this->separator, $string);

    // Force Lowercase
    if($this->forceLower)
    {
      $string = strtolower($string);
    }

    // Make sure first character is NOT a number.
    if(is_numeric(substr($string, 0, 1)))
    {
      $digits = [ 'zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine' ];
      $string = $digits[ substr($string, 0, 1) ] . substr($string, 1);
    }

    parent::__construct($string);
  }

  public static function normalize($input)
  {
    return (new static(parent::normalize($input)))->get();
  }
}
