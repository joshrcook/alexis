<div class="row">
	<div class="columns">
		<p class="secondary-text">Share this on:</p>
	</div>
</div>
<?php 
$page_address = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ;
$encoded_address = urlencode($page_address);
$media_address = urlencode("http://localhost:8888/alexis/wp-content/uploads/2013/07/oil1.jpg");


$social_array = array(
	'facebook' => array(
					'icon' => '&#62220;',
					'link' => "https://www.facebook.com/sharer/sharer.php?u=$encoded_address",
					'color' => '#3a5998',
					'class' => 'entypo-social'
					),
	'twitter' => array(
					'icon' => '&#62217;',
					'link' => 'https://twitter.com/intent/tweet?text=Love+this+art+by+Alexis+Contreras%21',
					'color' => '#00c2f8',
					'class' => 'entypo-social'
					),
	'pinterest' => array(
					'icon' => '&#62226;',
					'link' => "//pinterest.com/pin/create/button/?url=$encoded_address&media=$media_address",
					'color' => '#cd1f28',
					'class' => 'entypo-social'
					),
	/*
	'linked-in'=> array(
					'icon' => '&#62232;',
					'link' => '#',
					'color' => '#007ab5',
					'class' => 'entypo-social'
					),
	*/
	'google-plus' => array(
					'icon' => '&#62223;',
					'link' => "https://plus.google.com/share?url=$page_address",
					'color' => '#dd4b39',
					'class' => 'entypo-social'
					)
);
?>
<p class="social">
	<div class="row">
		<div class="columns">
			<?php foreach($social_array as $icon): ?>
			<a class="social-icon" href="<?php echo $icon['link']; ?>">
				<div class="poster">
					<div class="movement">
						<div class="face front">
							
								<div class="circle">
									<i class="<?php echo $icon['class']; ?>"><?php echo $icon['icon']; ?></i>
								</div>

						</div>
						<?php if(!MOBILE): ?>
							<div class="face back">
									<div class="circle" style="background-color: <?php echo $icon['color']; ?>;">
										<i class="<?php echo $icon['class']; ?>"><?php echo $icon['icon']; ?></i>
									</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</a>
			<?php endforeach; ?>
		</div>
	</div>
</p>