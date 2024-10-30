<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://endif.media
 * @since             1.0.0
 * @package           Block Referers
 *
 * @wordpress-plugin
 * Plugin Name:       Block Referers
 * Plugin URI:        http://endif.media
 * Description:       Plugin to block unwanted referers to your WordPress site.
 * Version:           1.0.0
 * Author:            Ethan Allen
 * Author URI:        http://endif.media
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       block-referers
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_block_referers() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-block-referers-activator.php';
	Block_Referers_Activator::activate();
}
register_activation_hook( __FILE__, 'activate_block_referers' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-block-referers.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_block_referers() {

	$plugin = new Block_Referers();
	$plugin->run();

}
run_block_referers();