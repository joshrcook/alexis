<?php

get_header();

?>
<div class="jrc-por">
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<div class="row">
	<div class="columns large-6 small-6">
		<h1 class="por-title"><?php the_title(); ?></h1>
	</div>
	<div class="columns large-6 small-6">
		<div class="por-nav text-right">
			<?php previous_post_link('%link', '<i class="icon-angle-left"></i>'); ?>
			<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Work' ))); ?>">
				<i class="icon-th"></i>
			</a>
			<?php next_post_link('%link', '<i class="icon-angle-right"></i>'); ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="columns large-8 large-offset-2">
		<div class="featured-image text-center">
			<?php the_post_thumbnail('Portfolio-Large'); ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="columns">
		<div class="slideshow-link">
			<a href="#slideshow">View Slideshow ></a>
		</div>
	</div>
</div>
<div class="content">
	<div class="row content">
		<div class="columns columns-2">
			<div class="outer-content">
				<div class="content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="hr after-content"></div>
<?php 
if(($quote = get_post_meta($post->ID, 'quote', true)) && ($quote_author = get_post_meta($post->ID, 'quote_author', true))) {
?>
<div class="pic-bg">
	<div class="row">
		<div class="columns large-10 large-centered">
			<blockquote>
				<span><?php echo $quote; ?></span>
				<footer>&#8212; <?php echo $quote_author; ?></footer>
			</blockquote>
		</div>
	</div>
</div>
<div class="hr after-quote"></div>
<?php } ?>
<div class="row">
	<div class="columns">
		<ul data-orbit id="slideshow">
		  <li>
		    <img src="<?php echo get_template_directory_uri(); ?>/img/test/slideshow-1.jpg" />
		  </li>
		  <li>
		    <img src="<?php echo get_template_directory_uri(); ?>/img/test/slideshow-2.jpg" />
		  </li>
		</ul>
	</div>
</div>
<?php endwhile; endif; ?>
</div><!-- end .jrc-por -->
<script type="text/javascript">
	jQuery(document).foundation('orbit', {
		next_class: 'angle-right orbit-next',
		prev_class: 'angle-left orbit-prev'
	});
</script>
<?php
get_footer();