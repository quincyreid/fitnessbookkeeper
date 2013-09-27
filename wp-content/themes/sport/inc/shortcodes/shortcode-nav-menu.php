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


function cro_navmen_func( $atts ) {
	global $post;
	$op = '';

    extract( shortcode_atts( array(
        'no' => 'navnumber'
    ), $atts ) );



    $nav_menu = ! empty( $no ) ? wp_get_nav_menu_object( $no ) : false;

    if ( !$nav_menu )
            return;

    wp_nav_menu( array( 'fallback_cb' => '', 'menu' => $nav_menu, 'container' => 'div', 'container_class' => 'post-nav clearfix' ) );


    
}
add_shortcode( 'cro_navmen', 'cro_navmen_func' );
?>