<?php get_header(); ?>

<div class="row">
	<div class="columns large-9">
		<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentythirteen' ), get_search_query() ); ?></h1>
		</header>

		<?php while ( have_posts() ) : the_post(); ?>
			
			<?php get_template_part('content', 'post'); ?>

		<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

	</div>
	<div class="columns large-3">
		<?php get_sidebar('blog'); ?>
	</div>
</div>

<?php get_footer(); ?>