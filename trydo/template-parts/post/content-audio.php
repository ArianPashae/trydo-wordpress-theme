<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trydo
 */
$rbt_options = Helper::trydo_get_options();
$audio_url = rbt_get_acf_data( "trydo_upload_audio" );
$trydo_blog_thumb = ( is_active_sidebar( 'sidebar-1' ) && $rbt_options['trydo_blog_sidebar'] != 'no') ? 'trydo-blog-thumb':'trydo-blog-thumb-full';

?>
<!-- Start Single Blog  -->
<div id="post-<?php the_ID(); ?>" <?php post_class('trydo-blog-list mt--50 mt_md--30 mt_sm--30 mt_lg--50'); ?>>
    <?php if(has_post_thumbnail()){ ?>
        <div class="thumbnail position-relative">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail($trydo_blog_thumb, ['class' => 'w-100']) ?>
            </a>
        </div>
    <?php } ?>
    <div class="blog-content-wrapper">

        <?php if( $audio_url ): ?>
            <div class="mb--20 audio-player-wrapper">
                <audio controls>
                    <source src="<?php echo esc_url($audio_url['url']); ?>" type="audio/ogg">
                    <source src="<?php echo esc_url($audio_url['url']); ?>" type="audio/mpeg">
                    <?php esc_html_e('Your browser does not support the audio tag.', 'trydo'); ?>
                </audio>
            </div>
        <?php endif; ?>

        <div class="blog-top">
            <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php Helper::postmeta(); ?>
        </div>
        <div class="content">
            <?php the_excerpt(); ?>
            <?php Helper::trydo_read_more(); ?>
        </div>
    </div>
</div>
<!-- End Single Blog  -->