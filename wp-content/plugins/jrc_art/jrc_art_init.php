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

$jrc_art = new JW_Post_type('jrc_art', array(
	'supports' => array('title', 'thumbnail'),
	'label' => 'Artwork',
	'has_archive' => false
));

$jrc_art->add_taxonomy('art_category', 'Art Categories', array('label' => 'Art Categories'));
