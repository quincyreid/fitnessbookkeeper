<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>


<?php
/**
 * The 404 page for our theme.
 *
 *
 * @package Cromathemes
 * @subpackage Sport
 * @since 1.0
 */
 
$tlset = get_option( 'tlset' );
get_header(); ?>
<?php 				
	echo cro_headerimg(0, '404');
?>

<div class="main singleitem">				
	<div class="row singlepage">

		<?php 
		if (isset($tlset['cro_ttablebanner']) && $tlset['cro_ttablebanner'] == 3) { 
			get_template_part( 'public/tparts/upcomming-times'); 	
		} 
		?>	

		<div class="eight column">
			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'localize' ); ?></p>
		</div>

		<div class="four column">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>


<?php get_footer(); ?>