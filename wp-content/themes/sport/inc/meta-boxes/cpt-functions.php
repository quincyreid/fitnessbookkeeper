<?php
/**
 * meta box helper functions
 *
 */
 
 
add_action( 'add_meta_boxes', 'mla_add_box' );
add_action('admin_print_styles', 'js_css');



function js_css() {
	$args = array(
		'cro_booknonce' => wp_create_nonce( 'cro_book_functions')
	);
	wp_enqueue_style('mla-meta-box', get_template_directory_uri() . '/inc/meta-boxes/m-box.css');
	wp_enqueue_script('mla-meta-box', get_template_directory_uri() . '/inc/meta-boxes/m-box.js', array('jquery'), null, false);
	wp_localize_script( 'mla-meta-box', 'cro_book', $args);  
}






//  AJAX ACTION CODE
add_action('wp_ajax_crombox_post_action', 'crombox_ajax_callback');

function crombox_ajax_callback() {
	global $wpdb; 
	$op = '';

	$save_type = (isset($_POST['type'])) ? $_POST['type'] : '' ;
	$post_id = (isset($_POST['post'])) ? $_POST['post'] : '' ;
	$option1 = (isset($_POST['option1'])) ? $_POST['option1'] : '' ;
	$option2 = (isset($_POST['option2'])) ? $_POST['option2'] : '' ;


	switch ($save_type) {
		case 'cro_movecal':
			$op = fetch_calendar('',  date('d', $option1), date('m', $option1), date('Y', $option1), $option2);
		break;
	}	
	
	echo $op;
	exit;		
}




function mla_add_box() {	
	foreach ( lets_define_meta_layouts() as $val ) {		
		 add_meta_box( 
        	'mla_metas',
        	$val['title'],
        	'mla_create_boxes',
        	$val['type'],
        	$val['context'],
        	$val['priority']       
    	);
	}
}




function cro_save_box($id) {

	global $post_type;
	$cro_old = $cro_new = $cro_valueset = '';



	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	} 


	if( !current_user_can( 'edit_post', $id ) ) {
		return;
	} 

	if( wp_is_post_revision( $id ) || wp_is_post_autosave( $id ) ) {
		return;
	}

	foreach ( lets_define_meta_layouts() as $val ) {	

		if (isset($val['type']) && $val['type'] == $post_type){
			if (isset($val['values'])){
				foreach ($val['values'] as $vs) {
					if (isset($vs['fn'])) {
						if ($vs['type'] != 'selectrecurring') {
							$cro_old = get_post_meta($id, $vs['fn'], true );
							if (isset($_POST[$vs['fn']])){
								if ($cro_old != $_POST[$vs['fn']]){
									update_post_meta($id, $vs['fn'] , $_POST[$vs['fn']]);
								}
							}
						} else {
							$cro_old = get_post_meta($id, $vs['fn'], true );
							$cro_old_a = get_post_meta($id, $vs['fn'] . '_a', true );
							$cro_old_b = get_post_meta($id, $vs['fn'] . '_b', true );
							$cro_old_c = get_post_meta($id, $vs['fn'] . '_c', true );
							$cro_old_d = get_post_meta($id, $vs['fn'] . '_d', true );
							$cro_old_e = get_post_meta($id, $vs['fn'] . '_e', true );
							if (isset($_POST[$vs['fn']])){
								if ($cro_old != $_POST[$vs['fn']]){
									update_post_meta($id, $vs['fn'] , $_POST[$vs['fn']]);
								}
							}
							$alass = $vs['fn'] . '_a';
							if (isset($_POST[$alass])){
								if ($cro_old_a != $_POST[$alass]){
									update_post_meta($id, $alass , $_POST[$alass]);
								}
							}
							$alass = $vs['fn'] . '_b';
							if (isset($_POST[$alass])){
								if ($cro_old_b != $_POST[$alass]){
									update_post_meta($id, $alass , $_POST[$alass]);
								}
							}
							$alass = $vs['fn'] . '_c';
							if (isset($_POST[$alass])){
								if ($cro_old_c != $_POST[$alass]){
									update_post_meta($id, $alass , $_POST[$alass]);
								}
							}
							$alass = $vs['fn'] . '_d';
							if (isset($_POST[$alass])){
								if ($cro_old_d != $_POST[$alass]){
									update_post_meta($id, $alass , $_POST[$alass]);
								}
							}
							$alass = $vs['fn'] . '_e';
							if (isset($_POST[$alass])){
								if ($cro_old_e != $_POST[$alass]){
									update_post_meta($id, $alass , $_POST[$alass]);
								}
							}

						}	
					}
				}
			}
		}

	}

}

add_action('save_post', 'cro_save_box');    



function mla_create_boxes() {
	global $post_type, $post;	

	foreach ( lets_define_meta_layouts() as $val ) {		
		if ($val['type'] == $post_type) {
			foreach ($val['values'] as $vs) {
				echo cro_getformbox($vs, $post->ID);
			}
		}
	}	
	echo '<br class="clear">';		
}






