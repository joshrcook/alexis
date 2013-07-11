<?php dynamic_sidebar( 'sidebar-art' ); ?>
<form role="search" method="get" id="searchform" action="<?php echo get_home_url(); ?>">
	<input type="hidden" name="post_type" value="post" />
	<input type="text" class="search" name="s" id="s" />
</form>
<?php get_template_part('content', 'social'); ?>