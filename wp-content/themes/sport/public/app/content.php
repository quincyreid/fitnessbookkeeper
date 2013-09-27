<?php
 
function lets_define_booking_layouts() {
	$crob_layouts = array(
		array(
			'dash' 				=> '0',
			'tab' 				=> '0',
			'action' 			=> '0',
			'dashname' 			=> __('Metrics', 'localize'),
			'tabname' 			=> __('Team Metrics', 'localize'),
			'savetype' 			=> 'optionsave',
			'updatemess' 		=> __('Updated', 'localize'),
			'posttype' 			=> '',
			'values' 			=> array(	
				array(
					'type'		=> 'teamman',
					'name' 		=> __('Team Metrics', 'localize'),
					'fn' 		=> 'ntl_teammetrics',
					'def' 		=> '',
					'desc' 		=> __('Team Metrics', 'localize'),
					'before' 	=> 'startbroad',
					'after' 	=> ''
				)
			)				
		),
		
		array(
			'dash' 				=> '0',
			'tab' 				=> '1',
			'action' 			=> '0',
			'dashname' 			=> __('Metrics', 'localize'),
			'tabname' 			=> __('Activity Metrics', 'localize'),
			'savetype' 			=> 'optionsave',
			'updatemess' 		=> __('Updated', 'localize'),
			'posttype' 			=> '',
			'values' 			=> array(	
				array(
					'type'		=> 'activityman',
					'name' 		=> __('Activity Metrics', 'localize'),
					'fn' 		=> 'ntl_teammetrics',
					'def' 		=> '',
					'desc' 		=> __('Activity Metrics', 'localize'),
					'before' 	=> 'startbroad',
					'after' 	=> ''
				)
			)				
		),

		array(
			'dash' 				=> '1',
			'tab' 				=> '0',
			'action' 			=> '0',
			'dashname' 			=> __('Tables', 'localize'),
			'tabname' 			=> __('TimeTable', 'localize'),
			'savetype' 			=> 'optionsave',
			'updatemess' 		=> __('Schedules updated', 'localize'),
			'posttype' 			=> 'schedule',
			'values' 			=> array(
				array(
					'type'		=> 'schedone',
					'name' 		=> __('Booking slots', 'localize'),
					'fn' 		=> 'ntl_bookslote',
					'def' 		=> '',
					'desc' 		=> __('Booking slots', 'localize'),
					'before' 	=> 'startbroad',
					'after' 	=> ''
				)					
			)				
		),	


		array(
			'dash' 				=> '2',
			'tab' 				=> '0',
			'action' 			=> '0',
			'dashname' 			=> __('Tariffs', 'localize'),
			'tabname' 			=> __('Tariff Manager', 'localize'),
			'savetype' 			=> 'optionsave',
			'updatemess' 		=> __('Message settings updated', 'localize'),
			'posttype' 			=> '',
			'values' 			=> array(
			array(
					'type'		=> 'tarrone',
					'name' 		=> __('Booking slots', 'localize'),
					'fn' 		=> 'ntl_tarrmanager',
					'def' 		=> '',
					'desc' 		=> __('Booking slots', 'localize'),
					'before' 	=> 'startbroad',
					'after' 	=> ''
				)
			)	
		),

		array(
			'dash' 				=> '2',
			'tab' 				=> '1',
			'action' 			=> '0',
			'dashname' 			=> __('Tariffs', 'localize'),
			'tabname' 			=> __('Tariff Categories', 'localize'),
			'savetype' 			=> 'optionsave',
			'updatemess' 		=> __('Tariff Categories updated', 'localize'),
			'posttype' 			=> '',
			'values' 			=> array(	
				array(
					'type'		=> 'resultman',
					'name' 		=> __('Tariff Categories', 'localize'),
					'fn' 		=> 'ntl_teammetrics',
					'def' 		=> '',
					'desc' 		=> __('Tariff Categories', 'localize'),
					'before' 	=> 'startbroad',
					'after' 	=> ''
				)
			)				
		)
		
	);

	return apply_filters( 'lets_define_booking_layouts', $crob_layouts );
}



?>