<?php

$path = $_SERVER['DOCUMENT_ROOT'];

$ip = file_get_contents("https://l2.io/ip.json");
$ip = json_decode($ip, true);
$ip = $ip['ip'];
require_once $path . '/vendor/autoload.php';
use GeoIp2\Database\Reader;

// This creates the Reader object, which should be reused across
// lookups.
$reader = new Reader($path . '/GeoLite2-Country.mmdb');
$country = $reader->country($ip);
$country = $country->country->name;

if ($country == "Turkey") {
}
