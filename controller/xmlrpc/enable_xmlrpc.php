<?php

function enable_xmrpc_f4()
{
    // Get path to main .htaccess for WordPress
    $htaccess = get_home_path().".htaccess";

    $lines = array();
    $lines[] = "";

    insert_with_markers($htaccess, "CountryBlocker", $lines);
}

add_action('admin_init', 'enable_xmrpc_f4');
