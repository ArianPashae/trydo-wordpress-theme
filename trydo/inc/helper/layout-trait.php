<?php

/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package papr
 */
trait LayoutTrait
{
    public static function trydo_left_get_sidebar()
    {
        $layout_abj = Helper::trydo_layout_style_all();
        $layout = $layout_abj['layout'];
        if ($layout == 'left-sidebar') {
            get_sidebar();
        }
        return;
    }

    public static function trydo_right_get_sidebar()
    {
        $layout_abj = Helper::trydo_layout_style_all();
        $layout = $layout_abj['layout'];
        if ($layout == 'right-sidebar') {
            get_sidebar();
        }
        return;
    }

    /**
     * @return array
     * Header Layout
     */
    public static function trydo_header_layout()
    {
        $trydo_options = Helper::trydo_get_options();
        $themepfix = RBT_THEME_PREFIX;
        $condipfix = Helper::layout_settings();

        /**
         * Get Page Options value
         */
        $header_area = rbt_get_acf_data($themepfix .  '_show_header');
        $header_style = rbt_get_acf_data( $themepfix . "_select_header_style");
        $header_sticky = rbt_get_acf_data( $themepfix . "_header_sticky");
        $header_transparent = rbt_get_acf_data( $themepfix . "_header_transparent");

        /**
         * Set Condition
         */
        $header_area = (empty($header_area)) ? $trydo_options['trydo_enable_header'] : $header_area;
        $header_style = (empty($header_style) ||  $header_style == "0") ? $trydo_options['trydo_select_header_template'] : $header_style;
        $header_sticky = (empty($header_sticky)) ? $trydo_options['trydo_header_sticky'] : $header_sticky;
        $header_transparent = (empty($header_transparent)) ? $trydo_options['trydo_header_transparent'] : $header_transparent;
        /**
         * Load Value
         */
        $header_layout = [
            'header_area' => $header_area,
            'header_style' => $header_style,
            'header_sticky' => $header_sticky,
            'header_transparent' => $header_transparent,
        ];
        return $header_layout;

    }
    /**
     * @return array
     * Footer Layout
     */
    public static function trydo_footer_layout()
    {
        $trydo_options = Helper::trydo_get_options();
        /**
         * Get Page Options value
         */
        $footer_area = rbt_get_acf_data('trydo_show_footer');
        $footer_style = rbt_get_acf_data('trydo_select_footer_style');
        /**
         * Set Condition
         */
        $footer_area = (empty($footer_area)) ? $trydo_options['trydo_footer_enable'] : $footer_area;
        $footer_style = (empty($footer_style) ||  $footer_style == "0") ? $trydo_options['trydo_select_footer_template'] : $footer_style;

        /**
         * Load Value
         */
        $footer_layout = [
            'footer_area' => $footer_area,
            'footer_style' => $footer_style,
        ];
        return $footer_layout;

    }

    // Sidebar
    public static function trydo_sidebar_options()
    {
        $themepfix = RBT_THEME_PREFIX;
        $trydo_options = self::trydo_get_options();
        $condipfix = self::layout_settings();
        $sidebar = get_post_meta(get_the_ID(), $themepfix . "_sidebar", true);
        $sidebar = (empty($sidebar) || $sidebar == 'default') ? $trydo_options[$condipfix . '_sidebar'] : $sidebar;
        return $sidebar;
    }

    // Menu Option
    public static function trydo_logos()
    {
        $trydo_options = self::trydo_get_options();
        // Logo
        $trydo_dark_logo = empty($trydo_options['logo']['url']) ? self::get_img('logo-black.svg') : $trydo_options['logo']['url'];
        $trydo_light_logo = empty($trydo_options['logo_light']['url']) ? self::get_img('logo-white.svg') : $trydo_options['logo_light']['url'];
        $trydo_logo_symbol = empty($trydo_options['logo_symbol']['url']) ? self::get_img('logo-symbol.svg') : $trydo_options['logo_symbol']['url'];

        $menu_option = [
            'trydo_dark_logo' => $trydo_dark_logo,
            'trydo_light_logo' => $trydo_light_logo,
            'trydo_logo_symbol' => $trydo_logo_symbol
        ];
        return $menu_option;
    }

    // Page layout style
    public static function trydo_layout_style()
    {
        $themepfix = RBT_THEME_PREFIX;
        $trydo_options = self::trydo_get_options();
        $condipfix = self::layout_settings();

        if (is_single() || is_page()) {
            $layout = get_post_meta(get_the_ID(), $themepfix . "_layout", true);
            $layout = (empty($layout) || $layout == 'default') ? $trydo_options[$condipfix . "_layout"] : $layout;

        } elseif (is_home() || is_archive() || is_search() || is_404()) {
            $layout = (empty($layout) || $layout == 'default') ? $trydo_options[$condipfix . "_layout"] : $layout;
        }

        return $layout;
    }

