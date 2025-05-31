<?php

namespace Synmek\Thorn\Setup;

use Synmek\Thorn\Assets;

/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  add_theme_support('soil-clean-up');
  add_theme_support('soil-nav-walker');
  add_theme_support('soil-nice-search');
  add_theme_support('soil-jquery-cdn');
  add_theme_support('soil-relative-urls');

  // Make theme available for translation
  load_theme_textdomain('thorn', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  add_theme_support('title-tag');

  // Register navigation menus
  register_nav_menus([
    'primary_navigation_left'   => __('Primary Navigation Left', 'thorn'),
    'primary_navigation_right'  => __('Primary Navigation Right', 'thorn'),
    'primary_navigation_mobile' => __('Primary Navigation Mobile', 'thorn'),
  ]);

  // Enable post thumbnails
  add_theme_support('post-thumbnails');

  // Enable post formats
  add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Enable HTML5 markup support
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  // Use main stylesheet for visual editor
  // Customize styles in /assets/styles/layout/_tinymce.scss
  add_editor_style(Assets\asset_path('styles/main.min.css'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

/**
 * Register sidebars
 */
function widgets_init() {
  register_sidebar([
    'name'          => __('Primary', 'thorn'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ]);

  register_sidebar([
    'name'          => __('Footer', 'thorn'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ]);
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar() {
  static $display;

  isset($display) || $display = !in_array(true, [
    is_404(),
    is_front_page(),
    is_page_template('template-custom.php'),
  ]);

  return apply_filters('thorn/display_sidebar', $display);
}

/**
 * Theme assets
 */
function assets() {
  wp_enqueue_style('thorn/css', Assets\asset_path('styles/main.min.css'), false, null);

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_enqueue_script('thorn/js', Assets\asset_path('scripts/bundle.min.js'), ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);