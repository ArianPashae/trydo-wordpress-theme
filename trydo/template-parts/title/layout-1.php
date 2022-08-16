<?php
/**
 * Template part for displaying header page title
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trydo
 */

// Get Value
$trydo_options = Helper::trydo_get_options();
$banner_layout = Helper::trydo_banner_layout();
$banner_area = $banner_layout['banner_area'];
$banner_style = $banner_layout['banner_style'];
$banner_title = rbt_get_acf_data("trydo_custom_title");
$banner_sub_title = rbt_get_acf_data("trydo_custom_sub_title");
$trydo_breadcrumbs_enable = rbt_get_acf_data("trydo_breadcrumbs_enable");

$page_breadcrumb = Helper::trydo_page_breadcrumb();
$page_breadcrumb_enable = $page_breadcrumb['breadcrumbs'];


$default_banner_image = get_template_directory_uri() . "/assets/images/bg/bg-image-1.jpg";
$thumbnail_url  = get_the_post_thumbnail_url( get_the_ID(), 'full' );
$themeoption_banner_bg_image = (!empty($trydo_options['trydo_select_banner_image']['url'])) ? $trydo_options['trydo_select_banner_image']['url'] : $default_banner_image;
$banner_bg_image = ($thumbnail_url) ? $thumbnail_url : $themeoption_banner_bg_image;
?>
<!-- Start Breadcrump Area  -->
<div class="breadcrumb-area rn-bg-color ptb--120 bg_image bg_image--1" data-black-overlay="6" style="background-image: url('<?php echo esc_url($banner_bg_image); ?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner pt--100 pt_sm--40 pt_md--50">
                    <?php if($banner_title){ ?>
                        <h1 class="title"><?php echo esc_html( $banner_title ); ?></h1>
                    <?php  } else { ?>
                        <?php the_title( '<h1 class="title">', '</h1>' ); ?>
                    <?php  }  ?>
                    <?php if ("no" !== $page_breadcrumb_enable && "0" !== $page_breadcrumb_enable) {
                        trydo_breadcrumbs();
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrump Area  -->