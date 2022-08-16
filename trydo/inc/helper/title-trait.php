<?php

/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package trydo
 */
trait BannerTrait
{
    
    /**
     * @return array
     * Banner Layout
     */
    public static function trydo_banner_layout()
    {
        $trydo_options = Helper::trydo_get_options();
        $themepfix = RBT_THEME_PREFIX;
        $condipfix = Helper::layout_settings();

        /**
         * Get Page Options value
         */
        $banner_area = rbt_get_acf_data($themepfix .  '_title_wrapper_show');
        $banner_style = rbt_get_acf_data( $themepfix . "_select_banner_style");

        /**
         * Set Condition
         */
        if(empty($banner_area)){
            $banner_style = $trydo_options['trydo_select_banner_template'];
        }else{
            $banner_style = (empty($banner_style) ||  $banner_style == "0") ? $trydo_options['trydo_select_banner_template'] : $banner_style;
        }
        $banner_area = (empty($banner_area)) ? $trydo_options['trydo_banner_enable'] : $banner_area;
        /**
         * Load Value
         */
        $banner_layout = [
            'banner_area' => $banner_area,
            'banner_style' => $banner_style,
        ];
        return $banner_layout;

    }

    
    /**
     * @return array
     * Banner Layout
     */
    public static function trydo_page_breadcrumb()
    {
        $trydo_options = Helper::trydo_get_options();
        $themepfix = RBT_THEME_PREFIX;
        $condipfix = Helper::layout_settings();

        /**
         * Get Page Options value
         */
        $breadcrumbs = rbt_get_acf_data($themepfix .  '_breadcrumbs_enable');
        /**
         * Set Condition
         */
        $breadcrumbs = (empty($breadcrumbs)) ? $trydo_options['trydo_breadcrumb_enable'] : $breadcrumbs;
        /**
         * Load Value
         */
        $breadcrumbs_enable = [
            'breadcrumbs' => $breadcrumbs,
        ];
        return $breadcrumbs_enable;

    }




}
