<?php

namespace JCDWebsite\Helpers\Theme;

// TODO: Enqueue versioned assets using mix-manifest.json
// TODO: Enqueue JS
class ThemeAssets {
  /**
   * Initialize theme assets.
   */
  public function init() {
    add_action('wp_enqueue_scripts', [$this, 'enqueue'], 100);
  }

  /**
   * Enqueue theme assets.
   */
  public function enqueue() {
    // main.css
    wp_enqueue_style(
      'jcdwebsite/css',
      JCD_THEME_URI . '/dist/styles/main.css',
      [],
      null
    );
  }
}
