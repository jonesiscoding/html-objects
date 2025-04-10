<?php

namespace DevCoding\Html\Value;

class StringObject extends AbstractValue implements NormalizeInterface
{
  use TransliterateTrait;

  const PATTERN_SLUGIFY = '#[^0-9a-z]+#i';

  /** @var bool  */
  private $transliterate;

  public function __construct(string $value, bool $transliterate = true)
  {
    $this->transliterate = $transliterate;

    parent::__construct($value);
  }

  // region //////////////////////////////////////////////// Implemented Methods

  public function __toString(): string
  {
    return $this->value;
  }

  public static function normalize($input)
  {
    if (!is_string($input))
    {
      if (StringObject::validate($input))
      {
        return (string) $input;
      }
      elseif (is_object($input) && method_exists($input, 'toString'))
      {
        return (string) $input;
      }
    }

    return $input;
  }

  public static function validate($input): bool
  {
    return is_scalar($input) || $input instanceof \Stringable || (is_object($input) && method_exists($input, '__toString'));
  }

  // endregion ///////////////////////////////////////////// End Implemented Methods

  // region //////////////////////////////////////////////// String Manipulation Methods

  /**
   * Converts this string into a CSS safe string that may be used for CSS class names or HTML5 IDs.
   *
   * @param string $sep               The separator to use.  Defaults to -
   * @param bool   $spaces            Allow spaces in the result.  Defaults to FALSE
   * @param bool   $force_lowercase   Force the result to lowercase.  Defaults to FALSE
   *
   * @return string|string[]|null
   */
  public function css($sep = "-", $spaces = false, $force_lowercase = false)
  {
    // Replace all accent characters with their non-accented equivalents.
    $string = $this->transliterate();

    // Replace Spaces
    $add    = ($spaces) ? [ '\s', preg_quote($sep, '/') ] : [ null, preg_quote($sep, '/') ];
    $regex  = vsprintf('/([^a-zA-Z0-9_%s%s]+)/', $add);
    $string = preg_replace($regex, $sep, $string);

    // Force Lowercase
    if($force_lowercase)
    {
      $string = strtolower($string);
    }

    // Make sure first character is NOT a number.
    if(is_numeric(substr($string, 0, 1)))
    {
      $digits = [ 'zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine' ];
      $string = $digits[ substr($string, 0, 1) ] . substr($string, 1);
    }

    return $string;
  }

  /**
   * Converts this string into the proper format for a PHP class name. IE- Converts 'table name' to 'TableName'.
   *
   * @return string
   * @author Jonathan H. Wage <jonwage@gmail.com> (Borrowed from Doctrine Inflector)
   */
  public function classify()
  {
    $word = ($this->transliterate) ? $this->transliterate() : $this->get();

    return str_replace([' ', '_', '-'], '', ucwords($word, ' _-'));
  }

  /**
   * Converts this string into camelCase. IE- Converts 'table name' to 'tableName'.
   *
   * @author Jonathan H. Wage <jonwage@gmail.com> (Borrowed from Doctrine Inflector)
   * @return string
   */
  public function camelize()
  {
    return lcfirst($this->classify());
  }

  /**
   * Creates a "slug" from this string by optionally any non ASCII characters, then replacing all the spacing
   * characters with a separator, converting the string to lower case, and removing any non-alphanumeric characters.
   *
   * @param string $sep             The separator to use, a dash by default.
   * @param string $pattern         Regex pattern to use for replacement
   *
   * @return string
   */
  public function slugify($sep = '-', $pattern = self::PATTERN_SLUGIFY)
  {
    $string = ($this->transliterate) ? $this->transliterate() : $this->get();

    if (self::PATTERN_SLUGIFY == $pattern)
    {
      // Single and double quotes should just go away, but only with default usage.
      $string = $this->replaceQuotes($string);
    }

    return strtolower(trim(preg_replace($pattern, $sep, $string), ' -'));
  }

  /**
   * Converts this string into snake_case. IE- Converts 'ClassName' to 'class_name'.
   *
   * @author Jonathan H. Wage <jonwage@gmail.com> (Borrowed from Doctrine Inflector)
   * @return string
   */
  public function snakeize()
  {
    $string = ($this->transliterate) ? $this->transliterate() : $this->get();

    return strtolower(preg_replace('~(?<=\\w)([A-Z])~', '_$1', $string));
  }

  /**
   * Removes and replaces accent characters.
   *
   * @return string                The transliterated word or phrase.
   */
  public function transliterate()
  {
    if (function_exists('transliterator_transliterate'))
    {
      try
      {
        return transliterator_transliterate('Any-Latin; Latin-ASCII', $this->get());
      }
      catch(\Exception $e)
      {
        return $this->replaceAccents($this->get());
      }
    }

    return $this->replaceAccents($this->get());
  }
}
