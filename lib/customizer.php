<?php

namespace Synmek\Thorn\Customizer;

use Synmek\Thorn\Assets;

/**
 * Customize Register
 * 
 * Enables live preview updates for the blog name using postMessage.
 *
 * @param \WP_Customize_Manager $wp_customize
 */
function customize_register($wp_customize) {
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
}
add_action('customize_register', __NAMESPACE__ . '\\customize_register');

/**
 * Enqueue Customizer JS
 *
 * Loads a custom JS file for live preview support.
 */
function customize_preview_js() {
  wp_enqueue_script(
    'thorn/customizer',
    Assets\asset_path('scripts/customizer.js'),
    ['customize-preview'],
    null,
    true
  );
}
add_action('customize_preview_init', __NAMESPACE__ . '\\customize_preview_js');
