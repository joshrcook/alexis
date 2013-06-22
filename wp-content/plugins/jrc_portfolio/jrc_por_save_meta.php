<?php

function jrc_por_save_meta($post_id)
{
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	if($_SERVER['REQUEST_METHOD'] != 'POST') {
		return $post_id;
	}

	if( !wp_verify_nonce( $_POST['jrc_por_nonce'], 'jrc_por_save_meta')) {
		return $post_id;
	}

	// we're in!
	if(isset($_POST['quote'])) {
		$quote = esc_textarea($_POST['quote']);
		update_post_meta($post_id, 'quote', $quote);
	}

	if(isset($_POST['quote_author'])) {
		$author = sanitize_text_field($_POST['quote_author']);
		update_post_meta($post_id, 'quote_author', $author);
	}
}

add_action('save_post', 'jrc_por_save_meta');


$ids = array();
function jrc_por_save_slider($post_id)
{
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	if($_SERVER['REQUEST_METHOD'] != 'POST') {
		return $post_id;
	}

	if( !wp_verify_nonce( $_POST['jrc_por_slider_nonce'], 'jrc_por_save_slider')) {
		return $post_id;
	}

	global $ids;

	if(isset($_POST['media-id'])) {
	foreach($_POST['media-id'] as $id) {
		$ids[] = (int)$id;
	}
	} else {
		$ids = array();
	}

	update_post_meta($post_id, 'media-id', json_encode($ids));
	
}

add_action('save_post', 'jrc_por_save_slider');

function jrc_por_save_bg($post_id)
{
    global $typenow;
    if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
    }

    if($_SERVER['REQUEST_METHOD'] != 'POST') {
            return $post_id;
    }
    
    if($typenow != 'jrc_por') {
        return $post_id;
    }

    // we're in!
    
    if(isset($_POST['bg-id']) && !empty($_POST['bg-id'])) {
        $id = (int)$_POST['bg-id'];
        update_post_meta($post_id, 'bg-id', $id);
    } else {
    	update_post_meta($post_id, 'bg-id', '');
    }
}

add_action('save_post', 'jrc_por_save_bg');

