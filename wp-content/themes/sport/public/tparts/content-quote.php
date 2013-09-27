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

	<?php if ( is_search() || is_category() || is_front_page() || is_tag() || is_front_page() || is_home() || is_archive()) : // Only display Excerpts for search pages ?>
		<div class="entry-summary quotesummary">
			<div class="cro_formquote">
			<?php 
				the_excerpt(); 
				$do_button = get_post_meta($post->ID,  'cro_readmore', true);
			?>
			</div>
		</div>
		<?php else : ?>
		<div class="entry-content">
			<?php if ( post_password_required() ) : ?>
				<?php the_content(); ?>

			<?php else : ?>
			<?php the_content(); ?>
		<?php endif; ?>
		
	</div><!-- .entry-content -->
	<?php endif; ?>

</div>
