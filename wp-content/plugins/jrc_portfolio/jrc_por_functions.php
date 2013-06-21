<?php

// add image sizes for portfolio images
add_image_size('Portfolio-Small', 300, 300, false);
add_image_size('Portfolio-Medium', 600, 600, false);
add_image_size('Portfolio-Large', 700, 99999999, false);

// add taxonomies to portfolio post type
function jrc_por_add_taxonomies() {
    register_taxonomy( 'portfolio_tags', 
    	array('jrc_por'), // if you change the name of register_post_type( 'custom_type', then you have to change this
    	array('hierarchical' => false,    // if this is false, it acts like tags
    		'labels' => array(
    			'name' => __( 'Tags', 'jrc_theme' ), // name of the custom taxonomy
    			'singular_name' => __( 'Tag', 'jrc_theme' ), // single taxonomy name
    			'search_items' =>  __( 'Search Tags', 'jrc_theme' ), // search title for taxomony
    			'all_items' => __( 'All Tags', 'jrc_theme' ), // all title for taxonomies
    			'edit_item' => __( 'Edit Tag', 'jrc_theme' ), // edit custom taxonomy title
    			'update_item' => __( 'Update Tag', 'jrc_theme' ), // update title for taxonomy
    			'add_new_item' => __( 'Add New Tag', 'jrc_theme' ), // add new title for taxonomy
    			'new_item_name' => __( 'New Tag Name', 'jrc_theme' ), // name title for taxonomy
                        'choose_from_most_used' => __( 'Choose from the most used Tags', 'jrc_theme' ), // title for tag cloud
                        'popular_items' => __('Popular Tags', 'jrc_theme'),
                        'separate_items_with_commas' => __( 'Seperate tag names with commas', 'jrc_theme' ) // appears under tag input field
    		),
    		'show_admin_column' => true,
    		'show_ui' => true,
    		'query_var' => true,
                'rewrite' => false,
                'show_admin_column' => true,
                'show_tagcloud' => true,
    	)
    );
    
}
add_action('init', 'jrc_por_add_taxonomies');

// add featured image instructions
function jrc_por_add_featured_image_instructions($html)
{
    $html .= '<p class="description">Please include an image that is '.FEATURED_IMAGE_WIDTH.'x'.FEATURED_IMAGE_HEIGHT.'px</p>';
    return $html;
}

add_filter('admin_post_thumbnail_html', 'jrc_por_add_featured_image_instructions', 10, 2);


function add_admin_scripts_styles()
{
    global $typenow;

    if($typenow == 'jrc_por') {
        // bootstrap scoped to '.bootstrap'
        wp_register_style('jrc_por_bootstrap', plugins_url() . '/jrc_portfolio/css/vendor/bootstrap/bootstrap.base.scoped.min.css');
        wp_enqueue_style('jrc_por_bootstrap');
        // jquery ui css
        wp_register_style('jrc_por_jquery_ui_theme', plugins_url() . '/jrc_portfolio/vendor/jquery-ui-1.10.3.custom/css/jquery-ui-1.10.3.custom.min.css');
        wp_enqueue_style('jrc_por_jquery_ui_theme');
        // jquery ui sortable, scoped to '.bootstrap'
        wp_register_script('jrc_por_jquery_ui_sortable', plugins_url() . '/jrc_portfolio/vendor/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js', array('jquery'), false, true);
        wp_enqueue_script('jrc_por_jquery_ui_sortable');
        // sortable init on '.media-items'
        wp_register_script('jrc_por_sortable_init', plugins_url() . '/jrc_portfolio/js/sortable.js', array('jquery', 'jrc_por_jquery_ui_sortable'), false, true);
        wp_enqueue_script('jrc_por_sortable_init');
        // get media init
        wp_register_script('jrc_por_get_media_slider', plugins_url() . '/jrc_portfolio/js/get-media-slider.js', array('jquery'), false, true);
        wp_enqueue_script('jrc_por_get_media_slider');
        // get background media init
        wp_register_script('jrc_por_get_media_bg', plugins_url() . '/jrc_portfolio/js/get-media-background.js', array('jquery'), false, true);
        wp_enqueue_script('jrc_por_get_media_bg');
        // get media css
        wp_register_style('jrc_por_admin_css', plugins_url() . '/jrc_portfolio/css/admin.css');
        wp_enqueue_style('jrc_por_admin_css');
    }
}

add_action('admin_enqueue_scripts', 'add_admin_scripts_styles');






