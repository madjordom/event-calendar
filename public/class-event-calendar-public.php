<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       
 * @since      1.0.0
 *
 * @package    Event_Calendar
 * @subpackage Event_Calendar/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Event_Calendar
 * @subpackage Event_Calendar/public
 * @author     
 */
class Event_Calendar_Public {

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
	 * @param      string    $event_calendar       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $event_calendar, $version ) {

		$this->event_calendar = $event_calendar;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->event_calendar, plugin_dir_url( __FILE__ ) . 'css/event-calendar-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'fullcalendar-core', plugin_dir_url( __FILE__ ) . 'fullcalendar/core/main.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'fullcalendar-daygrid', plugin_dir_url( __FILE__ ) . 'fullcalendar/daygrid/main.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'fullcalendar-timegrid', plugin_dir_url( __FILE__ ) . 'fullcalendar/timegrid/main.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		
		wp_enqueue_script( 'fullcalendar-core', plugin_dir_url( __FILE__ ) . 'fullcalendar/core/main.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'fullcalendar-interaction', plugin_dir_url( __FILE__ ) . 'fullcalendar/interaction/main.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'fullcalendar-daygrid', plugin_dir_url( __FILE__ ) . 'fullcalendar/daygrid/main.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'fullcalendar-timegrid', plugin_dir_url( __FILE__ ) . 'fullcalendar/timegrid/main.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->event_calendar, plugin_dir_url( __FILE__ ) . 'js/event-calendar-public.js', array( 'jquery' ), $this->version, false );
	}
	
	public function get_custom_taxonomy_template ($template) {
		global $post;
		if ( is_tax( 'calendars') ) {
			$template = plugin_dir_path(__FILE__) . '/templates/archive-calendars.php';
		}

		return $template;	
	}
	
	function shortcode_function( $atts ) {
		$args = shortcode_atts(
			array(
				'category'   => null,
			),
			$atts
		);
	
		$var = ( strtolower( $args['category']) != "" ) ? strtolower( $args['category'] ) : 'default';
		
		$args_events = array(  
			'post_type' => 'event',
			'post_status' => 'publish',
			'posts_per_page' => -1, 
			'orderby' => 'title', 
			'order' => 'ASC',
			//'cat' => 'calendars',
			'tax_query' => array(
				array(
					'taxonomy' => 'calendars',
					'field' => 'id',
					'terms' => $var
				)       
			),
		);

		$query = new WP_Query( $args_events );
		while ( $query->have_posts() ) : $query->the_post(); 
			$events_array .= '{'.
				'title: "All Day Event",' .
				'start: "'. date('Y-m-d', strtotime(get_field('event_date'))).'",'.
				'title: "'.get_the_title().'",'.
				'url: "'.get_the_permalink().'",'.
			'},' ;
		endwhile;
			
		return '<div id="calendar"></div>
				<script>	
					document.addEventListener("DOMContentLoaded", function() {
						var calendarEl = document.getElementById("calendar");
						var calendar = new FullCalendar.Calendar(calendarEl, {
							plugins: [ "interaction", "dayGrid", "timeGrid" ],
							timeZone: "UTC",
							locale: "ru",
							header: {
								left: "prev,next",
								center: "title",
								right: "prev,next"
							},
							editable: true,
							eventLimit: true,
							events: ['. $events_array.']
						});
					  calendar.render();
					});		
				</script>';
		
	}

}
