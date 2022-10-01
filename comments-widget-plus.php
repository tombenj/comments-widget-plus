<?php
/**
 * Plugin Name:  Comments Widget Plus
 * Plugin URI:   https://idenovasi.com/projects/comments-widget-plus/
 * Description:  Enables custom recent comments widget with extra features.
 * Version:      1.3
 * Requires at least: 5.8
 * Requires PHP: 7.2
 * Author:       Ga Satrya
 * Author URI:   https://gasatrya.dev/
 * Text Domain:  comments-widget-plus
 * Domain Path:  /languages
 * License:      GPL 3.0
 * License URI:  http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package Comments Widget Plus
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Constants.
define( 'CWP_VERSION', '1.3' );

// Loads plugin files.
require_once plugin_dir_path( __FILE__ ) . 'includes/functions.php';

/**
 * Language
 */
function cwp_i18n() {
	load_plugin_textdomain( 'comments-widget-plus', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'cwp_i18n' );

/**
 * Widget register.
 */
function cwp_widget_register() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-comments-widget-plus-widget.php';
	register_widget( 'Comments_Widget_Plus_Widget' );
}
add_action( 'widgets_init', 'cwp_widget_register' );

/**
 * Loads custom style & script for the widget settings.
 */
function cwp_admin_scripts() {
	wp_enqueue_style( 'cwp-admin-style', plugin_dir_url( __FILE__ ) . 'assets/css/cwp-admin.css', array(), CWP_VERSION );
}
add_action( 'admin_enqueue_scripts', 'cwp_admin_scripts' );
add_action( 'customize_controls_enqueue_scripts', 'cwp_admin_scripts' );
add_action( 'enqueue_block_editor_assets', 'cwp_admin_scripts' );

/**
 * Loads frontend style.
 */
function cwp_frontend_scripts() {
	wp_enqueue_style( 'cwp-style', plugin_dir_url( __FILE__ ) . 'assets/css/cwp.css', array(), CWP_VERSION );
}
add_action( 'wp_enqueue_scripts', 'cwp_frontend_scripts' );
