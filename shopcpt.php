<?php
/**
 *  @package ShopCPT
 */

/**
 * Plugin Name:       Shop CPT Plugin
 * Plugin URI:        https://donotexist/shopcpt/
 * Description:       Will create a CPT named Shop and have additional custom fields.
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Pooja Paul
 * Author URI:        https://donotexist.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://donotexist.com/shopcpt/
 * Text Domain:       shop-cpt
 */

defined('ABSPATH') or die('You can not Access this file!!');

if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
    require_once dirname(__FILE__).'/vendor/autoload.php'; 
}

use Inc\Base\Activate;
use Inc\Base\Deactivate;

define('PLUGIN_PATH', plugin_dir_path(__FILE__).'templates/admin.php');
define('PLUGIN_URL', plugin_dir_url(__FILE__));
define('PLUGIN', plugin_basename(__FILE__));


function activate_shop_cpt(){
    Activate::activate(); 
}
function deactivate_shop_cpt(){
    deactivate::deactivate(); 
}

register_activation_hook( __FILE__ ,'activate_shop_cpt');
register_deactivation_hook( __FILE__ ,'deactivate_shop_cpt');


if(class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}


