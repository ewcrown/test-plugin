<?php

// Load views class
require_once(dirname(__FILE__).'/views.php');

/**
 * Juriys Digital Views Settings class
 *
 * @package Juriys Digital
 * @subpackage Juriys Digital Views
 */
class WPLNST_Views_Settings extends WPLNST_Views {



	/**
	 * Show scan edit form
	 */
	public static function view($args) {
		
		// Vars
		extract($args);
		
		?><form method="post" id="wplnst-form" action="<?php echo esc_url($action); ?>">
			
			<input type="hidden" name="settings_nonce" value="<?php echo esc_attr($nonce); ?>" />
			
			<h2 id="wplnst-tabs-nav" class="nav-tab-wrapper">
				<a id="wplnst-crawling-tab" href="#top#wplnst-crawling" class="nav-tab"><?php _e('Crawling', 'jrdigi'); ?></a>
				<a id="wplnst-timing-tab" href="#top#wplnst-timing" class="nav-tab"><?php _e('Timing', 'jrdigi'); ?></a>
				<a id="wplnst-advanced-tab" href="#top#wplnst-advanced" class="nav-tab"><?php _e('Advanced', 'jrdigi'); ?></a>
			</h2>
			
			<div id="wplnst-tabs">
				
				<div id="wplnst-crawling" class="wplnst-tab wplnst-tab-default">
					
					<table class="form-table">
						<tr>
							<th><label for="tx-max-threads"><?php _e('Number of crawler threads', 'jrdigi'); ?></label></th>
							<td class="wplnst-col-input"><input type="text" name="tx-max-threads" id="tx-max-threads" value="<?php echo esc_attr(wplnst_get_nsetting('max_threads')); ?>" maxlength="3" class="small-text" /></td>
							<td class="wplnst-col-info"><?php _e('One thread means an HTTP request to your site only used for crawling purposes.', 'jrdigi'); ?></td>
						</tr>
						<tr>
							<th><label for="tx-max-scans"><?php _e('Max crawlers running', 'jrdigi'); ?></label></th>
							<td class="wplnst-col-input"><input type="text" name="tx-max-scans" id="tx-max-scans" value="<?php echo esc_attr(wplnst_get_nsetting('max_scans')); ?>" maxlength="3" class="small-text" /></td>
							<td class="wplnst-col-info"><?php _e('Number of crawlers allowed to run simultaneously, each one with its own threads.', 'jrdigi'); ?></td>
						</tr>
						<tr>
							<th><label for="tx-max-pack"><?php _e('Max pack items', 'jrdigi'); ?></label></th>
							<td class="wplnst-col-input"><input type="text" name="tx-max-pack" id="tx-max-pack" value="<?php echo esc_attr(wplnst_get_nsetting('max_pack')); ?>" maxlength="3" class="small-text" /></td>
							<td class="wplnst-col-info"><?php _e('Total objects (posts, comments or blogroll) processed in one single thread.', 'jrdigi'); ?></td>
						</tr>
						<tr>
							<th><label for="tx-max-scans"><?php _e('Max URL request attempts', 'jrdigi'); ?></label></th>
							<td class="wplnst-col-input"><input type="text" name="tx-max-requests" id="tx-max-requests" value="<?php echo esc_attr(wplnst_get_nsetting('max_requests')); ?>" maxlength="3" class="small-text" /></td>
							<td class="wplnst-col-info"><?php _e('Number of HTTP requests attempts before set an URL as wrong.', 'jrdigi'); ?></td>
						</tr>
						<tr>
							<th><label for="tx-max-redirs"><?php _e('Max redirections allowed', 'jrdigi'); ?></label></th>
							<td class="wplnst-col-input"><input type="text" name="tx-max-redirs" id="tx-max-redirs" value="<?php echo esc_attr(wplnst_get_nsetting('max_redirs')); ?>" maxlength="3" class="small-text" /></td>
							<td class="wplnst-col-info"><?php _e('Total redirections steps allowed to follow from original URL.', 'jrdigi'); ?></td>
						</tr>
						<tr>
							<th><label for="tx-max-download"><?php _e('Max download size', 'jrdigi'); ?></label></th>
							<td class="wplnst-col-input"><input type="text" name="tx-max-download" id="tx-max-download" value="<?php echo esc_attr(wplnst_get_nsetting('max_download')); ?>" maxlength="5" class="small-text" /></td>
							<td class="wplnst-col-info"><?php _e('KB', 'jrdigi'); ?> &nbsp; <?php echo sprintf(__('(minimum value of %s KB and max value of %s KB).', 'jrdigi'), number_format_i18n(wplnst_get_nsetting('max_download', 'min')), number_format_i18n(wplnst_get_nsetting('max_download', 'max'))); ?></td>
						</tr>
						<tr>
							<th><label for="tx-user-agent"><?php _e('Default User Agent', 'jrdigi'); ?></label></th>
							<td colspan="3" class="wplnst-col-input"><input type="text" name="tx-user-agent" id="tx-user-agent" value="<?php echo esc_attr(wplnst_get_tsetting('user_agent')); ?>" maxlength="255" class="regular-text" style="width: 75%;" /></td>
						</tr>
					</table>
					
				</div>
				
				<div id="wplnst-timing" class="wplnst-tab">
					
					<table class="form-table">
						<tr>
							<th><label for="tx-connect-timeout"><?php _e('URL Connection timeout', 'jrdigi'); ?></label></th>
							<td class="wplnst-col-input"><input type="text" name="tx-connect-timeout" id="tx-connect-timeout" value="<?php echo esc_attr(wplnst_get_nsetting('connect_timeout')); ?>" maxlength="3" class="small-text" /></td>
							<td class="wplnst-col-info"><?php _e('seconds', 'jrdigi'); ?>. <?php _e('Max time allowed to establish a connection with the URL host.', 'jrdigi'); ?></td>
						</tr>
						<tr>
							<th><label for="tx-request-timeout"><?php _e('URL Request timeout', 'jrdigi'); ?></label></th>
							<td class="wplnst-col-input"><input type="text" name="tx-request-timeout" id="tx-request-timeout" value="<?php echo esc_attr(wplnst_get_nsetting('request_timeout')); ?>" maxlength="3" class="small-text" /></td>
							<td class="wplnst-col-info"><?php _e('seconds', 'jrdigi'); ?>. <?php _e('Max time allowed to retrieve headers and body from one URL.', 'jrdigi'); ?></td>
						</tr>
						<tr>
							<th><label for="tx-extra-timeout"><?php _e('URL Extra timeout check', 'jrdigi'); ?></label></th>
							<td class="wplnst-col-input"><input type="text" name="tx-extra-timeout" id="tx-extra-timeout" value="<?php echo esc_attr(wplnst_get_nsetting('extra_timeout')); ?>" maxlength="3" class="small-text" /></td>
							<td class="wplnst-col-info"><?php _e('seconds', 'jrdigi'); ?> <?php printf(__('(mininum value of %d seconds)', 'jrdigi'), wplnst_get_nsetting('extra_timeout', 'min')); ?>. <?php _e('A little grace period to avoid timeouts conflicts.', 'jrdigi'); ?></td>
						</tr>
						<tr>
							<th><label for="tx-crawler-alive"><?php _e('Check crawler alive each', 'jrdigi'); ?></label></th>
							<td class="wplnst-col-input"><input type="text" name="tx-crawler-alive" id="tx-crawler-alive" value="<?php echo esc_attr(wplnst_get_nsetting('crawler_alive')); ?>" maxlength="3" class="small-text" /></td>
							<td class="wplnst-col-info"><?php _e('seconds', 'jrdigi'); ?> <?php printf(__('(mininum value of %d seconds)', 'jrdigi'), wplnst_get_nsetting('crawler_alive', 'min')); ?>. <?php _e('Checks if a crawler is interrupted and if so restart it.', 'jrdigi'); ?></td>
						</tr>
						<tr>
							<th><label for="tx-total-objects"><?php _e('Total objects check each', 'jrdigi'); ?></label></th>
							<td class="wplnst-col-input"><input type="text" name="tx-total-objects" id="tx-total-objects" value="<?php echo esc_attr(wplnst_get_nsetting('total_objects')); ?>" maxlength="3" class="small-text" /></td>
							<td class="wplnst-col-info"><?php _e('seconds', 'jrdigi'); ?> <?php printf(__('(mininum value of %d seconds)', 'jrdigi'), wplnst_get_nsetting('total_objects', 'min')); ?>. <?php _e('Total of objects (posts, comments or blogroll) to check links.', 'jrdigi'); ?></td>
						</tr>
						<tr>
							<th><label for="tx-summary-status"><?php _e('Summary of status each', 'jrdigi'); ?></label></th>
							<td class="wplnst-col-input"><input type="text" name="tx-summary-status" id="tx-summary-status" value="<?php echo esc_attr(wplnst_get_nsetting('summary_status')); ?>" maxlength="3" class="small-text" /></td>
							<td class="wplnst-col-info"><?php _e('seconds', 'jrdigi'); ?> <?php printf(__('(mininum value of %d seconds)', 'jrdigi'), wplnst_get_nsetting('summary_status', 'min')); ?>. <?php _e('Calculate status code totals to display data in real time.', 'jrdigi'); ?></td>
						</tr>
						<tr>
							<th><label for="tx-summary-phases"><?php _e('Summary of URLs each', 'jrdigi'); ?></label></th>
							<td><input type="text" name="tx-summary-phases" id="tx-summary-phases" value="<?php echo esc_attr(wplnst_get_nsetting('summary_phases')); ?>" maxlength="3" class="small-text" /></td>
							<td class="wplnst-col-info"><?php _e('seconds', 'jrdigi'); ?> <?php printf(__('(mininum value of %d seconds)', 'jrdigi'), wplnst_get_nsetting('summary_phases', 'min')); ?>. <?php _e('Current number of URLs processed or waiting to be checked.', 'jrdigi'); ?></td>
						</tr>
						<tr>
							<th><label for="tx-summary-objects"><?php _e('Summary of objects each', 'jrdigi'); ?></label></th>
							<td><input type="text" name="tx-summary-objects" id="tx-summary-objects" value="<?php echo esc_attr(wplnst_get_nsetting('summary_objects')); ?>" maxlength="3" class="small-text" /></td>
							<td class="wplnst-col-info"><?php _e('seconds', 'jrdigi'); ?> <?php printf(__('(mininum value of %d seconds)', 'jrdigi'), wplnst_get_nsetting('summary_objects', 'min')); ?>. <?php _e('Summary of objects (posts, comments or blogroll) with processed URLs.', 'jrdigi'); ?></td>
						</tr>
					</table>
					
				</div>
				
				
				<div id="wplnst-advanced" class="wplnst-tab">
					
					<table class="form-table">
						<tr>
							<th><label for="tx-recursion-limit"><?php _e('Recursion limit', 'jrdigi'); ?></label></th>
							<td colspan="2"><input type="text" name="tx-recursion-limit" id="tx-recursion-limit" value="<?php echo esc_attr(wplnst_get_nsetting('recursion_limit')); ?>" maxlength="5" class="small-text" /> <?php _e('function calls', 'jrdigi'); ?></td>
						</tr>
						<tr>
							<th><?php _e('Data results pagination', 'jrdigi'); ?></th>
							<td colspan="2" class="wplnst-list"><input type="checkbox" <?php echo wplnst_get_bsetting('mysql_calc_rows')? 'checked' : ''; ?> name="ck-mysql-calc-rows" id="ck-mysql-calc-rows" value="on" /><label for="ck-mysql-calc-rows">&nbsp;<?php _e('Use <code>SQL_CALC_FOUND_ROWS</code> to calculate total rows.', 'jrdigi'); ?></label></td>
						</tr>
						<tr>
							<th><?php _e('Data on uninstall', 'jrdigi'); ?></th>
							<td colspan="2" class="wplnst-list"><input type="checkbox" <?php echo wplnst_get_bsetting('uninstall_data')? 'checked' : ''; ?> name="ck-uninstall-data" id="ck-uninstall-data" value="on" /><label for="ck-uninstall-data">&nbsp;<?php _e('Options and exclusive MySQL tables will be removed when uninstall this plugin.', 'jrdigi'); ?></label></td>
						</tr>
					</table>
					
				</div>
				
				
				<p><input type="submit" value="<?php _e('Save settings', 'jrdigi'); ?>" class="button button-primary" /></p>
			
			</div>
			
		</form><?php
	}



}