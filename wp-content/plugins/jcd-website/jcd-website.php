<?php namespace JCDWebsite;

/**
 * Plugin Name: JCD Website
 * Description: Custom plugin for the JCD website.
 * Version: 1.0.0
 * Author: Josh Cummings
 * Author URI: https://joshcummingsdesign.com
 * License: MIT License
 * License URI: http://opensource.org/licenses/MIT
 * Text Domain: jcdwebsite
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
  die;
}

if (!class_exists(__NAMESPACE__ . '\JCDWebsite')) {

  /**
   * The main JCDWebsite class (Singleton).
   */
  final class JCDWebsite {

    /**
     * The minimum PHP version needed to run JCDWebsite.
     */
    const PHP_MIN_VERSION = '7.0';

    /**
     * The base directory where the views live.
     */
    const VIEWS_BASE_DIR = 'views';

    /**
     * The CoreAddons class instance.
     *
     * @var object
     */
    private $coreAddons;

    /**
     * The PluginAddons class instance.
     *
     * @var object
     */
    private $pluginAddons;

    /**
     * The ThemeSupport class instance.
     *
     * @var object
     */
    private $themeSupport;

    /**
     * The ThemeMenus class instance.
     *
     * @var object
     */
    private $themeMenus;

    /**
     * The JCDWebsite class instance.
     *
     * @var object
     */
    private static $instance;

    /**
     * Returns the main JCDWebsite class instance.
     *
     * @return object JCDWebsite
     */
    public static function getInstance() {
      if (is_null(self::$instance)) {
        self::$instance = new self();
      }
      return self::$instance;
    }

    /**
     * The JCDWebsite class constructor.
     */
    public function __construct() {

      // Bail if minimum PHP version requirement is not met.
      if (version_compare(self::PHP_MIN_VERSION, phpversion(), '>')) {
        add_action('admin_notices', [$this, 'phpUpdateNotice']);
        return;
      }

      $this->constants();
      $this->includes();
      $this->initTheme();
    }

    /**
     * Define plugin constants.
     */
    private function constants() {
      define('JCD_WEBSITE_PLUGIN_DIR', plugin_dir_path(__FILE__));
    }

    /**
     * Include required files.
     */
    private function includes() {
      require_once JCD_WEBSITE_PLUGIN_DIR . 'vendor/autoload.php';
    }

    /**
     * JCDWebsite theme initialization.
     */
    public function initTheme() {
      $this->themeMenus = new Helpers\Theme\ThemeMenus();
    }

    /**
     * Cloning is forbidden.
     */
    public function __clone() {
      _doing_it_wrong(__FUNCTION__, __('JCDWebsite cannot be cloned.', 'jcdwebsite'), '1.0.0');
    }

    /**
     * Unserializing is forbidden.
     */
    public function __wakeup() {
      _doing_it_wrong(__FUNCTION__, __('JCDWebsite cannot be unserialized.', 'jcdwebsite'), '1.0.0');
    }

    /**
     * Show PHP update notice.
     */
    public function phpUpdateNotice() {
      if (!is_admin()) {
        return;
      }
      $notice_heading = __('PHP Update Required', 'jcdwebsite');
      $notice_body = sprintf(__('JCDWebsite requires PHP version %s or later.', 'jcdwebsite'), self::PHP_MIN_VERSION);
      $notice_markup = '<p><strong>' . $notice_heading . '</strong></p>';
      $notice_markup .= '<p>' . $notice_body . '</p>';
      $notice = sprintf('<div class="notice notice-error">%1$s</div>', $notice_markup);
      echo $notice;
    }
  }
}

/**
 * Start JCDWebsite
 * The main function responsible for returning
 * the one true JCDWebsite instance.
 *
 * @return object JCDWebsite
 */
function JCDWebsite() {
  return JCDWebsite::getInstance();
}
JCDWebsite();
