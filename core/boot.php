<?php

/**
 * Juris Digital Core Boot check
 *
 * @package Juris Digital
 * @subpackage Juris Digital Core
 */

// Check class or constants conflict relative to other active plugins
if (class_exists('WPLNST_Core_Alive') || defined('JRDIGI_VERSION') || defined('JRDIGI_FILE') || defined('JRDIGI_PATH')) {
	
	// No execution allowed
	trigger_error(__('Detected another version of Jurius Digital already active. Please deactivate it before and try again to activate this plugin.', 'jrdigi'), E_USER_ERROR);

// Check WP version via checking version expected function, because $wp_version may have been overwritten
} elseif (function_exists('add_action') && !function_exists('is_main_query')) {
	
	// No compatible WP version
	trigger_error(__('Sorry, this version of Jurius Digital requires WordPress 5.0 or later.', 'jrdigi'), E_USER_ERROR);
}
