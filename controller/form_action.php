<?php

if (isset($_POST['country_submit'])) {
    $country_code = $_POST['country_code'];
    $country_code = strtoupper($country_code);

    $panel_url = $_POST['panel_url'];

    $root_path = dirname(ABSPATH);
    $settings = array("code" => $country_code, "url" => $panel_url);

    $settings = json_encode($settings);
    file_put_contents($root_path . "/blocked_countries/countries.json", $settings);
}
