<?php

require_once CB_PLUGIN_PATH . '/includes/geoip/vendor/autoload.php';
use GeoIp2\Database\Reader;

function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}
$ip = getUserIP();

$root_path = dirname(ABSPATH);
$settings = file_get_contents($root_path . "/blocked_countries/countries.json");
    $settings = json_decode($settings, true);
    if (!empty($settings)) {
        $code = $settings['code'];
        $url = $settings['url'];


        // This creates the Reader object, which should be reused across
        // lookups.
        $reader = new Reader(CB_PLUGIN_PATH . '/includes/geoip/GeoLite2-Country.mmdb');
        $country = $reader->country($ip);
        $country = $country->country->isoCode;

        $entered_link = $_SERVER['REQUEST_URI'];
        if (strpos($entered_link, $url) && $country != $code) {
            $message = "You've reported. Your ip is $ip";
            die($message);
        }
    }
