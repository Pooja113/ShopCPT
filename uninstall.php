<?php

/**Trigger this file on Plugin uninstall
 *
 *@package ShopCPT
 */

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

//Accessing the db via SQL and deleting the stored data
global $wpdb;
$wpdb->query( "DELETE from wp_posts WHERE post_type = 'shopcpt' ");
$wpdb->query( "DELETE from wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)");
$wpdb->query( "DELETE from wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)");