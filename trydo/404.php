<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package trydo
 */

get_header();

$trydo_options = Helper::trydo_get_options();
?>
    <!-- Start 404 Page  -->
    <div class="error-page-inner bg_color--4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner">
                        <?php if(!empty($trydo_options['trydo_404_title'])){ ?> <h1 class="title theme-gradient"><?php echo esc_html( $trydo_options['trydo_404_title'] );?></h1> <?php } ?>
                        <?php if(!empty($trydo_options['trydo_404_subtitle'])){ ?> <h3 class="sub-title"><?php echo esc_html( $trydo_options['trydo_404_subtitle'] );?></h3> <?php } ?>
                        <?php if(!empty($trydo_options['trydo_404_desc'])){ ?> <span><?php echo esc_html( $trydo_options['trydo_404_desc'] );?></span> <?php } ?>

                        <?php if( $trydo_options['trydo_enable_go_back_btn'] == 'yes'){ ?>
                            <div class="error-button">
                                <a class="rn-button-style--2 btn_solid" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo esc_html( $trydo_options['trydo_404_button_text'] );?></a>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End 404 Page  -->
<?php
get_footer();


