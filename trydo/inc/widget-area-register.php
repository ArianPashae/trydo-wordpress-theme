<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

if(!function_exists('trydo_widgets_init')){
    function trydo_widgets_init() {

        register_sidebar(array(
            'name' => esc_html__('Sidebar', 'trydo'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'trydo'),
            'before_widget' => '<div id="%1$s" class="rbt-single-widget %2$s mt--50 mt_sm--30 mt_md--30 mt_lg--40">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="title mb--20">',
            'after_title' => '</h4>',
        ));

        if ( class_exists( 'WooCommerce' ) ) {
            register_sidebar(array(
                'name' => esc_html__('Shop Sidebar', 'trydo'),
                'id' => 'sidebar-shop',
                'description' => esc_html__('Add widgets here.', 'trydo'),
                'before_widget' => '<div id="%1$s" class="rbt-single-widget %2$s mt--50 mt_sm--30 mt_md--30 mt_lg--40">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="title mb--20">',
                'after_title' => '</h4>',
            ));
        }

        $number_of_widget 	= 2;
        $trydo_widget_titles = array(
            '1' => esc_html__( 'Footer Widget Area 1 (Quick Link)', 'trydo' ),
            '2' => esc_html__( 'Footer Widget Area 2 (Say Hello)', 'trydo' ),
        );
        for ( $i = 1; $i <= $number_of_widget; $i++ ) {
            register_sidebar( array(
                'name'          => $trydo_widget_titles[$i],
                'id'            => 'footer-'. $i,
                'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="title">',
                'after_title'   => '</h4>',
            ) );
        }
    }
}
add_action( 'widgets_init', 'trydo_widgets_init' );
