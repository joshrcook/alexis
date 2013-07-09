<?php get_header(); ?>

<?php query_posts(array('post_type' => 'post')); ?>

<?php global $more; 
$more = 0; ?>

<div class="row">
	<div class="columns large-9 small-12">

	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			
			<?php get_template_part( 'content', 'post' ); ?>

	<?php endwhile; endif; ?>

	</div><!-- end body column -->
	<div class="columns large-3 small-12">
		<?php get_sidebar('blog'); ?>
	</div>
</div><!-- end first row -->

<?php get_footer(); ?>