    // layout style
    public static function trydo_layout_style_all()
    {
        $themepfix = RBT_THEME_PREFIX;
        $trydo_options = self::trydo_get_options();
        $condipfix = self::layout_settings();
        $sidebar 	= Helper::trydo_sidebar_options();
        $has_sidebar_contnet = (is_active_sidebar( $sidebar ) || is_active_sidebar( 'sidebar' )) ? 'col-xl-8 trydo-main' : 'col-xl-12 trydo-main';

        if (is_single() || is_page()) {
            $layout = get_post_meta(get_the_ID(), $themepfix . "_layout", true);
            $layout = (empty($layout) || $layout == 'default') ? $trydo_options[$condipfix . "_layout"] : $layout;

        } elseif (is_home() || is_archive() || is_search() || is_404()) {
            $layout = (empty($layout) || $layout == 'default') ? $trydo_options[$condipfix . "_layout"] : $layout;
        }

        // Layout class
        if ($layout == 'full-width') {
            $layout_class = 'col-12';
            $post_class = 'col-lg-6 col-md-6 col-sm-6 col-xs-12 masonry-item';
        } else {
            $layout_class = $has_sidebar_contnet;
            $post_class = 'col-12';
        }

        $layout = [
            'layout' => $layout,
            'layout_class' => $layout_class,
            'post_class' => $post_class,
        ];
        return $layout;
    }

    // layout style
    public static function trydo_layout_custom_taxonomy()
    {
        $themepfix = RBT_THEME_PREFIX;
        $trydo_options = self::trydo_get_options();
        $condipfix = self::layout_settings();
        $layout = $trydo_options[$condipfix . "_layout"];
        $sidebar 	= Helper::trydo_sidebar_options();
        $has_sidebar_contnet = (is_active_sidebar( $sidebar ) || is_active_sidebar( 'sidebar' )) ? 'col-xl-8 trydo-main' : 'col-xl-12 trydo-main';

        // Layout class
        if ($layout == 'full-width') {
            $layout_class = 'col-12';
            $post_class = 'col-lg-4';
        } else {
            $layout_class = $has_sidebar_contnet;
            $post_class = 'col-lg-6';
        }
        $layout = [
            'layout' => $layout,
            'layout_class' => $layout_class,
            'post_class' => $post_class,
        ];
        return $layout;
    }

    /**  Footer Options */
    public static function trydo_active_footer()
    {
        $trydo_options = Helper::trydo_get_options();
        if (!$trydo_options['footer_area']) {
            return false;
        }
        $footer_column = $trydo_options['footer_column'];
        for ($i = 1; $i <= $footer_column; $i++) {
            if (is_active_sidebar('footer-' . $i)) {
                return true;
            }
        }
        return false;
    }


    /**
     * Custom Sidebar
     */
    public static function get_custom_sidebar_fields()
    {
        $themepfix = RBT_WIDGET_PREFIX;
        $sidebar_fields = array();
        $sidebar_fields['sidebar'] = esc_html__('Sidebar', 'trydo');
        $sidebars = get_option("{$themepfix}_custom_sidebars", array());
        if ($sidebars) {
            foreach ($sidebars as $sidebar) {
                $sidebar_fields[$sidebar['id']] = $sidebar['name'];
            }
        }
        return $sidebar_fields;
    }

    /** layout settings */
    public static function layout_settings()
    {
        $condipfix = RBT_THEME_PREFIX;
        if (is_single() || is_page()) {
            $post_type = get_post_type();
            $post_id = get_the_id();

            switch ($post_type) {
                case 'page':
                    $themepfix = 'page';
                    break;
                case 'post':
                    $themepfix = 'single_post';
                    break;
                case "team":
                    $themepfix = 'team';
                    break;
                case 'product':
                    $themepfix = 'product';
                    break;
                default:
                    $themepfix = 'single_post';
                    break;
            }
        } elseif (is_home() || is_archive() || is_search() || is_404()) {
            if (is_author()) {
                $themepfix = 'author';
            } elseif (is_search()) {
                $themepfix = 'search';
            } elseif (is_post_type_archive("team") || is_tax("team_category")) {
                $themepfix = 'team_archive';
            } elseif (function_exists('is_woocommerce') && is_woocommerce()) {
                $themepfix = 'shop';
            } else {
                $themepfix = 'blog';
            }
        }
        return $themepfix;
    }

}
