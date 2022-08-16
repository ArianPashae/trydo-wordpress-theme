<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */
if (!class_exists('Redux')) {
    return;
}

Redux::disable_demo();

$opt_name = RBT_THEME_PREFIX . '_options';
$theme = wp_get_theme();
$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name' => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'disable_tracking' => true,
    'display_name' => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version' => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type' => 'submenu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu' => true,
    // Show the sections below the admin menu item or not
    'menu_title' => esc_html__('Trydo Theme Options', 'trydo'),
    'page_title' => esc_html__('Trydo Theme Options', 'trydo'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    //'google_api_key'       => 'AIzaSyC2GwbfJvi-WnYpScCPBGIUyFZF97LI0xs',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography' => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar' => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon' => 'dashicons-menu',
    // Choose an icon for the admin bar menu
    'admin_bar_priority' => 50,
    // Choose an priority for the admin bar menu
    'global_variable' => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode' => false,
    'forced_dev_mode_off' => false,
    // Show the time the page took to load, etc
    'update_notice' => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer' => false,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority' => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent' => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions' => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon' => '',
    // Specify a custom URL to an icon
    'last_tab' => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon' => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug' => RBT_THEME_PREFIX . '_options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults' => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show' => true,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark' => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export' => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time' => 60 * MINUTE_IN_SECONDS,
    'output' => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag' => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    'footer_credit' => '&nbsp;',
    // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database' => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn' => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
    'hide_expand' => true,
    // This variable determines if the ‘Expand Options’ buttons is visible on the options panel.
    'system_info' => true

);

Redux::setArgs($opt_name, $args);


/*
 * ---> END ARGUMENTS
 */

// -> START Basic Fields

/**
 * General
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('General', 'trydo'),
    'id' => 'trydo-general-setting-wrap',
    'icon' => 'el el-cog',
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('General', 'trydo'),
    'id' => 'axil-general-setting',
    'icon' => 'el el-adjust-alt',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'active_dark_mode',
            'type' => 'switch',
            'title' => esc_html__('Switch to Dark Mode', 'trydo'),
            'on' => esc_html__('Yes', 'trydo'),
            'off' => esc_html__('No', 'trydo'),
            'default' => false,
        ),
        array(
            'id' => 'show_ld_switcher_form_user_end',
            'type' => 'switch',
            'title' => esc_html__('Enabled Dark/Light Switcher Form User End', 'trydo'),
            'on' => esc_html__('Enabled', 'trydo'),
            'off' => esc_html__('Disabled', 'trydo'),
            'default' => true,
        ),

        // Start logo
        array(
            'id' => 'trydo_logo_type',
            'type' => 'button_set',
            'title' => esc_html__('Select Logo Type', 'trydo'),
            'subtitle' => esc_html__('Select logo type, if the image is chosen the existing options of  image below will work, or text option will work. (Note: Used when Transparent Header is enabled.)', 'trydo'),
            'options' => array(
                'image' => 'Image',
                'text' => 'Text',
            ),
            'default' => 'image',
        ),
        array(
            'id' => 'trydo_head_logo',
            'title' => esc_html__('Default Logo', 'trydo'),
            'subtitle' => esc_html__('Upload the main logo of your site. Note: Its work for header layout 1', 'trydo'),
            'type' => 'media',
            'default' => array(
                'url' => RBT_IMG_URL . 'logo.png'
            ),
            'required' => array('trydo_logo_type', 'equals', 'image'),
        ),
        array(
            'id' => 'trydo_white_logo',
            'title' => esc_html__('White Logo', 'trydo'),
            'subtitle' => esc_html__('Right now the white logo is not used anywhere. Note: Header Upcoming ...', 'trydo'),
            'type' => 'media',
            'default' => array(
                'url' => RBT_IMG_URL . 'logo-light.png'
            ),
            'required' => array('trydo_logo_type', 'equals', 'image'),
        ),
        array(
            'id' => 'trydo_symbol_logo',
            'title' => esc_html__('Symbol Logo', 'trydo'),
            'subtitle' => esc_html__('Upload the symbol logo of your site. Note: Its work for header layout 2,3 and 4', 'trydo'),
            'type' => 'media',
            'default' => array(
                'url' => RBT_IMG_URL . 'logo-symbol-dark.png'
            ),
            'required' => array('trydo_logo_type', 'equals', 'image'),
        ),
        array(
            'id' => 'trydo_footer_logo',
            'title' => esc_html__('Footer Logo', 'trydo'),
            'subtitle' => esc_html__('Upload the footer logo of your site. Note: Its work for footer layout 2 and 3', 'trydo'),
            'type' => 'media',
            'default' => array(
                'url' => RBT_IMG_URL . 'logo.png'
            ),
            'required' => array('trydo_logo_type', 'equals', 'image'),
        ),
        array(
            'id' => 'trydo_logo_max_height',
            'type' => 'dimensions',
            'units_extended' => true,
            'units' => array('rem', 'px', '%'),
            'title' => esc_html__('Logo Height', 'trydo'),
            'subtitle' => esc_html__('Set custom logo height. Default value: 66px', 'trydo'),
            'width' => false,
            'output' => array(
                'max-height' => '.header-area .header-wrapper .logo img'
            ),
            'required' => array('trydo_logo_type', 'equals', 'image'),
        ),
        array(
            'id' => 'trydo_logo_padding',
            'type' => 'spacing',
            'title' => esc_html__('Logo Padding', 'trydo'),
            'subtitle' => esc_html__('Controls the top, right, bottom and left padding of the logo. (Note: Used when Transparent Header is enabled.)', 'trydo'),
            'mode' => 'padding',
            'units' => array('em', 'px'),
            'default' => array(
                'padding-top' => 'px',
                'padding-right' => 'px',
                'padding-bottom' => 'px',
                'padding-left' => 'px',
                'units' => 'px',
            ),
            'output'         => array('.header-area .header-wrapper .logo a'),
            'required' => array('trydo_logo_type', 'equals', 'image'),
        ),
        array(
            'id' => 'trydo_logo_text',
            'type' => 'text',
            'required' => array('trydo_logo_type', 'equals', 'text'),
            'title' => esc_html__('Site Title', 'trydo'),
            'desc' => esc_html__('Enter your site title here. (Note: Used when Transparent Header is enabled.)', 'trydo'),
            'default' => get_bloginfo('name')
        ),
        array(
            'id' => 'trydo_logo_text_font',
            'type' => 'typography',
            'always_display' => true,
            'title' => esc_html__('Site Title Font Settings', 'trydo'),
            'required' => array('trydo_logo_type', 'equals', 'text'),
            'google' => false,
            'subsets' => false,
            'line-height' => false,
            'text-transform' => true,
            'transition' => false,
            'text-align' => false,
            'preview' => false,
            'all_styles' => true,
            'output' => array('.header-area .header-wrapper .logo a'),
            'units' => 'px',
            'subtitle' => esc_html__('Controls the font settings of the site title. (Note: Used when Transparent Header is enabled.)', 'trydo'),
            'default' => array(
                'google' => false,
            )
        ),
        // End logo
        array(
            'id' => 'trydo_scroll_to_top_enable',
            'type' => 'button_set',
            'title' => esc_html__('Enable Back To Top', 'trydo'),
            'subtitle' => esc_html__('Enable the back to top button that appears in the bottom right corner of the screen.', 'trydo'),
            'options' => array(
                'yes' => esc_html__('Yes', 'trydo'),
                'no' => esc_html__('No', 'trydo'),
            ),
            'default' => 'yes'
        ),
        array(
            'id' => 'trydo_preloader',
            'type' => 'button_set',
            'title' => esc_html__('Enable Preloader', 'trydo'),
            'options' => array(
                'yes' => esc_html__('Yes', 'trydo'),
                'no' => esc_html__('No', 'trydo'),
            ),
            'default' => 'no'
        ),
    )
));

Redux::setSection($opt_name,
    array(
        'title' => esc_html__('Social Networks', 'trydo'),
        'id' => 'socials_section',
        'heading' => esc_html__('Social Networks', 'trydo'),
        'icon' => 'el el-twitter',
        'subsection' => true,
        'fields' => array(
            array(
                'id' => 'trydo_social_icons',
                'type' => 'sortable',
                'title' => esc_html__('Social Icons', 'trydo'),
                'subtitle' => esc_html__('Enter social links to show the icons. In case you want to hide any field, just keep that field empty', 'trydo'),
                'mode' => 'text',
                'label' => true,
                'options' => array(
                    'facebook-f' => '',
                    'twitter' => '',
                    'pinterest-p' => '',
                    'linkedin-in' => '',
                    'instagram' => '',
                    'vimeo-v' => '',
                    'dribbble' => '',
                    'behance' => '',
                    'youtube' => '',
                    'github' => '',
                ),
                'default' => array(
                    'facebook-f' => 'https://www.facebook.com/',
                    'twitter' => 'https://twitter.com/',
                    'pinterest-p' => '',
                    'linkedin-in' => 'https://linkedin.com/',
                    'instagram' => 'https://instagram.com/',
                    'vimeo-v' => '',
                    'dribbble' => 'https://dribbble.com/',
                    'behance' => '',
                    'youtube' => '',
                    'github' => '',
                ),
            )
        )
    )
);

/**
 * Header area
 */
