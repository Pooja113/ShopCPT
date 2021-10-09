<?php
/**
 *  @package ShopCPT
 */

namespace Inc\Base;

 class Deactivate{
    function deactivate() {
        flush_rewrite_rules();
    }
 }
