<?php
/**
 * The template for displaying category pages.
 *
 *
 */
  

get_header(); 

$tlset = get_option( 'tlset' );
?>

				
<?php echo cro_headerimg('', 'category');?>

<div class="main singleitem">				
	<div class="row singlepage">

		<?php 
		if (isset($tlset['cro_ttablebanner']) && $tlset['cro_ttablebanner'] == 2) { 
			get_template_part( 'public/tparts/upcomming-times'); 
		} 
		?>	

		<div class="eight column columnopaddingright">
			<div class="columnmakebackground">
				

				<?php 
					while ( have_posts() ) : the_post();
					get_template_part( 'public/tparts/content', get_post_format() ); 
					endwhile; 
				?>

				<?php cro_paging(); ?>
			</div>
		</div>

		<div class="four column  columnopaddingleft">
			<?php get_sidebar(); ?>
		</div>			
	</div>
</div>

<div class="feedbackholder">
	<?php 
	if (isset($tlset['cro_feedbackbanner']) &&  $tlset['cro_feedbackbanner'] == 3) {
		echo get_feedbackcontent('random');
	} 
	?>	
</div>




<?php get_footer(); ?>