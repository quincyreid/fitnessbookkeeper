<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>


<?php
/**
 * The archive page for our theme.
 *
 *
 * @package Cromathemes
 * @subpackage Sport
 * @since 1.0
 */
  

get_header(); 
$tlset = get_option( 'tlset' );
?>

				
<?php echo cro_headerimg('', 'archive');?>

<div class="main singleitem">				
	<div class="row singlepage">
		<div class="eight column">
				
			<?php 
			while ( have_posts() ) : the_post();
				get_template_part( 'public/tparts/content', get_post_format() ); 
			endwhile; 
			?>

			<?php cro_paging(); ?>
			
		</div>

		<div class="four column">
			<?php get_sidebar(); ?>
		</div>			
	</div>
</div>
	
<?php get_footer(); ?>