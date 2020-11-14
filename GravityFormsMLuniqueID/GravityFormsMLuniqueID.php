<?php

/**
 * This plugin will help you populate a Gravity Forms text field with a unique ID
 *
 * USE AT YOUR OWN RISK // NO WARRANTY
 *
 * HOW TO USE:
 * 1. Upload this Plugin to your Wordpress Backend.
 * 2. Activate this Plugin.
 * 3. In your form, create a new single-line text field.
 * 4. On the Advanced tab, check the box “allow field to be populated dynamically” and add the parameter name of ‘uuid’.
 * 5. Save your form and check results on Frontend.
 *
 *
 * @link              https://medienbayer.de/
 * @since             1.0.0
 * @package           Gf_DateFormateDDMMYYYY
 *
 * @wordpress-plugin
 * Plugin Name:       GravityForms ML UUID
 * Plugin URI:        
 * Description:       Will help you populate a Gravity Forms text field with a UUID.
 * Version:           1.0.0
 * Author:            M.L. based on https://wpcodeus.com/gravity-forms-create-a-unique-id-for-entries/
 * Author URI:        https://medienbayer.de/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gf-ML-UUID
 */


/* Put a unique ID on Gravity Form (single form ID) entries.
----------------------------------------------------------------------------------------*/
add_filter("gform_field_value_uuid", "get_unique");
function get_unique(){
    $prefix = "LNOB-"; // update the prefix here
    do {
        $unique = mt_rand();
        $unique = substr($unique, 0, 8);
        $unique = $prefix . $unique;
    } while (!check_unique($unique));
    return $unique;
}
function check_unique($unique) {
    global $wpdb;
    $table = $wpdb->prefix . 'rg_lead_detail';
    $form_id = 1; // update to the form ID your unique id field belongs to
    $field_id = 26; // update to the field ID your unique id is being prepopulated in
    $result = $wpdb->get_var("SELECT value FROM $table WHERE form_id = '$form_id' AND field_number = '$field_id' AND value = '$unique'");
    if(empty($result))
        return true;
    return false;
}