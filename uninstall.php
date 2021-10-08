<?php

/**
 *  Uninstall Plugin file 
 *
 *@package ShopCPT
 */

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

//Accessing the db via SQL 
global $wpdb;
$wpdb->query( "DELETE from wp_posts WHERE post_type = 'shopcpt' ");
$wpdb->query( "DELETE from wp_postmeta WHERE post_id NOT IN (SELECT id FROM post_type)");
$wpdb->query( "DELETE from wp_term_relationships WHERE object_id NOT IN (SELECT id FROM post_type)");