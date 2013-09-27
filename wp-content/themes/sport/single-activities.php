<?php
/**
 * The template for displaying member pages.
 *
 *
 * 
 */
 
$tlset = get_option( 'tlset' );
get_header(); 


$settings = get_option('bookset');
$teamarr = $settings['activityset'];
$teamparr = array();

if (isset($teamarr) & !empty($teamarr)) {
	foreach ($teamarr as $c_v) {
		$teamparr[] = $c_v['name'];
	}
}


?>
				
	<?php while ( have_posts() ) : the_post();

		$sbar = get_post_meta($post->ID, 'cro_sidebar', true);
		echo cro_headerimg($post->ID, 'event');				
	?>

	<div class="main singleitem">				
		<div class="row singlepage">


			<?php if (isset($tlset['cro_ttablebanner']) && $tlset['cro_ttablebanner'] == 3) { ?>
				<?php get_template_part( 'public/tparts/upcomming-times'); ?>	
			<?php } ?>	

			<?php
			$prq = get_post_meta($post->ID, 'cro_showpromo', true);
			$prw = get_post_meta($post->ID, 'cro_showpromowhat', true);
			if ($prq == 2 ) {
			 echo '<div class="cro_banner-pagetop">' . $ps . '</div>'; 
			}
			 ?>

			<?php if ($sbar == 1) { ?>


				<div class="eight column">
					<?php 

					$slinky = get_post_meta($post->ID, 'cro_linktimetable', true);


					if ($slinky != 0) {
						$silinky = '<div class="post-nav clearfix"><ul><li><a href="' . get_permalink($slinky)  . '">' . __('View Timetable','')  . '</a></li></ul></div>';
					} else {
						$silinky = '';
					}

					echo $silinky;

					$img =  get_the_post_thumbnail($post->ID,'team');


					$pmetr = get_post_meta($post->ID, 'cro_activity_metas', true);
					$pdesc = get_post_meta($post->ID, 'cro_teamdesc', true); 


					if ($pdesc != ''){
						$pdesc = '<p class="cro_singleteamdesc cro_singleactivitydesc">' . $pdesc   . '</p>';
					}


					if ($img){

						echo '<div class="cro_singleteamimg clearfix">' .  $img . ' ' . $pdesc  .  '</div>';

					}

					if (!empty($pmetr)) {
        
        				$op = '<div class="teamtable cro_mainteampage ">';

        				foreach ($pmetr as $cr_vv) {

        					if (in_array($cr_vv['name'], $teamparr) && $cr_vv['name'] != ''  &&  $cr_vv['val'] != ''   ) {

        						$op .= '<div class="teamtablehead">' .  $cr_vv['name'] . '</div>';

            					$op .= '<div class="teamtablebody">' .  $cr_vv['val'] . '</div>';

        					}

        				}

        				$op .= '</div>';

        				echo $op;
    				}



					get_template_part( 'public/tparts/content', 'page' ); 

					?>
				</div>

				<div class="four column">
					<?php get_sidebar(); ?>
				</div>



			<?php } else { ?>

				<div class="twelve column">
					<?php 

					$slinky = get_post_meta($post->ID, 'cro_linktimetable', true);


					if ($slinky != 0) {
						$silinky = '<div class="post-nav clearfix"><ul><li><a href="' . get_permalink($slinky)  . '">' . __('View Timetable','')  . '</a></li></ul></div>';
					} else {
						$silinky = '';
					}

					echo $silinky;

					$img =  get_the_post_thumbnail($post->ID,'team');


					$pmetr = get_post_meta($post->ID, 'cro_activity_metas', true);
					$pdesc = get_post_meta($post->ID, 'cro_teamdesc', true); 


					if ($pdesc != ''){
						$pdesc = '<p class="cro_singleteamdesc cro_singleactivitydesc">' . $pdesc   . '</p>';
					}


					if ($img){

						echo '<div class="cro_singleteamimg clearfix">' .  $img . ' ' . $pdesc  .  '</div>';

					}

					if (!empty($pmetr)) {
        
        				$op = '<div class="teamtable cro_mainteampage ">';

        				foreach ($pmetr as $cr_vv) {

        					if (in_array($cr_vv['name'], $teamparr) && $cr_vv['name'] != ''  &&  $cr_vv['val'] != ''   ) {

        						$op .= '<div class="teamtablehead">' .  $cr_vv['name'] . '</div>';

            					$op .= '<div class="teamtablebody">' .  $cr_vv['val'] . '</div>';

        					}

        				}

        				$op .= '</div>';

        				echo $op;
    				} ?>
					<?php get_template_part( 'public/tparts/content', 'page' ); ?>
				</div>

			<?php } ?>
			
			<?php
			if ($prq == 3 ) {
			 echo '<div class="cro_banner-pagebottom">' . $ps . '</div>'; 
			}
			?>
		</div>
	</div>

	<?php endwhile; // end of the loop. ?>


	<div class="feedbackholder">
	<?php if (isset($tlset['cro_feedbackbanner']) &&  $tlset['cro_feedbackbanner'] == 3) { ?>
			<?php echo get_feedbackcontent('random'); ?>
	<?php } ?>	
	</div>


<?php get_footer(); ?>