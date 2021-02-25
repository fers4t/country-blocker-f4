<?php
$root_path = dirname(ABSPATH);

?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>?page=custompage" method="post">
    <div style="display: block; margin-bottom: 15px">
        <label for="country_code">Lütfen ülke kodunu girin</label>
        <input type="text" name="country_code" id="country_code">
    </div>
    <div style="display: block; margin-bottom: 15px">
        <label for="panel_url">Lütfen panel urlnizi giriniz</label>
        <input type="text" name="panel_url" placeholder="Örn: wp-admin">
    </div>
    <input type="submit" value="Yasakla" name="country_submit">
</form>
<?php

require_once(CB_PLUGIN_PATH . "/controller/form_action.php");

$allowed_country = file_get_contents($root_path . "/blocked_countries/countries.json");
    $allowed_country = json_decode($allowed_country, true);

if (!empty($allowed_country)) {
    $country_code = $allowed_country['code'];
    $panel_url = $allowed_country['url']; ?>
    <div style="display: block">
        <h3 style="display:inline-block">Sitenizin admin paneli yalnızca şu ülke için açıktır:</h3> <?php echo $country_code; ?>
    </div>
    <div style="display: block">
        <h3 style="display:inline-block">Panel Urlniz:</h3> <?php echo $panel_url; ?>
    </div>
    <?php
}
