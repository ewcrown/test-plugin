<?php

/**
 * Jurius Digital Admin Extensions class
 *
 * @package Jurius Digital
 * @subpackage Jurius Digital Admin
 */
class JRDIGI_Admin_Extensions {



	/**
	 * Constructor
	 */
	public function __construct(&$admin) {
		
		// Custom action view
		add_action('wplnst_view_extensions', array(&$this, 'view_extensions'));
		
		// Show settings screen
		$admin->screen_view(array(
			'title' 	=> __('Extensions', 'jrdigi'),
			'wp_action'	=> 'wplnst_view_extensions',
			'action' 	=> JRDIGI_Core_Plugin::get_url_extensions(),
		));
	}



	/**
	 * Extension view for settings page
	 */
	public function view_extensions($args) {
		jrdigi_require('views', 'extensions');
		WPLNST_Views_Extensions::view($args);
	}



}