<div class="blog-post">
	<div class="row">
		<div class="columns">
			<a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
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
			<div class="row">
				<div class="columns">
					<p class="continue">Share this on:</p>
					<?php $social_array = array(
						'facebook' => array(
										'icon' => '&#62220;',
										'link' => '#'
										),
						'twitter' => array(
										'icon' => '&#62217;',
										'link' => '#'
										),
						'pinterest' => array(
										'icon' => '&#62226;',
										'link' => '#'
										),
						'linked-in'=> array(
										'icon' => '&#62232;',
										'link' => '#'
										),
						'google-plus' => array(
										'icon' => '&#62223;',
										'link' => '#'
										)
					);
					?>
				</div>
			</div>
		</div>
	</div>
	<hr class="blog-hr" />
	<div class="row">
		<div class="columns">

		</div>
	</div>
</div>