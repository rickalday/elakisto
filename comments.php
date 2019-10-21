<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Elakisto
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area container container-medium">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$elakisto_comment_count = get_comments_number();
			if ( '1' === $elakisto_comment_count ) {
				echo esc_html__( '1 Comment', 'elakisto' );
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number */
					esc_html( '%1$s Comments', 'elakisto' ), $elakisto_comment_count
				);
			}
			?>
			<span class="icon-arrow-down">
				<span class="icon-arrow-line"></span>
			</span>
		</h2><!-- .comments-title -->

		<div class="comment-list-wrapper">
			<?php the_comments_navigation(); ?>

			<ol class="comment-list">
				<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => 40,
				) );
				?>
			</ol><!-- .comment-list -->

			<?php
			the_comments_navigation(); ?>

			<?php
			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() ) :
				?>
				<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'elakisto' ); ?></p>
				<?php

			else :

				comment_form();

			endif; ?>

		</div>

	<?php
	else : ?>

		<h2 class="comments-title">
			<?php echo esc_html__( 'No Comments', 'elakisto' ); ?>
			<span class="icon-arrow-down">
				<span class="icon-arrow-line"></span>
			</span>
		</h2><!-- .comments-title -->

		<div class="comment-list-wrapper">
			<?php comment_form(); ?>
		</div>

	<?php
	endif; // Check for have_comments().
	?>
</div><!-- #comments -->
