<?php get_header();

wp_enqueue_script('scrollTo');
wp_enqueue_script('jrc-theme-flexslider');
wp_enqueue_script('jrc-theme-flexslider-loader');
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
			<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Work' ))); ?>" class="all-posts">
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
<?php 
$bg_id = get_post_meta($post->ID, 'bg-id', true);
if($bg_id)
$url = wp_get_attachment_image_src($bg_id, 'full');
?>
<div class="pic-bg" <?php if($url): ?>style="background-image: url(<?php echo $url[0]; ?>);"<?php endif; ?>>
	<div class="row">
		<div class="columns large-9 large-centered small-10 small-centered">
			<blockquote>
				<span><?php echo $quote; ?></span>
				<footer>&#8212; <?php echo $quote_author; ?></footer>
			</blockquote>
		</div>
	</div>
</div>
<div class="hr after-quote"></div>
<?php } ?>
<?php 
$image_ids = json_decode(get_post_meta($post->ID, 'media-id', true));
if(is_array($image_ids)):
?>
<div class="row" id="slideshow">
	<div class="columns">
		<div class="portfolio-flexslider">
			<div class="flexslider">
			  <ul class="slides">
			    <?php 
				foreach($image_ids as $id):
				?>
					<li>
						<?php echo wp_get_attachment_image($id, 'full'); ?>
					</li>
				<?php
				endforeach;
				?>
			  </ul>
			  <div class="flex-direction-navigation">
			  </div>
			</div>
		</div>
	</div>
</div>
<?php 
endif; // end image-id if
endwhile; endif; ?>
</div><!-- end .jrc-por -->

<?php
get_footer();
