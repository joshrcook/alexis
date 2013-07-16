<?php get_header(); ?>

<?php // take inspiration from the about page for this design ?>
<div class="row">
    <div class="background-image">
        <div class="columns large-6">
            <div class="title-page">
                <h1>Hello.<br />
                    Hola.</h1>
                    <hr />
                <p>I am Alexis Contreras,<br />
                    a creative thinker<br />
                    with a passion<br />
                    for design.</p>
            </div>
        </div>
        <?php if(has_post_thumbnail()) : ?>
            <?php echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'absolute-image right hide-for-small')); ?>
        <?php endif; ?>
        <!--<img class="absolute-image right hide-for-small" src="<?php echo get_template_directory_uri() . '/img/assets/photos/shoe2.jpg'; ?>" />-->
    </div>
</div>
<?php get_footer(); ?>