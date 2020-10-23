<?php

namespace JCDWebsite;

use JCDWebsite\Helpers\Theme\ThemeMenus;

/**
 * Main plugin class (Singleton).
 */
final class Main {
  /**
   * The main plugin class instance.
   *
   * @var Main
   */
  private static $instance;

  /**
   * Returns the one true plugin class instance.
   */
  public static function getInstance() {
    if (is_null(self::$instance)) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  /**
   * Bootstrap the plugin.
   */
  public function boot() {
    /**
     * Minimum PHP version.
     */
    define('JCD_REQUIRED_PHP_VERSION', '7.0.0');

    // Bail if minimum PHP version is not met.
    if (version_compare(JCD_REQUIRED_PHP_VERSION, phpversion(), '>')) {
      add_action('admin_notices', [$this, 'phpUpdateNotice']);
      return;
    }

    add_action('plugins_loaded', [$this, 'init'], 0);
  }

  /**
   * Plugin initialization.
   */
  public function init() {
    $themeMenus = new ThemeMenus();
    $themeMenus->init();
  }

  /**
   * Return the plugin's PHP update notice.
   */
  public function phpUpdateNotice() {
    if (!is_admin()) {
      return;
    }
    $notice_heading = __('PHP Update Required', 'jcdwebsite');
    $notice_body = sprintf(__('JCDWebsite requires PHP version %s or later.', 'jcdwebsite'), JCD_REQUIRED_PHP_VERSION);
    $notice_markup = '<p><strong>' . $notice_heading . '</strong></p>';
    $notice_markup .= '<p>' . $notice_body . '</p>';
    $notice = sprintf('<div class="notice notice-error">%1$s</div>', $notice_markup);
    echo $notice;
  }

  /**
   * Cloning is forbidden.
   */
  public function __clone() {
    _doing_it_wrong(__FUNCTION__, __('Main plugin class cannot be cloned.', 'jcdwebsite'), null);
  }

  /**
   * Unserializing is forbidden.
   */
  public function __wakeup() {
    _doing_it_wrong(__FUNCTION__, __('Main plugin class cannot be unserialized.', 'jcdwebsite'), null);
  }
}
