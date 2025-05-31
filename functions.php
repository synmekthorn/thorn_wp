<?php
/**
 * Thorn includes
 *
 * The $thorn_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Missing files will produce a fatal error.
 */

$thorn_includes = [
  'lib/assets.php',     // Scripts and styles
  'lib/extras.php',     // Custom functions
  'lib/setup.php',      // Theme setup
  'lib/titles.php',     // Page titles
  'lib/wrapper.php',    // Theme wrapper class
  'lib/customizer.php', // Theme customizer
];

foreach ($thorn_includes as $file) {
  if (!($filepath = locate_template($file))) {
    trigger_error(
      sprintf(__('Error locating %s for inclusion', 'thorn'), $file),
      E_USER_ERROR
    );
  }

  require_once $filepath;
}

unset($file, $filepath);