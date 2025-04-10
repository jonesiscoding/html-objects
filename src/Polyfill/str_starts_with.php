<?php

if (!function_exists('str_ends_with')):
  /**
   * Polyfill for PHP8's str_starts_with.
   *
   * @param string $haystack
   * @param string $needle
   *
   * @return bool
   */
  function str_starts_with(string $haystack, string $needle): bool
  {
    // From: https://github.com/symfony/polyfill-php80/blob/1.x/Php80.php
    return 0 === strncmp($haystack, $needle, \strlen($needle));
  }
endif;
