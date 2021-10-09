<?php
/**
 *  @package ShopCPT
 */
namespace Inc\Pages;

 class Admin{
    public function register(){
      add_action('admin_menu', array($this,'add_admin_pages')); 
    }

    public function add_admin_pages(){
      add_menu_page('Shop Admin','Shop Admin','manage_options','shop_cpt',array($this,'admin_index'),'dashicons-edit-page',110); 
   }
      
   public function admin_index(){
      require_once PLUGIN_PATH;
   }
 }
