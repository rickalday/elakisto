<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Elakisto
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'container' ); ?>>

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta entry-meta-bottom clear">
			<?php elakisto_insert_sharedaddy(); ?>
		</div>

	</header><!-- .entry-header -->

	<div class="single-content-wrapper">
		<div class="entry-content-wrapper container container-medium">

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
		</div>
		<div class="single-sidebar-wrapper"><?php get_sidebar(); ?></div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
