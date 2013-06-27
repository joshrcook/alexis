<?php
/*
    Template Name: specific - Work page
 */

get_header();


$post_args = array(
    'post_type' => 'jrc_por',
    'orderby' => 'menu_order',
    'order' => 'ASC'
);
query_posts($post_args);

$post_count = wp_count_posts('jrc_por');

// the loop
$counter = 0;
if(have_posts()): while(have_posts()): the_post();
    $tags = get_the_terms($post->ID, 'portfolio_tags');
    // echo '<pre>' . print_r($tags, 1) . '</pre>';
    if($counter % 3 == 0) {
        ?>
        <div class="row work-row">
        <?php
    }
?>
            <div class="large-4 small-12 columns small-content-centered work-post">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <div class="work-featured-image"><?php the_post_thumbnail('Portfolio-Small'); ?></div>
                </a>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <div class="work-title"><?php the_title(); ?></div>
                </a>
                <div class="work-tags"><?php display_tags($tags); ?></div>
                <hr />
            </div>
<?php
    $counter++;
    if(($counter % 3 == 0) || ($counter == $post_count->publish)) {
        ?>
        </div> 
        <?php
    }
    
endwhile;
endif;

get_footer();

function display_tags($tags)
{
    $tag_count = count($tags);
    $counter = 0;
    foreach($tags as $tag) {
        echo '<li class="tag">'.$tag->name.'</li>';
        if(($tag_count - 1) != $counter) {
            echo '<span class="tag-separator">&nbsp;/&nbsp;</span>';
        }
        $counter++;
    }
}