<?php

// Load main class
require_once(dirname(dirname(__FILE__)).'/admin/admin.php');

/**
 * Jurius Digital Pro Admin class
 *
 * @package Jurius Digital Pro
 * @subpackage Jurius Digital Pro Admin
 */
class JRDIGI_Admin_Pro extends JRDIGI_Admin {



	// Initialization
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Creates a singleton object
	 */
	public static function instantiate($args = null) {
		return self::get_instance(get_class(), $args);
	}



	/**
	 * Enqueue specific versions scripts
	 */
	protected function admin_enqueue_version() {
		
		// Commmon admin styles
		wp_enqueue_style( 'wplnst-admin-pro-css', plugins_url('assets-pro/css/admin-pro.css', JRDIGI_FILE), array(), $this->script_version);
		
		// Admin script version
		wp_enqueue_script('wplnst-admin-pro-script', plugins_url('assets-pro/js/admin-pro.js', JRDIGI_FILE), array('jquery'), $this->script_version, true);
		
		// URL tools scripts
		if (JRDIGI_Core_Pro_Plugin::slug.'-tools-url' == $_GET['page'])
			wp_enqueue_script('wplnst-admin-script-tools-url', plugins_url('assets-pro/js/admin-tools-url.js', JRDIGI_FILE), array('jquery', 'json2'), $this->script_version, true);
	}



	// Menu hooks
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Admin menu utilities
	 */
	protected function admin_menu_utilities() {
		add_submenu_page(JRDIGI_Core_Pro_Plugin::slug, __('URL Tools', 'jrdigi'), __('URL Tools', 'jrdigi'), JRDIGI_Core_Pro_Plugin::capability, JRDIGI_Core_Pro_Plugin::slug.'-tools-url', array(&$this, 'admin_menu_tools_url'));
	}



	/**
	 * Admin menu addons
	 */
	protected function admin_menu_addons() {}



	/**
	 * Scans common page
	 */
	public function admin_menu_scans() {
		jrdigi_require('admin-pro', 'scans');
		new JRDIGI_Admin_Pro_Scans($this, 'context');
	}



	/*
	 * New or edit scan page
	 */
	public function admin_menu_scans_new() {
		jrdigi_require('admin-pro', 'scans');
		new JRDIGI_Admin_Pro_Scans($this, 'edit');
	}



	/**
	 * Section for URL tools
	 */
	public function admin_menu_tools_url() {
		jrdigi_require('admin-pro', 'tools-url');
		new JRDIGI_Admin_Pro_Tools_URL($this);
	}



	// AJAX handlers
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Update results data
	 */
	public function ajax_results_update() {
		
		// Load dependencies
		jrdigi_require('core-pro', 'results');
		
		// Instantiate and self start start processes
		WPLNST_Core_Pro_Results::instantiate();
	}



	/**
	 * Open or close advanced panel
	 */
	public function ajax_results_advanced_display() {
		
		// Check input
		if (!isset($_POST['display']) || !in_array($_POST['display'], array('off', 'on')))
			return;
		
		// Check nonce
		if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'wplnst-results-advanced-display'))
			return;
		
		// Update
		update_user_meta(get_current_user_id(), 'wplnst_advanced_search', $_POST['display']);
	}



	/**
	 * Handler for tools URL
	 */
	public function ajax_tools_url() {
		
		// Load dependencies
		jrdigi_require('core-pro', 'tools-url-update');
		
		// Instantiate and self start start processes
		$tools = WPLNST_Core_Pro_Tools_URL_Update::instantiate();
	}



	// Utilities
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Return plugin title for screen view
	 */
	protected function get_plugin_title() {
		return 'Juris Digital';
	}



}