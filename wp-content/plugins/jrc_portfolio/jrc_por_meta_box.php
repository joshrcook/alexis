<?php

function jrc_por_meta_boxes()
{
	add_meta_box('jrc-por-quote-meta', 'Quote', 'jrc_por_quote_meta', 'jrc_por', 'normal', 'high');
}

add_action('add_meta_boxes', 'jrc_por_meta_boxes');

function jrc_por_quote_meta() 
{
	global $post;
?>
	<div class="bootstrap">
		<?php wp_nonce_field('jrc_por_save_meta', 'jrc_por_nonce'); ?>
		<label>Quote</label>
		<textarea rows="4" name="quote"><?php if($quote = get_post_meta($post->ID, 'quote', true)) echo $quote; ?></textarea>
		<label>Quote Author</label>
		<?php
			if($author = get_post_meta($post->ID, 'quote_author', true)) {
				echo '<input type="text" name="quote_author" value="' . $author . '" />';
			} else {
				echo '<input type="text" name="quote_author" />';
			}
		?>
	</div>
<?php
}

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

	if( 'page' == $_POST['post_type']) {
		if(!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} else if(!current_user_can('edit_post')) {
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


