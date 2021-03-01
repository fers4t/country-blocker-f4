<?php

function cb_create_admin_page()
{
    add_menu_page(
        __('Country Blocker', 'textdomain'),
        __('Country Blocker', 'textdomain'),
        'manage_options',
        'f4_country_blocker',
        'cb_admin_page_view',
        'dashicons-flag'
    );
}
add_action('admin_menu', 'cb_create_admin_page');


function cb_admin_page_view()
{
    require_once(CB_PLUGIN_PATH . "/view/panel.php");
}
