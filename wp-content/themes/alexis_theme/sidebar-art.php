<?php $terms = get_terms('art_category'); ?>
<h4 class="widgettitle">Categories</h4>
<?php if($terms) : ?>
	<ul>
	<?php foreach($terms as $term) : ?>
		<li class="cat-item">
			<a href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?></a>
		</li>
	<?php endforeach; ?>
	</ul>
<?php endif; ?>
<form role="search" method="get" id="searchform" action="<?php echo get_home_url(); ?>">
	<input type="hidden" name="post_type" value="post" />
	<input type="text" class="search" name="s" id="s" />
</form>
<?php get_template_part('content', 'social'); ?>