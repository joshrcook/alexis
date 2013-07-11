<div class="row">
	<div class="columns">
		<p class="secondary-text">Share this on:</p>
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
	<div class="row">
		<div class="columns">
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
						<?php if(!MOBILE): ?>
							<div class="face back">
								<a class="social-icon" href="<?php echo $icon['link']; ?>">
									<div class="circle" style="background-color: <?php echo $icon['color']; ?>;">
										<i class="entypo-social"><?php echo $icon['icon']; ?></i>
									</div>
								</a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</p>