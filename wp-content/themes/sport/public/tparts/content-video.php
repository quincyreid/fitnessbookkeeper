<?php
/**
 * The template for displaying posts in the Gallery Post Format on index and archive pages
 *
 */
?>


<?php
	$tlset = get_option( 'tlset' );

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php 

	$vidc = get_post_meta( $post->ID, 'cro_videogal', true );
	$vidf = '';


	if ($vidc) {
		 $ttturi = cro_identifyvideo($vidc, 0);
        if (isset($ttturi['frame']) && $ttturi['frame']) {         
            $vidf = $ttturi['frame'];
        }
	}

	?>

	<?php if ($vidc) { ?>

	<div class="flex-video widescreen vimeo">
			<?php echo $vidf; ?>
	</div>


	<?php } ?>
	

	<?php if ( is_search() || is_category() || is_front_page() || is_tag() || is_front_page() || is_home() || is_archive()) : // Only display Excerpts for search pages ?>
		
	<?php else : ?>
		<div class="entry-content">
			<?php if ( post_password_required() ) : ?>
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'localize' ) ); ?>

			<?php else : ?>
				
				<?php the_content(); ?>
					
		<?php endif; ?>
		
	</div><!-- .entry-content -->
	<?php endif; ?>

</div>
