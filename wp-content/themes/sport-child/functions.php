<?php

add_action( 'wp_print_styles', 'cro_deregister_styles', 100 );

function cro_deregister_styles() {
	wp_deregister_style( 'croma_style' );
	wp_deregister_style( 'croma_site' );
}


add_action( 'wp_enqueue_scripts', 'croma_fetch_mystyle' );

function croma_fetch_mystyle() {
	wp_enqueue_style('croma_mystyle', get_stylesheet_directory_uri() . '/style.css', array(), null, 'all');
}

?>