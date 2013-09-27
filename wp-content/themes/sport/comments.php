<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>



<?php

/**
 * The comments section for our theme.
 *
 *
 * @package Cromathemes
 * @subpackage Sport
 * @since 1.0
 */

if ( post_password_required() )
	return;
?>

<?php if ( have_comments() ) : ?>
<div id="comments" class="comments-area">
<?php endif;  ?>
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title cro_accent">
			<?php
				printf( _n( 'Replies for %2$s', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'localize' ),
					number_format_i18n( get_comments_number() ), '<span>&ldquo;' . get_the_title() . '&rdquo;</span>' );
			?>
		</h2>

		<ul class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'cro_comment', 'style' => 'ul' ) ); ?>
		</ul>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'localize' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'localize' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'localize' ) ); ?></div>
		</nav>
		<?php endif;  ?>

		<?php
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'localize' ); ?></p>
		<?php endif; ?>

	<?php endif;  ?>


	<?php comment_form(); ?>
<?php if ( have_comments() ) : ?>
</div>
<?php endif;  ?>