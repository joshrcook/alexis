<?php get_header('background_wrapper'); ?>
<div class="row">
	<div class="columns">
		<?php
			$thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
		?>
		<div>
			<div class="row">
				<div class="columns large-7 large-offset-5 over-image-white about-content">
					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					<div class="body-text">
						<?php the_content(); ?>
					</div>
					<?php endwhile; endif; ?>
					<hr />
					<h1 class="league-gothic"><a href="mailto:aecs.contreras@gmail.com">contact me</a></h1>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>