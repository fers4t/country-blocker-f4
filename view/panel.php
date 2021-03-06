<?php
$root_path = dirname(ABSPATH);
?>

<style>
#f4_country_blocker,
#f4_informations {
    margin: 30px;
}
#f4_country_blocker form > * > * {
    display: block;
    margin-bottom: 5px;
}
#f4_country_blocker form > div {
    margin-bottom: 15px;
}

#f4_informations h3 {
    font-size: 15px;
    margin: 3px 0;
}
#f4_informations > div {
    padding: unset !important;
}
</style>

<?php
$allowed_country = file_get_contents($root_path . "/blocked_countries/countries.json");
$allowed_country = json_decode($allowed_country, true);

if (!empty($allowed_country)) {
    $country_code = $allowed_country['code'];
    $panel_url = $allowed_country['url'];
    $xmlrpc = $allowed_country['xmlrpc'];
}
?>
<div id="f4_country_blocker">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>?page=f4_country_blocker" method="post">
        <div>
            <label for="country_code"><?php echo __('Please enter your country code', 'textdomain') ?></label>
            <input type="text" name="country_code" id="country_code" value='<?php echo !empty($country_code) ? $country_code : ""; ?>' >
            <small><?php echo __('All countries except this will be blocked', 'textdomain'); ?></small>
        </div>
        <div>
            <label for="panel_url">
                <?php echo __('Please enter your admin panel slug.', 'textdomain') ?>
            </label>
            <input type="text" name="panel_url" placeholder="Ex: wp-admin" value='<?php echo !empty($panel_url) ? $panel_url : ""; ?>' >
        </div>
        <div>
            <label for="xmlrpc">
                <?php echo __('Close XMLRPC.', 'textdomain') ?>
            </label>
            <input type="checkbox" name="xmlrpc" <?php echo ($xmlrpc == "on") ? "checked" : "" ?> >
        </div>
        <input type="submit" value="Block All" name="country_submit">
    </form>
</div>
<?php

require_once(CB_PLUGIN_PATH . "/controller/form_action.php");
