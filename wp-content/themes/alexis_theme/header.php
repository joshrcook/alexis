<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
    <meta charset="utf-8">

    <!-- Google Chrome Frame for IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title><?php wp_title(''); ?></title>

    <!-- mobile meta (hooray!) -->
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) -->
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
    <!--[if IE]>
            <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    <![endif]-->
    <!-- or, set /favicon.ico for IE10 win -->
    <meta name="msapplication-TileColor" content="#f01d4f">
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <!-- wordpress head functions -->
    <?php wp_head(); ?>
    <!-- end of wordpress head -->

    <!-- drop Google Analytics Here -->
    <!-- end analytics -->

</head>

<body <?php body_class(); ?>>
<div id="outer-container" />
<div class="top-strip">&nbsp;</div>
<header>
    <div class="row nav-bar">
        <div class="large-3 columns main-logo">
            <a href="<?php echo get_home_url(); ?>"><h1 class="header-replacement">Alexis Contreras</h1></a>
        </div>
        <div class="large-9 columns nav">
            <ul class="button-group">
                <?php 
                $menu_name = 'main-nav';
                $locations = get_nav_menu_locations();
                $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                $menu_items = wp_get_nav_menu_items( $menu->term_id );
                global $post;
                // echo '<pre>' . print_r($menu_items, 1) . '</pre>';
                foreach($menu_items as $menu_item) {
                    echo '<li';
                    if(isset($post->ID) && $post->ID == $menu_item->object_id) {
                        echo ' class="selected"';
                    }
                    echo '><a class="button secondary" href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="row">
        <span class="columns large-12"><hr /></span>
    </div>
</header><!-- end header -->

            
