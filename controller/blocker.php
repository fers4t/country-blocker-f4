<?php

require_once CB_PLUGIN_PATH . '/includes/geoip/vendor/autoload.php';
use GeoIp2\Database\Reader;

$root_path = dirname(ABSPATH);
if (file_exists($root_path . "/blocked_countries/countries.json")) {
    $settings = file_get_contents($root_path . "/blocked_countries/countries.json");
    $settings = json_decode($settings, true);
    if (!empty($settings)) {
        $code = $settings['code'];
        $url = $settings['url'];
        // This creates the Reader object, which should be reused across
        // lookups.
        
        $reader = new Reader(CB_PLUGIN_PATH . '/includes/geoip/GeoLite2-Country.mmdb');
        $ip = getUserIP();
        $country = $reader->country("$ip");
        $country = $country->country->isoCode;

        $entered_link = $_SERVER['REQUEST_URI'];
        if (!empty($url) && !empty($code) && strpos($entered_link, $url) && $country != $code) {
            $message = "You've reported. Your ip is $ip";
            die($message);
        }
        if (!empty($settings['xmlrpc']) && $settings['xmlrpc'] == 'on') {
            require_once(CB_PLUGIN_PATH . '/controller/xmlrpc/disable_xmlrpc.php');
        } else {
            require_once(CB_PLUGIN_PATH . '/controller/xmlrpc/enable_xmlrpc.php');
        }
    }
}
