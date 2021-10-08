<?php
/**
 *  @package ShopCPT
 */


 class ShopCPTActivate{
    function activate() {
        //generate CPT
        flush_rewrite_rules();
    }
 }

   