Redux::setSection($opt_name, array(
        'title' => esc_html__('Header', 'trydo'),
        'id' => 'header_id',
        'icon' => 'el el-minus',
        'fields' => array(
            array(
                'id' => 'trydo_enable_header',
                'type' => 'switch',
                'title' => esc_html__('Header', 'trydo'),
                'subtitle' => esc_html__('Enable or disable the header area.', 'trydo'),
                'default' => true
            ),
            // Header Custom Style
            array(
                'id' => 'trydo_select_header_template',
                'type' => 'image_select',
                'title' => esc_html__('Select Header Layout', 'trydo'),
                'options' => array(
                    '1' => array(
                        'alt' => esc_html__('Header Layout 1', 'trydo'),
                        'title' => esc_html__('Header Layout 1', 'trydo'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/header/1.png',
                    ),
                    '2' => array(
                        'alt' => esc_html__('Header Layout 2', 'trydo'),
                        'title' => esc_html__('Header Layout 2', 'trydo'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/header/2.png',
                    ),
                    '3' => array(
                        'alt' => esc_html__('Header Layout 3', 'trydo'),
                        'title' => esc_html__('Header Layout 3', 'trydo'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/header/3.png',
                    ),
                    '4' => array(
                        'alt' => esc_html__('Header Layout 4', 'trydo'),
                        'title' => esc_html__('Header Layout 4', 'trydo'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/header/4.png',
                    ),
                ),
                'default' => '1',
                'required' => array('trydo_enable_header', 'equals', true),
            ),
            array(
                'id' => 'trydo_header_btn',
                'type' => 'switch',
                'title' => esc_html__('Header Button', 'trydo'),
                'on' => esc_html__('Enabled', 'trydo'),
                'off' => esc_html__('Disabled', 'trydo'),
                'default' => true,
                'required' => array('trydo_enable_header', 'equals', true),
            ),
            array(
                'id' => 'trydo_header_buttontext',
                'type' => 'text',
                'title' => esc_html__('Header button Text', 'trydo'),
                'default' => esc_html__('BUY NOW', 'trydo'),
                'required' => array('trydo_header_btn', 'equals', true),
            ),
            array(
                'id' => 'trydo_header_buttonUrl',
                'type' => 'text',
                'default' => '#',
                'title' => esc_html__('Button Url', 'trydo'),
                'required' => array('trydo_header_btn', 'equals', true),

            ),
            array(
                'id' => 'trydo_header_sticky',
                'type' => 'switch',
                'title' => esc_html__('Header Sticky', 'trydo'),
                'subtitle' => esc_html__('Enable to activate the sticky header.', 'trydo'),
                'default' => false,
                'required' => array('trydo_enable_header', 'equals', true),
            ),
            array(
                'id' => 'trydo_header_transparent',
                'type' => 'switch',
                'title' => esc_html__('Header Transparent', 'trydo'),
                'subtitle' => esc_html__('Enable to make the header area transparent.', 'trydo'),
                'default' => true,
                'required' => array('trydo_enable_header', 'equals', true),
            ), // output body class


        )
    )
);

/**
 * Footer area
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Footer', 'trydo'),
    'id' => 'trydo_footer_section',
    'icon' => 'el el-photo',
    'fields' => array(
        array(
            'id' => 'trydo_footer_enable',
            'type' => 'switch',
            'title' => esc_html__('Footer', 'trydo'),
            'subtitle' => esc_html__('Enable or disable the footer area.', 'trydo'),
            'default' => true,
        ),
        // Header Custom Style
        array(
            'id' => 'trydo_select_footer_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Footer Layout', 'trydo'),
            'options' => array(
                '1' => array(
                    'alt' => esc_html__('Footer Layout 1', 'trydo'),
                    'title' => esc_html__('Footer Layout 1', 'trydo'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/footer/1.png',
                ),
                '2' => array(
                    'alt' => esc_html__('Footer Layout 2', 'trydo'),
                    'title' => esc_html__('Footer Layout 2', 'trydo'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/footer/2.png',
                ),
                '3' => array(
                    'alt' => esc_html__('Footer Layout 3', 'trydo'),
                    'title' => esc_html__('Footer Layout 3', 'trydo'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/footer/3.png',
                ),
            ),
            'default' => '1',
            'required' => array('trydo_footer_enable', 'equals', true),
        ),
        
        /**
         * CTA Section
         */
        array(
            'id' => 'cta_pre_title',
            'type' => 'text',
            'title' => esc_html__('CTA  Pre Title', 'trydo'),
            'default' => esc_html__( 'READY TO DO THIS', 'trydo' ),
            'required' => array('trydo_select_footer_template', 'equals', array('1', '3')),
        ),
        array(
            'id' => 'cta_title',
            'type' => 'text',
            'title' => esc_html__('CTA  Title', 'trydo'),
            'default' => esc_html__( "Let's get to work", "trydo" ),
            'required' => array('trydo_select_footer_template', 'equals', array('1', '3')),
        ),
        array(
            'id' => 'cta_btn_title',
            'type' => 'text',
            'title' => esc_html__('CTA Button Title', 'trydo'),
            'default' => esc_html__( "CONTACT US", "trydo" ),
            'required' => array('trydo_select_footer_template', 'equals', array('1', '3')),
        ),
        array(
            'id' => 'cta_btn_url',
            'type' => 'text',
            'title' => esc_html__('CTA Button UTL', 'trydo'),
            'default' => "#",
            'required' => array('trydo_select_footer_template', 'equals', array('1', '3')),
        ),
        array(
            'id' => 'cta_shape_image_show',
            'type' => 'button_set',
            'title' => esc_html__('CTA Shape Image', 'trydo'),
            'subtitle' => esc_html__('Show or hide the CTA Shape Image of footer layout one.', 'trydo'),
            'options' => array(
                'yes' => esc_html__('Show', 'trydo'),
                'no' => esc_html__('Hide', 'trydo'),
            ),
            'default' => 'yes',
            'required' => array('trydo_select_footer_template', 'equals', '1')
        ),
        array(
            'id' => 'cta_shape_image',
            'title' => esc_html__('Upload CTA Shape Image', 'trydo'),
            'subtitle' => esc_html__('Upload the cta shape image of your footer layout one. Note: Recommended size width 295px and height: 300px', 'trydo'),
            'type' => 'media',
            'default' => array(
                'url' => RBT_THEME_URI . '/assets/images/logo/big-logo.png',
            ),
            'required' => array('cta_shape_image_show', 'equals', 'yes')
        ),

        // Footer Bottom
        array(
            'id' => 'trydo_copyright_contact',
            'type' => 'editor',
            'title' => esc_html__('Copyright Content', 'trydo'),
            'args' => array(
                'teeny' => true,
                'textarea_rows' => 5,
            ),
            'default' => esc_html__('© 2020. All rights reserved by Your Company.', 'trydo'),
            'required' => array('trydo_footer_enable', 'equals', true),
        ),

    )
));

/**
 * Page Banner/Title section
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('
    Page Banner', 'trydo'),
    'id' => 'trydo_banner_section',
    'icon' => 'el el-website',
    'fields' => array(
        array(
            'id' => 'trydo_banner_enable',
            'type' => 'switch',
            'title' => esc_html__('Banner', 'trydo'),
            'subtitle' => esc_html__('Enable or disable the banner area.', 'trydo'),
            'default' => true,
        ),
        // Header Custom Style
        array(
            'id' => 'trydo_select_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select banner Layout', 'trydo'),
            'options' => array(
                '1' => array(
                    'alt' => esc_html__('Banner Layout 1', 'trydo'),
                    'title' => esc_html__('Banner Layout 1', 'trydo'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/1.png',
                ),
                '2' => array(
                    'alt' => esc_html__('Banner Layout 2', 'trydo'),
                    'title' => esc_html__('Banner Layout 2', 'trydo'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/2.png',
                ),
            ),
            'default' => '1',
            'required' => array('trydo_banner_enable', 'equals', true),
        ),
        array(
            'id' => 'trydo_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'trydo'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'trydo'),
            'default' => true,
            'required' => array('trydo_select_banner_template', 'equals', '1'),
        ),
        array(
            'id' => 'trydo_select_banner_image',
            'title' => esc_html__('Upload Banner Background Image', 'trydo'),
            'subtitle' => esc_html__('Upload the banner background image of your banner layout one & two.', 'trydo'),
            'type' => 'media',
            'required' => array('trydo_banner_enable', 'equals', true),
        ),
        array(
            'id'        => 'trydo_banner_image_overlay_color_opt',
            'title'     => esc_html__('Banner Background Image Overlay', 'trydo'),
            'color'     => '#00010c',
            'alpha'     => 0.6,
            'output'  =>  array('.breadcrumb-area:before, .rn-page-title-area:before'),
            'mode'      => 'background-color',
            'type'      => 'color_rgba',
            'validate'  => 'colorrgba',
            'required' => array('trydo_banner_enable', 'equals', true),
        ),

    )
));

/**
 * Blog Panel
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog', 'trydo'),
    'id' => 'trydo_blog',
    'icon' => 'el el-file-edit',
));

// Blog Options
Redux::setSection($opt_name, array(
        'title' => esc_html__('Archive', 'trydo'),
        'id' => 'trydo_blog_genaral',
        'icon' => 'el el-folder-open',
        'subsection' => true,
        'fields' => array(
            array(
                'id' => 'trydo_blog_text',
                'type' => 'text',
                'title' => esc_html__('Default Title', 'trydo'),
                'subtitle' => esc_html__('Controls the Default title of the page which is displayed on the page title are on the blog page.', 'trydo'),
                'default' => esc_html__('Blogs', 'trydo'),
            ),
            array(
                'id' => 'trydo_blog_sidebar',
                'type' => 'image_select',
                'title' => esc_html__('Select Blog Sidebar', 'trydo'),
                'subtitle' => esc_html__('Choose your favorite blog layout', 'trydo'),
                'options' => array(
                    'left' => array(
                        'alt' => esc_html__('Left Sidebar', 'trydo'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/left-sidebar.png',
                        'title' => esc_html__('Left Sidebar', 'trydo'),
                    ),
                    'right' => array(
                        'alt' => esc_html__('Right Sidebar', 'trydo'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/right-sidebar.png',
                        'title' => esc_html__('Right Sidebar', 'trydo'),
                    ),
                    'no' => array(
                        'alt' => esc_html__('No Sidebar', 'trydo'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/no-sidebar.png',
                        'title' => esc_html__('No Sidebar', 'trydo'),
                    ),
                ),
                'default' => 'right',
            ),
            array(
                'id' => 'trydo_show_post_author_meta',
                'type' => 'button_set',
                'title' => esc_html__('Author', 'trydo'),
                'subtitle' => esc_html__('Show or hide the author of blog post.', 'trydo'),
                'options' => array(
                    'yes' => esc_html__('Show', 'trydo'),
                    'no' => esc_html__('Hide', 'trydo'),
                ),
                'default' => 'yes',
            ),
            array(
                'id' => 'trydo_show_post_publish_date_meta',
                'type' => 'button_set',
                'title' => esc_html__('Publish Date', 'trydo'),
                'subtitle' => esc_html__('Show or hide the publish date of blog post.', 'trydo'),
                'options' => array(
                    'yes' => esc_html__('Show', 'trydo'),
                    'no' => esc_html__('Hide', 'trydo'),
                ),
                'default' => 'yes',
            ),
            array(
                'id' => 'trydo_show_post_updated_date_meta',
                'type' => 'button_set',
                'title' => esc_html__('Updated Date', 'trydo'),
                'subtitle' => esc_html__('Show or hide the updated date of blog post.', 'trydo'),
                'options' => array(
                    'yes' => esc_html__('Show', 'trydo'),
                    'no' => esc_html__('Hide', 'trydo'),
                ),
                'default' => 'no',
            ),
            array(
                'id' => 'trydo_show_post_reading_time_meta',
                'type' => 'button_set',
                'title' => esc_html__('Reading Time', 'trydo'),
                'subtitle' => esc_html__('Show or hide the publish content reading time.', 'trydo'),
                'options' => array(
                    'yes' => esc_html__('Show', 'trydo'),
                    'no' => esc_html__('Hide', 'trydo'),
                ),
                'default' => 'yes',
            ),
            array(
                'id' => 'trydo_show_post_comments_meta',
                'type' => 'button_set',
                'title' => esc_html__('Comments', 'trydo'),
                'subtitle' => esc_html__('Show or hide the comments of blog post.', 'trydo'),
                'options' => array(
                    'yes' => esc_html__('Show', 'trydo'),
                    'no' => esc_html__('Hide', 'trydo'),
                ),
                'default' => 'no',
            ),
            array(
                'id' => 'trydo_show_post_categories_meta',
                'type' => 'button_set',
                'title' => esc_html__('Categories', 'trydo'),
                'subtitle' => esc_html__('Show or hide the categories of blog post.', 'trydo'),
                'options' => array(
                    'yes' => esc_html__('Show', 'trydo'),
                    'no' => esc_html__('Hide', 'trydo'),
                ),
                'default' => 'no',
            ),
            array(
                'id' => 'trydo_show_post_tags_meta',
                'type' => 'button_set',
                'title' => esc_html__('Tags', 'trydo'),
                'subtitle' => esc_html__('Show or hide the tags of blog post.', 'trydo'),
                'options' => array(
                    'yes' => esc_html__('Show', 'trydo'),
                    'no' => esc_html__('Hide', 'trydo'),
                ),
                'default' => 'no',
            ),
            array(
                'id' => 'trydo_enable_readmore_btn',
                'type' => 'button_set',
                'title' => esc_html__('Read More Button', 'trydo'),
                'subtitle' => esc_html__('Show or hide the read more button of blog post.', 'trydo'),
                'options' => array(
                    'yes' => esc_html__('Show', 'trydo'),
                    'no' => esc_html__('Hide', 'trydo'),
                ),
                'default' => 'yes',
            ),
            array(
                'id' => 'trydo_readmore_text',
                'type' => 'text',
                'title' => esc_html__('Read More Text', 'trydo'),
                'subtitle' => esc_html__('Set the Default title of read more button.', 'trydo'),
                'default' => esc_html__('Read More', 'trydo'),
                'required' => array('trydo_enable_readmore_btn', 'equals', 'yes'),
            ),
        )
    )
);

/**
 * Single Post
 */
Redux::setSection($opt_name, array(
        'title' => esc_html__('Single', 'trydo'),
        'id' => 'trydo_blog_details_id',
        'icon' => 'el el-website',
        'subsection' => true,
        'fields' => array(
//            array(
//                'id' => 'trydo_single_pos',
//                'type' => 'image_select',
//                'title' => esc_html__('Blog Details Layout', 'trydo'),
//                'subtitle' => esc_html__('Choose your favorite layout', 'trydo'),
//                'options' => array(
//                    'left' => array(
//                        'alt' => esc_html__('Left Sidebar', 'trydo'),
//                        'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/left-sidebar.png',
//                        'title' => esc_html__('Left Sidebar', 'trydo'),
//                    ),
//                    'right' => array(
//                        'alt' => esc_html__('Right Sidebar', 'trydo'),
//                        'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/right-sidebar.png',
//                        'title' => esc_html__('Right Sidebar', 'trydo'),
//                    ),
//                    'full' => array(
//                        'alt' => esc_html__('Full Width', 'trydo'),
//                        'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/no-sidebar.png',
//                        'title' => esc_html__('Full Width', 'trydo'),
//                    ),
//                ),
//                'default' => 'full',
//            ),
            array(
                'id' => 'trydo_show_blog_details_author_meta',
                'type' => 'button_set',
                'title' => esc_html__('Author', 'trydo'),
                'subtitle' => esc_html__('Show or hide the author of blog post.', 'trydo'),
                'options' => array(
                    'yes' => esc_html__('Show', 'trydo'),
                    'no' => esc_html__('Hide', 'trydo'),
                ),
                'default' => 'yes',
            ),
            array(
                'id' => 'trydo_show_blog_details_publish_date_meta',
                'type' => 'button_set',
                'title' => esc_html__('Publish Date', 'trydo'),
                'subtitle' => esc_html__('Show or hide the publish date of blog post.', 'trydo'),
                'options' => array(
                    'yes' => esc_html__('Show', 'trydo'),
                    'no' => esc_html__('Hide', 'trydo'),
                ),
                'default' => 'yes',
            ),
            array(
                'id' => 'trydo_show_blog_details_updated_date_meta',
                'type' => 'button_set',
                'title' => esc_html__('Updated Date', 'trydo'),
                'subtitle' => esc_html__('Show or hide the updated date of blog post.', 'trydo'),
                'options' => array(
                    'yes' => esc_html__('Show', 'trydo'),
                    'no' => esc_html__('Hide', 'trydo'),
                ),
                'default' => 'no',
            ),
            array(
                'id' => 'trydo_show_blog_details_reading_time_meta',
                'type' => 'button_set',
                'title' => esc_html__('Reading Time', 'trydo'),
                'subtitle' => esc_html__('Show or hide the publish content reading time.', 'trydo'),
                'options' => array(
                    'yes' => esc_html__('Show', 'trydo'),
                    'no' => esc_html__('Hide', 'trydo'),
                ),
                'default' => 'yes',
            ),
            array(
                'id' => 'trydo_show_blog_details_comments_meta',
                'type' => 'button_set',
                'title' => esc_html__('Comments', 'trydo'),
                'subtitle' => esc_html__('Show or hide the comments of blog post.', 'trydo'),
                'options' => array(
                    'yes' => esc_html__('Show', 'trydo'),
                    'no' => esc_html__('Hide', 'trydo'),
                ),
                'default' => 'no',
            ),
            array(
                'id' => 'trydo_show_blog_details_categories_meta',
                'type' => 'button_set',
                'title' => esc_html__('Categories', 'trydo'),
                'subtitle' => esc_html__('Show or hide the categories of blog post.', 'trydo'),
                'options' => array(
                    'yes' => esc_html__('Show', 'trydo'),
                    'no' => esc_html__('Hide', 'trydo'),
                ),
                'default' => 'no',
            ),
            array(
                'id' => 'trydo_show_blog_details_tags_meta',
                'type' => 'button_set',
                'title' => esc_html__('Tags', 'trydo'),
                'subtitle' => esc_html__('Show or hide the tags of blog post.', 'trydo'),
                'options' => array(
                    'yes' => esc_html__('Show', 'trydo'),
                    'no' => esc_html__('Hide', 'trydo'),
                ),
                'default' => 'no',
            ),

        )
    )
);
/**
 * Portfolio Panel
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Portfolio', 'trydo'),
    'id' => 'trydo_portfolio',
    'icon' => 'el el-th',
));
/**
 * Single Archive
 */
Redux::setSection($opt_name, array(
        'title' => esc_html__('Archive', 'trydo'),
        'id' => 'trydo_portfolio_archive_id',
        'icon' => 'el el-folder-open',
        'subsection' => true,
        'fields' => array(
            // Client Name
            array(
                'id' => 'trydo_enable_case_study_button',
                'type' => 'button_set',
                'title' => esc_html__('Case Study Button (View Details)', 'trydo'),
                'subtitle' => esc_html__('Show or hide the portfolio case study (View Details) button of portfolio archive and addons', 'trydo'),
                'options' => array(
                    'yes' => esc_html__('Show', 'trydo'),
                    'no' => esc_html__('Hide', 'trydo'),
                ),
                'default' => 'yes',
            ),
            array(
                'id' => 'trydo_enable_case_study_button_text',
                'type' => 'text',
                'title' => esc_html__('Portfolio Button Text', 'trydo'),
                'default' => esc_html__('Case Study', 'trydo'),
                'required' => array('trydo_enable_case_study_button', 'equals', 'yes'),
            ),
        )
    )
);
/**
 * Single Portfolio
 */
Redux::setSection($opt_name, array(
        'title' => esc_html__('Single', 'trydo'),
        'id' => 'trydo_portfolio_details_id',
        'icon' => 'el el-website',
        'subsection' => true,
        'fields' => array(
            array(
                'id'       => 'select_title_bellow_content',
                'type'     => 'select',
                'title'    => esc_html__('Select Title Bellow Content', 'trydo'),
                'desc'     => esc_html__('Select Excerpt or Breadcrumbs. If you want to empty this please select none.', 'trydo'),
                // Must provide key => value pairs for select options
                'options'  => array(
                    'excerpt' => 'Excerpt',
                    'breadcrumbs' => 'Breadcrumbs',
                    'both' => 'Excerpt and Breadcrumbs',
                    'none' => 'None'
                ),
                'default'  => 'excerpt',
            ),

            // Client Name
            array(
                'id' => 'trydo_enable_client_name_meta',
                'type' => 'button_set',
                'title' => esc_html__('Client Name', 'trydo'),
                'subtitle' => esc_html__('Show or hide the portfolio client name of portfolio single post.', 'trydo'),
                'options' => array(
                    'yes' => esc_html__('Show', 'trydo'),
                    'no' => esc_html__('Hide', 'trydo'),
                ),
                'default' => 'yes',
            ),
            array(
                'id' => 'trydo_client_name_text',
                'type' => 'text',
                'title' => esc_html__('Client Name Text', 'trydo'),
                'default' => esc_html__('Client Name', 'trydo'),
                'required' => array('trydo_enable_client_name_meta', 'equals', 'yes'),
            ),

            // Release Date
            array(
                'id' => 'trydo_enable_release_date_meta',
                'type' => 'button_set',
                'title' => esc_html__('Release Date', 'trydo'),
                'subtitle' => esc_html__('Show or hide the portfolio release date of portfolio single post.', 'trydo'),
                'options' => array(
                    'yes' => esc_html__('Show', 'trydo'),
                    'no' => esc_html__('Hide', 'trydo'),
                ),
                'default' => 'yes',
            ),
            array(
                'id' => 'trydo_release_date_text',
                'type' => 'text',
                'title' => esc_html__('Release Date Text', 'trydo'),
                'default' => esc_html__('Release Date', 'trydo'),
                'required' => array('trydo_enable_release_date_meta', 'equals', 'yes'),
            ),

            // Project Types
            array(
                'id' => 'trydo_enable_project_types_meta',
                'type' => 'button_set',
                'title' => esc_html__('Project Types', 'trydo'),
                'subtitle' => esc_html__('Show or hide the portfolio project types of portfolio single post.', 'trydo'),
                'options' => array(
                    'yes' => esc_html__('Show', 'trydo'),
                    'no' => esc_html__('Hide', 'trydo'),
                ),
                'default' => 'yes',
            ),
            array(
                'id' => 'trydo_project_types_text',
                'type' => 'text',
                'title' => esc_html__('Project Types Text', 'trydo'),
                'default' => esc_html__('Project Types', 'trydo'),
                'required' => array('trydo_enable_project_types_meta', 'equals', 'yes'),
            ),

            // Live Preview
            array(
                'id' => 'trydo_enable_live_preview_meta',
                'type' => 'button_set',
                'title' => esc_html__('Live Preview', 'trydo'),
                'subtitle' => esc_html__('Show or hide the portfolio live preview of portfolio single post.', 'trydo'),
                'options' => array(
                    'yes' => esc_html__('Show', 'trydo'),
                    'no' => esc_html__('Hide', 'trydo'),
                ),
                'default' => 'yes',
            ),
            array(
                'id' => 'trydo_live_preview_text',
                'type' => 'text',
                'title' => esc_html__('Live Preview Text', 'trydo'),
                'default' => esc_html__('Live Preview', 'trydo'),
                'required' => array('trydo_enable_live_preview_meta', 'equals', 'yes'),
            ),
            array(
                'id' => 'trydo_live_preview_button_text',
                'type' => 'text',
                'title' => esc_html__('Live Preview Button Text', 'trydo'),
                'default' => esc_html__('Visit Live Site', 'trydo'),
                'required' => array('trydo_enable_live_preview_meta', 'equals', 'yes'),
            ),


            /**
             * Portfolio Share option
             */
            array(
                'id' => 'trydo_enable_portfolio_share',
                'type' => 'button_set',
                'title' => esc_html__('Share options', 'trydo'),
                'subtitle' => esc_html__('Show or hide the social share button of portfolio single post.', 'trydo'),
                'options' => array(
                    'yes' => esc_html__('Show', 'trydo'),
                    'no' => esc_html__('Hide', 'trydo'),
                ),
                'default' => 'yes',
            ),
            // Facebook
            array(
                'id' => 'trydo_enable_portfolio_share_facebook',
                'type' => 'button_set',
                'title' => esc_html__('Facebook', 'trydo'),
                'subtitle' => esc_html__('Show or hide the facebook share button of portfolio single post.', 'trydo'),
                'options' => array(
                    'yes' => esc_html__('Show', 'trydo'),
                    'no' => esc_html__('Hide', 'trydo'),
                ),
                'default' => 'yes',
                'required' => array('trydo_enable_portfolio_share', 'equals', 'yes'),
            ),
            // Twitter
            array(
                'id' => 'trydo_enable_portfolio_share_twitter',
                'type' => 'button_set',
                'title' => esc_html__('Twitter', 'trydo'),
                'subtitle' => esc_html__('Show or hide the twitter share button of portfolio single post.', 'trydo'),
                'options' => array(
                    'yes' => esc_html__('Show', 'trydo'),
                    'no' => esc_html__('Hide', 'trydo'),
                ),
                'default' => 'yes',
                'required' => array('trydo_enable_portfolio_share', 'equals', 'yes'),
            ),
            // Linkedin
            array(
                'id' => 'trydo_enable_portfolio_share_linkedin',
                'type' => 'button_set',
                'title' => esc_html__('Linkedin', 'trydo'),
                'subtitle' => esc_html__('Show or hide the linkedin share button of portfolio single post.', 'trydo'),
                'options' => array(
                    'yes' => esc_html__('Show', 'trydo'),
                    'no' => esc_html__('Hide', 'trydo'),
                ),
                'default' => 'yes',
                'required' => array('trydo_enable_portfolio_share', 'equals', 'yes'),
            ),

            /**
             * Related portfolio
             */
            array(
                'id' => 'trydo_enable_related_portfolio',
                'type' => 'button_set',
                'title' => esc_html__('Related Portfolio', 'trydo'),
                'subtitle' => esc_html__('Show or hide the related portfolio area of portfolio single post bellow section.', 'trydo'),
                'options' => array(
                    'yes' => esc_html__('Show', 'trydo'),
                    'no' => esc_html__('Hide', 'trydo'),
                ),
                'default' => 'yes',
            ),
            array(
                'id' => 'trydo_related_portfolio_section_title_before_text',
                'type' => 'text',
                'title' => esc_html__('Section Title Before Text', 'trydo'),
                'default' => esc_html__('Related Work', 'trydo'),
                'required' => array('trydo_enable_related_portfolio', 'equals', 'yes'),
            ),
            array(
                'id' => 'trydo_related_portfolio_section_title_text',
                'type' => 'text',
                'title' => esc_html__('Section Title Text', 'trydo'),
                'default' => esc_html__('Our More Projects', 'trydo'),
                'required' => array('trydo_enable_related_portfolio', 'equals', 'yes'),
            ),

        )
    )
);

/**
 * Typography
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Typography', 'trydo'),
    'id' => 'trydo_fonts',
    'icon' => 'el el-fontsize',
    'fields' => array(
        array(
            'id' => 'trydo_b_typography',
            'type' => 'typography',
            'title' => esc_html__('Body Typography (Paragraph)', 'trydo'),
            'subtitle' => esc_html__('Controls the typography settings of the body.', 'trydo'),
            'google' => true,
            'color' => false,
            'subsets' => false,
            'word-spacing' => false,
            'letter-spacing' => false,
            'text-align' => false,
            'all_styles' => false,
            'output' => array('body, p'),
            'units' => 'px',
        ),
        array(
            'id' => 'trydo_h1_typography',
            'type' => 'typography',
            'always_display' => false,
            'color' => false,
            'title' => esc_html__('H1 Heading Typography', 'trydo'),
            'subtitle' => esc_html__('Controls the typography settings of the H1 heading.', 'trydo'),
            'google' => true,
            'text-transform' => false,
            'word-spacing' => false,
            'letter-spacing' => false,
            'subsets' => false,
            'text-align' => false,
            'all_styles' => false,
            'units' => 'px',
            'output' => array('h1, .h1'),
        ),
        array(
            'id' => 'trydo_h2_typography',
            'type' => 'typography',
            'always_display' => false,
            'color' => false,
            'title' => esc_html__('H2 Heading Typography', 'trydo'),
            'subtitle' => esc_html__('Controls the typography settings of the H2 heading.', 'trydo'),
            'google' => true,
            'text-transform' => false,
            'letter-spacing' => false,
            'word-spacing' => false,
            'subsets' => false,
            'text-align' => false,
            'all_styles' => false,
            'units' => 'px',
            'output' => array('h2, .h2'),
        ),
        array(
            'id' => 'trydo_h3_typography',
            'type' => 'typography',
            'always_display' => false,
            'color' => false,
            'title' => esc_html__('H3 Heading Typography', 'trydo'),
            'subtitle' => esc_html__('Controls the typography settings of the H3 heading.', 'trydo'),
            'google' => true,
            'text-transform' => false,
            'letter-spacing' => false,
            'word-spacing' => false,
            'subsets' => false,
            'text-align' => false,
            'all_styles' => false,
            'units' => 'px',
            'output' => array('h3, .h3'),
        ),
        array(
            'id' => 'trydo_h4_typography',
            'type' => 'typography',
            'always_display' => false,
            'color' => false,
            'title' => esc_html__('H4 Heading Typography', 'trydo'),
            'subtitle' => esc_html__('Controls the typography settings of the H4 heading.', 'trydo'),
            'google' => true,
            'text-transform' => false,
            'word-spacing' => false,
            'letter-spacing' => false,
            'subsets' => false,
            'text-align' => false,
            'all_styles' => false,
            'units' => 'px',
            'output' => array('h4, .h4'),
        ),
        array(
            'id' => 'trydo_h5_typography',
            'type' => 'typography',
            'always_display' => false,
            'color' => false,
            'title' => esc_html__('H5 Heading Typography', 'trydo'),
            'subtitle' => esc_html__('Controls the typography settings of the H5 heading.', 'trydo'),
            'google' => true,
            'text-transform' => false,
            'word-spacing' => false,
            'letter-spacing' => false,
            'subsets' => false,
            'text-align' => false,
            'all_styles' => false,
            'units' => 'px',
            'output' => array('h5, .h5'),
        ),
        array(
            'id' => 'trydo_h6_typography',
            'type' => 'typography',
            'always_display' => false,
            'color' => false,
            'title' => esc_html__('H6 Heading Typography', 'trydo'),
            'subtitle' => esc_html__('Controls the typography settings of the H6 heading.', 'trydo'),
            'google' => true,
            'text-transform' => false,
            'word-spacing' => false,
            'letter-spacing' => false,
            'subsets' => false,
            'text-align' => false,
            'all_styles' => false,
            'units' => 'px',
            'output' => array('h6, .h6'),
        ),

    )
));

/**
 * 404 error page
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('404 Page', 'trydo'),
    'id' => 'trydo_error_page',
    'icon' => 'el el-eye-close',
    'fields' => array(
        array(
            'id' => 'trydo_404_title',
            'type' => 'text',
            'title' => esc_html__('Title', 'trydo'),
            'subtitle' => esc_html__('Add your Default title.', 'trydo'),
            'default' => esc_html__('404!', 'trydo'),
        ),
        array(
            'id' => 'trydo_404_subtitle',
            'type' => 'text',
            'title' => esc_html__('Sub Title', 'trydo'),
            'subtitle' => esc_html__('Add your custom subtitle.', 'trydo'),
            'default' => esc_html__('Page not found', 'trydo'),
        ),
        array(
            'id' => 'trydo_404_desc',
            'type' => 'text',
            'title' => esc_html__('Description', 'trydo'),
            'subtitle' => esc_html__('Add your custom description.', 'trydo'),
            'default' => esc_html__('The page you were looking for could not be found.', 'trydo'),
        ),
        array(
            'id' => 'trydo_enable_go_back_btn',
            'type' => 'button_set',
            'title' => esc_html__('Button', 'trydo'),
            'subtitle' => esc_html__('Enable or disable the go to home page button.', 'trydo'),
            'options' => array(
                'yes' => 'Enable',
                'no' => 'Disable'
            ),
            'default' => 'yes'
        ),
        array(
            'id' => 'trydo_404_button_text',
            'type' => 'text',
            'title' => esc_html__('Button Text', 'trydo'),
            'subtitle' => esc_html__('Set the custom text of go to home page button.', 'trydo'),
            'default' => esc_html__('Back To Homepage', 'trydo'),
            'required' => array('trydo_enable_go_back_btn', 'equals', 'yes'),
        ),
    )
));


/**
 * WooCommerce
 */
if ( class_exists( 'WooCommerce' ) ) {

Redux::setSection($opt_name, array(
    'title' => esc_html__('WooCommerce', 'trydo'),
    'id' => 'woo_Settings_section',
    'icon' => 'el el-shopping-cart',
));
/**
 * WooCommerce Archive
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('General', 'trydo'),
    'id' => 'wc_sec_general',
    'icon' => 'el el-folder-open',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'wc_general_sidebar',
            'type' => 'image_select',
            'title' => esc_html__('Select Shop Sidebar', 'trydo'),
            'subtitle' => esc_html__('Choose your favorite shop layout', 'trydo'),
            'options' => array(
                'left' => array(
                    'alt' => esc_html__('Left Sidebar', 'trydo'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/left-sidebar.png',
                    'title' => esc_html__('Left Sidebar', 'trydo'),
                ),
                'right' => array(
                    'alt' => esc_html__('Right Sidebar', 'trydo'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/right-sidebar.png',
                    'title' => esc_html__('Right Sidebar', 'trydo'),
                ),
                'no' => array(
                    'alt' => esc_html__('No Sidebar', 'trydo'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/no-sidebar.png',
                    'title' => esc_html__('No Sidebar', 'trydo'),
                ),
            ),
            'default' => 'no',
        ),
        array(
            'id'       => 'wc_num_product_per_row',
            'type'     => 'text',
            'title'    => esc_html__( 'Number of Products Per Row', 'trydo' ),
            'default'  => '3',
        ),
        array(
            'id'       => 'wc_num_product',
            'type'     => 'text',
            'title'    => esc_html__( 'Number of Products Per Page', 'trydo' ),
            'default'  => '12',
        ),
    )
));
/**
 * WooCommerce Single Page
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Product Single Page', 'trydo'),
    'id' => 'wc_sec_product',
    'icon' => 'el el-folder-open',
    'subsection' => true,
    'fields' => array(
        array(
            'id'       => 'wc_cats',
            'type'     => 'switch',
            'title'    => esc_html__( 'Categories', 'trydo' ),
            'on'       => esc_html__( 'Show', 'trydo' ),
            'off'      => esc_html__( 'Hide', 'trydo' ),
            'default'  => true,
        ),
        array(
            'id'       => 'wc_tags',
            'type'     => 'switch',
            'title'    => esc_html__( 'Tags', 'trydo' ),
            'on'       => esc_html__( 'Show', 'trydo' ),
            'off'      => esc_html__( 'Hide', 'trydo' ),
            'default'  => true,
        ),
        array(
            'id'       => 'wc_related',
            'type'     => 'switch',
            'title'    => esc_html__( 'Related Products', 'trydo' ),
            'on'       => esc_html__( 'Show', 'trydo' ),
            'off'      => esc_html__( 'Hide', 'trydo' ),
            'default'  => true,
        ),
        array(
            'id'       => 'wc_description',
            'type'     => 'switch',
            'title'    => esc_html__( 'Description Tab', 'trydo' ),
            'on'       => esc_html__( 'Show', 'trydo' ),
            'off'      => esc_html__( 'Hide', 'trydo' ),
            'default'  => true,
        ),
        array(
            'id'       => 'wc_reviews',
            'type'     => 'switch',
            'title'    => esc_html__( 'Reviews Tab', 'trydo' ),
            'on'       => esc_html__( 'Show', 'trydo' ),
            'off'      => esc_html__( 'Hide', 'trydo' ),
            'default'  => true,
        ),
        array(
            'id'       => 'wc_additional_info',
            'type'     => 'switch',
            'title'    => esc_html__( 'Additional Information Tab', 'trydo' ),
            'on'       => esc_html__( 'Show', 'trydo' ),
            'off'      => esc_html__( 'Hide', 'trydo' ),
            'default'  => true,
        ),
    )
));
/**
 * WooCommerce Cart Page
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Cart page', 'trydo'),
    'id' => 'wc_sec_cart',
    'icon' => 'el el-folder-open',
    'subsection' => true,
    'fields' => array(
        array(
            'id'       => 'wc_cross_sell',
            'type'     => 'switch',
            'title'    => esc_html__( 'Cross Sell Products', 'trydo' ),
            'on'       => esc_html__( 'Show', 'trydo' ),
            'off'      => esc_html__( 'Hide', 'trydo' ),
            'default'  => true,
        ),
    )
));
} // End WooCommerce
