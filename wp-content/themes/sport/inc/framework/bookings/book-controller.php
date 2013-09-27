<?php
/*
 * Croma admin framework: bookings controller
 */


/* 
 * -08- DRAW THE SCHEDULER
 * */
function build_dateblock($num,$randomstring,$def,$class,$name){
	$op = '';
	$op .= '<div class="dateblocker"><select class="' . $class . '" name="' . $name . '-' . $randomstring . '">';					
	for ($i=0; $i <  $num ; $i++) { 
		$sel = ($i == $def) ? ' selected="selected" ' : '' ;
		$j = ($i <= 9) ? '0' . $i : $i ;							
		$op .= '<option value="' . $i . '" ' . $sel  . '>' . $j . '</option>';
	}					
	$op .= '</select></div>';
	return $op;
}

function cro_make_scheduler(){
	$op 			= '';
	$activities 	= cro_get_activity();
	$trainers 		= cro_get_trainer();
	$drawstring 	= array();
	$booksched 		= get_option('cro_booksched');
	$acctr 			= 1;
	$bookset 		= array();
	$acount 		= count($activities);


	if ($acount >= 1) {
	if (isset($booksched) && $booksched != '') {

		foreach ($booksched as $c_vvv) {
			if (in_array($c_vvv['category'], $activities)){
				$bookset[] = $c_vvv;
			}
		}

	}
	
	// CREATE A FIELD TO REMIND THE FORM HANDLER TO CREATE A NEW FIELD				
	$op .= '<input type="hidden" name="addtype" value="schedule" />
				<div class="schedouter">';	


	$op .= '<ul class="activitieslist">';

	foreach ($activities as $cc_vv) {
		$op .= '<li class="timetableli" rel=".li-' .  $cc_vv  . '">' .  get_the_title($cc_vv) . '</li>';
	}

	$op .= '<br class="clear" /></ul>';

	if (!empty($bookset)) {
		$op .= '<p class="cro_thereisnone" style="display:none;">' .  __('No schedules set. Click to add one','localize')   . '</p>';

		foreach($bookset as $crov) {
			$ap = '';
			$ac = '';
			$tra = '<option value="0">Trainer:</option>';
			$ad = $crov['category'] * 1000000 + ($crov['day'] * 100000) + ($crov['fromhour'] * 3600) + ($crov['frommin'] * 60);
			foreach ($activities as $valu) {
				$selectr = ($crov['category'] == $valu)?  ' selected="selected" ' : '' ;
				$ac .= '<option value="' .  $valu . '" ' . $selectr  . '>' .  get_the_title( $valu ) .  '</option>';
			}

			foreach ($trainers  as $valus) {
				$selectr = ($crov['trainer'] == $valus)?  ' selected="selected" ' : '' ;
				$tra .= '<option value="' .  $valus . '" ' . $selectr  . '>' .  get_the_title( $valus ) .  '</option>';
			}

			$rndmzer = cro_randstring(10);
			$ap .= '<div class="schedblox li-' . $crov['category'] . ' timetableblox">
						<input type="hidden" name="cro_schedcontrol-' . $rndmzer . '" value="' . $rndmzer . '">
						<span class="cro_listdeleteone">-</span>
						<div class="dateblocker datepadright">
						<select class="dayname" name="cro_dayname-' . $rndmzer . '">';

			
			for ($i=1; $i <  8 ; $i++) { 
				$sel = ($i == $crov['day']) ? ' selected="selected" ' : '' ;
				$ap .= '<option value="' . $i . '" ' . $sel  . '>' . date_i18n('l', 299000 + ($i * 86400) , false) . '</option>';
			}					
			$ap .= '</select></div>';

			$ap .= build_dateblock(24,$rndmzer,$crov['fromhour'],'starthour','cro_schedfromhour');
			$ap .= build_dateblock(60,$rndmzer,$crov['frommin'],'startminute','cro_schedfrommin');
			$ap .= '<div class="dateblocker"><span class="dateto">-</span></div>';
			$ap .= build_dateblock(24,$rndmzer,$crov['tohour'],'endhour','cro_schedtohour');
			$ap .= build_dateblock(60,$rndmzer,$crov['tomin'],'endminute','cro_schedtomin');
			$ap .= '<div class="dateblocker selectblocker"><select name="cro_ac_select-' . $rndmzer . '">' . $ac  . '</select><select name="cro_tr_select-' . $rndmzer . '">' . $tra  . '</select>';
			$ap .= '</div><input class="cro_title_select" name="cro_title_select-' . $rndmzer . '" value="' . $crov['title']  . '"><div class="clear"></div></div>';

			$drawstring[$ad] = $ap;

		}
	} else {
		$op .= '<p class="cro_thereisnone">' .  __('No schedules set. Click to add one','localize')   . '</p>';
	}

	if (!empty($drawstring)) {
		ksort($drawstring);
		foreach ($drawstring as $cr_vv) {
			$op .= $cr_vv;
		}
	}

	$op .= '</div><div class="cro_itemplusitems"><span>+</span></div>';

	} else {
		$op .= '<p style="font-size: 16px; text-align: center;">no activities and trainers set, create some activities</p>';
	}
	return $op;
}




