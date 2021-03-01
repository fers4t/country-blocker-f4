<?php
/*
Plugin Name: Country Blocker
Plugin URI: https://t.me/WP_TR
Description: You can block all countries except yours against access your admin panel. With that feature, you can block brute-force attacks.
Author: Fers4t
Author URI: https://t.me/fers4t
Text Domain: country-blocker
Version: 0.1
*/

DEFINE('CB_PLUGIN_PATH', plugin_dir_path(__DIR__) . "country-blocker-f4");
require_once(ABSPATH . 'wp-load.php');
require_once(CB_PLUGIN_PATH . '/controller/blocker.php');
require_once(CB_PLUGIN_PATH . '/controller/create_admin_page.php');
require_once(CB_PLUGIN_PATH . '/controller/folder_controller.php');
