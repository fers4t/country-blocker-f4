<?php

function do_my_htaccess_stuff_371705()
{
    // Get path to main .htaccess for WordPress
    $htaccess = get_home_path().".htaccess";

    $lines = array();
    $lines[] = "# Block WordPress xmlrpc.php requests
                <Files xmlrpc.php>
                order deny,allow
                deny from all
                allow from 123.123.123.123
                </Files>
                ";

    insert_with_markers($htaccess, "CountryBlocker", $lines);
}

add_action('admin_init', 'do_my_htaccess_stuff_371705');
