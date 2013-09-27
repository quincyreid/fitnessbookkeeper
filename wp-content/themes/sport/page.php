<?php
/**
 * The template for displaying pages.
 *
 *
 * 
 */
 
$tlset = get_option( 'tlset' );
  

get_header(); 

?>
			
	<?php while ( have_posts() ) : the_post();
		$sbar = get_post_meta($post->ID, 'cro_sidebar', true);
		echo cro_headerimg($post->ID, 'page');			
	?>

	<div class="main singleitem">				
		<div class="row singlepage">

			<?php if (isset($tlset['cro_ttablebanner']) && $tlset['cro_ttablebanner'] == 3) { ?>
				<?php get_template_part( 'public/tparts/upcomming-times'); ?>	
			<?php } ?>	


			<?php if ($sbar == 1) { ?>


				<div class="eight column">
					<?php get_template_part( 'public/tparts/content', 'page' ); ?>
				</div>

				<div class="four column">
					<?php get_sidebar(); ?>
				</div>



			<?php } else { ?>

				<div class="twelve column">
					<div class="columnmakebackground">
						<?php get_template_part( 'public/tparts/content', 'page' ); ?>
					</div>
				</div>

			<?php } ?>
			
		</div>
	</div>

	<?php endwhile; // end of the loop. ?>


	<div class="feedbackholder">
	<?php if (isset($tlset['cro_feedbackbanner']) &&  $tlset['cro_feedbackbanner'] == 3) { ?>
			<?php echo get_feedbackcontent('random'); ?>
	<?php } ?>	
	</div>


<?php get_footer(); ?>