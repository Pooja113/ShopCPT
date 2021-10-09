<?php
/**
 *  @package ShopCPT
 */
namespace Inc\Base;

 class CustomPost{
    public function register(){
        add_action('init', array ( $this,'custom_post_type') );
    }

    public function  custom_post_type() {
            register_post_type('shopcpt',array ('public' => true, 'label'=>'ShopCPT' ) );
    }
}