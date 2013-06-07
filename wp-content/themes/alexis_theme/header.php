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
<div id="outer-container" />
<div class="top-strip">&nbsp;</div>
<header>
    <div class="row nav-bar">
        <div class="main-logo columns large-3">
            <style>
            .movement {
                -moz-transform: rotateY(0deg);
                -webkit-backface-visibility: hidden;
                -o-backface-visibility: hidden;
                -ms-backface-visibility: hidden;
                backface-visibility: hidden;
                height: 116px;
                width: 116px;
                -webkit-transform-style: preserve-3d;
                -moz-transform-style: preserve-3d;
                -o-transform-style: preserve-3d;
                -ms-transform-style: preserve-3d;
                transform-style: preserve-3d;
                -webkit-transition: 0.5s;
                -moz-transition: all 1s ease;
                -o-transition: 0.5s;
                -ms-transition: 0.5s;
                transition: 0.5s;
            }
            
            .face {
                position: absolute;
                -webkit-backface-visibility: hidden;
                -moz-backface-visibility: hidden;
                -o-backface-visibility: hidden;
                -ms-backface-visibility: hidden;
                backface-visibility: hidden;
            }
            
            .back {
                width: 116px;
                height: 116px;
                -webkit-backface-visibility: hidden;
                -o-backface-visibility: hidden;
                -ms-backface-visibility: hidden;
                backface-visibility: hidden;
                -webkit-transform: rotateY(180deg);
                -o-transform: rotateY(180deg);
                -ms-transform: rotateY(180deg);
                transform: rotateY(180deg);
            }
            
            .front {
                z-index: 5;
                width: 116px;
                height: 116px;
            }
            
            .movement:hover .front {
                z-index: 0;
                filter: alpha(opacity=0);
                opacity: 0;
                -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=0)";
                -webkit-transition: all 0.2s linear;
                -o-transition: all 0.2s linear;
                -ms-transition: all 0.2s linear;
                transition: all 0.2s linear;
            }
            
            .poster {
                height: 116px;
                width: 116px;
                -webkit-perspective: 1000;
                -moz-perspective: 1000;
                -o-perspective: 1000;
                -ms-perspective: 1000;
                perspective: 1000;
            }
            
            .poster:hover .movement {
                -webkit-transform: rotateY(180deg); 
                /*-moz-transform: rotateY(180deg);*/ 
                -o-transform: rotateY(180deg); 
                -ms-transform: rotateY(180deg); 
                transform: rotateY(180deg);
            }
            
            
            </style>
            <div class="poster">
                <div class="movement">
                    <div class="face front">
                        <img height="116" width="116" src="<?php echo get_template_directory_uri() . '/img/assets/logos/ac-logo-red-shadow.png'; ?>"/>
                    </div>
                    <div class="face back">
                        <img height="116" width="116" src="<?php echo get_template_directory_uri() . '/img/assets/logos/ac-logo-b-w.png'; ?>" />
                    </div>
                </div>
            </div>
        </div>
        <div class="large-9 small-6 columns nav">
            <p class="show-nav-off-canvas hide-for-medium-up">
                <img class="inactive-sidebar" src="<?php echo get_template_directory_uri() . '/img/assets/components/show-nav-button.png'; ?>" alt="Show off-canvas navigation" />
            </p>
            <ul class="button-group hide-for-small text-right magic-line">
                <?php 
                
                $menu_items = get_nav_menu_items('main-nav');
                global $post;
                // echo '<pre>' . print_r($menu_items, 1) . '</pre>';
                foreach($menu_items as $menu_item) {
                    echo '<li';
                    if(isset($post->ID) && $post->ID == $menu_item->object_id) {
                        echo ' class="selected no-js"><img src="' . get_template_directory_uri() . '/img/assets/components/nav-arrow-top-black.png" /';
                    }
                        echo '><a class="button secondary" href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
                }
                ?>
                <!-- add magic line -->
                
            </ul>
        </div>
    </div>
    <div class="row">
        <span class="columns large-12"><hr /></span>
    </div>
</header><!-- end header -->

            
