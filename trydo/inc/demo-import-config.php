<?php
/**
 * @param $options
 * dialog
 */
function trydo_confirmation_dialog_options($options)
{
    return array_merge($options, array(
        'width' => 500,
        'dialogClass' => 'wp-dialog',
        'resizable' => false,
        'height' => 'auto',
        'modal' => true,
    ));
}

add_filter('pt-ocdi/confirmation_dialog_options', 'trydo_confirmation_dialog_options', 10, 1);

/**
 * trydo_import_files
 * @return array
 */
function trydo_import_files()
{
    $demo_location = 'http://rainbowit.net/themes/trydo/demo/';
    $preview_url = 'http://rainbowit.net/themes/trydo';
    $import_notice = esc_html__('Importing may take 5-10 minutes.', 'trydo');
    return array(
        array(
            'import_file_name' => 'Main Demo',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'trydo_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/main-demo.png',
            'preview_url' => $preview_url,
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Main Demo Dark',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'trydo_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/dark-main-demo.png',
            'preview_url' => $preview_url . '/main-demo-dark/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Corporate Business',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'trydo_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/corporate-business.png',
            'preview_url' => $preview_url . '/corporate-business/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Creative Agency',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'trydo_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/creative-agency.png',
            'preview_url' => $preview_url . '/creative-agency/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Personal Portfolio 02',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'trydo_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/dark-personal-portfolio-landing.png',
            'preview_url' => $preview_url . '/personal-portfolio-02/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Personal Portfolio Landing',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'trydo_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/personal-portfolio-landing.png',
            'preview_url' => $preview_url . '/personal-portfolio-landing/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Creative Agency Landing',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'trydo_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/creative-landing.png',
            'preview_url' => $preview_url . '/creative-agency-landing/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Creative Portfolio',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'trydo_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/creative-portfolio.png',
            'preview_url' => $preview_url . '/creative-portfolio/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Home Particles',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'trydo_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/homeparticles.png',
            'preview_url' => $preview_url . '/home-particles/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Designer Portfolio',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'trydo_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/designer-portfolio.png',
            'preview_url' => $preview_url . '/designer-portfolio/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Personal Portfolio',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'trydo_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/personal-portfolio.png',
            'preview_url' => $preview_url . '/personal-portfolio/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Minimal Portfolio',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'trydo_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/minimal-portfolio.png',
            'preview_url' => $preview_url . '/minimal-portfolio/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Digital Agency',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'trydo_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/digital-agency.png',
            'preview_url' => $preview_url . '/digital-agency/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Business',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'trydo_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/business.png',
            'preview_url' => $preview_url . '/business/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Startup Agency Demo',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'trydo_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/startup.png',
            'preview_url' => $preview_url . '/startup-agency-demo/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Studio Agency',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'trydo_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/studio-agency.png',
            'preview_url' => $preview_url . '/studio-agency/',
            'import_notice' => $import_notice,
        ),
        array(
            'import_file_name' => 'Parallax Home',
            'import_file_url' => $demo_location . 'content.xml',
            'import_widget_file_url' => $demo_location . 'widget.wie',
            'import_customizer_file_url' => $demo_location . 'customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => $demo_location . 'redux_options.json',
                    'option_name' => 'trydo_options',
                )
            ),
            'import_preview_image_url' => $demo_location . 'preview/parallax-home.png',
            'preview_url' => $preview_url . '/parallax-home/',
            'import_notice' => $import_notice,
        )


    );
}

add_filter('pt-ocdi/import_files', 'trydo_import_files');

/**
 * trydo_before_widgets_import
 * @param $selected_import
 */
function trydo_before_widgets_import($selected_import)
{

    // Remove 'Hello World!' post
    wp_delete_post(1, true);
    // Remove 'Sample page' page
    wp_delete_post(2, true);

    $sidebars_widgets = get_option('sidebars_widgets');
    $sidebars_widgets['sidebar'] = array();
    update_option('sidebars_widgets', $sidebars_widgets);

}

add_action('pt-ocdi/before_widgets_import', 'trydo_before_widgets_import');

/*
 * Automatically assign
 * "Front page",
 * "Posts page" and menu
 * locations after the importer is done
 */
