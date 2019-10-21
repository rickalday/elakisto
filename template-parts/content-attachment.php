<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Elakisto
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'container' ); ?>>

	<div class="attachment-content">
		<?php
		$image_size = apply_filters( 'wporg_attachment_size', 'large' );
		echo wp_get_attachment_image( get_the_ID(), $image_size ); ?>

	</div><!-- .entry-content -->

	<header class="entry-header">

		<div class="entry-meta">
			<?php elakisto_archive_meta(); ?>
		</div><!-- .entry-meta -->

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta entry-meta-bottom clear">
			<?php elakisto_insert_sharedaddy(); ?>
		</div>

	</header><!-- .entry-header -->

</article><!-- #post-<?php the_ID(); ?> -->
