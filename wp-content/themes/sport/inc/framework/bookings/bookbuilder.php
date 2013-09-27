<?php
/*
 * Croma Framework: Bookings Form Builder
 */




function crob_bodycreate($args, $tipe, $opst){
		
	$settings = get_option("bookset");
	$op = $hdl = $field = $val = $tpost = $forcefield = '';
	$field = $args['fn'];


	// GET THE DEFAULTS AND DETERMINE THE VALUES
	if (isset($settings[$field])) {$forcefield = $settings[$field];}
	$val 			= ($tipe) ? get_post_meta($opst, $field, true) : $forcefield  ;
	$targsbefore 	= (isset($args['before']) && $args['before']) ? $args['before'] : '' ;



	// MANAGE THE BEFORE SWITHCH	
	switch ($targsbefore) {
		case 'startone':$op .= '<div class="oneside">';	break;		
		case 'startbroad':	$op .= '<div class="broadside">'; break;		
	}
	
	
	
	// SET THE HEADER FOR EACH BOX	
	if ($args['name'] ) { $hdl = '<div class="sideinner"><h2>' .  $args['name']  . '</h2><p class="helper">' . $args['desc']  . '</p>'; }	
	$hdl = $args['desc'] ? $hdl . '<div class="helphelp">?</div>': $hdl;
	


	// SWITCH THE TYPES	
	switch ($args['type']) {

		case 'bookdayview':	
		$op .= cro_make_bookday();
		break;

		case 'schedone':
			$op .= cro_make_scheduler();
		break;

		case 'tarrone':
			$op .= cro_make_tariffs();
		break;

		case 'teamman':
			$op .= cro_make_guests();
		break;

		case 'resultman':
			$op .= cro_make_result();
		break;	

		case 'activityman':
			$op .= cro_make_activity();
		break;	
		
	}

	$op .= '</div>';

	if (isset($args['after'])){
		$op .= $args['after'] == 'endone'? '</div>': '';
	}
	
	return $op;
}

?>