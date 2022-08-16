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

?>
<!-- Start Breadcrump Area  -->
<div class="breadcrumb-area rn-bg-color ptb--120 bg_image bg_image--1" data-black-overlay="6">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner pt--100 pt_sm--40 pt_md--50">
                    <?php if ( is_archive() ): ?>
                        <h1 class="title"><?php the_archive_title(); ?></h1>
                    <?php elseif( is_search() ): ?>
                        <h1 class="title"><?php esc_html_e( 'Search results for: ', 'trydo' ) ?><?php echo get_search_query(); ?></h1>
                    <?php else: ?>
                        <h1 class="title">
                            <?php  if ( isset( $trydo_options['trydo_blog_text'] ) && !empty( $trydo_options['trydo_blog_text'] ) ){
                                echo esc_html( $trydo_options['trydo_blog_text'] );
                            }
                            else{
                                echo esc_html__('Latest Posts', 'trydo');
                            }  ?>
                        </h1>
                    <?php endif ?>
                    <?php
                    if(! is_home()){
                        trydo_breadcrumbs();
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrump Area  -->