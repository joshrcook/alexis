<?php get_header(); ?>

<?php query_posts(array('post_type' => 'post')); ?>

<?php global $more; 
$more = 0; ?>

<div class="row">
	<div class="columns large-9 small-12">

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		<div class="blog-post">
			<div class="row">
				<div class="columns">
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
			<div class="row">
				<div class="columns">
					<time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php the_time('M j, Y'); ?></time>
				</div>
			</div>
			<hr class="blog-hr" />
			<div class="row">
				<div class="columns large-3">
					<p class="category">Under: <?php the_terms($post->ID, 'category'); ?></p>
				</div>
				<div class="columns large-9">
					<?php the_content('<div class="row">
										<div class="column text-right">
											<p class="continue">Continue Reading &rsaquo;</p>
										</div>
									</div>'); ?>
				</div>
			</div>
		</div>

<?php endwhile; endif; ?>

	</div><!-- end body column -->
	<div class="columns large-3 small-12">
		<?php get_sidebar('blog'); ?>
	</div>
</div><!-- end first row -->

<?php get_footer(); ?>