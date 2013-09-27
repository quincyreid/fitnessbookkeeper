<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Croma Slideshow Class
 *
 *
 * @package Croma.framework
 * @subpackage Croma.framework
 * @since 1.0
 */


if ( ! class_exists( 'Cromaslide' ) ) {


/**
 * Main Cromatheme Class
 *
 * Contains the main functions for Cromathemes, stores variables, and handles error messages
 *
 * @class Cromatheme
 * @version	1.0
 * @since 1.0
 * @package	Cromatheme
 * @author Cromatheme
 */
class Cromaslide {


	/**
	 * Cromaslide Constructor.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {
		$this->slidearr			= cromatheme_return_array('slideshows','publish');
	}
}


}
?>
