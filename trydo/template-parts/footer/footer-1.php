<?php
/**
 * Template part for displaying footer layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trydo
 */

// Get Value
$trydo_options = Helper::trydo_get_options();
$footer_bottom_menu_args = Helper::footer_bottom_menu_args();
$footer_cta_image = (!empty($trydo_options['cta_shape_image']['url'])) ? $trydo_options['cta_shape_image']['url'] : get_template_directory_uri() . "/assets/images/logo/big-logo.png";
?>
<footer class="footer-area footer-default">
    <div class="footer-wrapper">
        <div class="row align-items-end row--0">
            <div class="col-lg-6">
                <div class="footer-left">
                    <div class="inner">
                        <?php if(!empty($trydo_options['cta_pre_title'])){ ?>
                            <span><?php echo esc_html($trydo_options['cta_pre_title']) ?></span>
                        <?php } ?>
                        <?php if(!empty($trydo_options['cta_title'])){ ?>
                            <h2><?php echo esc_html($trydo_options['cta_title']) ?></h2>
                        <?php } ?>
                        <?php if(!empty($trydo_options['cta_btn_title']) && !empty($trydo_options['cta_btn_url'])){ ?>
                            <a class="rn-button-style--2" href="<?php echo esc_url($trydo_options['cta_btn_url']) ?>">
                                <span><?php echo esc_html($trydo_options['cta_btn_title']) ?></span>
                            </a>
                        <?php } ?>
                        <?php if($trydo_options['cta_shape_image_show'] == 'yes'){
                            $alt_text = ( isset($trydo_options['cta_shape_image']['id']) && !empty(get_post_meta( $trydo_options['cta_shape_image']['id'], '_wp_attachment_image_alt', true))) ? get_post_meta( $trydo_options['cta_shape_image']['id'], '_wp_attachment_image_alt', true) : "footer shape image";
                            ?>
                            <img src="<?php echo esc_url($footer_cta_image); ?>" alt="<?php echo esc_html($alt_text); ?>">
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer-right" data-black-overlay="6">
                    <div class="row">
                        <?php if (is_active_sidebar('footer-1')) { ?>
                            <!-- Start Single Widget -->
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="footer-widget">
                                    <?php dynamic_sidebar('footer-1'); ?>
                                </div>
                            </div><!-- End Single Widget -->
                        <?php } ?>

                        <?php if (is_active_sidebar('footer-2')) { ?>
                            <!-- Start Single Widget -->
                            <div class="col-lg-6 col-sm-6 col-12 mt_mobile--30">
                                <div class="footer-widget">
                                    <?php dynamic_sidebar('footer-2'); ?>
                                </div>
                            </div><!-- End Single Widget -->
                        <?php } ?>
                        <?php if(!empty($trydo_options['trydo_copyright_contact'])){ ?>
                            <div class="col-lg-12">
                                <div class="copyright-text">
                                    <p><?php echo wp_kses_post($trydo_options['trydo_copyright_contact']); ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