function cro_make_tariffs(){
	$op 			= '';
	$settings 		= get_option("bookset");

	if (isset($settings['resultset'])){
		$activities 		= $settings['resultset'];
	}

	$booksched 		= get_option('cro_tarrsched');
	$drawstring 	= array();
	$tactr 			= 1;
	$bookset 		= array();
	$arrset 		= array();



	if(isset($activities) && $activities != '') {  


	foreach($activities as $c_vvvv) {
		$arrset[] = $c_vvvv['name'];
	}


	foreach ($booksched as $c_vvv) {
		if (in_array($c_vvv['category'], $arrset)){
			$bookset[] = $c_vvv;
		}
	}


	
	// CREATE A FIELD TO REMIND THE FORM HANDLER TO CREATE A NEW FIELD				
	$op .= '<input type="hidden" name="addtype" value="tarrapp" />
				<div class="schedouter">';	

	$op .= '<ul class="teriffslist">';

	foreach ($activities as $cc_vv) {
		$op .= '<li class="tariffli" rel=".li-' .  preg_replace('/\W+/','',strtolower(strip_tags($cc_vv['name'])))  . '">' .  $cc_vv['name'] . '</li>';
		$tactr++;
	}

	$op .= '<br class="clear" /></ul>';

	if (isset($bookset) && !empty($bookset)) {
		$op .= '<p class="cro_thereisnone" style="display:none;">' .  __('No schedules set. Click to add one','localize')   . '</p>';

		foreach($bookset as $crov) {
			$ac = '';
			foreach ($activities as $valu) {
				$selectr = ($crov['category'] == $valu['name'])?  ' selected="selected" ' : '' ;
				$ac .= '<option value="' .  $valu['name'] . '" ' . $selectr  . '>' .  $valu['name'] .  '</option>';
			}

			$rndmzer = cro_randstring(10);
			$op .= '<div class="schedblox tariffblox li-' .  preg_replace('/\W+/','',strtolower(strip_tags($crov['category'])))  . '">
						<input type="hidden" name="cro_schedcontrol-' . $rndmzer . '" value="' . $rndmzer . '">
						<span class="cro_listdeleteone">-</span>';

			$op .= '<div class="dateblocker"><input type="text" class="intervalminutes intervaltarr" name="cro_tarrprice-' . $rndmzer . '" value="' . $crov['tarr']  . '"></div>';
			$op .= '<div class="dateblocker"><input type="text" class="intervalminutes intervaldesc" name="cro_tarrdesc-' . $rndmzer . '" value="' . $crov['desc']  . '"></div>';
			$op .= '<div class="dateblocker selectblocker"><select name="cro_ac_select-' . $rndmzer . '">' . $ac  . '</select></div><div class="clear"></div></div>';

		}
	} else {
		$op .= '<p class="cro_thereisnone">' .  __('No Tariffs set. Click to add one','localize')   . '</p>';
	}



	$op .= '</div><div class="cro_t_itemplusitems"><span>+</span></div>';

	} else {
		$op .= '<p style="font-size: 16px; text-align: center;">no tariff categories set, create some tariff categories</p>';
	}
	return $op;
}


/* 
 * -09- MAKE THE GUEST MANAGER
 * */
