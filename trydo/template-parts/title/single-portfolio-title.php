<?php
/**
 * Template part for displaying header portfolio title
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trydo
 */

// Get Value
$trydo_options = Helper::trydo_get_options();
$bg_image_class = has_post_thumbnail() ? '' : 'bg_image--4';
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
?>
<!-- Start Breadcrump Area  -->
<div class="rn-page-title-area pt--120 pb--190 bg_image <?php echo esc_attr($bg_image_class); ?>" data-black-overlay="5" style="background-image: url(<?php echo esc_url($featured_img_url); ?>)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="rn-page-title text-center pt--100">
                    <div class="breadcrumb-inner">
                        <h1 class="title theme-gradient"><?php the_title(); ?></h1>
                        <?php
                        if('excerpt' == $trydo_options['select_title_bellow_content']){ ?>
                            <?php the_excerpt(); ?>
                        <?php } elseif('breadcrumbs' == $trydo_options['select_title_bellow_content']) {
                            trydo_breadcrumbs();
                        } elseif('both' == $trydo_options['select_title_bellow_content']) {
                            ?><?php the_excerpt(); ?><?php
                            trydo_breadcrumbs();
                        } else {
                            // Nothing
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrump Area  -->
