<?php
/**
 *  @package ShopCPT
 */
namespace Inc;

 class Activate{
    function activate() {
        //generate CPT
        flush_rewrite_rules();
    }
 }

   