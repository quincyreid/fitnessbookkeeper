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


function cro_tariff_func( $atts ) {
	$booksched 	= get_option('cro_tarrsched');
	$op 		= '';
	$ap 		= '';

	extract( shortcode_atts( array(
        'no' 	=> 'catnumber',
        'desc' 	=> 'tariffdesc',
        'link' 	=> 'tarifflink',
        'label' => 'tarifflabel',
        'title' => 'tarifftitle'
    ), $atts ) );

    $descr = ($desc != '' && $link != '')?  '<p class="cro_tarifflinklabel"><a href="' .  $link  . '">' . $label  . '</a></p>' :  '';

    $ap .=  '<div class="tarrwrapper">';



    if ( ! empty( $title ) ){
		$ap .=  '<h3 class="cro_accent">' . $title . '</h3>';
	}


    if ( ! empty( $desc ) ){
		$ap .=  '<p class="cro_tarrdesc">' . $desc . '</p>';
	}

	foreach ($booksched as $v) {
		if ($v['category'] == $no){
			$op .= '<tr><td>' .  $v['desc'] . '</td><td class="cro_tariff-tariff">' .  $v['tarr']  . '</td></tr>';
		}
	}

	if ($op != ''){
			$ap .=  '<table><tbody>' . $op  . '</tbody></table>';
	}

	$ap .=  $descr;

	$ap .=  '</div>';


	return $ap;


}
add_shortcode( 'cro_tariff', 'cro_tariff_func' );




?>