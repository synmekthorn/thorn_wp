<?php

namespace Synmek\Thorn\Extras;

use Synmek\Thorn\Setup;

/**
 * Add custom <body> classes
 */
function body_class($classes) {
  // Add page slug if it's not already in the class list
  if ((is_single() || is_page()) && !is_front_page()) {
    $slug = basename(get_permalink());
    if (!in_array($slug, $classes)) {
      $classes[] = $slug;
    }
  }

  // Add a class if the sidebar is displayed
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Customize the "read more" excerpt suffix
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'thorn') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');