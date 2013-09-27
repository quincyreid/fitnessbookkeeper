<?php
/**
 * Cromatheme Timetable Class
 *
 * The Cromatheme Timetable Class
 *
 * @class 		Cromatheme_TimeTable
 * @version		1.0.0
 * @package		inc/classes
 * @category	Class
 * @author 		Croma
 */
class Cromatheme_TimeTable {


	/**
	 * Constructor Book the room. Take the dates and book a room
	 *
	 * @access public
	 * @return void
	 */
	public function __construct($tablearray, $activity) {
		$this->table 		= $tablearray;
		$this->activity		= $activity;
	}


	/**
	 * Calculate the array of all the activities
	 *
	 * @access public
	 * @return array
	 */
	function calc_activity_array() {
		$resultarray = array();

		foreach ($this->table as $cro_v) {
			if ($cro_v['category'] == $this->activity){
				$resultarray[] = $cro_v;
			}
		}

		return $resultarray;		
    }

    /**
	 * Calculate the days to add in the array
	 *
	 * @access public
	 * @return array
	 */
	function calc_days_to_show() {
		$inputarray = $this->calc_activity_array();
		$resultarray = array();


		foreach ($inputarray as $cro_v) {
			if (!in_array($cro_v['day'], $resultarray)){
				$resultarray[] = $cro_v['day'];
			}
		}

		return $resultarray;		
    }

     /**
	 * Get the earliest time to show
	 *
	 * @access public
	 * @return string
	 */
	function calc_first_hour() {
		$inputarray = $this->calc_activity_array();
		$result = 24;


		foreach ($inputarray as $cro_v) {
			if ($cro_v['fromhour'] < $result){
				$result = $cro_v['fromhour'];
			}
		}

		return $result;		
    }

    /**
	 * Get the latest time to show
	 *
	 * @access public
	 * @return string
	 */
	function calc_last_hour() {
		$inputarray = $this->calc_activity_array();
		$result = 0;


		foreach ($inputarray as $cro_v) {
			if ($cro_v['tohour'] > $result){
				$result = $cro_v['tohour'];
			}
		}

		return $result;		
    }

    /**
	 * Calculate the Classes to show the times that's unavailable
	 *
	 * @access public
	 * @return array
	 */
	function calc_active_classes() {
		$inputarray = $this->calc_activity_array();
		$resultarray = array();

		foreach ($inputarray as $cro_v) {
			for ($i=$cro_v['fromhour']; $i <= $cro_v['tohour']; $i++) { 
				$resultarray[$i][$cro_v['day']]='cro_timetableactive';
			}
		}

		return $resultarray;		
    }

     /**
	 * Calculate the Time info to show in the blocks
	 *
	 * @access public
	 * @return array
	 */
	function calc_active_info() {
		$inputarray = $this->calc_activity_array();
		$resultarray = array();

		foreach ($inputarray as $cro_v) {
			$traintitle = ($cro_v['trainer'] != 0)? '<a href="' .  get_permalink($cro_v['category']) . '">' . get_the_title( $cro_v['category']) . '</a> ' . __('with','localize')  . ' <a href="' .  get_permalink($cro_v['trainer']) . '">' .  get_the_title( $cro_v['trainer']) . '</a>' :  get_the_title( $cro_v['category']);
			$fintitle =  ($cro_v['title'] != '')? $cro_v['title'] : $traintitle ;
			$resultarray[$cro_v['fromhour']][$cro_v['day']]=$fintitle.'<br/>' . sprintf("%02s", $cro_v['fromhour']) . ':'  . sprintf("%02s", $cro_v['frommin']) . ' - ' .  sprintf("%02s", $cro_v['tohour']) . ':'  . sprintf("%02s", $cro_v['tomin']);
		}

		return $resultarray;		
    }


     /**
	 * Calculate the responsive table for the activity
	 *
	 * @access public
	 * @return array
	 */
	function calc_responsive_list() {
		$inputarray = $this->calc_activity_array();
		$resultarray = array();

		foreach ($inputarray as $cro_v) {
			$traintitle = ($cro_v['trainer'] != 0)? '<a href="' .  get_permalink($cro_v['category']) . '">' . get_the_title( $cro_v['category']) . '</a> ' . __('with','localize')  . ' <a href="' .  get_permalink($cro_v['trainer']) . '">' .  get_the_title( $cro_v['trainer']) . '</a>' :  get_the_title( $cro_v['category']);
			$fintitle =  ($cro_v['title'] != '')? $cro_v['title'] : $traintitle ;
			$resultarray[] = array(
				'day' => $cro_v['day'],
				'desc' => $fintitle.'<br/>' . sprintf("%02s", $cro_v['fromhour']) . ':'  . sprintf("%02s", $cro_v['frommin']) . ' - ' .  sprintf("%02s", $cro_v['tohour']) . ':'  . sprintf("%02s", $cro_v['tomin'])
			);
		}

		return $resultarray;		
    }


     /**
	 * Calculate the upcomming activities
	 *
	 * @access public
	 * @return array
	 */
	function calc_upcomming_activities() {
		$now 				= time();
		$day_of_week 		= date('N',$now);
		$j 					= $day_of_week;
		$array_of_days 		= array();
		$rewritten_array 	= array();
		$firstday 			= mktime(0,0,0,date('n',$now),date('j',$now),date('Y',$now));
		$daycounter 		= 0;

		for ($i=0; $i < 7; $i++) { 
			$array_of_days[] = $j;
			$j++;
			$j = ($j <=7 )? $j: 1;
		}

		foreach ($array_of_days as $c_v) {
			$day_order = $firstday + ($daycounter * 86400);

			if (!empty($this->table)) {
				foreach ($this->table as $c_vv) {
					if ($c_v == $c_vv['day']){
						$tstamp = $day_order + ($c_vv['fromhour'] * 24 * 60) + ($c_vv['frommin'] * 60);
						$fmin 	= ($c_vv['frommin'] == 0)? '00': $c_vv['frommin'];
						$tmin 	= ($c_vv['tomin'] == 0)? '00': $c_vv['tomin'];
						if ($tstamp >= $now){
							$rewritten_array[] = array(
								'timestamp' 	=> $tstamp,
								'fromto' 		=> sprintf("%02s", $c_vv['fromhour'])  . ':' . $fmin .  ' - ' . sprintf("%02s", $c_vv['tohour']) . ':' . $tmin,
								'day'			=> date_i18n( 'D' , $tstamp , false ),
								'date' 			=> date_i18n( get_option('date_format') , $tstamp , false),
								'activityimg' 	=> get_the_post_thumbnail($c_vv['category'], 'thumbnail'),
								'trainerimg' 	=> get_the_post_thumbnail($c_vv['trainer'], 'thumbnail'),
								'activitysrc' 	=> wp_get_attachment_image_src( get_post_thumbnail_id($c_vv['category']), 'thumbnail' ),
								'trainersrc' 	=> wp_get_attachment_image_src( get_post_thumbnail_id($c_vv['trainer']), 'thumbnail' ),
								'alttitle' 		=> $c_vv['title'],
								'activityname' 	=> get_the_title($c_vv['category']),
								'trainername' 	=> get_the_title($c_vv['trainer'])
							);
						}
					}
				}	
			}

			$daycounter++;

		}

		$rarr = cro_val_sort($rewritten_array,'timestamp'); 
		
		return $rarr;		
    }

}

?>