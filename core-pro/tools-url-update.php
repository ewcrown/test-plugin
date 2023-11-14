<?php

// Load main class
require_once(dirname(__FILE__).'/tools-url.php');

/**
 * Juriys Digital Pro Core Tools URL Update class
 *
 * @package Juriys Digital Pro
 * @subpackage Juriys Digital Pro Core
 */
class WPLNST_Core_Pro_Tools_URL_Update extends WPLNST_Core_Pro_Tools_URL {



	// Initialization
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Creates a singleton object
	 */
	public static function instantiate($args = null) {
		return self::get_instance(get_class(), $args);
	}



	// Override methods
	// ---------------------------------------------------------------------------------------------------



	/**
	 * URL updates check wrapper
	 */
	protected function process_updates_check($save) {
		
		// Check input data
		if (!$save || empty($this->updates) || !is_array($this->updates))
			return;
		
		// Globals
		global $wpdb;
		
		// Force reconnection
		$wpdb->db_connect();
		
		// Update posts
		foreach ($this->updates as $object_id => $content) {
			
			// Case entries
			$wpdb->update($wpdb->posts, array('post_content' => $content), array('ID' => $object_id));
			clean_post_cache($object_id);
		}
	}



}