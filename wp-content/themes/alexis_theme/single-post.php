<?php get_header(); ?>

<div class="row">
	<div class="columns large-9">
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<?php get_template_part('content', 'post'); ?>
		<?php endwhile; endif; ?>
	</div>
	<div class="columns large-3">
		<?php get_sidebar('blog'); ?>
	</div>
</div>

<?php get_footer(); ?>