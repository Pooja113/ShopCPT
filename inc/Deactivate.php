<?php
/**
 *  @package ShopCPT
 */

namespace Inc;

 class Deactivate{
    function deactivate() {
        //generate CPT
        flush_rewrite_rules();
    }
 }
