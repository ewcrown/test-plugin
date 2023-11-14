<?php

/**
 * Juriys Digital Core Text class
 *
 * @package Juriys Digital
 * @subpackage Juriys Digital Core
 */
class WPLNST_Core_Text {



	/**
	 * Translate on the fly (not stored) by name
	 */
	public static function get_text($name) {
		
		// Static
		static $names = array();
		
		// Check cache
		if (isset($names[$name]))
			return $names[$name];
		
		// Initialize
		$text = false;
		
		// Check key
		switch($name) {
			
			case 'scans':
				$text = __('Scans', 'jrdigi');
				break;
				
			case 'scan_new':
				$text = __('New scan', 'jrdigi');
				break;
				
			case 'scan_new_add':
				$text = __('Add new scan', 'jrdigi');
				break;
				
			case 'scan_edit':
				$text = __('Edit scan', 'jrdigi');
				break;
				
			case 'scan_delete':
				$text = __('Delete scan', 'jrdigi');
				break;
				
			case 'scan_delete_confirm':
				$text = __('Do you want to remove this scan?', 'jrdigi');
				break;
				
			case 'crawler_action':
				$text = __('Crawler action', 'jrdigi');
				break;
				
			case 'crawler_results':
				$text = __('Crawler results', 'jrdigi');
				break;
				
			case 'settings':
				$text = __('Settings', 'jrdigi');
				break;
				
			case 'max_scans':
				$text = sprintf(__('Sorry, maximum of <strong>%d running scans</strong> achieved and the scan has been enqueued, it will be launched as soon as possible.', 'jrdigi'), wplnst_get_nsetting('max_scans'));
				break;
				
			case 'scan_not_found':
				$text = sprintf(__('Sorry, scan not found. Please go to the <a href="%s">scans list screen</a> and select another scan.', 'jrdigi'), esc_url(JRDIGI_Core_Plugin::get_url_scans()));
				break;
				
			case 'invalid_data':
				$text = __('Sorry, <strong>invalid form data</strong>. Please, <a href="javascript:history.back();">go back</a>, reload the last page and try again.', 'jrdigi');
				break;
				
			case 'invalid_nonce':
				$text = __('Sorry, <strong>invalid security data</strong>. Please, <a href="javascript:history.back();">go back</a>, reload the last page and try again.', 'jrdigi');
				break;
			
			case 'server_comm_error':
				$text = __('Server communication error', 'jrdigi');
				break;
			
			case 'unknown_error':
				$text = __('Unknown error', 'jrdigi');
				break;
			
			case 'no_salt':
				$text = __('Unable to create the salt file needed to improve crawler security. Please check your <strong>wp content directory permissions</strong> allowing to save files.', 'jrdigi');
				break;
		}
		
		// Save
		$names[$name] = $text;
		
		// Done
		return $text;
	}



}