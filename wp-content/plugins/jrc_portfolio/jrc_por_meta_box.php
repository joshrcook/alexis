<?php

function jrc_por_meta_boxes()
{
	add_meta_box('jrc-por-quote-meta', 'Quote', 'jrc_por_quote_meta', 'jrc_por', 'normal', 'high');
	add_meta_box('jrc-por-slider-images', 'Slider Images', 'jrc_por_slider_meta', 'jrc_por', 'normal', 'high');
	add_meta_box('jrc-por-quote-bg', 'Quote Background', 'jrc_por_quote_bg_meta', 'jrc_por', 'side', 'low');
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

function jrc_por_slider_meta() 
{
    ?>
<div class="bootstrap slider sortable">
    <div class="media">
    	<form method="post">
    		<?php wp_nonce_field('jrc_por_save_slider', 'jrc_por_slider_nonce'); ?>
    		<?php $custom = get_post_custom();
    		$media_id_array = json_decode($custom['media-id'][0]);
    		?>
    		<div class="media-items">
    		<?php
    		$attr = array(
    			'class' => 'image-preview img-polaroid'
			);

			if($media_id_array) {
	    		foreach($media_id_array as $media_id) {
	    			?>
	    			<div class="media-item" data-row="1" data-col="1" data-sizex="1" data-sizey="1">
	    				<input class="media-id" type="hidden" name="media-id[]" value="<?php echo $media_id; ?>" />
	    				<?php echo wp_get_attachment_image($media_id, 'thumbnail', false, $attr); ?>
	    				<span class="delete-media">X</span>
	    			</div>
			<?php }
			} ?>
	        </div>
	    </form>
        <button class="btn btn-primary get-media">Add Image</button>
    </div>
</div>
    <?php
}

function jrc_por_quote_bg_meta()
{
    global $post;
?>
<div class="quote-bg">
	<div class="media">
	    <div class="media-items">
	        <?php $id = get_post_meta($post->ID, 'bg-id', 'true');
	              if($id) {
	                  echo '<div class="media-item">
	                            <input type="hidden" name="bg-id" value="' . $id . '" />';
	                            echo wp_get_attachment_image($id, 'thumbnail', false, array('class' => 'image-preview img-polaroid'));
	                  echo '</div>';
	              }
	        ?>
	    </div>
	<?php
	    if($id) {
	        echo '<a href="#" class="delete-media">Remove background image</a>';
	    } else {
	        echo '<a href="#" class="get-media">Set background image</a>';
	    }
	?>
	</div>
	<p class="description">Please choose an image that is 1000px wide or greater.</p>
</div>
<?php
}
