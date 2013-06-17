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
			<span class="back"><</span>
			<span class="all">[]</span>
			<span class="forward">></span>
		</div>
	</div>
</div>
<div class="row">
	<div class="columns">
		<div class="featured-image text-center">
			<?php the_post_thumbnail(); ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="columns">
		<a href="#" class="slideshow-link">View Slideshow ></a>
	</div>
</div>
<div class="row content">
	<div class="columns columns-2">
		<div class="content">
			<?php the_content(); ?>
		</div>
	</div>
</div>
<div class="row">
	<hr />
</div>
<div class="row">
	<div class="columns large-8">
		<blockquote>
			Invention is 10% inspiration and 90% perspiration.
			<footer>Thomas Edison</footer>
		</blockquote>
	</div>
</div>
<div class="row">
	<hr />
</div>
<div class="row">
	<div class="columns">
		<div class="slideshow">
			slideshow.
		</div>
	</div>
</div>
<?php endwhile; endif; ?>
</div><!-- end .jrc-por -->
<?php
get_footer();