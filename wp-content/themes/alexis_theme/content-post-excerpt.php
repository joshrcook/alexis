<div class="blog-post">
	<div class="row">
		<div class="columns">
			<a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
		</div>
	</div>
	<div class="row">
		<div class="columns">
			<time class="secondary-text" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php the_time('M j, Y'); ?></time>
		</div>
	</div>
	<hr class="blog-hr" />
	<div class="row">
		<div class="columns large-3">
			<p class="category">Under: <?php the_terms($post->ID, 'category'); ?></p>
		</div>
		<div class="columns large-9">
			<?php the_content('<div class="row">
								<div class="columns text-right">
									<h4 class="secondary-text">Continue Reading &rsaquo;</h4>
								</div>
							</div>'); ?>
		</div>
	</div>
</div>