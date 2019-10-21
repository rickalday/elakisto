<?php
/**
 * Template Name: Portfolio
 *
 * @package Elakisto
 */

get_header(); ?>

		<div id="primary" class="content-area container">
			<main id="main" class="site-main">

			<?php while ( have_posts() ) : the_post(); ?>

				<header class="page-header">
					<div class="page-header-top">
						<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
					</div>
					<div class="page-header-bottom">
						<?php
							$thecontent = get_the_content();
							if(!empty($thecontent)) { ?>
							<div class="archive-description">
								<p><?php echo $thecontent; ?></p>
							</div>

						<?php } ?>
					</div>
				</header><!-- .page-header -->

			<?php

			endwhile;

			wp_reset_postdata();
			?>

				<?php
				/* Start the Loop */
				?>
				<div class="site-main-archive <?php echo elakisto_archive_class(); ?>">

					<?php
					global $paged, $wp_query, $wp;
					$args = wp_parse_args($wp->matched_query);
					if ( !empty ( $args['paged'] ) && 0 == $paged ) {
						$wp_query->set('paged', $args['paged']);
						$paged = $args['paged'];
					}
					$paged          = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
					$posts_per_page = get_option( 'jetpack_portfolio_posts_per_page', '8' );

					$args = array(
						'post_type'      => 'jetpack-portfolio',
						'posts_per_page' => $posts_per_page,
						'paged'			 => $paged
					);

					$wp_query = new WP_Query ( $args );

					?>

					<?php
					if ( post_type_exists( 'jetpack-portfolio' ) && $wp_query->have_posts() ) { ?>
						<div id="post-load">
							<?php

								while ( $wp_query->have_posts() ) : $wp_query->the_post();

									get_template_part( 'template-parts/content', get_post_type() );

								endwhile;

								elakisto_numbers_pagination();
							?>

						</div>
					<?php
					} else {
					?>
						<div class="no-content">
							<h4><?php esc_html_e( 'Nothing Found', 'elakisto' ); ?></h4>

						</div>

					<?php } ?>


					<?php get_sidebar(); ?>

				</div>

			</main><!-- #main -->

		</div><!-- #primary -->

<?php get_footer(); ?>
