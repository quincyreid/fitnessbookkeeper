<?php
/**
 * php controller file for custom post types
 *
 */
 
 
function mla_cpt() {

	$cro_wpml = "0";

	if ($cro_wpml == "1"){
		$cro_smen = true;
	} else {
		$cro_smen = false;
	}

	$mla_posttype_array = array(
		'team' => array(
				'singular' => 'member',
				'plural' => 'members',
				'description' => 'Teams post type',
				'supports' => array('title','editor', 'thumbnail'),
				'show_men' => true,
				'show_nav' => true,
				'exclude-search' => false,
				'make_categories' => true,
				'menu_position' => 51,
				'cat_names' => 'team',
		),
		'gallery' => array(
				'singular' => 'gallery',
				'plural' => 'galleries',
				'description' => 'Galleries post type',
				'supports' => array('title','editor', 'thumbnail'),
				'show_men' => true,
				'show_nav' => false,
				'exclude-search' => true,
				'make_categories' => true,
				'menu_position' => 52,
				'cat_names' => 'photobook',
		),
		'cal' => array(
				'singular' => 'event',
				'plural' => 'events',
				'description' => 'Events post type',
				'supports' => array('title','editor', 'thumbnail'),
				'show_men' => true,
				'show_nav' => true,
				'exclude-search' => false,
				'make_categories' => false,
				'menu_position' => 52,
				'cat_names' => 'calendar',
		),
		'sshow' => array(
				'singular' => 'slideshow',
				'plural' => 'slideshows',
				'description' => 'Slideshows post type',
				'supports' => array('title','thumbnail'),
				'show_men' => $cro_smen,
				'show_nav' => false,
				'exclude-search' => true,
				'make_categories' => false,
				'menu_position' => 52,
				'cat_names' => 'ss',
		),
		'fcont' => array(
				'singular' => 'frontcontent',
				'plural' => 'frontcontents',
				'description' => 'Front Contents post type',
				'supports' => array('title','thumbnail'),
				'show_men' => $cro_smen,
				'show_nav' => false,
				'exclude-search' => true,
				'make_categories' => false,
				'menu_position' => 52,
				'cat_names' => 'ss',
		),
		'contacts' => array(
				'singular' => 'location',
				'plural' => 'locations',
				'description' => 'Locations post type',
				'supports' => array('title'),
				'show_men' => true,
				'show_nav' => false,
				'exclude-search' => true,
				'make_categories' => false,
				'menu_position' => 54,
				'cat_names' => 'ss',
		),
		'activities' => array(
				'singular' => 'activity',
				'plural' => 'activities',
				'description' => 'Activities post type',
				'supports' => array('title','editor', 'thumbnail'),
				'show_men' => true,
				'show_nav' => true,
				'exclude-search' => false,
				'make_categories' => true,
				'menu_position' => 54,
				'cat_names' => 'activity_group',
		),
		'feedb' => array(
				'singular' => 'feedback',
				'plural' => 'feedbacks',
				'description' => 'Feedback post type',
				'supports' => array('title','editor', 'thumbnail'),
				'show_men' => true,
				'show_nav' => false,
				'exclude-search' => true,
				'make_categories' => false,
				'menu_position' => 56,
				'cat_names' => 'ss',
		)
	);
	return apply_filters( 'mla_cpt', $mla_posttype_array );
}

?>