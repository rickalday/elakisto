<?php
/**
 * The template for displaying the Portfolio archive page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Elakisto
 */

get_header();
?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<div class="page-header-top">
					<h1 class="page-title">
						<?php elakisto_archive_title(); ?>
					</h1>
				</div>
				<div class="page-header-bottom">
					<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
				</div>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			?>
			<div class="site-main-archive <?php echo elakisto_archive_class(); ?>">

				<div id="post-load">

					<?php
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					elakisto_numbers_pagination();

				?>
				</div>

			</div>

				<?php

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->

	</div><!-- #primary -->

<?php
get_footer();
