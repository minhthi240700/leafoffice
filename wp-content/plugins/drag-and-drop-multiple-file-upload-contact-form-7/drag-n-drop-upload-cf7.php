<?php

	/**
	* Plugin Name: Drag and Drop Multiple File Upload for Contact Form 7
	* Plugin URI: http://codedropz.com/
	* Description: This simple plugin create Drag & Drop or choose Multiple File upload in your Confact Form 7 Forms.
	* Text Domain: drag-and-drop-multiple-file-upload-contact-form-7
	* Domain Path: /languages
	* Version: 1.3.9.0
	* Author: Glen Don L. Mongaya
	* Author URI: http://codedropz.com
	* License: GPL2
	**/

	/**  This protect the plugin file from direct access */
	if ( ! defined( 'WPINC' ) ) {
		die;
	}

	/** Set plugin constant to true **/
	define( 'dnd_upload_cf7', true );

	/**  Define plugin Version */
	define( 'dnd_upload_cf7_version', '1.3.9.0' );

	/**  Define constant Plugin Directories  */
	define( 'dnd_upload_cf7_directory', untrailingslashit( dirname( __FILE__ ) ) );

	/* Define Custom Upload Directory */
	if ( ! defined('wpcf7_dnd_dir') ) {
		define( 'wpcf7_dnd_dir', 'wp_dndcf7_uploads' );
	}

	// require plugin core file
	require_once( dnd_upload_cf7_directory .'/inc/dnd-upload-cf7.php' );