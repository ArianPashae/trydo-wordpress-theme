<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package trydo
 */

class TGM_Config {
    public $prefix = RBT_THEME_PREFIX;
    public $path = "http://rainbowit.net/themes/trydo/demo/plugins/";

	public function __construct() {
		add_action( 'tgmpa_register', array( $this, 'rbt_tgn_plugins' ) );
	}

	public function rbt_tgn_plugins(){
		$plugins = array(	
			array(
				'name'         => esc_html__('Trydo Core','trydo'),
				'slug'         => 'trydo-core',
				'source'       => 'trydo-core.zip',
				'required'     =>  true,
				'version'      => '1.0'
			),
            array(
                'name'      => esc_html__('Advanced Custom Fields Pro', 'trydo'),
                'slug'      => 'advanced-custom-fields-pro',
                'source'	=> 'advanced-custom-fields-pro.zip',
                'required'  => true,
            ),
					
			// Repository
			array(
				'name'     => esc_html__('Redux Framework','trydo'),
				'slug'     => 'redux-framework',
				'required' => true,
			),
			array(
				'name'     => esc_html__('Elementor Page Builder','trydo'),
				'slug'     => 'elementor',
				'required' => true,
			),
			array(
				'name'     => esc_html__('Contact Form 7','trydo'),
				'slug'     => 'contact-form-7',
				'required' => false,
			),
            array(
                'name'      => esc_html__('One Click Demo', 'trydo'),
                'slug'      => 'one-click-demo-import',
                'required'  => true,
            )

		);

		$config = array(
			'id'           => $this->prefix,            // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => $this->path,              // Default absolute path to bundled plugins.
			'menu'         => $this->prefix . '-install-plugins', // Menu slug.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                    // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		);

		tgmpa( $plugins, $config );
	}
}

new TGM_Config;