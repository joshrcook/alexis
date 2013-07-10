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
								<div class="columns text-right">
									<p class="continue">Continue Reading &rsaquo;</p>
								</div>
							</div>'); ?>
			<div class="row">
				<div class="columns">
					<p class="continue">Share this on:</p>
				</div>
			</div>
			<?php $social_array = array(
				'facebook' => array(
								'icon' => '&#62220;',
								'link' => '#',
								'color' => '#3a5998'
								),
				'twitter' => array(
								'icon' => '&#62217;',
								'link' => '#',
								'color' => '#00c2f8'
								),
				'pinterest' => array(
								'icon' => '&#62226;',
								'link' => '#',
								'color' => '#cd1f28'
								),
				'linked-in'=> array(
								'icon' => '&#62232;',
								'link' => '#',
								'color' => '#007ab5'
								),
				'google-plus' => array(
								'icon' => '&#62223;',
								'link' => '#',
								'color' => '#dd4b39'
								)
			);
			?>
			<p class="social">
					<?php foreach($social_array as $icon): ?>
						<div class="poster">
							<div class="movement">
								<div class="face front">
									<a class="social-icon" href="<?php echo $icon['link']; ?>">
										<div class="circle">
											<i class="entypo-social"><?php echo $icon['icon']; ?></i>
										</div>
									</a>
								</div>
								<div class="face back">
									<a class="social-icon" href="<?php echo $icon['link']; ?>">
										<div class="circle" style="background-color: <?php echo $icon['color']; ?>;">
											<i class="entypo-social"><?php echo $icon['icon']; ?></i>
										</div>
									</a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
			</p>
		</div>
	</div>
	<hr class="blog-hr" />
	<div class="row">
		<div class="columns">

		</div>
	</div>
</div>