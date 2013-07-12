<?php get_header(); ?>

<div class="row">
	<div class="columns large-9 small-12">

	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			
			<?php get_template_part( 'content', 'post-excerpt' ); ?>

	<?php endwhile; endif; ?>

	</div><!-- end body column -->
	<div class="columns large-3 small-12">
		<?php get_sidebar('blog'); ?>
	</div>
</div><!-- end first row -->

<?php get_footer(); ?>