<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       blank.com
 * @since      1.0.0
 *
 * @package    Ajax_Show_Authors
 * @subpackage Ajax_Show_Authors/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ajax_Show_Authors
 * @subpackage Ajax_Show_Authors/admin
 * @author     Stephen R <srussell@alphaworks.tech>
 */
class Ajax_Show_Authors_Admin {

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
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ajax_Show_Authors_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ajax_Show_Authors_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ajax-show-authors-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');

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
		 * defined in Ajax_Show_Authors_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ajax_Show_Authors_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ajax-show-authors-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function save_settings(){

		$users = array(
			'administrator' => false,
			'editor' => false,
			'author' => false,
			'contributor' => false,
			'subscriber' => false
		);

		foreach ( $users as $user => $value ) {
			if($_REQUEST[$user] == 'true') {
				$users[$user] = true;
			}
		}

		update_option('show_users', $users, false);

		$users['success'] = true;

		$result = json_encode($users);
		echo $result;
		die();
	}


	public function display_admin_page () {
		add_menu_page(
			'Show Authors',
			'Show Authors',
			'manage_options',
			'show-authors-list', // ** add_settings_section needs this
			array($this, 'showPage'),
			'',
			'3.0'
		);
	}


	/**
	 * 
	 * Template page
	 */
	public function showPage () {
		include ('partials/ajax-show-authors-admin-display.php');
	}



}
