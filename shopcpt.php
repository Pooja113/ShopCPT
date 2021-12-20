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

if (file_exists(dirname(__FILE__).'/vendor/autoload.php')) {
    require_once dirname(__FILE__).'/vendor/autoload.php'; 
}


function activate_shop_cpt() 
{
    Inc\Base\Activate::activate(); 
}
register_activation_hook(__FILE__ ,'activate_shop_cpt');


function deactivate_shop_cpt()
{
    Inc\Base\deactivate::deactivate(); 
}
register_deactivation_hook(__FILE__ ,'deactivate_shop_cpt');


if (class_exists('Inc\\Init')) {
     Inc\Init::register_services();
}


