<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Elakisto
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="search-post-type">
		<?php echo get_post_type() == 'jetpack-portfolio' ? esc_html__( 'portfolio', 'elakisto' ) : get_post_type(); ?>
	</div>
	<div class="search-post-text-img container container-medium clear">
		<?php elakisto_post_thumbnail(); ?>
		<header class="entry-header">
			<?php if ( 'post' === get_post_type() || 'jetpack-portfolio' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php
				elakisto_archive_meta();
				?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
