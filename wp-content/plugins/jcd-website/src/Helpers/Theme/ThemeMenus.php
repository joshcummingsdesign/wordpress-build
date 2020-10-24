<?php

namespace JCDWebsite\Helpers\Theme;

class ThemeMenus {
  /**
   * Initialize theme menus.
   */
  public function init() {
    $this->registerMenus();
  }

  /**
   * Register theme menus.
   */
  private function registerMenus() {
    register_nav_menus([ 'header' => __('Primary Navigation', 'jcdwebsite') ]);
  }
}
