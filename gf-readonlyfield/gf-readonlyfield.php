<?php

/**
 * This plugin will make it possible to make GravityForms fields "read only"
 *
 * USE AT YOUR OWN RISK // NO WARRANTY
 *
 * HOW TO USE:
 * 1. Upload this Plugin to your Wordpress Backend.
 * 2. Activate this Plugin.
 * 3. Assign the following Custom CSS Class (under the "Appearance" tab) to the field you want to make "read-only": gf_readonly
 * 4. If you want to style the field via CSS, have a look here: https://gravitywiz.com/how-to-style-gravity-forms-read-only-fields/
 *
 *
 *
 * @link              https://medienbayer.de/
 * @since             1.0.0
 * @package           Gf_Readonlyfield
 *
 * @wordpress-plugin
 * Plugin Name:       GravityForms ReadOnly Field
 * Plugin URI:        
 * Description:       This plugin will make it possible to make GravityForms fields "read only"
 * Version:           1.0.0
 * Author:            M.L. with help from Chris (Gravity Forms support) 
 * Author URI:        https://medienbayer.de/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gf-readonlyfield
 */


add_filter( 'gform_pre_render', 'add_readonly_script' );

function add_readonly_script( $form ) {

    ?>

 

    <script type="text/javascript">

        jQuery(document).ready(function(){

            /* apply only to a input with a class of gf_readonly */

            jQuery("li.gf_readonly input").attr("readonly","readonly");

        });

    </script>

 

    <?php

    return $form;

}