add_action( 'add_meta_boxes', 'cro_add_team_box' );



function cro_add_team_box() {	
	
	 add_meta_box( 
        'cro_team_meta',
        __('Members Custom metrics','localize'),
        'cro_create_boxes_team_box',
        'members',
        'normal',
        'high'      
    );
}


function cro_create_boxes_team_box() {
	global $post_type, $post;	

	$settings = get_option('bookset');
	$teamarr = $settings['teamset'];
	$op = '';
	$cro_ctr = 0;
	$parr = get_post_meta( $post->ID, 'cro_team_metas', true);

	if (!empty($teamarr)) {

		foreach($teamarr as $cro_v) {

			$parrval = $parr[$cro_v['code']];

			$parnameset = $parrval['val'];

			if ($cro_ctr%2 === 0){
				$op .= '<br class="clear">';
			}

			$op .= '<div class="cro_teammetrixbox">
						<div class="cro_metrixinner">
							<label>' .  $cro_v['name']  . '</label><br/>
							<textarea rows="7" cols="40" name="' . $cro_v['code'] . '">' . $parnameset . '</textarea>
						</div>
					</div>';

			$cro_ctr++;

		}

	} else {
		$op .= 'no metrics added, click here to add metrics';
	}

	$op .= '<br class="clear">';

	echo $op;
}





function cro_save_teambox($id) {

	global $post_type;



	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	} 


	if( !current_user_can( 'edit_post', $id ) ) {
		return;
	} 

	if( wp_is_post_revision( $id ) || wp_is_post_autosave( $id ) ) {
		return;
	}

	$settings = get_option('bookset');
	if (isset($settings['teamset']) && $settings['teamset'] != ''){
		$teamarr = $settings['teamset'];
	} else {
		$teamarr = '';
	}
	$valarr = array();


	if (!empty($teamarr)){
		foreach ($teamarr as $c_vv){
			$name_name = $c_vv['code'];
			if ( isset( $_POST[$name_name] ) ){
				$valarr[$name_name] = array(
					'name' => $c_vv['name'],
					'val' =>  $_POST[$name_name]
				);
			}
		}
	}

	if (!empty($valarr)) {
		update_post_meta( $id,'cro_team_metas', $valarr);
	}


}

add_action('save_post', 'cro_save_teambox');   






add_action( 'add_meta_boxes', 'cro_add_activity_box' );



function cro_add_activity_box() {	
	
	 add_meta_box( 
        'cro_activity_meta',
        __('Activity Custom metrics','localize'),
        'cro_create_boxes_activity_box',
        'activities',
        'normal',
        'high'      
    );
}


function cro_create_boxes_activity_box() {
	global $post_type, $post;	

	$settings = get_option('bookset');
	$teamarr = $settings['activityset'];
	$op = '';
	$cro_ctr = 0;
	$parr = get_post_meta( $post->ID, 'cro_activity_metas', true);

	if (!empty($teamarr)) {

		foreach($teamarr as $cro_v) {

			if (isset($parr[$cro_v['code']])){
				$parrval = $parr[$cro_v['code']];
				$parnameset = $parrval['val'];
			} else {
				$parnameset = '';
			}


			if ($cro_ctr%2 === 0){
				$op .= '<br class="clear">';
			}

			$op .= '<div class="cro_teammetrixbox">
						<div class="cro_metrixinner">
							<label>' .  $cro_v['name']  . '</label><br/>
							<textarea rows="7" cols="40" name="' . $cro_v['code'] . '">' . $parnameset . '</textarea>
						</div>
					</div>';

			$cro_ctr++;

		}

	} else {
		$op .= 'no metrics added, click here to add metrics';
	}

	$op .= '<br class="clear">';

	echo $op;
}





function cro_save_activitybox($id) {

	global $post_type;



	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	} 


	if( !current_user_can( 'edit_post', $id ) ) {
		return;
	} 

	if( wp_is_post_revision( $id ) || wp_is_post_autosave( $id ) ) {
		return;
	}

	$settings = get_option('bookset');
	if (isset($settings['activityset']) && $settings['activityset'] != ''){
		$teamarr = $settings['activityset'];
	} else {
		$teamarr = '';
	}
	$valarr = array();


	if (!empty($teamarr)){
		foreach ($teamarr as $c_vv){
			$name_name = $c_vv['code'];
			if ( isset( $_POST[$name_name] ) ){
				$valarr[$name_name] = array(
					'name' => $c_vv['name'],
					'val' =>  $_POST[$name_name]
				);
			}
		}
	}

	if (!empty($valarr)) {
		update_post_meta( $id,'cro_activity_metas', $valarr);
	}


}

add_action('save_post', 'cro_save_activitybox');   



?>