<?php
/**
 * Contains methods for customizing the theme customization screen.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since trydo 1.0
 */
/**
 * rbt_custom_customize_register
 */
if (!function_exists('rbt_custom_customize_register')) {
    function rbt_custom_customize_register()
    {
        /**
         * Custom Separator
         */
        class Trydo_Separator_Custom_control extends WP_Customize_Control
        {
            public $type = 'separator';

            public function render_content()
            {
                ?>
                <p>
                <hr></p>
                <?php
            }
        }
    }

    add_action('customize_register', 'rbt_custom_customize_register');
}

/**
 * Start rbt_Customize
 */
class rbt_Customize
{
    /**
     * This hooks into 'customize_register' (available as of WP 3.4) and allows
     * you to add new sections and controls to the Theme Customize screen.
     *
     * Note: To enable instant preview, we have to actually write a bit of custom
     * javascript. See rbt_live_preview() for more.
     *
     * @see add_action('customize_register',$func)
     * @param \WP_Customize_Manager $wp_customize
     * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
     * @since trydo 1.0
     */
    public static function register($wp_customize)
    {

        //1. Define a new section (if desired) to the Theme Customizer
        $wp_customize->add_panel('rbt_colors_options',
            array(
                'title' => esc_html__('Trydo Colors Options', 'trydo'), //Visible title of section
                'priority' => 35, //Determines what order this appears in
                'capability' => 'edit_theme_options', //Capability needed to tweak
                'description' => esc_html__('Allows you to customize some example settings for trydo.', 'trydo'), //Descriptive tooltip
            )
        );

        $wp_customize->add_section('rbt_colors_main_options',
            array(
                'title' => esc_html__('Global Colors', 'trydo'), //Visible title of section
                'priority' => 10, //Determines what order this appears in
                'capability' => 'edit_theme_options', //Capability needed to tweak
                'panel' => 'rbt_colors_options',
            )
        );

        /*************************
         * Primary
         ************************/
        $wp_customize->add_setting('color_primary',
            array(
                'default' => '#f9004d',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_primary',
            array(
                'label' => esc_html__('Primary Color', 'trydo'),
                'settings' => 'color_primary',
                'priority' => 10,
                'section' => 'rbt_colors_main_options',
            )
        ));

        /*************************
         * Primary light
         ************************/
        $wp_customize->add_setting('color_primary_light',
            array(
                'default' => '#ffedf2',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_primary_light',
            array(
                'label' => esc_html__('Primary Light Color', 'trydo'),
                'settings' => 'color_primary_light',
                'priority' => 10,
                'section' => 'rbt_colors_main_options',
            )
        ));

        /**
         * Separator
         */
        $wp_customize->add_setting('rbt_separator_primary_light', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Trydo_Separator_Custom_control($wp_customize, 'rbt_separator_primary_light', array(
            'settings' => 'rbt_separator_primary_light',
            'section' => 'rbt_colors_main_options',
        )));

        /*************************
         * Primary From
         ************************/
        $wp_customize->add_setting('color_primary_gradient_from',
            array(
                'default' => '#f81f01',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_primary_gradient_from',
            array(
                'label' => esc_html__('Primary Gradient Color From', 'trydo'),
                'settings' => 'color_primary_gradient_from',
                'priority' => 10,
                'section' => 'rbt_colors_main_options',
            )
        ));

        /*************************
         * Primary To
         ************************/
        $wp_customize->add_setting('color_primary_gradient_to',
            array(
                'default' => '#ee076e',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_primary_gradient_to',
            array(
                'label' => esc_html__('Primary Gradient Color To', 'trydo'),
                'settings' => 'color_primary_gradient_to',
                'priority' => 10,
                'section' => 'rbt_colors_main_options',
            )
        ));





        /*************************
         * Header Color
         ************************/

        $wp_customize->add_section('rbt_colors_header_options',
            array(
                'title' => esc_html__('Header', 'trydo'), //Visible title of section
                'priority' => 10, //Determines what order this appears in
                'capability' => 'edit_theme_options', //Capability needed to tweak
                'panel' => 'rbt_colors_options',
            )
        );
        // Link Color
        $wp_customize->add_setting('color_header_link_color',
            array(
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_header_link_color',
            array(
                'label' => esc_html__('Navigation Link Color', 'trydo'),
                'settings' => 'color_header_link_color',
                'priority' => 10,
                'section' => 'rbt_colors_header_options',
            )
        ));

        // Link Color
        $wp_customize->add_setting('color_header_link_color_after_sticky',
            array(
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_header_link_color_after_sticky',
            array(
                'label' => esc_html__('Navigation Link Color After Sticky and Dropdown', 'trydo'),
                'settings' => 'color_header_link_color_after_sticky',
                'priority' => 10,
                'section' => 'rbt_colors_header_options',
            )
        ));
        // Sticky Header Background Color
        $wp_customize->add_setting('color_header_sticky_bg_color',
            array(
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_header_sticky_bg_color',
            array(
                'label' => esc_html__('Navigation Background Color After Sticky', 'trydo'),
                'settings' => 'color_header_sticky_bg_color',
                'priority' => 10,
                'section' => 'rbt_colors_header_options',
            )
        ));
        // Dropdown Background Color
        $wp_customize->add_setting('color_header_dropdown_bg_color',
            array(
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_header_dropdown_bg_color',
            array(
                'label' => esc_html__('Dropdown Background Color', 'trydo'),
                'settings' => 'color_header_dropdown_bg_color',
                'priority' => 10,
                'section' => 'rbt_colors_header_options',
            )
        ));


        /*************************
         * Footer Color
         ************************/
        $wp_customize->add_section('rbt_colors_footer_options',
            array(
                'title' => esc_html__('Footer', 'trydo'), //Visible title of section
                'priority' => 35, //Determines what order this appears in
                'capability' => 'edit_theme_options', //Capability needed to tweak
                'panel' => 'rbt_colors_options',
            )
        );

        // Footer Heading Color
        $wp_customize->add_setting('color_footer_heading_color',
            array(
                // 'default' => '#ffffff',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_footer_heading_color',
            array(
                'label' => esc_html__('Title Color', 'trydo'),
                'settings' => 'color_footer_heading_color',
                'priority' => 10,
                'section' => 'rbt_colors_footer_options',
            )
        ));

        // Text Color
        $wp_customize->add_setting('color_footer_body_color',
            array(
                // 'default' => '#6b7074',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_footer_body_color',
            array(
                'label' => esc_html__('Text Color', 'trydo'),
                'settings' => 'color_footer_body_color',
                'priority' => 10,
                'section' => 'rbt_colors_footer_options',
            )
        ));

        // Link Color
        $wp_customize->add_setting('color_footer_link_color',
            array(
                // 'default' => '#6b7074',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_footer_link_color',
            array(
                'label' => esc_html__('Link Color', 'trydo'),
                'settings' => 'color_footer_link_color',
                'priority' => 10,
                'section' => 'rbt_colors_footer_options',
            )
        ));

        // Footer Heading Color
        $wp_customize->add_setting('color_footer_copyright_color',
            array(
                // 'default' => '#ffffff',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rbt_color_footer_copyright_color',
            array(
                'label' => esc_html__('Copyright Color', 'trydo'),
                'settings' => 'color_footer_copyright_color',
                'priority' => 10,
                'section' => 'rbt_colors_footer_options',
            )
        ));


    }

