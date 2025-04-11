<?php

namespace DevCoding\Html\Value;

/**
 * @method bool get()
 */
class BooleanObject extends AbstractValue implements NormalizeInterface
{
  const IS_TRUE  = ['true', 'yes', 'y', '1', 1];
  const IS_FALSE = ['false', 'no', 'n', '0', 0];

  public function __toString(): string
  {
    return $this->get() ? 'true' : 'false';
  }

  /**
   * Attempts to resolve the given data into a bool value.  If the value is an object with a __toString method, it is
   * converted to a string.  If the value does not represent an integer, then NULL is returned.
   *
   * @param mixed $input
   *
   * @return bool|null
   */
  public static function normalize($input)
  {
    if (!is_bool($input))
    {
      if ($input instanceof BooleanObject)
      {
        // This will always be a boolean type.
        $input = $input->get();
      }
      else
      {
        if (is_object($input) && method_exists($input, '__toString'))
        {
          // Convert to string from object
          $input = (string) $input;
        }

        if (in_array($input, self::IS_TRUE))
        {
          $input = true;
        }
        elseif (in_array($input, self::IS_FALSE))
        {
          $input = false;
        }
      }
    }

    return is_bool($input) ? $input : null;
  }

  public static function validate($input): bool
  {
    if (is_bool($input) || $input instanceof BooleanObject)
    {
      return true;
    }
    elseif($string = StringObject::normalize($input))
    {
      $lower = strtolower($string);
      foreach([self::IS_TRUE, self::IS_FALSE] as $tests)
      {
        if (in_array($lower, $tests, true))
        {
          return true;
        }
      }
    }

    return false;
  }
}
