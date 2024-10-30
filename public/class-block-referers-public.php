<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://endif.media
 * @since      1.0.0
 *
 * @package    block-referers
 * @subpackage block-referers/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    block-referers
 * @subpackage block-referers/public
 * @author     Ethan Allen
 */
class Block_Referers_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Blocks referers if they match certain criteria. Function sends
	 * a '403 forbidden' response.
	 *
	 * @since    1.0.0
	 */
	public function block_referer_header_response() {

		/**
		 * Sends a 403 error to pointless referers.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 *
		 * @param   array   $_SERVER   hopefully pull referer from this global
		 */
	    if( did_action('send_headers') === 1 ){//check if send headers was fired

	    	//get block referers settings
	      	$likewow_block_referers_settings = get_option('likewow_block_referers_settings');

	        //get block array
	        //$block = array('floating-share-buttons', 'get-free-social-traffic','free-floating-buttons', 'event-tracking', 'Get-Free-Traffic-Now', 'rednise');
	        
	      	$block = explode("\n", $likewow_block_referers_settings['bad_referers']);
	        if (in_array($_SERVER['HTTP_REFERER'], $block)) {

		        header('HTTP/1.0 403 Forbidden');//send 403 header 
		        header('Status: 403 Forbidden');//send 403 status
		        header('Connection: Close');//end connection
		        die();//exit
		        
	        }

	    }
		
	}

}
