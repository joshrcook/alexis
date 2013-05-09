<?php

/************ INCLUDE FOUNDATION 4 CORE ************/
/*
 * This file initializes the Foundation 4 framework so
 * that it can be use for wordpress,
 * including the css files and the js files.
 */

DEFINE('FOUNDATION_DIR', get_template_directory_uri() . '/foundation-core');

// register both scripts and styles during init
function f4_register_scripts_styles() {
    // register css styles
    wp_register_style('normalize', FOUNDATION_DIR . '/css/normalize.css');
    wp_register_style('foundation-base-css', FOUNDATION_DIR . '/css/foundation.min.css');

    // register js files
    // this script inits all f4 js
    // to initialize only parts, use js from js/foundation directory
    wp_register_script('f4-js', FOUNDATION_DIR . '/js/foundation.min.js', array('jquery'));
}

add_action('init', 'f4_register_scripts_styles');

// init the styles in the header
function f4_enqueue_styles() {
	wp_enqueue_style('normalize');
	wp_enqueue_style('foundation-base-css');
}

add_action('wp_enqueue_scripts', 'f4_enqueue_styles');

// init the js in the footer for faster loading times
function f4_enqueue_scripts() {
	wp_enqueue_script('f4-modernizr');
	wp_enqueue_script('f4-js');
}

add_action('wp_footer', 'f4_enqueue_scripts');
