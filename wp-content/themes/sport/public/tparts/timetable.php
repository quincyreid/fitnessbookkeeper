<?php
/**
 * The template for displaying the timetables
 *
 *
 * @author 		Croma
 * @package 	templates
 * @version     1.0
 */





$darray = array('&nbsp;');
$linesctr = 1;
$daycounter = 380000;
$cromatheme_timetable = new Cromatheme_TimeTable(get_option('cro_booksched'),$no);
$classesarray = $cromatheme_timetable->calc_active_classes();
$contentarray = $cromatheme_timetable->calc_active_info();


for ($i=0; $i < 7 ; $i++) { 
	$daycount = $daycounter + (86400 * $i);
	$darray[] = date_i18n('l', $daycount, false );
}

?>

<div class="responsivewrap">
	<ul class="responsivetimes">
		<?php 
		for ($i=0; $i < 7 ; $i++) { 
			$ab = '';
			$bc = $i + 1;
			$daycount = $daycounter + (86400 * $i);
			foreach($cromatheme_timetable->calc_responsive_list() as $cc_vv){
				if ($cc_vv['day'] == $bc){
					$ab .= '<div class="responsive_singledesc">' . $cc_vv['desc'] . '</div>';
				}
			}

			if ($ab != ''){
				echo '<li><div class="responsive_singletitle">' . date_i18n('l', $daycount, false )  . '</div>' . $ab  . '</li>';
			}

		}
		?>
	</ul>
</div>

<div class="cro_timetablewrap">
	<ul class="cro_hourlines">
		<li class="cro_hlines">
			<ul class="cro_daylines clearfix">
			<?php  for ($i=0; $i < 8; $i++) { ?>
				<li class="cro_dlines cro_titlelines"><?php echo $darray[$i]; ?></li>
			<?php } ?>
			</ul>
		</li>

	<?php for ($i=$cromatheme_timetable->calc_first_hour(); $i < $cromatheme_timetable->calc_last_hour(); $i++) { ?> 
		<li class="cro_hlines">
			<ul class="cro_daylines clearfix">
				<?php 
					for ($j=0; $j < 8; $j++) { 
						if ($j == 0) {
				?>
				<li class="cro_dlines"><?php echo sprintf("%02s", $i); ?>:00 - <?php echo sprintf("%02s", ($i + 1)); ?>:00</li>
				<?php 
						} else {
						$cro_tableclasses = (!empty($classesarray[$i][$j])) ? $classesarray[$i][$j] : 'cro_emptytable' ;
						$cro_tablecontent = (!empty($contentarray[$i][$j])) ? $contentarray[$i][$j] : '&nbsp;' ;
				?>
				<li class="cro_dlines <?php echo $cro_tableclasses ; ?>"><?php echo $cro_tablecontent; ?></li>
				<?php	}
				} ?>
			</ul>
		</li>		
	<?php 
		$linesctr++;
		} 
	?>

	</ul>
</div>