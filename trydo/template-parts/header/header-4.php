<?php
/**
 * Template part for displaying header layout four
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
<header class="header-area formobile-menu  black-logo-version small-logo color-black <?php echo esc_attr($header_transparent); ?> <?php echo esc_attr($header_sticky); ?>">
    <div class="header-wrapper" id="header-wrapper">
        <div class="header-left">
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
        </div>
        <div class="header-right">
            <div class="full-overlay"></div>
            <?php if (has_nav_menu('primary') || $nav_menu) {
                // Start Mainmanu Nav
                wp_nav_menu($select_menu);
            } ?>
            <?php if($trydo_options['trydo_header_btn']){?>
                <div class="header-btn">
                    <a class="rn-btn" href="<?php echo esc_url($trydo_options['trydo_header_buttonUrl']); ?>">
                        <span><?php echo esc_html( $trydo_options['trydo_header_buttontext'] ); ?></span>
                    </a>
                </div>
            <?php } ?>
            <!-- Start Humberger Menu  -->
            <div class="humberger-menu d-block d-lg-none pl--20">
                        <span class="menutrigger text-white">
                    <i data-feather="menu"></i>
                </span>
            </div>
            <!-- End Humberger Menu  -->
            <!-- Start Close Menu  -->
            <div class="close-menu d-block d-lg-none">
                        <span class="closeTrigger">
                    <i data-feather="x"></i>
                </span>
            </div>
            <!-- End Close Menu  -->
        </div>
    </div>
</header>
