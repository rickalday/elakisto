<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Elakisto
 */

?>

<?php
	if ( 'gallery' == get_post_format() ) :
		elakisto_featured_media();
	endif;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'container' ); ?>>

	<header class="entry-header">

		<div class="entry-meta">
			<?php elakisto_archive_meta(); ?>
		</div><!-- .entry-meta -->

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta entry-meta-bottom clear">
			<?php elakisto_single_posted_by(); ?>
			<?php elakisto_insert_sharedaddy(); ?>
		</div>

	</header><!-- .entry-header -->

	<div class="single-content-wrapper">
		<div class="single-navigation-wrapper"><?php elakisto_post_navigation(); ?></div>
		<div class="entry-content-wrapper container container-medium">
			<?php
				if ( 'gallery' != get_post_format() ) :
					elakisto_featured_media();
				endif;
			?>

			<div class="entry-content">
				<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'elakisto' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'elakisto' ),
					'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php elakisto_single_footer(); ?>
				<?php elakisto_insert_sharedaddy(); ?>
			</footer><!-- .entry-footer -->
		</div>
		<div class="single-sidebar-wrapper"><?php get_sidebar(); ?></div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
