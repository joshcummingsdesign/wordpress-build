<?php
/**
 * Plugin Name: JCD Website
 * Plugin URI: https://joshcummingsdesign.com
 * Description: The JCD Website plugin.
 * Author: Josh Cummings
 * Author URI: https://joshcummingsdesign.com
 * Version: 1.0.0
 * Text Domain: jcdwebsite
 */

use JCDWebsite\Main;

// Exit if accessed directly.
if (!defined('ABSPATH')) {
  exit;
}

/**
 * Plugin root file.
 */
define('JCD_PLUGIN_FILE', __FILE__);

require plugin_dir_path(JCD_PLUGIN_FILE) . 'vendor/autoload.php';

Main::getInstance()->boot();
