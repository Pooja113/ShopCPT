<?php
/**
 *  @package ShopCPT
 */
namespace Inc\Base;

class Activate
{
    function activate() 
    {
        flush_rewrite_rules();
    }
}

   