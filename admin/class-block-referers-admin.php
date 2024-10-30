<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://endif.media
 * @since      1.0.0
 *
 * @package    block-referers
 * @subpackage block-referers/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    block-referers
 * @subpackage block-referers/admin
 * @author     Ethan Allen
 */
class Block_Referers_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;		

	}

	/**
	 * Register the menu for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function block_referers_register_menu(){
		add_menu_page( 'Block Referers', 'Block Referers', 'manage_options', 'block_referers_menu_page', array( $this, 'block_referers_display_options_page' ), 'dashicons-welcome-comments'); //dashicons-hidden(eyeball) dashicons-editor-help(question mark)
	}


	/**
	 * Function that displays the options form.
	 *
	 * @since    1.0.0
	 */
	public function block_referers_display_options_page() {
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/views/block-referers-options-form.php';
	}

}