<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Elakisto
 */

get_header();
?>

	<section id="primary" class="content-area container">
		<main id="main" class="site-main">

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( '%sSearch Results for:%s%s', 'elakisto' ), '<span class="search-for">', '</span>', get_search_query()  );
					?>
				</h1>

				<?php elakisto_search_results_count(); ?>
			</header><!-- .page-header -->

			<div id="post-load" class="posts">

			<?php
			if ( have_posts() ) :
			/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );

				endwhile;

				elakisto_numbers_pagination();

			else :
				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
			</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
