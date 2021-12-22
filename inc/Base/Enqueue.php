<?php
/**
 *  @package ShopCPT
 */
namespace Inc\Base;

use \Inc\Base\BaseController;

 class Enqueue extends BaseController
 {
    public function register(){
        add_action('admin_enqueue_scripts', array ( $this,'enqueue') );
    }

    public function enqueue(){
        //enqueue all the scripts
        wp_enqueue_style('mystyle', $this->plugin_url . '/assets/style.css');
        wp_enqueue_style('myscript',$this->plugin_url . '/assets/myscript.js');
    }
}