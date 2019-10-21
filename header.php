<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Elakisto
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'elakisto' ); ?></a>

	<header id="masthead" class="site-header container">
		<table>
			<tr>
				<td class="site-branding-td">
					<?php
						$nav_alignment = get_theme_mod( 'header_nav_align_setting', 'left' );
						if ( $nav_alignment == 'hamburger') { ?>
							<nav id="site-navigation" class="main-navigation">
								<button id="menu-toggle-button" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
									<span class="screen-reader-text">
										<?php esc_html_e( 'Primary Menu', 'elakisto' ); ?>
									</span>
									<i class="icon-hamburger">
										<span class="icon-hamburger-line"></span>
										<span class="icon-hamburger-line"></span>
										<span class="icon-hamburger-line"></span>
									</i>
								</button>
								<div class="menu-wrapper">
									<?php elakisto_site_branding(); ?>
									<?php
										wp_nav_menu( array(
											'theme_location' => 'menu-1',
											'menu_id'        => 'primary-menu',
											'depth' => 3,
										) );
									?>
									<button id="menu-close-button" class="menu-close">
										<span>
										<?php esc_html_e( 'Close', 'elakisto' ); ?>
									</span>
									<i class="icon-close">
										<span class="icon-close-line"></span>
										<span class="icon-close-line"></span>
									</i>
									</button>
								</div>
								<div class="menu-background"></div>
							</nav><!-- #site-navigation -->
						<?php } else { ?>

							<button id="menu-toggle-button" class="menu-toggle mobile-menu-toggle" aria-controls="primary-menu" aria-expanded="false">
								<span class="screen-reader-text">
									<?php esc_html_e( 'Primary Menu', 'elakisto' ); ?>
								</span>
								<i class="icon-hamburger">
									<span class="icon-hamburger-line"></span>
									<span class="icon-hamburger-line"></span>
									<span class="icon-hamburger-line"></span>
								</i>
							</button>

						<?php
						}
					?>
					<?php elakisto_site_branding(); ?>
				</td>

				<?php
				if ( $nav_alignment != 'hamburger') { ?>
					<td class="main-navigation-td">
						<nav id="site-navigation" class="main-navigation">

							<div class="menu-wrapper">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'menu-1',
										'menu_id'        => 'primary-menu',
										'depth' => 3,
									) );
								?>
								<button id="menu-close-button" class="menu-close">
									<span>
									<?php esc_html_e( 'Close', 'elakisto' ); ?>
								</span>
								<i class="icon-close">
									<span class="icon-close-line"></span>
									<span class="icon-close-line"></span>
								</i>
								</button>
							</div>
							<div class="menu-background"></div>
						</nav><!-- #site-navigation -->
						<?php if ( function_exists( 'jetpack_social_menu' ) ) {
							if ( has_nav_menu( 'jetpack-social-menu' ) ) { ?>
							<!-- Social menu -->
							<div id="bigSocialWrap" class="social-wrapper">
								<?php elakisto_social_menu(); ?>
							</div>
						<?php
							}
						}
						?>
					</td>
				<?php } else { ?>

					<td class="main-navigation-td">
						<?php if ( function_exists( 'jetpack_social_menu' ) ) {
							if ( has_nav_menu( 'jetpack-social-menu' ) ) { ?>
							<!-- Social menu -->
							<div id="bigSocialWrap" class="social-wrapper">
								<?php elakisto_social_menu(); ?>
							</div>
						<?php
							}
						}
						?>
					</td>
				<?php
				}
				?>

				<td class="social-search-td">
					<div class="social-search-wrapper">
						<?php if ( function_exists( 'jetpack_social_menu' ) ) {
							if ( has_nav_menu( 'jetpack-social-menu' ) ) { ?>
							<!-- Social menu -->
							<button class="social-button">
								<span class="social-follow"><?php esc_html_e( 'Follow', 'elakisto' ); ?></span>
								<span class="social-close"><?php esc_html_e( 'Close', 'elakisto' ); ?>
									<i class="icon-close">
										<span class="icon-close-line"></span>
										<span class="icon-close-line"></span>
									</i>
								</span>
							</button>
						<?php
							}
						}
						?>

						<!-- Search form -->
						<button class="big-search-trigger">
							<span class="screen-reader-text"><?php esc_html_e( 'open search form', 'elakisto' ); ?></span>
							<i class="icon-search"></i>
						</button>
					</div>
				</td>
			</tr>
		</table>
	</header><!-- #masthead -->
	<!-- Search form -->
	<div class="search-wrap">
		<div class="search-line">
			<span class="search-instructions"><?php esc_html_e( 'Search and Hit Enter', 'elakisto' ); ?></span>
			<?php get_search_form(); ?>
		</div>
		<button class="big-search-close">
			<span><?php esc_html_e( 'Close', 'elakisto' ); ?></span>
			<i class="icon-close">
				<span class="icon-close-line"></span>
				<span class="icon-close-line"></span>
			</i>
		</button>
	</div>
	<div class="menu-background"></div>

	<div id="content" class="site-content">
