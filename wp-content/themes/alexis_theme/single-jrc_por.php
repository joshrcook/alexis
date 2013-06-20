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
<div class="pic-bg">
	<div class="row">
		<div class="columns large-10 large-centered">
			<blockquote>
				<span>Invention is 10% inspiration and 90% perspiration.</span>
				<footer>&#8212; Thomas Edison</footer>
			</blockquote>
		</div>
	</div>
</div>
<div class="hr after-quote"></div>
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
	jQuery(document).foundation('orbit');
</script>
<?php
get_footer();