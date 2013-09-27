<?php
/**
 * footer framework functions
 */ 
   
/********** Code Index
 *
 * -01- ADD MENU DESCRIPTIONS
 * 
 */


add_action( 'croma_footstuff', 'croma_fetch_footstuff' );

function croma_fetch_footstuff() { 
$tlset = get_option( "tlset" );  
$mlabel =  $tlset["menulabel"]; 
?>
<div id="modalholder">&nbsp;</div>
<div class="galholder">&nbsp;</div>

	<script type="text/javascript">
	jQuery(document).ready(function($) {
		swvf = '<?php echo get_template_directory_uri(); ?>/inc/scripts/';
		selectnav('cro-menu', {
 			label: '<?php echo $mlabel; ?>',
  			nested: true,
  			indent: '--'
		});	
	});	
    </script>

<?php  

if ($tlset['cro_ttablebanner'] == 2 || $tlset['cro_ttablebanner'] == 3) {
$cro_tle = new Cromatheme_TimeTable(get_option('cro_booksched'),0);
$aa = $cro_tle->calc_upcomming_activities();
$cntr = count($aa);

$counters = ($cntr <= 15)? $cntr : 15;
$datass = '';

?>
	<script type="text/javascript">
	var Cromatimes = [
<?php

if ($cntr >= 2) {	
	for ($j=0; $j < $counters ; $j++) { 

		if ($aa[$j]['alttitle'] == ''  && $aa[$j]['trainername'] != '') {
			$ttitle = $aa[$j]['activityname'] . ' ' . __('with','localize') . ' ' . $aa[$j]['trainername'];
		} elseif($aa[$j]['alttitle'] == ''  && $aa[$j]['trainername'] == '') {
			$ttitle = $aa[$j]['activityname'];
		} else {
			$ttitle = stripslashes($aa[$j]['alttitle']);
		}  


		$datass .= '{img1: "' . $aa[$j]['activitysrc'][0]  . '", img2: "' . $aa[$j]['trainersrc'][0]  . '", day: "' . htmlentities($aa[$j]['day'])  . '",date: "' . htmlentities($aa[$j]['date'])  . '",time: "' . htmlentities($aa[$j]['fromto'])  . '",title: "' . htmlentities($ttitle)  . '"},';
	}

	$datass = rtrim($datass,',');

}

?>
	<?php echo $datass; ?>
	]</script>
<?php 

} else {
?>
	<script type="text/javascript">
		var Cromatimes = [];
    </script>

<?php 
}




if ($tlset['cro_feedbackbanner'] == 2 || $tlset['cro_feedbackbanner'] == 3) {
	$strs 	= cro_get_feedbarray('feedbacks');
	shuffle($strs);
	$data_f = '';


?>
	<script type="text/javascript">
	var Cromafeedbacks = [
<?php

if (count($strs) >= 2){
	foreach ($strs as $v_s) {
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($v_s), 'thumbnail' );
		$turl = $thumb['0']; 
		$tpost = get_post($v_s);

		$data_f .= '{img: "' . $turl  . '", title: "' . htmlentities($tpost->post_title)  . '", content: "' . htmlentities($tpost->post_content)  . '"},';

	}

	$data_f = rtrim($data_f,',');
}

?>
	<?php echo $data_f; ?>
	]</script>
<?php 

} else {
?>
	<script type="text/javascript">
		var Cromafeedbacks = [];
    </script>

<?php 
}





}


if (defined('CROCSH') && CROCSH == '1') {
	add_action( 'croma_sch', 'croma_create_sch' );

	function croma_create_sch() {     
	?>

	<div class="cro_sch" rel="<?php echo get_template_directory_uri(); ?>/public/styles/cs-">
		<div class="cro_sec">
			<div class="secpoint" style="background: #E8AF46;" rel="1">&nbsp;</div>
			<div class="secpoint" style="background: #BD3741;" rel="2">&nbsp;</div>
			<div class="secpoint" style="background: #D15B23" rel="3">&nbsp;</div>
			<div class="secpoint" style="background: #9DAF20;" rel="4">&nbsp;</div>
			<div class="secpoint" style="background: #4784BF" rel="5">&nbsp;</div>
			<div class="secpoint" style="background: #CF6795;" rel="6">&nbsp;</div>
			<div class="secpoint" style="background: #C89FC1;" rel="7">&nbsp;</div>
		</div>

		<div class="cro_prim" rel="<?php echo get_template_directory_uri(); ?>/public/styles/images">
			<div class="secpoint prim" style="background: #fff; top: 185px;" rel="1">&nbsp;</div>
			<div class="secpoint prim" style="background: #000; top: 205px;" rel="2">&nbsp;</div>
		</div>

	</div>

	<?php  
	}

}
 
?>