    /**
     * This will output the custom WordPress settings to the live theme's WP head.
     *
     * Used by hook: 'wp_head'
     *
     * @see add_action('wp_head',$func)
     * @since trydo 1.0
     */
    public static function rbt_custom_color_output()
    {
        $color_primary = get_theme_mod('color_primary', '#f9004d');
        $primary_rgba_01 = rbt_hex2rgba($color_primary, '0.1');
        ?>
        <!--Customizer CSS-->
        <style type="text/css">

            /************************************************************************************
             * General
             ************************************************************************************/
            /* Primary [#702FFF] */
            <?php self::rbt_generate_css(':root', '--color-primary', 'color_primary'); ?>
            <?php self::rbt_generate_css(':root', '--color-primary-light', 'color_primary_light'); ?>
            <?php self::rbt_generate_css(':root', '--color-primary-from', 'color_primary_gradient_from'); ?>
            <?php self::rbt_generate_css(':root', '--color-primary-to', 'color_primary_gradient_to'); ?>

            <?php self::rbt_generate_box_shadow('button.rn-button-style--2:hover, a.rn-button-style--2:hover, a.wp-block-button__link:hover, input[type=submit]:hover', '0 10px 15px 0 '. $primary_rgba_01 .''); ?>

            /* Gradient Angle */
            <?php self::rbt_generate_gradient_angle('.single-service.service__style--4::before', '90deg', 'color_primary_gradient_from', 'color_primary_gradient_to'); ?>
            <?php self::rbt_generate_gradient_angle('.theme-gradient', '145deg', 'color_primary_gradient_from', 'color_primary_gradient_to'); ?>
            <?php self::rbt_generate_gradient_angle('.single-service.service__style--2 a::before', 'to right', 'color_primary_gradient_from', 'color_primary_gradient_to'); ?>

            /* Gradient Percentage */
            <?php self::rbt_generate_gradient_percentage('.portfolio .thumbnail-inner::before', 'color_primary_gradient_from', '#f6004c', '10%', '', '#000000', '100%'); ?>
            <?php self::rbt_generate_gradient_percentage('.blog.blog-style--1 .thumbnail a::after', 'color_primary_gradient_from', '#fc004d', '10%', '', '#000000', '100%'); ?>

            /* Gradient Angle Percentage */
            <?php self::rbt_generate_gradient_angle_percentage('.footer-default .footer-left', '145deg', 'color_primary_gradient_from', '#f81f01', '10%', 'color_primary_gradient_to', '#ee076e', '100%'); ?>
            <?php self::rbt_generate_gradient_angle_percentage('.call-to-action, .blog-single-page-title .title, .breadcrumb-inner .title, .rn-pricing::before, .single-service.service__style--4::before, .single-service.service__style--5::before', '145deg', 'color_primary_gradient_from', '#f81f01', '0%', 'color_primary_gradient_to', '#ee076e', '100%'); ?>
            <?php self::rbt_generate_gradient_angle_percentage('.team .thumbnail::after', 'to bottom', 'color_primary_gradient_from', '#fc004d', '0', '', '#000000', '100%'); ?>
            <?php self::rbt_generate_gradient_angle_percentage('.rn-pagination .post-page-numbers.current, .page-links .post-page-numbers.current, .rn-pagination .post-page-numbers::before, .page-links .post-page-numbers::before, .rn-pagination ul.page-numbers li .current, .rn-pagination ul.page-list li .current, .rn-pagination ul.page-numbers li a::before, .rn-pagination ul.page-list li a::before', '-259deg', 'color_primary_gradient_from', '#f81f01', '0', 'color_primary_gradient_to', '#ee076e', '100%'); ?>



            /************************************************************************************
            * Header
            ************************************************************************************/
            /* Link Color */
            <?php self::rbt_generate_css('.header-area.header--transparent .mainmenunav ul.mainmenu > li > a, .header-area.header-style-two.header--transparent .mainmenunav ul.mainmenu > li > a, ul.social-share.social-style--2.color-black li a, .header-area.header-style-two.header--transparent .header-wrapper a.rn-btn, .header-area.header--transparent .header-wrapper a.rn-btn, .humberger-menu span svg, .active-dark .header-area.header-style-two.header--transparent .mainmenunav ul.mainmenu > li > a, .active-dark ul.social-share.social-style--2.color-black li a, .active-dark .header-area.header-style-two.header--transparent .header-wrapper a.rn-btn, .color-black .mainmenunav ul.mainmenu > li > a, .header-area.color-black a.rn-btn', 'color  ', 'color_header_link_color'); ?>
            <?php self::rbt_generate_css('.header-area.header-style-two.header--transparent .header-wrapper a.rn-btn, .header-area.header--transparent .header-wrapper a.rn-btn, .active-dark .header-area.header-style-two.header--transparent .header-wrapper a.rn-btn, .header-area.color-black a.rn-btn', 'border-color  ', 'color_header_link_color'); ?>

            /* Link Color after sticky and dropdown */
            <?php self::rbt_generate_css('.header-area.sticky-bg-black.header--sticky.sticky .header-wrapper .mainmenunav ul.mainmenu > li > a, .header-area.sticky-bg-black.header--sticky.sticky .header-wrapper a.rn-btn, .mainmenunav ul.mainmenu > li ul.submenu li > a, .header-area.header--sticky.sticky ul.social-share.social-style--2.color-black li a, .header-area.header-style-two.header--sticky.sticky .mainmenunav ul.mainmenu > li > a,  .header-area.header-style-two.sticky .header-wrapper a.rn-btn, .active-dark .header-area.header--sticky.sticky .header-wrapper a.rn-btn', 'color  ', 'color_header_link_color_after_sticky'); ?>
            <?php self::rbt_generate_css('.header-area.sticky-bg-black.header--sticky.sticky .header-wrapper a.rn-btn, .header-area.header-style-two.sticky .header-wrapper a.rn-btn, .active-dark .header-area.header--sticky.sticky .header-wrapper a.rn-btn', 'border-color  ', 'color_header_link_color_after_sticky'); ?>
            <?php self::rbt_generate_css('.header-area .header-wrapper .mainmenunav ul.mainmenu li.has-droupdown > a::after', 'border-top-color  ', 'color_header_link_color_after_sticky'); ?>
            <?php self::rbt_generate_css('.header-area.header--sticky.sticky ul.social-share.social-style--2.color-black li a:hover, .header-area.header--sticky.sticky ul.social-share.social-style--2.color-black li a:hover, .header-area.header-style-two.header--sticky.sticky .mainmenunav ul.mainmenu > li:hover > a, .active-dark ul.social-share.social-style--2.color-black li a:hover', 'color  ', 'color_primary'); ?>

            <?php self::rbt_generate_css('.header-area.sticky-bg-black.header--sticky.sticky, .active-dark .header-area.header--sticky.sticky, .header-area.header--sticky.sticky', 'background  ', 'color_header_sticky_bg_color'); ?>
            <?php self::rbt_generate_css('.mainmenunav ul.mainmenu > li ul.submenu, .trydo-active-onepage-navigation .header-area .mainmenu > li .submenu', 'background  ', 'color_header_dropdown_bg_color'); ?>


            /************************************************************************************
            * Footer
            ************************************************************************************/
            /* Heading Color */
            <?php self::rbt_generate_css('.footer-default .footer-right .footer-widget .title', 'color  ', 'color_footer_heading_color'); ?>

            /* Text Color */
            <?php self::rbt_generate_css('.footer-widget, .footer-widget p', 'color  ', 'color_footer_body_color'); ?>

            /* Link Color */
            <?php self::rbt_generate_css('.footer-widget ul li a, .footer-default .footer-right .footer-widget ul.ft-link li a, ul.social-share li a', 'color  ', 'color_footer_link_color'); ?>
            <?php self::rbt_generate_css('ul.social-share li a', 'border-color  ', 'color_footer_link_color'); ?>

            /* Copyright Color */
            <?php self::rbt_generate_css('.copyright-text p, .footer-style-2 p', 'color  ', 'color_footer_copyright_color'); ?>


        </style>
        <!--/Customizer CSS-->
        <?php
    }

