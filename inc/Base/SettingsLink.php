<?php
/**
 *  @package ShopCPT
 */
namespace Inc\Base;

 class SettingsLink{

    // protected $plugin;
    // public function __construct(){
    //     $this->plugin = PLUGIN;
    // }  
    public function register(){
        add_filter("plugin_action_links_" .PLUGIN, array($this,'settings_link'));
    }

    public function settings_link($links){
        $settings_link = '<a href="admin.php?page=shop_cpt" >Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }
}