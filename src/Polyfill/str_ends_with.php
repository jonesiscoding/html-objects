<?php

if (!function_exists('str_ends_with')):
  /**
   * Polyfill for PHP8's str_ends_with.
   *
   * @param string $haystack
   * @param string $needle
   *
   * @return bool
   */
  function str_ends_with(string $haystack, string $needle): bool
  {
    // From: https://github.com/symfony/polyfill-php80/blob/1.x/Php80.php
    if ('' === $needle || $needle === $haystack) {
      return true;
    }

    if ('' === $haystack) {
      return false;
    }

    $needleLength = \strlen($needle);

    return $needleLength <= \strlen($haystack) && 0 === substr_compare($haystack, $needle, -$needleLength);
  }
endif;
