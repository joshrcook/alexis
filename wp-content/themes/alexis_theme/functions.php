<?php

// include the mobile detection script, which defines the constant MOBILE to either bool true or false
require_once(get_template_directory() . '/inc/detectmobilebrowser.php');
/************ REGULAR FUNCTIONS ***************/


function add_scripts_styles() {
	global $wp_styles;
    // add league gothic font
    wp_register_style('league-gothic', get_template_directory_uri() . '/fonts/League-Gothic/league-gothic.css');
    wp_enqueue_style('league-gothic');
    // add crimson font
    wp_register_style('crimson', get_template_directory_uri() . '/fonts/Crimson/crimson.css');
    wp_enqueue_style('crimson');

    // add the font awesome font
    wp_register_style('font-awesome', 'http://netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.css');
    wp_enqueue_style('font-awesome');

    // add the entypo font
    wp_register_style('entypo', get_template_directory_uri() . '/css/entypo-font.css');
    wp_enqueue_style('entypo');
    
    // add home page specific styles
    wp_register_style('home-page-css', get_template_directory_uri() . '/css/home-page.css');
    wp_enqueue_style('home-page-css');
    
    // add jquery mobile to handle touch and scroll events
    wp_register_script('jqueryMobile', get_template_directory_uri() . '/js/jquery.mobile.custom/jquery.mobile.custom.min.js', array('jquery'));
    wp_enqueue_script('jqueryMobile');

    // add scrollTo js to handle smooth scrolling
    wp_register_script('scrollTo', get_template_directory_uri() . '/js/vendor/jquery.scrollTo-1.4.3.1-min.js', array('jquery'), false, true);
    wp_enqueue_script('scrollTo');
    
    // add js to handle sidebar flyout
    wp_register_script('handle-off-canvas', get_template_directory_uri() . '/js/handle-off-canvas.js?' . time(), array('jquery', 'jqueryMobile', 'scrollTo'), false, true);
    wp_enqueue_script('handle-off-canvas');
    // add mobile scripts and styles
    if(MOBILE) {
    	wp_register_style('mobile-styles', get_template_directory_uri() . '/css/mobile.css');
    	wp_enqueue_style('mobile-styles');
    } else {  // add non-mobile scripts and styles
    	// add js to handle moving line
    	wp_register_script('magic-line', get_template_directory_uri() . '/js/magic-line.js', array('jquery'), false, true);
    	wp_enqueue_script('magic-line');

    	wp_register_style('desktop-styles', get_template_directory_uri() . '/css/desktop.css');
    	wp_enqueue_style('desktop-styles');
    }

    wp_register_script('foundation-orbit', get_template_directory_uri() . '/js/vendor/foundation-4.2.2.orbit/js/foundation.min.js', array('jquery'));
    wp_enqueue_script('foundation-orbit');

    if(!MOBILE) {
	    wp_register_script('content-replace', get_template_directory_uri() . '/js/content-replace.js', array('jquery'), false, true);
	    // wp_enqueue_script('content-replace');

	    wp_register_script('jquery-ui', 'http://code.jquery.com/ui/1.10.3/jquery-ui.js', array('jquery'));
	    wp_enqueue_script('jquery-ui');
	}

	// register the main flexslider script
	wp_register_script('jrc-theme-flexslider', get_template_directory_uri() . '/js/vendor/woothemes-FlexSlider/jquery.flexslider-min.js', array('jquery'));

	// register the flexslider css
	wp_register_style('jrc-theme-flexslider-css', get_template_directory_uri() . '/js/vendor/woothemes-FlexSlider/flexslider.css');

	// register the flexslider loader
	wp_register_script('jrc-theme-flexslider-loader', get_template_directory_uri() . '/js/load-flexslider.js', array('jquery', 'jrc-theme-flexslider'), false, true);

	wp_register_script('pinterest', get_template_directory_uri() . '/js/pinterest.js');
}

add_action('wp_enqueue_scripts', 'add_scripts_styles');


/**
 * Function to get the menu items from a menu, given a slug
 * 
 * @param string $menu_slug The menu slug
 * @return array Manu items
 */
function get_nav_menu_items($menu_slug) {
    $locations = get_nav_menu_locations();
    $menu = wp_get_nav_menu_object( $locations[ $menu_slug ] );
    return wp_get_nav_menu_items( $menu->term_id );
}

function display_tags($tags)
{
    $tag_count = count($tags);
    $counter = 0;
    foreach($tags as $tag) {
        echo '<li class="tag">'.$tag->name.'</li>';
        if(($tag_count - 1) != $counter) {
            echo '<span class="tag-separator">&nbsp;/&nbsp;</span>';
        }
        $counter++;
    }
}

// function to remove image links
add_filter( 'the_content', 'attachment_image_link_remove_filter' );

function attachment_image_link_remove_filter( $content ) {
	 $content =
	 preg_replace(
	 array('{<a(.*?)(wp-att|wp-content/uploads)[^>]*><img}',
	 '{ wp-image-[0-9]*" /></a>}'),
	 array('<img','" />'),
	 $content
	 );
	 return $content;
 }


/************ INCLUDE THE FOUNDATION CORE ************/
require_once( get_template_directory() . '/foundation-functions.php');

/************ INITIALIZE THE BONES FRAMEWORK ************/
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once('library/bones.php'); // if you remove this, bones will break
/*
2. library/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
require_once('library/custom-post-type.php'); // you can disable this if you like
/*
3. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
// require_once('library/admin.php'); // this comes turned off by default
/*
4. library/translation/translation.php
	- adding support for other languages
*/
// require_once('library/translation/translation.php'); // this comes turned off by default

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar-blog',
		'name' => __('Blog Sidebar', 'bonestheme'),
		'description' => __('The sidebar that shows up on any blog page.', 'bonestheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'sidebar-art',
		'name' => __('Art Sidebar', 'bonestheme'),
		'description' => __('The sidebar that shows up on the art page.', 'bonestheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __('Sidebar 2', 'bonestheme'),
		'description' => __('The second (secondary) sidebar.', 'bonestheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<!-- custom gravatar call -->
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5($bgauthemail); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<!-- end custom gravatar call -->
				<?php printf(__('<cite class="fn">%s</cite>', 'bonestheme'), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__('F jS, Y', 'bonestheme')); ?> </a></time>
				<?php edit_comment_link(__('(Edit)', 'bonestheme'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e('Your comment is awaiting moderation.', 'bonestheme') ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<!-- </li> is added by WordPress automatically -->
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<label class="screen-reader-text" for="s">' . __('Search for:', 'bonestheme') . '</label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search the Site...','bonestheme').'" />
	<input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
	</form>';
	return $form;
} // don't remove this bracket!


?>
