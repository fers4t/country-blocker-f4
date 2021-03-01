<?php

if (isset($_POST['country_submit'])) {
    isset($_POST['country_code']) ? $country_code = $_POST['country_code'] : $country_code = null;
    isset($_POST['xmlrpc']) ? $xmlrpc = $_POST['xmlrpc'] : $xmlrpc = null;
    isset($_POST['panel_url']) ? $panel_url = $_POST['panel_url'] : $panel_url = null;
    
    !is_null($country_code) ? strtoupper($country_code) : $country_code = null;

    $root_path = dirname(ABSPATH);
    
    $settings = array("code" => $country_code, "url" => $panel_url, 'xmlrpc' => $xmlrpc);

    $settings = json_encode($settings);
    file_put_contents($root_path . "/blocked_countries/countries.json", $settings);

    echo '<meta http-equiv="refresh" content="0; url=admin.php?page=f4_country_blocker">';
}
