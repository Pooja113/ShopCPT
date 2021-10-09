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

use Inc\Activate;
use Inc\Deactivate;
use Inc\Admin\AdminPages;

if( !class_exists('ShopCPT')){
    class ShopCPT {
        public $pluginName;

        function __construct() {
            add_action('init', array ( $this,'custom_post_type') );  
            
            $this->pluginName = plugin_basename(__FILE__);
        }

        function register(){
            add_action('admin_enqueue_scripts', array ( $this,'enqueue') );

            add_action('admin_menu', array($this,'add_admin_pages'));

            add_filter("plugin_action_links_$this->pluginName", array($this,'settings_link'));


        }
        public function settings_link($links){
            $settings_link = '<a href="admin.php?page=shop_cpt" >Settings</a>';
            array_push($links, $settings_link);
            return $links;
        }

        public function add_admin_pages(){
            add_menu_page('Shop Admin','Shop Admin','manage_options','shop_cpt',array($this,'admin_index'),'dashicons-edit-page',110); 
        }

        public function admin_index(){
            require_once plugin_dir_path(__FILE__).'templates/admin.php';
        }

        function  custom_post_type() {
            register_post_type('shopcpt',array ('public' => true, 'label'=>'ShopCPT' ) );
        }

        function enqueue(){
            wp_enqueue_style('mystyle',plugins_url('/assets/style.css',__FILE__));
            wp_enqueue_style('myscript',plugins_url('/assets/myscript.js',__FILE__));
        }

        function activate(){
            //require_once plugin_dir_path(__FILE__).'inc/shopcpt-activate.php';
            Activate::activate();
        }
    }
    $shopcpt = new ShopCPT();
    $shopcpt->register(); 

    //activate
    register_activation_hook( __FILE__, array( $shopcpt,'activate' ) );

    //deactivate
    //require_once plugin_dir_path(__FILE__).'inc/shopcpt-deactivate.php';
    register_deactivation_hook( __FILE__, array( 'Deactivate','deactivate' ) );


}


