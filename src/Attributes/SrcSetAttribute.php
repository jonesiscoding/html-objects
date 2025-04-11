<?php

namespace DevCoding\Html\Attributes;

use DevCoding\Html\Value\StringObject;

class SrcSetAttribute extends MapAttribute
{
  public function __construct($value)
  {
    if (!is_array($value))
    {
      $value = $this->parse($value);
    }

    parent::__construct($value, ', ');
  }

  public function all(): array
  {
    $data = parent::all();
    ksort($data);

    return $data;
  }

  public function __toString()
  {
    $sets = [];
    foreach ($this->all() as $size => $url)
    {
      if (!is_null($url))
      {
        if ('1x' === $size)
        {
          $sets[] = $url;
        }
        else
        {
          $sets[] = sprintf('%s %s', (string) $url, $size);
        }
      }
    }

    return implode($this->separator, $sets);
  }

  public function add(string $url, $size = '1x')
  {
    return parent::add($url, $size);
  }

  protected function parse(string $string): array
  {
    $parsed = [];
    if (preg_match_all('/([^\s,]+)\s?([0-9xwh]+)?(,|$)/', $string, $m, PREG_SET_ORDER))
    {
      foreach($m as $match)
      {
        $size = $match[2] ?? '1x';
        $url  = $match[1];

        $parsed[$url] = $size;
      }
    }

    return $parsed;
  }

  protected function normalize($value)
  {
    return StringObject::normalize($value);
  }

  public static function getName(): string
  {
    return 'srcset';
  }
}