    /**
     * This will generate a line of CSS for use in header output. If the setting
     * ($mod_name) has no defined value, the CSS will not be output.
     *
     * @uses get_theme_mod()
     * @param string $selector CSS selector
     * @param string $style The name of the CSS *property* to modify
     * @param string $mod_name The name of the 'theme_mod' option to fetch
     * @param string $prefix Optional. Anything that needs to be output before the CSS property
     * @param string $postfix Optional. Anything that needs to be output after the CSS property
     * @param bool $echo Optional. Whether to print directly to the page (default: true).
     * @return string Returns a single line of CSS with selectors and a property.
     * @since trydo 1.0
     */
    public static function rbt_generate_css($selector, $style, $mod_name, $prefix = '', $postfix = '', $echo = true)
    {
        $return = '';
        $mod = get_theme_mod($mod_name);
        if (!empty($mod)) {
            $return = sprintf('%s { %s:%s; }',
                $selector,
                $style,
                $prefix . $mod . $postfix
            );
            if ($echo) {
                echo awescapeing($return);
            }
        }
        return $return;
    }

    /***
     * @param $selector
     * @param $angle
     * @param $from_color
     * @param $to_color
     * @param bool $echo
     * @return string
     */
    public static function rbt_generate_gradient_angle($selector, $angle, $from_color, $to_color, $echo = true)
    {
        $return = '';
        $from_color = get_theme_mod($from_color, '#f81f01');
        $to_color = get_theme_mod($to_color, '#ee076e');
        if ($from_color || $to_color) {
            $return = sprintf('%s { background-image: linear-gradient(%s, %s, %s); }',
                $selector,
                $angle,
                $from_color,
                $to_color
            );
            if ($echo) {
                echo awescapeing($return);
            }
        }
        return $return;
    }

