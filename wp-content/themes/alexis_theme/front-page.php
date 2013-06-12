<?php get_header(); ?>
<?php
    require_once(get_template_directory() . '/inc/Mobile-Detect-2.6.2/Mobile_Detect.php');
    $detect = new Mobile_Detect;

if($detect->isMobile()) {
    echo 'mobile';
} else {
    echo 'not mobile';
}
?>
<div class="background-wrapper">
    <div class="row">
        <div class="rw-div columns large-12">
            <span>I am a</span>
            <br />
            <div class="rw-words rw-words-1">
                <span>creative thinker</span>
                <span>problem solver</span>
                <span>graphic artist</span>
            </div><span>&nbsp;</span><br />
            <span>with a passion</span>
            <br />
            <span>for&nbsp;</span>
            <div class="rw-words rw-words-2">
                <span>design</span>
                <span>art</span>
                <span>illustration</span>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>