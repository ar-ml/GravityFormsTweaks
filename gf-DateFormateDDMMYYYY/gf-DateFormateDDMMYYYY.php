<?php

/**
 * This plugin will help you populate a Gravity Forms text field with todays date in the formate DDMMYYYY
 *
 * USE AT YOUR OWN RISK // NO WARRANTY
 *
 * HOW TO USE:
 * 1. Upload this Plugin to your Wordpress Backend.
 * 2. Activate this Plugin.
 * 3. In your form, create a new single-line text field.
 * 4. On the Advanced tab, check the box “allow field to be populated automatically” and add the parameter name of ‘dateDDMMYYYY’.
 * 5. Save your form and check results on Frontend.
 *
 *
 * @link              https://medienbayer.de/
 * @since             1.0.0
 * @package           Gf_DateFormateDDMMYYYY
 *
 * @wordpress-plugin
 * Plugin Name:       GravityForms Todays Date DDMMYYYY
 * Plugin URI:        
 * Description:       Will help you populate a Gravity Forms text field with todays date in the formate DDMMYYYY.
 * Version:           1.0.0
 * Author:            M.L. with help from Chris (Gravity Forms support) 
 * Author URI:        https://medienbayer.de/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gf-DateFormateDDMMYYYY
 */


add_filter( 'gform_field_value_dateDDMMYYYY', 'populate_the_date' );

function populate_the_date( $value ) {

	// desired format DDMMYYYY

	// ref https://www.php.net/manual/en/function.date.php

	$local_timestamp = GFCommon::get_local_timestamp( time() );

	return date_i18n( 'dmY', $local_timestamp, true );

}
