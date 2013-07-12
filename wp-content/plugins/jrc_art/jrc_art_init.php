<?php
/*
Plugin Name: JRC Artwork plugin
Plugin URI: 
Description: Plugin that enables you to show artwork on your site
Version: 1.0
Author: Joshua Cook
Author URI: joshrcook.com
License: GPL2
*/

require_once('Easy-Wordpress-Custom-Post-Types/jw_custom_posts.php');
require_once('inc/metronet-reorder-posts/class-reorder.php');

// initialize the post type
$jrc_art = new JW_Post_type('jrc_art', array(
	'supports' => array('title', 'thumbnail'),
	'label' => 'Artwork',
	'has_archive' => false
));

// add the art category taxonomy
$jrc_art->add_taxonomy('art_category', 'Art Categories', array('label' => 'Art Categories'));

// instantiate a new instance of the reorder class
function jrc_art_reorder_init() {
    $post_type = 'jrc_art';

    // Instantiate new reordering
    new Reorder(
        array(
            'post_type'   => $post_type,
            'heading'     => __( 'Reorder Artwork', 'reorder' ),
            'final'       => '',
            'initial'     => '',
            'menu_label'  => __( 'Reorder', 'reorder' ),
            // 'icon'        => REORDER_URL . '/metronet-icon.png',
            'post_status' => 'publish',
        )
    );
}

add_action( 'wp_loaded', 'jrc_art_reorder_init', 100 ); //Load low priority in init for other plugins to generate their post types
