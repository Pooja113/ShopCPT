<?php
/**
 *  @package ShopCPT
 */
namespace Inc\Base;

 class Enqueue{
    public function register(){
        add_action('admin_enqueue_scripts', array ( $this,'enqueue') );
    }

    public function enqueue(){
        wp_enqueue_style('mystyle', PLUGIN_URL . '/assets/style.css');
        wp_enqueue_style('myscript',PLUGIN_URL . '/assets/myscript.js');
    }
}