<?php
/**
 * The template for displaying the timetables
 *
 *
 * @author 		Croma
 * @package 	templates
 * @version     1.0
 */


$activities 	= cro_get_activity();
$bookset 		= array();
$booksched 		= get_option('cro_booksched');

if (isset($booksched) && $booksched != '' ){

	foreach ($booksched as $c_vvv) {
		if (in_array($c_vvv['category'], $activities)){
			$bookset[] = $c_vvv;
		}
	}

	$cro_ttable = new Cromatheme_TimeTable($bookset,0);
	$a = $cro_ttable->calc_upcomming_activities();
	$links = (count($a) >= 2)? '<div class="upcprevnext"><div class="upcprev">&nbsp;</div><div class="upcnext">&nbsp;</div></div>' : '';



	if (count($a) >= 1) {
		if ($a[0]['alttitle'] == '') {
			$title = $a[0]['activityname'] . ' ' . __('with','localize') . ' ' . $a[0]['trainername'];
		} else {
			$title = stripslashes($a[0]['alttitle']);
		}	 



	?>
	<div class="twelve columns columnt-upcomming clearfix">
		<div class="upcclasses">
			<div class="dateannounce">
				<?php echo $title; ?>
			</div>

			<div class="dateatime">
				<span><?php  echo $a[0]['fromto']; ?></span>
			</div>

			<div class="dateset">
				<div class="dateday"><?php echo $a[0]['day']; ?></div>
				<div class="datemonth"><?php echo $a[0]['date']; ?></div>
			</div>

			<div class="dateactivity">
				<?php echo $a[0]['activityimg']; ?>
			</div>

			<div class="trainerimg">
				<?php echo $a[0]['trainerimg']; ?>
			</div>
			<?php echo $links; ?>
		</div>
	</div>

	<?php 
	}

}

?>
