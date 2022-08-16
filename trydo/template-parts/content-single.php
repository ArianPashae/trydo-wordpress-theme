<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trydo
 */
$images = rbt_get_acf_data('trydo_gallery_image');
$audio_url = rbt_get_acf_data( "trydo_upload_audio" );
$custom_link = rbt_get_acf_data('trydo_custom_link');
$link = !empty($custom_link) ? $custom_link : get_the_permalink();
$trydo_quote_author_name = rbt_get_acf_data('trydo_quote_author_name');
$trydo_quote_author = !empty($trydo_quote_author_name) ? $trydo_quote_author_name : get_the_author();
$trydo_quote_author_name_designation = rbt_get_acf_data('trydo_quote_author_name_designation');
$video_url = rbt_get_acf_data( "trydo_video_link" );

$page_breadcrumb = Helper::trydo_page_breadcrumb();
$page_breadcrumb_enable = $page_breadcrumb['breadcrumbs'];

$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
if(has_post_thumbnail()){
 $style = 'style="background-image: url('. $featured_img_url .')"';
}else{
    $style = '';
}
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('wrapper single-content'); ?>>
<!-- Start Breadcrump Area  -->
<div class="rn-page-title-area pt--120 pb--60 bg_image rn-bg-color bg_image bg_image--1"  data-black-overlay="7" <?php echo wp_kses_post($style); ?>>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-single-page-title text-center pt--200">
                    <h2 class="title theme-gradient"><?php the_title(); ?></h2>
                    <?php Helper::singlepostmeta(); ?> 
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ("no" !== $page_breadcrumb_enable && "0" !== $page_breadcrumb_enable) { ?>
    <div class="post-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <?php
                        trydo_breadcrumbs();
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- End Breadcrump Area  -->
<!-- Start Blog Details Area  -->
<div class="rn-blog-details ptb--110 bg_color--1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-wrapper">
                    <div class="inner">

                        <div class="single-post-content-wrap">

                        <?php
                            if ( has_post_format( 'gallery' )) {
                                if( $images ): ?>
                                    <div class="thumbnail mb--60 trydo-slick-active trydo-carousel-gallery slick-dot-bottom slick-arrow-left-to-right">
                                        <?php foreach( $images as $image ): ?>
                                            <div class="thumb-inner">
                                                <img class="w-100"  src="<?php echo esc_url($image['sizes']['trydo-blog-thumb-full']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif;
                            } else if (has_post_format('audio')) {
                                if ($audio_url){ ?>
                                    <div class="mb--60 audio-player-wrapper">
                                        <audio controls>
                                            <source src="<?php echo esc_url($audio_url['url']); ?>" type="audio/ogg">
                                            <source src="<?php echo esc_url($audio_url['url']); ?>" type="audio/mpeg">
                                            <?php esc_html_e('Your browser does not support the audio tag.', 'trydo'); ?>
                                        </audio>
                                    </div>
                                <?php }
                            } else if (has_post_format('link')) {
                                if(!empty($custom_link)){ ?>
                                    <div class="mb--60">
                                        <div id="post-<?php the_ID(); ?>" <?php post_class('mb--20 trydo-blog-list sticky-blog mt_md--30 mt_sm--30 mt_lg--50'); ?>>
                                            <div class="blog-top">
                                                <div class="sticky">
                                                    <i class="fas fa-link"></i>
                                                </div>
                                                <?php if (!empty($custom_link)){ ?>
                                                    <h3 class="title"><a href="<?php echo esc_url($custom_link); ?>"><?php the_title(); ?></a></h3>
                                                <?php } else { ?>
                                                    <h3 class="title"><?php the_title(); ?></h3>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            } else if (has_post_format('quote')) {
                                // Null
                            } else if (has_post_format('video')) {
                                $convar_emb_link = '';
                                if (function_exists('trydo_getEmbedUrl')){
                                    $convar_emb_link = trydo_getEmbedUrl($video_url);
                                }
                                if(!empty($convar_emb_link)){ ?>
                                    <div class="thumbnail mb--60 position-relative">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe src="<?php echo esc_url($convar_emb_link); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                                        </div>
                                    </div>
                                <?php }
                            } else {
                                // NULL
                            }
                        ?>
                        <?php the_content(); ?>

                        <?php wp_link_pages( array(
                            'before'      => '<div class="rn-pagination"><span class="page-link-holder">' . esc_html__( 'Pages:', 'trydo' ) . '</span>',
                            'after'       => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                        ) );
                        ?>

                        </div>
                        <?php
                            /**
                             *  Output comments wrapper if it's a post, or if comments are open,
                             * or if there's a comment number – and check for password.
                             * */
                            if ((is_single() || is_page()) && (comments_open() || get_comments_number()) && !post_password_required()) {
                            ?>

                                <div class="comments-wrapper section-inner">

                                    <?php comments_template(); ?>

                                </div><!-- .comments-wrapper -->

                            <?php
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Details Area  -->
</div>

