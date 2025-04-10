<?php

if (!function_exists('is_countable'))
{
  function is_countable($value)
  {
    if (is_array($value) || $value instanceof Countable)
    {
      return true;
    }
    elseif (class_exists('ResourceBundle') && $value instanceof ResourceBundle)
    {
      return true;
    }
    elseif (class_exists('SimpleXMLElement' && $value instanceof SimpleXMLElement))
    {
      return true;
    }

    return false;
  }
}
