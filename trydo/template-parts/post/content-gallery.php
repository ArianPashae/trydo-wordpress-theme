<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trydo
 */
$rbt_options = Helper::trydo_get_options();
$images = rbt_get_acf_data('trydo_gallery_image');
$trydo_blog_thumb = ( is_active_sidebar( 'sidebar-1' ) && $rbt_options['trydo_blog_sidebar'] != 'no') ? 'trydo-blog-thumb':'trydo-blog-thumb-full';
?>
<!-- Start Single Blog  -->
<div id="post-<?php the_ID(); ?>" <?php post_class('trydo-blog-list gallery-post mt--50 mt_md--30 mt_sm--30 mt_lg--50'); ?>>
    <?php
    if( $images ): ?>
        <div class="thumbnail trydo-slick-active trydo-carousel-gallery slick-dot-bottom slick-arrow-left-to-right">
            <?php foreach( $images as $image ): ?>
                <div class="thumb-inner">
                    <a href="<?php the_permalink(); ?>">
                        <img class="w-100"  src="<?php echo esc_url($image['sizes'][$trydo_blog_thumb]); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="blog-content-wrapper">
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