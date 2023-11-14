<?php

/**
 * Juriys Digital Core Util functions
 *
 * @package Juriys Digital
 * @subpackage Juriys Digital Core
 */



// Load dependencies
require_once(dirname(__FILE__).'/settings.php');



/**
 * Requires a plugin file
 */
function jrdigi_require($section, $filename) {
	require_once(JRDIGI_PATH.'/'.$section.'/'.$filename.'.php');
}



/**
 * Requires multiple files for the same section
 */
function jrdigi_require_section($section, $filenames) {
	foreach ($filenames as $filename)
		jrdigi_require($section, $filename);
}



/**
 * Return a numeric setting
 */
function wplnst_get_nsetting($name, $value = 0) {
	return WPLNST_Core_Settings::get_nsetting($name, $value);
}



/**
 * Return a boolean setting
 */
function wplnst_get_bsetting($name, $default = false) {
	return WPLNST_Core_Settings::get_bsetting($name, $default);
}



/**
 * Return a text setting
 */
function wplnst_get_tsetting($name, $default = true) {
	return WPLNST_Core_Settings::get_tsetting($name, $default);
}



/**
 * Check if cURL is enabled in this system
 */
function wplnst_is_curl_enabled() {
	
	// Last status
	static $is_enabled;
	if (isset($is_enabled))
		return $is_enabled;
	
	// Simple check, but it may have been overwritten
	if (!function_exists('curl_version')) {
		$is_enabled = false;
		return false;
	}
	
	// Check extension
	$extensions = @get_loaded_extensions();
	if (!empty($extensions) && is_array($extensions) && in_array('curl', $extensions)) {
		$is_enabled = true;
		return true;
	}
	
	// Not found
	$is_enabled = false;
	return false;
}



/**
 * Check debug flag
 */
function wplnst_is_debug() {
	return (defined('WPLNST_DEBUG') && WPLNST_DEBUG);
}



/**
 * Output plugin debug
 */
function wplnst_debug($message, $tag = '') {
	
	// Check debug
	if (!wplnst_is_debug())
		return;
	
	// Default output
	if (!defined('WPLNST_DEBUG_OUTPUT') || 'error_log' == WPLNST_DEBUG_OUTPUT)
		error_log('WPLNST'.(empty($tag)? '' : ' ['.$tag.']').' - '.$message);
}