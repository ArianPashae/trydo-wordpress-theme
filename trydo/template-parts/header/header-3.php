<?php
/**
 * Template part for displaying header layout three
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trydo
 */

// Get Value
$trydo_options = Helper::trydo_get_options();
$header_layout 			= Helper::trydo_header_layout();
$header_sticky 			= $header_layout['header_sticky'];
$header_transparent 	= $header_layout['header_transparent'];

// Condition
$header_sticky = ("no" !== $header_sticky && "0" !== $header_sticky) ? " header--sticky " : "";
$header_transparent = ("no" !== $header_transparent && "0" !== $header_transparent) ? " header--transparent " : "header-not-transparent";

// Menu
$nav_menu_args = Helper::nav_menu_args();
$onepage_menu_args = Helper::onepage_menu_args();
$nav_menu = rbt_get_acf_data( "trydo_select_nav_menu");
$menu_type = rbt_get_acf_data( "trydo_menu_type");

$select_menu = $nav_menu_args;
if ($menu_type == "onepage"){
    $select_menu = $onepage_menu_args;
} else {
    $select_menu = $nav_menu_args;
}

?>
<header class="header-area header-style-two color-black <?php echo esc_attr($header_transparent); ?> <?php echo esc_attr($header_sticky); ?>">
    <div class="header-wrapper">
        <div class="header-left d-flex align-items-center">
            <div class="logo">
                <?php if (isset($trydo_options['trydo_logo_type'])): ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>"
                       title="<?php echo esc_attr(get_bloginfo('name')); ?>" rel="home">

                        <?php if ('image' == $trydo_options['trydo_logo_type']): ?>

                            <img src="<?php echo esc_url($trydo_options['trydo_symbol_logo']['url']); ?>"
                                 alt="<?php echo esc_attr(get_bloginfo('name')); ?>">

                        <?php else: ?>

                            <?php if ('text' == $trydo_options['trydo_logo_type']): ?>

                                <?php echo esc_html($trydo_options['trydo_logo_text']); ?>

                            <?php endif ?>

                        <?php endif ?>

                    </a>
                <?php else: ?>

                    <h3>
                        <a href="<?php echo esc_url(home_url('/')); ?>"
                           title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                            <?php if (isset($trydo_options['trydo_logo_text']) ? $trydo_options['trydo_logo_text'] : '') {
                                echo esc_html($trydo_options['trydo_logo_text']);
                            } else {
                                bloginfo('name');
                            }
                            ?>
                        </a>
                    </h3>

                    <?php $description = get_bloginfo('description', 'display');

                    if ($description || is_customize_preview()) { ?>

                        <p class="site-description"><?php echo esc_html($description); ?> </p>

                    <?php } ?>

                <?php endif ?>
            </div>
            <div class="ml--50">
                <?php if (has_nav_menu('primary') || $nav_menu) {
                    // Start Mainmanu Nav
                    wp_nav_menu($select_menu);
                } ?>
            </div>


        </div>
        <div class="header-right">
            <div class="full-overlay"></div>
            <?php if(!empty($trydo_options['trydo_social_icons'])){ ?>
                <!-- Start Social Icons  -->
                <div class="social-share-inner">
                    <ul class="social-share social-style--2 color-black d-flex justify-content-start liststyle">
                        <?php
                        foreach ($trydo_options['trydo_social_icons'] as $key => $value) {
                            if ($value != '') {
                                echo '<li><a class="' . esc_attr($key) . '" href="' . esc_url($value) . '" target="_blank"><i class="fab fa-' . esc_attr($key) . '"></i></a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div><!-- End Social Icons  -->
            <?php } ?>

            <?php if($trydo_options['trydo_header_btn']){?>
                <div class="header-btn ml_md--20 ml_sm--0">
                    <a class="rn-btn" href="<?php echo esc_url($trydo_options['trydo_header_buttonUrl']); ?>">
                        <span><?php echo esc_html( $trydo_options['trydo_header_buttontext'] ); ?></span>
                    </a>
                </div>
            <?php } ?>
            <!-- Start Humberger Menu  -->
            <div class="humberger-menu d-block d-lg-none pl--20 pl_sm--10">
                        <span class="menutrigger text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                        </span>
            </div>
            <!-- End Humberger Menu  -->
            <!-- Start Close Menu  -->
            <div class="close-menu d-block d-lg-none">
                        <span class="closeTrigger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </span>
            </div>
            <!-- End Close Menu  -->
        </div>
    </div>
</header>