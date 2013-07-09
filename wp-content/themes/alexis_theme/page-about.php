<?php get_header(); ?>
<div class="row">
	<div class="columns">
		<?php
			$thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
		?>
		<div class="background-wrapper about" <?php if($thumbnail_src) { echo 'style="background-image: url(' . $thumbnail_src[0] . ');"'; }?>>
			<div class="row">
				<div class="columns large-7 over-image-white">
					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					<div class="body-text">
						<?php the_content(); ?>
					</div>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>