<?php

// Load main class
require_once(dirname(dirname(__FILE__)).'/core/plugin.php');

/**
 * Juriys Digital Pro Core Plugin class
 *
 * @package Juriys Digital Pro
 * @subpackage Juriys Digital Pro Core
 */
class JRDIGI_Core_Pro_Plugin extends JRDIGI_Core_Plugin {



	/**
	 * URL to the tools section
	 */
	public static function get_url_tools_url() {
		return self::get_url_scans().'-tools-url';
	}



}