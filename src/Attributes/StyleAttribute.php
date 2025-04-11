<?php

namespace DevCoding\Html\Attributes;

use DevCoding\Html\Value\StringObject;

class StyleAttribute extends MapAttribute
{
  /**
   * @param array|string|\Stringable $data
   */
  public function __construct($data)
  {
    if (is_string($data) || $data instanceof \Stringable)
    {
      $data = $this->parse($data);
    }

    parent::__construct($data, '; ');
  }

  public function __toString(): string
  {
    $cStyles = [];
    foreach ($this->all() as $key => $value)
    {
      if (!is_null($value))
      {
        $cStyles[] = sprintf('%s: %s;', $key, (string) $value);
      }
    }

    return implode($this->separator, $cStyles);
  }

  protected function parse($string): array
  {
    $style  = [];
    $string = $this->normalize($string);
    if (preg_match_all('#([^:]+):\s?([^!;]+)([^;]+)?;#', $string, $m, PREG_SET_ORDER))
    {
      foreach($m as $rule)
      {
        $property = isset($rule[1]) ? trim($rule[1]) : null;
        $value    = isset($rule[2]) ? trim($rule[2]) : null;
        $bang     = isset($rule[3]) ? trim($rule[3]) : null;

        $style[$property] = ($bang) ? $value . ' ' . $bang : $value;
      }
    }

    return $style;
  }

  protected function normalize($value)
  {
    return StringObject::normalize($value);
  }

  public static function getName(): string
  {
    return 'style';
  }
}
