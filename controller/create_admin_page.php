<?php

function cb_create_admin_page()
{
    add_menu_page(
        __('Ülke Engelleyici', 'textdomain'),
        'Ülke Engelleyici',
        'manage_options',
        'custompage',
        'cb_admin_page_view',
        ''
    );
}
add_action('admin_menu', 'cb_create_admin_page');


function cb_admin_page_view()
{
    require_once(CB_PLUGIN_PATH . "/view/panel.php");
}
