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


class ShopCPT {


    function __construct() {
        add_action('init', array ( $this,'custom_post_type') );
    }
    function register(){
        add_action('admin_enqueue_scripts', array ( $this,'enqueue') );
    }

    function activate() {
        //generate CPT
        $this->custom_post_type();

        flush_rewrite_rules();
    }

    function deactivate() {
       flush_rewrite_rules();
    }

    function  custom_post_type() {
        register_post_type('shopcpt',array ('public' => true, 'label'=>'ShopCPT' ) );
    }

    function enqueue(){
        wp_enqueue_style('mystyle',plugins_url('/assets/style.css',__FILE__));
        wp_enqueue_style('myscript',plugins_url('/assets/myscript.js',__FILE__));
    }

    }

if( class_exists('ShopCPT')){
    $shopcpt = new ShopCPT();
    $shopcpt->register(); 
}

//activate
register_activation_hook( __FILE__, array( $shopcpt,'activate' ) );

//deactivate
register_deactivation_hook( __FILE__, array( $shopcpt,'deactivate' ) );




