<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Elakisto
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-wrapper clear">
		<?php elakisto_featured_image(); ?>

		<div class="entry-text">
			<header class="entry-header">
				<?php
				if ( 'post' == get_post_type() || 'jetpack-portfolio' == get_post_type() ) :
					?>
					<div class="entry-meta">
						<?php
						elakisto_archive_meta();
						?>
					</div><!-- .entry-meta -->
				<?php endif;

				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				?>
			</header><!-- .entry-header -->

			
				<?php
					if ( is_single() ) { ?>
						<div class="entry-content">
						<?php the_content(); ?>
						</div><!-- .entry-content -->
				<?php	}
				?>
			
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
