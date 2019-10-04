<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       
 * @since      1.0.0
 *
 * @package    Event_Calendar
 * @subpackage Event_Calendar/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Event_Calendar
 * @subpackage Event_Calendar/admin
 * @author     
 */
class Event_Calendar_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $event_calendar    The ID of this plugin.
	 */
	private $event_calendar;

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
	 * @param      string    $event_calendar       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $event_calendar, $version ) {

		$this->event_calendar = $event_calendar;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Event_Calendar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Event_Calendar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->event_calendar, plugin_dir_url( __FILE__ ) . 'css/event-calendar-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Event_Calendar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Event_Calendar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->event_calendar, plugin_dir_url( __FILE__ ) . 'js/event-calendar-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	public function event_calendar_sanitize_title_with_translit($title) {
		$iso = array(
		   "Є"=>"YE","І"=>"I","Ѓ"=>"G","і"=>"i","№"=>"#","є"=>"ye","ѓ"=>"g",
		   "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G","Д"=>"D",
		   "Е"=>"E","Ё"=>"YO","Ж"=>"ZH",
		   "З"=>"Z","И"=>"I","Й"=>"J","К"=>"K","Л"=>"L",
		   "М"=>"M","Н"=>"N","О"=>"O","П"=>"P","Р"=>"R",
		   "С"=>"S","Т"=>"T","У"=>"U","Ф"=>"F","Х"=>"X",
		   "Ц"=>"C","Ч"=>"CH","Ш"=>"SH","Щ"=>"SHH","Ъ"=>"'",
		   "Ы"=>"Y","Ь"=>"","Э"=>"E","Ю"=>"YU","Я"=>"YA",
		   "а"=>"a","б"=>"b","в"=>"v","г"=>"g","д"=>"d",
		   "е"=>"e","ё"=>"yo","ж"=>"zh",
		   "з"=>"z","и"=>"i","й"=>"j","к"=>"k","л"=>"l",
		   "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
		   "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"x",
		   "ц"=>"c","ч"=>"ch","ш"=>"sh","щ"=>"shh","ъ"=>"",
		   "ы"=>"y","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya",
		   "—"=>"-","«"=>"","»"=>"","…"=>""
		);
		return strtr($title, $iso);
	}
	
	public function event_calendar_remove_permalink( $return ) {
		$return = '';

		return $return;
	}


}
