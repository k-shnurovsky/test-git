<?php

class BS_Autorun {

	public function __construct() {
		switch_theme('bs24');

		$required_plugins = array(
			/*'advanced-custom-fields-pro' => 'acf.php',
			'capability-manager-enhanced' => 'capsman-enhanced.php',
			'cookie-notice' => 'cookie-notice.php',
			'disable-comments' => 'disable-comments.php',
			'redirection' => 'redirection.php',
			'sitepress-multilingual-cms' => 'sitepress.php',
			'timber-library' => 'timber.php',
			'wordpress-seo' => 'wp-seo.php',
			'wpml-media-translation' => 'plugin.php',
			'wpml-string-translation' => 'plugin.php',
			'wpml-translation-management' => 'plugin.php',
			'wp-robots-txt' => 'robots-txt.php',
			'seventyseven-registration' => 'seventyseven-registration.php',
			'seventyseven-meta-cache' => 'seventyseven-meta-cache.php'*/
		);

		foreach( $required_plugins as $folder => $runfile ) {
			$this->plugin_activation( $folder . '/' . $runfile );
		}

		$this->configure_wpml();
		$this->wp_settings();
	}

	private function plugin_activation( $plugin ) {
	    if( ! function_exists('activate_plugin') ) {
	        require_once ABSPATH . 'wp-admin/includes/plugin.php';
	    }

	    if( ! is_plugin_active( $plugin ) ) {
	        return activate_plugin( $plugin );
	    }
	}

	private function wpml_settings( $langs ) {
		global $sitepress;

		$sitepress->set_active_languages($langs);
	}

	private function configure_wpml() {
        $settings = get_option('icl_sitepress_settings');
	    if ( (bool) $settings === false ) {
	        icl_sitepress_activate();
	    
	        $setup_instance = wpml_get_setup_instance();
	        $setup_instance->finish_step1( 'it' ); // default language
	        $setup_instance->set_active_languages( array('it', 'en') );
	        $setup_instance->finish_installation();
	 
	        $sitepress                                          = new \SitePress();
	        $settings                                           = $sitepress->get_settings();
	        $settings['sync_delete']                            = 1;
	        $settings['sync_delete_tax']                        = 1;
	        $settings['language_negotiation_type']              = 1; // Use directories for languages
	        $settings['urls']['directory_for_default_language'] = 0;
	/* 
	        $settings['taxonomies_sync_option']['useful_info_category​']    = 1;
	        $settings['taxonomies_sync_option']['touristic_info_category​'] = 1;
	*/ 
	        $sitepress->save_settings( $settings );
	 
            $settings_helper = wpml_load_settings_helper();
            $settings_helper->set_post_type_translatable( 'bs24_emails' );
	/* 
	        $settings_helper = wpml_load_settings_helper();
	        $settings_helper->set_post_type_translatable( 'geographical_zone' );
	        $settings_helper->set_post_type_translatable( 'hotel' );
	        $settings_helper->set_post_type_translatable( 'useful_info' );
	        $settings_helper->set_post_type_translatable( 'touristic_info' );
	*/ 
	 
	//      The removed function : $sitepress->update_wpml_config_index_event();
	        $http               = new \WP_Http();
	        $update_wpml_config = new \WPML_Config_Update( $sitepress, $http );
	        $update_wpml_config->run();
	    }
    }

    private function wp_settings() {
    	global $wp_rewrite;
    	$wp_rewrite->set_permalink_structure( '/%postname%/' );

    	update_option( 'users_can_register', 1 );
    }

}

if ( is_blog_installed() ) {
    new BS_Autorun;
}