<?php

/*
Plugin Name: JRC Portfolio plugin
Plugin URI: 
Description: Plugin that enables you to show your portfolio on your site.
Version: 1.0
Author: Joshua Cook
Author URI: joshrcook.com
License: GPL2
*/

add_action('init', 'jrc_por_init');
require_once('jrc_por_functions.php');
require_once('jrc_por_taxonomies.php');
require_once('jrc_por_meta_box.php');
require_once('jrc_por_save_meta.php');


function jrc_por_init() {

	$labels = array(
		'name' => _x('Portfolio', 'post type general name'),
		'singular_name' => _x('Portfolio', 'post type singular name'),
		'add_new' => _x('Add New Portfolio Item', 'portfolio item'),
		'add_new_item' => __('Add New Portfolio Item'),
		'edit_item' => __('Edit Portfolio Item'),
		'new_item' => __('New Portfolio Item'),
		'view_item' => __('View Portfolio Item'),
		'search_items' => __('Search Portfolio Items'),
		'not_found' => __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true, 
		'show_ui' => true, 
		'query_var' => true, 
		'rewrite' => array(
			'slug' => 'work',
			'with_front' => true,
		), 
		'capability_type' => 'post',
		'hierarchical' => true,  // test this
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
	);

	register_post_type('jrc_por', $args);
        
        register_taxonomy_for_object_type( 'portfolio_tags', 'jrc_por' );
}

// settings
define('FEATURED_IMAGE_WIDTH', 900);
define('FEATURED_IMAGE_HEIGHT', 900);


