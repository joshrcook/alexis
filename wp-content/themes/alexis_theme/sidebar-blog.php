<?php dynamic_sidebar( 'sidebar-blog' ); ?>
<form role="search" method="get" id="searchform" action="<?php echo get_home_url(); ?>">
	<input type="hidden" name="post_type" value="post" />
	<input type="text" class="search" name="s" id="s" />
</form>
<div class="poster">
	<div class="movement">
		<div class="face front">
			<a class="social-icon" href="#">
				<div class="circle">
					<i class="icon-rss"></i>
				</div>
			</a>
		</div>
		<div class="face back">
			<a class="social-icon" href="#">
				<div class="circle" style="background-color: #f68000;">
					<i class="icon-rss"></i>
				</div>
			</a>
		</div>
	</div>
</div>