<?php
/**
 *  @package ShopCPT
 */


 class ShopCPTDeactivate{
    function deactivate() {
        //generate CPT
        flush_rewrite_rules();
    }
 }
