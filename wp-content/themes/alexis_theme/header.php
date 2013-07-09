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

    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    
    <!-- add Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Asap:400,700,700italic,400italic' rel='stylesheet' type='text/css'>

    <!-- wordpress head functions -->
    <?php wp_head(); ?>
    <!-- end of wordpress head -->

    <!-- drop Google Analytics Here -->
    <!-- end analytics -->

</head>

<body <?php body_class(); ?>>
<div id="outer-container" <?php if(is_home()) { echo 'class="home"'; } ?> />
<div class="top-strip">&nbsp;</div>
<header>
    <div class="row nav-bar">
        <div class="main-logo columns large-3 small-6">
            <a href="<?php echo get_home_url() . '/'; ?>">
                <div class="poster">
                    <div class="movement">
                        <div class="face front">
                            <img src="<?php echo get_template_directory_uri() . '/img/assets/logos/ac-logo-red-shadow.png'; ?>"/>
                        </div>
                        <?php 
                        if(!MOBILE): ?>
                            <div class="face back">
                                <img src="<?php echo get_template_directory_uri() . '/img/assets/logos/ac-logo-b-w.png'; ?>" />
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </a>
        </div>
        <div class="large-9 small-6 columns nav">
            <p class="show-nav-off-canvas hide-for-medium-up">
                <i class="inactive-sidebar icon-reorder font-awesome" style="color: black;"></i>
            </p>
            <ul class="button-group hide-for-small text-right magic-line">
                <?php 
                
                $menu_items = get_nav_menu_items('main-nav');
                global $post;
                foreach($menu_items as $menu_item) {
                    echo '<li';
                    if((isset($post->ID) && $post->ID == $menu_item->object_id) || (fnmatch('*/work/[a-z]?*', $_SERVER['REQUEST_URI']) && fnmatch('*/work/*', $menu_item->url))) {
                        echo ' class="selected no-js"><img src="' . get_template_directory_uri() . '/img/assets/components/nav-arrow-top-black.png" /';
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
<div id="content-wrapper">
    <div id="content">

            
