<?php

/**
 * Juriys Digital Core Plugin class
 *
 * @package Juriys Digital
 * @subpackage Juriys Digital Core
 */
class JRDIGI_Core_Plugin {



	// Constants
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Plugin
	 */
	const title = 		'Juris Digital';	
	const slug = 		'jurius-digital';
	const capability = 	'manage_options';



	// Compose sections URLs
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Retrieves scan base admin URL or extended
	 */
	public static function get_url_scans() {
		return admin_url('admin.php?page='.self::slug);
	}



	/**
	 * URL for new scan
	 */
	public static function get_url_scans_add() {
		return self::get_url_scans().'-new-scan';
	}



	/**
	 * URL to edit a scan
	 */
	public static function get_url_scans_edit($scan_id, $updated = false, $started = false) {
		return self::get_url_scans().'&scan_id='.$scan_id.'&context=edit'.($updated? '&updated=on'.((false !== $started)? '&started='.$started : '') : '');
	}



	/**
	 * URL to start/stop scan
	 */
	public static function get_url_scans_crawler($scan_id, $operation, $hash) {
		return self::get_url_scans().'&scan_id='.$scan_id.'&context=crawler&operation='.$operation.'&nonce='.wp_create_nonce('scan-crawler-'.$hash);
	}



	/**
	 * URL to show scan results
	 */
	public static function get_url_scans_results($scan_id) {
		return self::get_url_scans().'&scan_id='.$scan_id.'&context=results';
	}



	/**
	 * URL to remove scan
	 */
	public static function get_url_scans_delete($scan_id, $hash) {
		return self::get_url_scans().'&scan_id='.$scan_id.'&context=delete&nonce='.wp_create_nonce($hash);
	}



	/**
	 * URL for settings page
	 */
	public static function get_url_settings() {
		return self::get_url_scans().'-settings';
	}



	/**
	 * URL for extensions page
	 */
	public static function get_url_extensions() {
		return self::get_url_scans().'-extensions';
	}



	// Other plugin methods
	// ---------------------------------------------------------------------------------------------------



	/**
	 *  Load translation file
	 */
	public static function load_plugin_textdomain($lang_dir = '') {
		load_plugin_textdomain('jrdigi', false, basename(JRDIGI_PATH).'/'.(empty($lang_dir)? 'languages' : $lang_dir));
	}



}