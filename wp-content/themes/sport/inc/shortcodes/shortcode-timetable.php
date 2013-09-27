<?php
/**
 * The team shortcodes
 *
 */
 

 /********** Code Index
 *
 * -01- ADD A TEAM
 * 
 */


 /**
 * -01- ADD A TEAM  [team no="category number"]
 */ 


function cro_timetable_func( $atts ) {
	$alert = 'book';

	extract( shortcode_atts( array(
        'no' => 'catnumber'
    ), $atts ) );

	include(locate_template('public/tparts/timetable.php'));
}
add_shortcode( 'cro_timetable', 'cro_timetable_func' );




?>