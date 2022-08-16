<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package trydo
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function trydo_body_classes( $classes ) {

    $trydo_options = Helper::trydo_get_options();

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}


    // Scroll to top
    $classes[] = ($trydo_options['trydo_scroll_to_top_enable'] != 'no') ? "active-scroll-to-top" : "";
    $classes[] = ($trydo_options['trydo_preloader'] != 'no') ? "active-preloader" : "";


    $menu_type = rbt_get_acf_data( "trydo_menu_type");
    if ($menu_type){
        $classes[] = ($menu_type == 'onepage') ? "spybody trydo-active-onepage-navigation" : "";
    }


    $header_layout 			= Helper::trydo_header_layout();
    $header_transparent 	= $header_layout['header_transparent'];
    $classes[] = ("no" !== $header_transparent && "0" !== $header_transparent) ? " root-header-transparent " : "root-header-not-transparent";

    if (isset($trydo_options['active_dark_mode'])){
        $classes[] = ($trydo_options['active_dark_mode'] == 'on' || $trydo_options['active_dark_mode'] == 1) ? 'active-dark-mode' : '';
    }


	return $classes;
}
add_filter( 'body_class', 'trydo_body_classes' );



/**
 * Get unique ID.
 */
function trydo_unique_id($prefix = '')
{
    static $id_counter = 0;
    if (function_exists('wp_unique_id')) {
        return wp_unique_id($prefix);
    }
    return $prefix . (string)++$id_counter;
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function trydo_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}

add_action('wp_head', 'trydo_pingback_header');

/**
 * Comment navigation
 */
function trydo_get_post_navigation()
{
    if (get_comment_pages_count() > 1 && get_option('page_comments')):
        require(get_template_directory() . '/inc/comment-nav.php');
    endif;
}
require get_template_directory() . '/inc/comment-form.php';
