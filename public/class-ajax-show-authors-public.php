<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       blank.com
 * @since      1.0.0
 *
 * @package    Ajax_Show_Authors
 * @subpackage Ajax_Show_Authors/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ajax_Show_Authors
 * @subpackage Ajax_Show_Authors/public
 * @author     Stephen R <srussell@alphaworks.tech>
 */
class Ajax_Show_Authors_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
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
		 * defined in Ajax_Show_Authors_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ajax_Show_Authors_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ajax-show-authors-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		$ajaxURL = admin_url('admin-ajax.php');

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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . '/js/ajax-show-authors-public.js', array( 'jquery' ), $this->version, false );

	}

	public function show_authors() {

		if(!wp_verify_nonce($_REQUEST['nonce'], "show_authors_nonce")) {
			exit( "No naughty business please :)");
		}
	
		$users = get_users();
		$count = 0;
	
		foreach ($users as $user) {
			$result[$count] = $user->display_name;
			$count++;
		}
			
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') { 
			$result = json_encode($result);
			echo $result;
		 }
		 else {
			header("Location: ".$_SERVER["HTTP_REFERER"]);
		 }
	  
		 die();
	}

	public function display() {
		$nonce = wp_create_nonce("show_authors_nonce");
		$ajaxurl = admin_url('admin-ajax.php');
		?>
			<button admin="<?php echo $ajaxurl?>" href="<?php echo $link ?>" id="linkbutton" data-nonce="<?php echo $nonce; ?>">Click here to see all site users.</button>
			<div>
				<ul id="list">
	
				</ul>
	
			</div>
		<?php
	}
}
