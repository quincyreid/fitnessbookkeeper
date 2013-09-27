<?php
/**
 * The template for displaying member pages.
 *
 *
 */
 
get_header(); 

$tlset = get_option( 'tlset' );


?>

<?php 

	if (isset($tlset['cro_showbanindex']) && $tlset['cro_showbanindex'] == 1 ){
		$ps =  cro_fetch_banner('inner'); 
	} else {
		$ps =  ''; 
	}


?>


			
	<?php while ( have_posts() ) : the_post();

		$sbar = get_post_meta($post->ID, 'cro_sidebar', true);
		echo cro_headerimg($post->ID, 'post', $ps);			
	?>

	<div class="main singleitem">				
		<div class="row singlepage singlepost">

			<?php if (isset($tlset['cro_ttablebanner']) && $tlset['cro_ttablebanner'] == 3) { ?>
				<?php get_template_part( 'public/tparts/upcomming-times'); ?>	
			<?php } ?>	

			<?php if ($sbar == 1 || $sbar == '') { ?>


				<div class="eight column columnopaddingright">
					<div class="columnmakebackground">
						<?php get_template_part( 'public/tparts/content', get_post_format() ); 
						$tag_list = get_the_tag_list( '', __( ', ', 'localize' ) );
						?>
						<?php wp_link_pages(); ?> 
						<?php comments_template('', ''); ?>
					</div>
				</div>

				<div class="four column columnopaddingleft">
					<?php get_sidebar(); ?>
				</div>



			<?php } else { ?>

				<div class="twelve column">
					<div class="columnmakebackground">
						<?php get_template_part( 'public/tparts/content', get_post_format() ); ?>
					</div>
				</div>

			<?php } ?>
			
		</div>
	</div>

	<?php endwhile; // end of the loop. ?>


	<div class="feedbackholder">
	<?php if (isset($tlset['cro_feedbackbanner']) &&   $tlset['cro_feedbackbanner'] == 3) { ?>
			<?php echo get_feedbackcontent('random'); ?>
	<?php } ?>	
	</div>


<?php get_footer(); ?>