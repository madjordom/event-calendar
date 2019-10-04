<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              
 * @since             1.0.0
 * @package           Event Calendar
 *
 * @wordpress-plugin
 * Plugin Name:       Event Calendar
 * Plugin URI:        
 * Description:       
 * Version:           1.0.0
 * Author:            
 * Author URI:        
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       event-calendar
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_event_calendar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-event-calendar-activator.php';
	Event_Calendar_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_event_calendar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-event-calendar-deactivator.php';
	Event_Calendar_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_event_calendar' );
register_deactivation_hook( __FILE__, 'deactivate_event_calendar' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-event-calendar.php';

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run_event_calendar() {

	$plugin = new Event_Calendar();
	$plugin->run();

}
run_event_calendar();