    /**
     * @param $selector
     * @param $from_color
     * @param $from_color_default
     * @param $from
     * @param $to_color
     * @param $to_color_default
     * @param $to
     * @param bool $echo
     * @return string
     */
    public static function rbt_generate_gradient_percentage($selector, $from_color, $from_color_default, $from,  $to_color, $to_color_default, $to, $echo = true)
    {
        $return = '';
        $from_color = get_theme_mod($from_color, $from_color_default);
        $to_color = get_theme_mod($to_color, $to_color_default);
        if ($from_color || $to_color) {
            $return = sprintf('%s { background-image: linear-gradient(%s %s, %s %s); }',
                $selector,
                $from_color,
                $from,
                $to_color,
                $to
            );
            if ($echo) {
                echo awescapeing($return);
            }
        }
        return $return;
    }

    /**
     * @param $selector
     * @param $angle
     * @param $from_color
     * @param $from_color_default
     * @param $from
     * @param $to_color
     * @param $to_color_default
     * @param $to
     * @param bool $echo
     * @return string
     */
    public static function rbt_generate_gradient_angle_percentage($selector, $angle, $from_color, $from_color_default, $from,  $to_color, $to_color_default, $to, $echo = true)
    {
        $return = '';
        $from_color = get_theme_mod($from_color, $from_color_default);
        $to_color = get_theme_mod($to_color, $to_color_default);
        if ($from_color || $to_color) {
            $return = sprintf('%s { background-image: linear-gradient(%s, %s %s, %s %s); }',
                $selector,
                $angle,
                $from_color,
                $from,
                $to_color,
                $to
            );
            if ($echo) {
                echo awescapeing($return);
            }
        }
        return $return;
    }

    /**
     * @param $selector
     * @param $attributes
     * @param bool $echo
     * @return string
     */
    public static function rbt_generate_box_shadow($selector, $attributes, $echo = true)
    {
        $return = '';
        if ($attributes) {
            $return = sprintf('%s { box-shadow: %s; }',
                $selector,
                $attributes
            );
            if ($echo) {
                echo awescapeing($return);
            }
        }
        return $return;
    }

}

// Setup the Theme Customizer settings and controls...
add_action('customize_register', array('rbt_Customize', 'register'));

// Output custom CSS to live site
add_action('wp_head', array('rbt_Customize', 'rbt_custom_color_output'));


