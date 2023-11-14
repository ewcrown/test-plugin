<?php

/**
 * Jurius Digital Admin Tools URL class
 *
 * @package Jurius Digital
 * @subpackage Jurius Digital Admin
 */
class JRDIGI_Admin_Pro_Tools_URL {



	/**
	 * Constructor
	 */
	public function __construct(&$admin) {
		
		// Custom action view
		add_action('wplnst_view_tools_url', array(&$this, 'view_tools_url'));
		
		// Show admin screen
		$admin->screen_view(array(
			'title' 		=> __('URL Tools', 'jrdigi'),
			'action_url'	=> JRDIGI_Core_Pro_Plugin::get_url_tools_url(),
			'action_ajax' 	=> 'wplnst_tools_url',
			'action_nonce'	=> 'wplnst_tools_url_nonce',
			'wp_action'		=> 'wplnst_view_tools_url',
		));
	}



	/**
	 * URL tools views
	 */
	public function view_tools_url($args) {
		
		// Load dependencies
		jrdigi_require('views-pro', 'tools-url');
		
		// Set paywall values
		$args['button_update_class'] = '';
		
		// Show Tools URL page
		JRDIGI_Views_Pro_Tools_URL::display($args);
	}



}