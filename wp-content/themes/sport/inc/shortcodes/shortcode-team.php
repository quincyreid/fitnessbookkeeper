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


function cro_teamlist_func( $atts ) {
	global $post;
	$op = '';
	$pid = get_post_meta($post->ID, 'cro_sidebar', true);

	$pcat = ($pid == 1) ? 'cro_col_3' : 'cro_col_4' ;

	$op .= '<ul class="' .    $pcat . ' teamer">';

    extract( shortcode_atts( array(
        'no' => 'catnumber'
    ), $atts ) );


     $term = get_term( $no, 'team');

    if ($no >=1) {
    	$catargs = array( 
    		'post_type' => 'members', 
    		'numberposts' => -1, 
    		'team' => $term->slug
    	); 
    } else {
    	$catargs = array( 
    		'post_type' => 'members', 
    		'numberposts' => -1, 
    	);   	
    }

    $myposts = get_posts( $catargs );
	foreach( $myposts as $apost ) :	setup_postdata($apost);

    $desc = get_post_meta( $apost->ID, 'cro_teamdesc' , true );

    $pmetr = get_post_meta($apost->ID, 'cro_team_metas', true);

    $pmf = (!empty($pmetr))? '' :  'cro_emptyteam';

    $img =  get_the_post_thumbnail($apost->ID,'team');

    if (!$img) {
        $img = $img  =  '<img src="' . get_template_directory_uri() . '/public/styles/images/imgcommingsoon3.jpg">';
    }

	$op .= '<li class="cro_teamli clearfix ' . $pmf  . '"><div class="imgouter imgteamshort cro_eqheight"><a href="' .  get_permalink($apost->ID)   .  '" class="teama">'  .  $img . '</a>';

	$op .= '<h5 class="cro_accent cro_galtitle">' . $apost->post_title . '</h5>';

    $op .= '<p class="cro_teamdesc">' . stripslashes($desc) . '</p>';

    $op .= '<div class="clarlabel"><a href="' .  get_permalink($apost->ID)   .  '">' .  __('More info','localize')   .  '</a></div>';

	$op .= '</div>';


    if (!empty($pmetr)) {
        $op .= '<div class="teamtable cro_eqheight">';

        foreach ($pmetr as $cr_vv) {

            $op .= '<div class="teamtablehead">' .  $cr_vv['name'] . '</div>';

            $op .= '<div class="teamtablebody">' .  $cr_vv['val'] . '</div>';

        }


        $op .= '</div>';
    }

    $op .= '</li>';
	
	endforeach; 

	$op .= '</ul>';

    return $op;
}
add_shortcode( 'cro_team', 'cro_teamlist_func' );
?>