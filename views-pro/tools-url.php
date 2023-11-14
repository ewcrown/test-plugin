<?php

/**
 * Juriys Digital Views Pro Tools URL class
 *
 * @package Juriys Digital Pro
 * @subpackage Juriys Digital Pro Views
 */
class JRDIGI_Views_Pro_Tools_URL {



	/**
	 * Main view class
	 */
	public static function display($args) {
		
		// Vars
		extract($args);
		
		?><form id="wplnst-tu-form" method="post" action="<?php echo esc_url($action_url); ?>" data-confirm="<?php esc_attr_e('WordPress database will be updated, press Ok to continue', 'jrdigi'); ?>" data-nolinks="<?php esc_attr_e('Sorry, no links detected. Please enter some URLs.', 'jrdigi'); ?>" data-label-processing="<?php esc_attr_e('Processing', 'jrdigi'); ?>" data-label-updating="<?php esc_attr_e('Updating database', 'jrdigi'); ?>" data-label-testmode="<?php esc_attr_e('Test mode, no database changes', 'jrdigi'); ?>" data-label-cancel="<?php esc_attr_e('Cancel', 'jrdigi'); ?>" data-label-nofoundentries="<?php esc_attr_e('No found entries', 'jrdigi'); ?>" data-label-cancelling="<?php esc_attr_e('Cancelling', 'jrdigi'); ?>" data-label-cancelled="<?php esc_attr_e('Cancelled', 'jrdigi'); ?>" data-label-finished="<?php esc_attr_e('Finished', 'jrdigi'); ?>" data-label-processed="<?php esc_attr_e('Processed', 'jrdigi'); ?>" data-label-of="<?php esc_attr_e('of', 'jrdigi'); ?>" data-label-links="<?php esc_attr_e('links', 'jrdigi'); ?>" data-label-server-comm-error="<?php esc_attr_e(WPLNST_Core_Text::get_text('server_comm_error')); ?>" data-label-backtotheform="<?php esc_attr_e('Back to the form', 'jrdigi'); ?>">
			
			<input type="hidden" name="action" id="wplnst-tu-action" value="<?php echo $action_ajax; ?>" />
			<input type="hidden" name="nonce" id="wplnst-tu-nonce" value="<?php echo wp_create_nonce($action_nonce); ?>" />
			
			<div style="margin-bottom: 5px;">
				<label for="wplnst-tu-urls"><?php _e('Enter here the URLs, one per line:', 'jrdigi'); ?></label><br />
				<textarea name="urls" id="wplnst-tu-urls"></textarea><br />
			</div>
			
			<div class="wplnst-clearfix">
				
				<div class="alignleft">					
					<label for="wplnst-tu-op"><?php _e('Select operation', 'jrdigi'); ?>:</label>&nbsp;
					<select name="op" id="wplnst-tu-op">
						<option value="nofollow"><?php _e('Add link rel=&quot;nofollow&quot;', 'jrdigi'); ?> &nbsp;</option>
						<option value="dofollow"><?php _e('Remove &quot;nofollow&quot; from rel property', 'jrdigi'); ?> &nbsp;</option>
						<option value="remove"><?php _e('Remove link but leave anchor text', 'jrdigi'); ?> &nbsp;</option>
						<option value="redirect"><?php _e('Replace URL by its 301 redirection', 'jrdigi'); ?>&nbsp;</option>
						<option value="object"><?php _e('Remove &lt;object&gt; containing URL', 'jrdigi'); ?> &nbsp;</option>
					</select>&nbsp;
					<select name="db" id="wplnst-tu-mode">
						<option value="test"><?php _e('Test mode, no database updates', 'jrdigi'); ?></option>
						<option value="update"><?php _e('Update changes in database', 'jrdigi'); ?></option>
					</select>
				</div>
				
				<div class="alignright">
					<a id="wplnst-tu-button-test" class="button-primary<?php if (!wplnst_is_curl_enabled()) echo ' button-disabled'; ?>" href="#"><?php _e('Execute Test Process', 'jrdigi'); ?></a>
					<a id="wplnst-tu-button-update" class="<?php echo empty($button_update_class)? '' : $button_update_class.' '; ?>button-primary<?php if (!wplnst_is_curl_enabled()) echo ' button-disabled'; ?>" href="#"><?php _e('Execute Database Update', 'jrdigi'); ?></a>
				</div>
				
			</div>
			
		</form>
		
		<div id="wplnst-tu-progress"></div>
		<div id="wplnst-tu-terminated"><?php _e('Finished', 'jrdigi'); ?></div>
		
		<table class="wp-list-table widefat list-assoc-light" id="wplnst-tu-output">
			<thead>
				<tr>
					<th><?php _e('Link', 'jrdigi'); ?></th>
					<th><?php _e('Anchor text', 'jrdigi'); ?></th>
					<th><?php _e('Result', 'jrdigi'); ?></th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th><?php _e('Link', 'jrdigi'); ?></th>
					<th><?php _e('Anchor text', 'jrdigi'); ?></th>
					<th><?php _e('Result', 'jrdigi'); ?></th>
				</tr>
			</tfoot>
			<tbody id="wplnst-tu-output-rows">
			</tbody>
		</table><?php
	}



}