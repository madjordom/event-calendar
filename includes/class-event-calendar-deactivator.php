<?php

/**
 * Fired during plugin deactivation
 *
 * @link       
 * @since      1.0.0
 *
 * @package    Event_Calendar
 * @subpackage Event_Calendar/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Event_Calendar
 * @subpackage Event_Calendar/includes
 * @author     
 */
class Event_Calendar_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		
		flush_rewrite_rules();

	}

}
