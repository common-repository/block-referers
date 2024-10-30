<?php

/**
 * Fired during plugin activation
 *
 * @link       http://endif.media
 * @since      1.0.0
 *
 * @package    block-referers
 * @subpackage block-referers/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    block-referers
 * @subpackage block-referers/includes
 * @author     Ethan Allen
 */
class Block_Referers_Activator {


	/**
	 * Initialize default options for plugin.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		/**
		 * Default Options on plugin activation
		 *
		 */ 
		function block_referers_default_options() {

			if(get_option('likewow_block_referer_settings') == ''){		

				$likewow_block_referer_settings = array (
					'bad_referer' => array(),		// initialize referer array
					'message_type' => '0',			// me
					'destination' => ''
				);

				update_option('likewow_block_referer_settings', $likewow_block_referer_settings);

			}

		}

	}


}