<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Elakisto
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class( 'portfolio-entry' ); ?>>

	<div class="jetpack-single-content-wrapper">

		<div class="portfolio-entry-content-wrapper container container-medium">
			<a href="<?php the_permalink(); ?>"><?php elakisto_featured_media(); ?></a>
		</div>

		<header class="entry-header">
			<?php the_title( '<h6 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h6>' ); ?>
		</header><!-- .entry-header -->
		

	</div>
</article><!-- #post-<?php the_ID(); ?> -->
