<?php

/**
 * Fired during plugin activation
 *
 * @link       
 * @since      1.0.0
 *
 * @package    Event_Calendar
 * @subpackage Event_Calendar/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Event_Calendar
 * @subpackage Event_Calendar/includes
 * @author     
 */
class Event_Calendar_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		/**
		* Custom Post Types
		*/
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-event-calendar-post_types.php';
		$plugin_post_types = new Event_Calendar_Post_Types();
		$plugin_post_types->create_custom_post_type();
		flush_rewrite_rules();

	}

}