function cro_make_guests(){

	$settings 	= get_option("bookset");


	if (isset($settings['teamset'])){
		$custworks	= $settings['teamset'];
	}

	$op = '';


	$op .= '<input type="hidden" name="guestadd" value="add_a_guest">';
	$op .= '<input type="hidden" name="guesttype" value="2">';
	$op .= '<div class="cro_itemlistinside"><div class="cro_itemlistitems">';


	if (isset($custworks) && $custworks) {				
		foreach ($custworks as $v){				
			$op .= '<div class="cro_listcloneractive" style="display: block;"><input type="text" name="' . $v['code']  . '" value="'  .  $v['name']  . '"><span class="cro_listdeleteone">-</span></div>';
		}				
	} else {
		$op .= '<p class="cro_theresnolist">' .  __('You have no team metrics at present. Click to add a team metric', 'localize')  . '</p>';
	}

	$op .= '</div><div class="cro_listcloner"><input type="text"><span class="cro_listdeleteone">-</span></div><div class="cro_itemplusitems"><span>+</span></div></div>';			

		
	return $op;
}


/* 
 * -09- MAKE THE GUEST MANAGER
 * */
function cro_make_result(){

	$settings 	= get_option("bookset");

	if (isset($settings['resultset'])){
		$custworks 		= $settings['resultset'];
	}

	$op = '';


	$op .= '<input type="hidden" name="guestadd" value="add_a_result">';
	$op .= '<div class="cro_itemlistinside"><div class="cro_itemlistitems">';


	if (isset($custworks) && $custworks) {				
		foreach ($custworks as $v){				
			$op .= '<div class="cro_listcloneractive" style="display: block;"><input type="text" name="' . $v['code']  . '" value="'  .  $v['name']  . '"><span class="cro_listdeleteone">-</span></div>';
		}				
	} else {
		$op .= '<p class="cro_theresnolist">' .  __('You have no tariff categories at present. Click to add a tariff category', 'localize')  . '</p>';
	}

	$op .= '</div><div class="cro_listcloner"><input type="text"><span class="cro_listdeleteone">-</span></div><div class="cro_itemplusitems"><span>+</span></div></div>';			

		
	return $op;
}






function cro_get_activity() {
	$op = array();
	
	$myargs = array('post_type'=>'activities','showposts'=> 10000);	
	
	$my_newquery = new WP_Query($myargs);
	
	
	if ($my_newquery->have_posts()) : while ($my_newquery->have_posts()) : $my_newquery->the_post();
	
	$op[] =  get_the_ID();
	
	endwhile;
	else : endif;
	wp_reset_query();
	
	return $op;
}


function cro_get_trainer() {
	$op = array();
	
	$myargs = array('post_type'=>'members','showposts'=> 10000);	
	
	$my_newquery = new WP_Query($myargs);
	
	
	if ($my_newquery->have_posts()) : while ($my_newquery->have_posts()) : $my_newquery->the_post();
	
	$op[] =  get_the_ID();
	
	endwhile;
	else : endif;
	wp_reset_query();
	
	return $op;
}


/* 
 * -09- MAKE THE GUEST MANAGER
 * */
function cro_make_activity(){

	$settings 	= get_option("bookset");

	if (isset($settings['activityset'])){
		$custworks	= $settings['activityset'];
	}

	$op = '';


	$op .= '<input type="hidden" name="guestadd" value="add_a_activity">';
	$op .= '<input type="hidden" name="guesttype" value="2">';
	$op .= '<div class="cro_itemlistinside"><div class="cro_itemlistitems">';


	if (isset($custworks) && $custworks) {				
		foreach ($custworks as $v){				
			$op .= '<div class="cro_listcloneractive" style="display: block;"><input type="text" name="' . $v['code']  . '" value="'  .  $v['name']  . '"><span class="cro_listdeleteone">-</span></div>';
		}				
	} else {
		$op .= '<p class="cro_theresnolist">' .  __('You have no activity metrics at present. Click to add a activity metric', 'localize')  . '</p>';
	}

	$op .= '</div><div class="cro_listcloner"><input type="text"><span class="cro_listdeleteone">-</span></div><div class="cro_itemplusitems"><span>+</span></div></div>';			

		
	return $op;
}

?>