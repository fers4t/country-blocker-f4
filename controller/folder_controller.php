<?php

$root_path = dirname(ABSPATH);

if (!file_exists($root_path . "/blocked_countries")) {
    mkdir($root_path . "/blocked_countries");
    $file = fopen($root_path . "/blocked_countries/countries.json", "w");
    $txt = "{}";
    fwrite($file, $txt);
    fclose($file);
}
