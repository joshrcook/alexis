<?php get_header(); ?>

<?php wp_enqueue_script('jrc-theme-flexslider'); ?>
<?php wp_enqueue_style('jrc-theme-flexslider-css'); ?>
<div class="row">
	<div class="columns large-9 small-12">
		<div id="slider" class="flexslider">
			<ul class="slides">
				<?php if(have_posts()): while(have_posts()): the_post(); ?>
					<?php $post_count = $wp_query->post_count; ?>
					<?php get_template_part('content', 'art-slider'); ?>
				<?php endwhile; endif; ?>
			</ul>
		</div>
		<?php if($post_count > 1): ?>
		<?php rewind_posts(); ?>
		<div id="carousel" class="flexslider">
			<ul class="slides">
				<?php if(have_posts()): while(have_posts()): the_post(); ?>
					<?php get_template_part('content', 'art-slider'); ?>
				<?php endwhile; endif; ?>
			</ul>
		</div>
		<?php endif; ?>


	</div>
	<div class="columns large-3 art-social">
		<?php get_sidebar('art'); ?>
	</div>
</div>
<script>
jQuery(window).load(function() {
  // The slider being synced must be initialized first
  jQuery('#carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 210,
    itemMargin: 5,
    asNavFor: '#slider'
  });
   
  jQuery('#slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: "#carousel"
  });
});
</script>

<?php get_footer(); ?>