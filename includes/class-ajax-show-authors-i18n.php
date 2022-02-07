<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       blank.com
 * @since      1.0.0
 *
 * @package    Ajax_Show_Authors
 * @subpackage Ajax_Show_Authors/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ajax_Show_Authors
 * @subpackage Ajax_Show_Authors/includes
 * @author     Stephen R <srussell@alphaworks.tech>
 */
class Ajax_Show_Authors_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ajax-show-authors',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
