<?php
/**
 * The main template file.
 *
 * Template Name: Front page
 */
 
  $tlset = get_option( 'tlset' );
  get_header(); 

  $tlset = get_option( 'tlset' );
if (isset($tlset['cro_slidelink'])){
	$cro_slidelink 	= $tlset['cro_slidelink'];
} else {
	$cro_slidelink = '';
} 
 
?>

<div class="sliderout">

	<?php 
	if (function_exists('layerslider') && $cro_slidelink == '') { 
		echo '<div class="cro_welcome"><h2 class="cro_accent">Theme and layerslider plugin was installed sucessfully <br/><br/>no slide created and saved in croma.dash<br/><br/> Click here to learn more.</h2></div>';
	} elseif (function_exists('layerslider')){
		layerslider($cro_slidelink); 
	} else {
		echo '<div class="cro_welcome"><h1 class="cro_accent">Theme was installed sucessfully but layerslider plugin was not detected.<br/><br/> Click here to learn more.</h1></div>';
	}

	?> 
</div>

<div class="main frontmain">
	<div class="upact">
		<div class="row">	
			<?php if (isset($tlset['cro_ttablebanner']) && $tlset['cro_ttablebanner'] == 2 || $tlset['cro_ttablebanner'] == 3) { ?>
			<?php get_template_part( 'public/tparts/upcomming-times'); ?>	
			<?php } ?>	
			<?php echo get_frontcontent(); ?>
		</div>
	</div>

	<div class="row">
		
		<div class="frontouter">
			<div class="eight columns">
				<?php 
					if (isset($tlset['cro_welcomepage']) && $tlset['cro_welcomepage'] >= 1)
					{							
						echo tl_fetch_welcomenote($tlset['cro_welcomepage']);				
					} 
				?>


				<div class="six columns cro_pdl">
					<?php 
						if ( is_active_sidebar( 'trifronttop' ) ) 
						{ 
							echo '<ul class="mainwidget">';
							dynamic_sidebar( 'trifronttop' );
							echo '</ul>';
						} 
					?>	
				</div>



				<div class="six columns cro_pdr">
					<?php 
						if ( is_active_sidebar( 'tcifronttop' ) ) 
						{ 
							echo '<ul class="mainwidget">';
							dynamic_sidebar( 'tcifronttop' );
							echo '</ul>';
						} 
					?>	
				</div>
			</div>


			<div class="four columns">
				<?php 
					if ( is_active_sidebar( 'tlifronttop' ) ) 
					{ 
						echo '<ul class="mainwidget">';
						dynamic_sidebar( 'tlifronttop' );
						echo '</ul>';
					} 
				?>	
			</div>
		</div>
	</div>
	<div class="feedbackholder">
	<?php if (isset($tlset['cro_feedbackbanner']) && $tlset['cro_feedbackbanner'] == 2 || $tlset['cro_feedbackbanner'] == 3) { ?>
			<?php echo get_feedbackcontent('random'); ?>
	<?php } ?>	
	</div>
</div>
			
<?php get_footer(); ?>
