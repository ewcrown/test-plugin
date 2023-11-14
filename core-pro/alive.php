<?php

// Load main class
require_once(dirname(dirname(__FILE__)).'/core/alive.php');

/**
 * Juriys Digital Pro Core Alive class
 *
 * @package Juriys Digital Pro
 * @subpackage Juriys Digital Pro Core
 */
class WPLNST_Core_Pro_Alive extends WPLNST_Core_Alive {



	// Initialization
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Start check
	 */
	public static function check() {
		self::start(get_class());
	}



	/**
	 * Specific version components at start
	 */
	protected static function start_version() {
		
		// Plugin definitions
		jrdigi_require('core-pro', 'plugin');
	}



	// Override methods
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Load a crawler instance
	 */
	protected static function instantiate_crawler($scan_row, $thread_id) {
		
		// Load dependencies
		jrdigi_require('core-pro', 'crawler');
		
		// Instance
		WPLNST_Core_Pro_Crawler::instantiate(array(
			'scan_id' 		=> $scan_row->scan_id,
			'thread_id' 	=> $thread_id,
			'crawler_url' 	=> parent::get_crawler_url($scan_row->scan_id, $scan_row->hash, $thread_id),
		));
	}



}