function trydo_after_import_setup($selected_import)
{

    $demo_imported = get_option('trydo_demo_imported');

    $cpt_support = get_option('elementor_cpt_support');
    $elementor_disable_color_schemes = get_option('elementor_disable_color_schemes');
    $elementor_disable_typography_schemes = get_option('elementor_disable_typography_schemes');
    $elementor_container_width = get_option('elementor_container_width');


    //check if option DOESN'T exist in db
    if (!$cpt_support) {
        $cpt_support = ['page', 'post', 'portfolio', 'elementor_disable_color_schemes']; //create array of our default supported post types
        update_option('elementor_cpt_support', $cpt_support); //write it to the database
    }
    if (empty($elementor_disable_color_schemes)) {
        update_option('elementor_disable_color_schemes', 'yes'); //update database
    }
    if (empty($elementor_disable_typography_schemes)) {
        update_option('elementor_disable_typography_schemes', 'yes'); //update database
    }
    if (empty($elementor_container_width)) {
        update_option('elementor_container_width', '1260'); //update database
    }

    $elementor_general_settings = array(
        'container_width' => (!empty($elementor_container_width)) ? $elementor_container_width : '1260',
    );
    update_option('_elementor_general_settings', $elementor_general_settings); //update database

    // Update Global Css Options For Elementor
    $currentTime = strtotime("now");
    $elementor_global_css = array(
        'time' => $currentTime,
        'fonts' => array()
    );
    update_option('_elementor_global_css', $elementor_global_css); //update database

    update_option('trydo_elementor_custom_setting_imported', 'elementor_custom_setting_imported');

    if (empty($demo_imported)) {

        // Home page selected
        if ('Main Demo' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Main Demo');
            update_option('trydo_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Main Demo Dark' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Main Demo Dark');
            update_option('trydo_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Corporate Business' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Corporate Business');
            update_option('trydo_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Creative Agency' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Creative Agency');
            update_option('trydo_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Personal Portfolio 02' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Personal Portfolio 02');
            update_option('trydo_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Personal Portfolio Landing' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Personal Portfolio Landing');
            update_option('trydo_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Creative Agency Landing' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Creative Agency Landing');
            update_option('trydo_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Creative Portfolio' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Creative Portfolio');
            update_option('trydo_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Home Particles' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Home Particles');
            update_option('trydo_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Designer Portfolio' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Designer Portfolio');
            update_option('trydo_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Personal Portfolio' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Personal Portfolio');
            update_option('trydo_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Minimal Portfolio' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Minimal Portfolio');
            update_option('trydo_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Digital Agency' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Digital Agency');
            update_option('trydo_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Business' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Business');
            update_option('trydo_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Startup Agency Demo' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Startup Agency Demo');
            update_option('trydo_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Studio Agency' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Studio Agency');
            update_option('trydo_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Parallax Home' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Parallax Home');
            update_option('trydo_theme_active_demo', $selected_import['import_file_name']);
        }

        $blog_page_id = get_page_by_title('Blog');
        update_option('show_on_front', 'page');
        update_option('page_on_front', $front_page_id->ID);
        update_option('page_for_posts', $blog_page_id->ID);

        update_option('trydo_demo_imported', 'imported');
    }

    // Set Menu As Primary && Off Canvus Menu
    $main_menu = get_term_by('name', 'Main Menu', 'nav_menu');
    set_theme_mod('nav_menu_locations', array(
        'primary' => $main_menu->term_id
    ));

}

add_action('pt-ocdi/after_import', 'trydo_after_import_setup');


/**
 * time_for_one_ajax_call
 * @return int
 */
function trydo_change_time_of_single_ajax_call()
{
    return 20;
}

add_action('pt-ocdi/time_for_one_ajax_call', 'trydo_change_time_of_single_ajax_call');


// To make demo imported items selected
add_action('admin_footer', 'trydo_pt_ocdi_add_scripts');
function trydo_pt_ocdi_add_scripts()
{
    $demo_imported = get_option('trydo_theme_active_demo');
    if (!empty($demo_imported)) {
        ?>
        <script>
            jQuery(document).ready(function ($) {
                $('.ocdi__gl-item.js-ocdi-gl-item').each(function () {
                    var ocdi_theme_title = $(this).data('name');
                    var current_ocdi_theme_title = '<?php echo strtolower($demo_imported); ?>';
                    if (ocdi_theme_title == current_ocdi_theme_title) {
                        $(this).addClass('active_demo');
                        return false;
                    }
                });
            });
        </script>
        <?php
    }
}

/**
 * Remove ads
 */
add_filter('pt-ocdi/disable_pt_branding', '__return_true');



