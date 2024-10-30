<?php
/*
Plugin Name: Mirrorgrid Demo Importer
Plugin URI: https://wordpress.org/plugins/mirrorgrid-demo-importer/
Description: Demo importer for Mirrorgrid Store themes.
Version: 1.0.1
Author: Mirrorgrid Store
Author URI: https://store.mirrorgrid.com/
License: GPL3
License URI: http://www.gnu.org/licenses/gpl.html
Text Domain: mirrorgrid-demo-importer
*/

// Block direct access to the main plugin file.
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define MG_PLUGIN_FILE.
if ( ! defined( 'MG_PLUGIN_FILE' ) ) {
	define( 'MG_PLUGIN_FILE', __FILE__ );
}

// Include the main WooCommerce class.
if ( ! class_exists( 'Mirrorgrid_Demo_Importer' ) ) {
	include_once dirname( __FILE__ ) . '/includes/class-mirrorgrid-demo-importer.php';
}

/**
 * Main instance of Mirrorgrid_Demo_Importer.
 *
 * Returns the main instance of TET to prevent the need to use globals.
 *
 * @since 1.0.0
 * @return Mirrorgrid_Demo_Importer
 */
function MG() {
	return Mirrorgrid_Demo_Importer::instance();
}

// Global for backwards compatibility.
$GLOBALS['mirrorgrid-demo-importer'] = MG();