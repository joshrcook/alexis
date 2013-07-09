<?php 
if ( is_search() ) { ?>

<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'twentythirteen' ); ?></p>

<form role="search" method="get" id="searchform" action="<?php echo get_home_url(); ?>">
	<input type="hidden" name="post_type" value="post" />
	<input type="text" class="search" name="s" id="s" />
</form>

<?php } ?>
