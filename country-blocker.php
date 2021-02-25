<?php
/*
Plugin Name: Ülke Engelleyici
Plugin URI: https://t.me/WP_TR
Description: Bu eklentiyle tüm ülkelerin admin panelinize erişmesini ve dolayısıyla büyük ölçüde brute-force ataklarını engelleyebilirsiniz.
Author: Fers4t
Author URI: https://t.me/fers4t
Text Domain: country-blocker
Version: 0.1
*/

DEFINE('CB_PLUGIN_PATH', plugin_dir_path(__DIR__) . "ulke-engelleyici");

require_once(CB_PLUGIN_PATH . '/controller/blocker.php');
require_once(CB_PLUGIN_PATH . '/controller/create_admin_page.php');
require_once(CB_PLUGIN_PATH . '/controller/folder_controller.php');
