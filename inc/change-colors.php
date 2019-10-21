<?php
/**
 * Change colors regarding user choices in customizer
 *
 * @package elakisto
 */


function elakisto_change_colors() {

/**
 * GENERAL THEME COLORS
 */

$body_bg_color         = get_theme_mod( 'elakisto_body_bg_color', '#ffffff' );
$accent_color          = get_theme_mod( 'elakisto_accent_color', '#616369' );
$headline_color        = get_theme_mod( 'elakisto_headline_color', '#000' );
$text_color            = get_theme_mod( 'elakisto_paragraph_color', '#000' );
$sec_body_bg_color     = get_theme_mod( 'elakisto_sec_body_bg_color', '#222' );
$sec_text_color        = get_theme_mod( 'elakisto_sec_text_color', '#fcfcfc' );

$change_colors_style = '

	/* Body BG color */

	body {
		color: '. esc_attr( $text_color ) .';
		background: '. esc_attr( $body_bg_color ) .';
	}

	h1,
	h2,
	h3,
	h4,
	h5,
	h6,
	.title,
	.site-title,
	.footer-newsletter .mc_custom_border_hdr,
	.footer-newsletter #mc_subheader,
	.single-navigation-wrapper .post-nav-title {
		color: '. esc_attr( $headline_color ) .';
	}

	.front-cta h1,
	.front-cta h2,
	.front-cta h3,
	.front-cta h4,
	.front-cta h5,
	.front-cta h6,
	.front-slider h1,
	.front-slider h2,
	.front-slider h3,
	.front-slider h4,
	.front-slider h5,
	.front-slider h6,
	body:not(.search) #post-load article.sticky h1,
	body:not(.search) #post-load article.sticky h2,
	body:not(.search) #post-load article.sticky h3,
	body:not(.search) #post-load article.sticky h4,
	body:not(.search) #post-load article.sticky h5,
	body:not(.search) #post-load article.sticky h6,
	.front-archive article.sticky h1,
	.front-archive article.sticky h2,
	.front-archive article.sticky h3,
	.front-archive article.sticky h4,
	.front-archive article.sticky h5,
	.front-archive article.sticky h6 {
		color: '. esc_attr( $sec_text_color ) .';
	}

	hr {
		background-color: '. elakisto_hex2rgba( $text_color , 0.1 ) .';
	}

	pre {
		border-color: '. elakisto_hex2rgba( $text_color , 0.2 ) .';
	}

	abbr, acronym {
		border-bottom-color: '. elakisto_hex2rgba( $text_color , 0.2 ) .';
	}

	mark, ins {
		background: '. elakisto_hex2rgba( $text_color , 0.1 ) .';
	}

	.main-navigation .current-page-item > a,
	.main-navigation .current-menu-item > a {
		border-bottom-color: '. esc_attr( $text_color ) .';
	}

	.main-nav-align-hamburger .main-navigation .current-page-item > a,
	.main-nav-align-hamburger .main-navigation .current-menu-item > a {
		border-bottom-color: '. esc_attr( $sec_text_color ) .';
	}

	#post-load .entry-meta,
	.front-archive .entry-meta,
	.search-post-text-img .entry-meta,
	.posts-navigation a,
	p.instagram-username a,
	.footer-site-copyright,
	.entry-content-wrapper .entry-footer,
	.comment-metadata a,
	.logged-in-as,
	.comment-notes {
		color: '. elakisto_hex2rgba( $text_color , 0.7 ) .';
	}

	body:not(.search) .sticky .cat-links {
		color: '. esc_attr( $sec_text_color ) .';
	}

	body:not(.search) #post-load .sticky .entry-meta,
	.front-archive .sticky .entry-meta,
	.front-slider-two .cat-links,
	.front-slider-float .cat-links {
		color: '. elakisto_hex2rgba( $sec_text_color , 0.7 ) .';
	}

	.cat-links {
		color: '. esc_attr( $accent_color ) .';
	}

	.single .entry-header,
	.page:not(.page-template) .entry-header {
		border-bottom-color: '. elakisto_hex2rgba( $accent_color , 0.5 ) .';
	}

	input::-webkit-input-placeholder,
	textarea::-webkit-input-placeholder {
		color: '. esc_attr( $text_color ) .';
	}

	input:-moz-placeholder,
	textarea:-moz-placeholder {
		color: '. esc_attr( $text_color ) .';
	}

	input::-moz-placeholder,
	textarea::-moz-placeholder {
		color: '. esc_attr( $text_color ) .';
	}

	@media screen and (min-width: 1200px) {

		a:hover,
		a:focus,
		a:active {
			color: '. elakisto_hex2rgba( $text_color , 0.7 ) .';
		}

		body:not(.search) .sticky a:hover,
		body:not(.search) .sticky a:focus,
		body:not(.search) .sticky a:active,
		.front-slider-wrapper a:hover,
		.front-slider-wrapper a:focus,
		.front-slider-wrapper a:active {
			color: '. elakisto_hex2rgba( $sec_text_color , 0.7 ) .';
		}

		#post-load .entry-meta a:hover,
		#post-load .entry-meta a:focus,
		#post-load .entry-meta a:active,
		.front-archive .entry-meta a:hover,
		.front-archive .entry-meta a:focus,
		.front-archive .entry-meta a:active,
		.posts-navigation a:hover,
		.posts-navigation a:focus,
		.posts-navigation a:active,
		p.instagram-username a:hover,
		p.instagram-username a:focus,
		p.instagram-username a:active,
		.footer-site-copyright a:hover,
		.footer-site-copyright a:focus,
		.footer-site-copyright a:active,
		.entry-content-wrapper .entry-footer a:hover,
		.entry-content-wrapper .entry-footer a:focus,
		.entry-content-wrapper .entry-footer a:active,
		.search-post-text-img .entry-meta:hover,
		.search-post-text-img .entry-meta:focus,
		.search-post-text-img .entry-meta:active,
		.comment-metadata a:hover,
		.comment-metadata a:focus,
		.comment-metadata a:active,
		.single-navigation-wrapper a:hover,
		.single-navigation-wrapper a:focus,
		.single-navigation-wrapper a:active {
			color: '. esc_attr( $text_color ) .';
		}

		.cat-links a:hover,
		.cat-links a:focus,
		.cat-links a:active,
		#post-load .entry-meta .cat-links a:hover,
		#post-load .entry-meta .cat-links a:focus,
		#post-load .entry-meta .cat-links a:active,
		.front-archive .entry-meta .cat-links a:hover,
		.front-archive .entry-meta .cat-links a:focus,
		.front-archive .entry-meta .cat-links a:active {
			color: '. elakisto_hex2rgba( $accent_color , 0.7 ) .';
		}

		body:not(.search) #post-load .sticky .entry-meta a:hover,
		body:not(.search) #post-load .sticky .entry-meta a:focus,
		body:not(.search) #post-load .sticky .entry-meta a:active,
		.front-archive .sticky .entry-meta a:hover,
		.front-archive .sticky .entry-meta a:focus,
		.front-archive .sticky .entry-meta a:active,
		.front-slider-two .cat-links a:hover,
		.front-slider-two .cat-links a:focus,
		.front-slider-two .cat-links a:active,
		.front-slider-float .cat-links a:hover,
		.front-slider-float .cat-links a:focus,
		.front-slider-float .cat-links a:active {
			color: '. esc_attr( $sec_text_color ) .';
		}

		.entry-content .readmore:hover,
		.entry-content .readmore:focus,
		.entry-content .readmore:active {
			background: '. elakisto_hex2rgba( $accent_color , 0.2 ) .';
		}

		.single-navigation-wrapper a:hover .post-nav-title {
			border-bottom-color: '. esc_attr( $text_color ) .';
		}

		.sticky .entry-content .readmore:hover,
		.sticky .entry-content .readmore:focus,
		.sticky .entry-content .readmore:active,
		.front-slider .entry-content .readmore:hover,
		.front-slider .entry-content .readmore:focus,
		.front-slider .entry-content .readmore:active {
			background: '. elakisto_hex2rgba( $sec_text_color , 0.2 ) .';
			color: '. esc_attr( $sec_text_color ) .';
		}

		.main-navigation a:hover,
		.social-wrapper .jetpack-social-navigation a:hover {
			border-bottom-color: '. esc_attr( $text_color ) .';
			color: '. esc_attr( $text_color ) .';
		}

		.main-nav-align-hamburger .main-navigation a:hover {
			border-bottom-color: '. esc_attr( $sec_text_color ) .';
			color: '. esc_attr( $sec_text_color ) .';
		}

		h1 a:hover,
		h2 a:hover,
		h3 a:hover,
		h4 a:hover,
		h5 a:hover,
		h6 a:hover,
		.title a:hover,
		.site-title a:hover {
			color: '. elakisto_hex2rgba( $headline_color , 0.7 ) .';
		}

		.front-cta h1 a:hover,
		.front-cta h2 a:hover,
		.front-cta h3 a:hover,
		.front-cta h4 a:hover,
		.front-cta h5 a:hover,
		.front-cta h6 a:hover,
		.front-slider h1 a:hover,
		.front-slider h2 a:hover,
		.front-slider h3 a:hover,
		.front-slider h4 a:hover,
		.front-slider h5 a:hover,
		.front-slider h6 a:hover,
		body:not(.search) #post-load article.sticky h1 a:hover,
		body:not(.search) #post-load article.sticky h2 a:hover,
		body:not(.search) #post-load article.sticky h3 a:hover,
		body:not(.search) #post-load article.sticky h4 a:hover,
		body:not(.search) #post-load article.sticky h5 a:hover,
		body:not(.search) #post-load article.sticky h6 a:hover,
		.front-archive article.sticky h1 a:hover,
		.front-archive article.sticky h2 a:hover,
		.front-archive article.sticky h3 a:hover,
		.front-archive article.sticky h4 a:hover,
		.front-archive article.sticky h5 a:hover,
		.front-archive article.sticky h6 a:hover {
			color: '. elakisto_hex2rgba( $sec_text_color , 0.7 ) .';
		}

		.front-slider-two article:hover .entry-title a {
			border-bottom-color: '. esc_attr( $sec_text_color ) .';
		}

		.main-navigation ul ul a:focus,
		.main-navigation ul ul a:active {
			color: '. esc_attr( $sec_text_color ) .';
		}
	}

	button:hover,
	input[type="button"]:hover,
	input[type="reset"]:hover,
	input[type="submit"]:hover {
		border-color: '. esc_attr( $text_color ) .';
	}

	button:active,
	button:focus,
	input[type="button"]:active,
	input[type="button"]:focus,
	input[type="reset"]:active,
	input[type="reset"]:focus,
	input[type="submit"]:active,
	input[type="submit"]:focus {
		border-color: '. esc_attr( $text_color ) .';
	}

	.comment-form input[type="submit"],
	.contact-form input[type="submit"] {
		border-color: '. esc_attr( $accent_color ) .';
	}

	.comment-form input[type="submit"]:hover,
	.comment-form input[type="submit"]:focus,
	.comment-form input[type="submit"]:active,
	.contact-form input[type="submit"]:hover,
	.contact-form input[type="submit"]:focus,
	.contact-form input[type="submit"]:active {
		background: '. elakisto_hex2rgba( $accent_color , 0.2 ) .';
	}

	input[type="text"],
	input[type="email"],
	input[type="url"],
	input[type="password"],
	input[type="search"],
	input[type="number"],
	input[type="tel"],
	input[type="range"],
	input[type="date"],
	input[type="month"],
	input[type="week"],
	input[type="time"],
	input[type="datetime"],
	input[type="datetime-local"],
	input[type="color"] {
		color: '. esc_attr( $text_color ) .';
		border-bottom-color: '. elakisto_hex2rgba( $text_color , 0.2 ) .';
	}

	input[type="text"]:focus,
	input[type="email"]:focus,
	input[type="url"]:focus,
	input[type="password"]:focus,
	input[type="search"]:focus,
	input[type="number"]:focus,
	input[type="tel"]:focus,
	input[type="range"]:focus,
	input[type="date"]:focus,
	input[type="month"]:focus,
	input[type="week"]:focus,
	input[type="time"]:focus,
	input[type="datetime"]:focus,
	input[type="datetime-local"]:focus,
	input[type="color"]:focus {
		border-color: '. esc_attr( $text_color ) .';
	}

	textarea {
		color: '. esc_attr( $text_color ) .';
		border-color: '. elakisto_hex2rgba( $text_color , 0.2 ) .';
	}

	textarea:focus {
		border-color: '. esc_attr( $text_color ) .';
	}

	select {
		border-color: '. elakisto_hex2rgba( $text_color , 0.2 ) .';
	}

	label.checkbox:before,
	input[type="checkbox"] + label:before,
	label.radio:before,
	input[type="radio"] + label:before {
		border-color: '. esc_attr( $text_color ) .';
	}

	.checkbox.checked:before,
	input[type="checkbox"]:checked + label:before {
		background: '. esc_attr( $text_color ) .';
		color: '. esc_attr( $body_bg_color ) .';
	}

	.search-line {
		border-bottom-color: '. elakisto_hex2rgba( $sec_text_color , 0.2 ) .';
	}

	.icon-search:before {
		border-color: '. esc_attr( $text_color ) .';
	}

	.icon-search:after {
		background: '. esc_attr( $text_color ) .';
	}

	.footer-instagram-wrapper {
		border-top-color: '. elakisto_hex2rgba( $text_color , 0.2 ) .';
	}

	#mc_signup_form .mc_input,
	#mc_signup_submit {
		border-color: '. esc_attr( $text_color ) .';
	}

	#mc_signup_submit:hover {
		background: '. elakisto_hex2rgba( $text_color , 0.2 ) .';
	}

	#mc_signup_form .mc_input:not(:focus) {
		border-color: '. elakisto_hex2rgba( $text_color , 0.2 ) .';
	}

	.posts-navigation ul {
		border-top-color: '. elakisto_hex2rgba( $text_color , 0.2 ) .';
	}

	.main-navigation ul ul:before {
		background: '. esc_attr( $sec_body_bg_color ) .';
	}

	.main-navigation ul ul a:hover {
		color: '. esc_attr( $sec_text_color ) .';
		border-bottom-color: '. esc_attr( $sec_text_color ) .';
	}

	.main-navigation ul ul .current-page-item > a,
	.main-navigation ul ul .current-menu-item > a {
		border-bottom-color: '. esc_attr( $sec_text_color ) .';
	}

	.main-navigation ul ul {
		color: '. esc_attr( $sec_text_color ) .';
	}


	.icon-dropdown:before,
	.icon-dropdown:after {
		background: '. esc_attr( $text_color ) .';
	}

	ul ul .icon-dropdown:before,
	ul ul .icon-dropdown:after,
	.main-nav-align-hamburger .icon-dropdown:before,
	.main-nav-align-hamburger .icon-dropdown:after {
		background: '. esc_attr( $sec_text_color ) .';
	}

	@media screen and (max-width: 1200px) {

		.menu-wrapper,
		.social-wrapper {
			background: '. esc_attr( $sec_body_bg_color ) .';
		}

		.main-nav-align-hamburger .toggled .menu-close,
		.toggled .menu-close {
			color: '. esc_attr( $sec_text_color ) .';
		}

		.social-menu-open .social-button {
			color: '. esc_attr( $sec_text_color ) .';
			border-color: '. esc_attr( $sec_text_color ) .';
		}

		.icon-close .icon-close-line {
			background: '. esc_attr( $sec_text_color ) .';
		}

		.big-search-close .icon-close .icon-close-line {
			background: #fff;
		}

	}

	.icon-hamburger .icon-hamburger-line {
		background: '. esc_attr( $text_color ) .';
	}

	.search-wrap,
	.main-nav-align-hamburger .menu-wrapper {
		background: '. esc_attr( $sec_body_bg_color ) .';
	}

	.search-wrap,
	.search-wrap .search-form input[type="search"],
	.main-nav-align-hamburger .menu-wrapper,
	.menu-wrapper .site-title {
		color: '. esc_attr( $sec_text_color ) .';
	}

	.search-wrap input::-webkit-input-placeholder {
		color: '. esc_attr( $sec_text_color ) .';
	}

	.search-wrap input:-moz-placeholder {
		color: '. esc_attr( $sec_text_color ) .';
	}

	.search-wrap input::-moz-placeholder {
		color: '. esc_attr( $sec_text_color ) .';
	}

	.search-wrap .icon-search:before {
		border-color: '. esc_attr( $sec_text_color ) .';
	}

	.search-wrap .icon-search:after,
	.main-nav-align-hamburger .icon-close .icon-close-line {
		background: '. esc_attr( $sec_text_color ) .';
	}

	.search-form {
		border-bottom-color: '. elakisto_hex2rgba( $text_color , 0.5 ) .';
	}

	.widget_calendar table {
		border-color: '. elakisto_hex2rgba( $text_color , 0.2 ) .';
	}

	.has-sidebar #secondary,
	.front-archive-wrapper.archive-has-sidebar #secondary {
		border-left-color: '. elakisto_hex2rgba( $accent_color , 0.4 ) .';
	}

	.page-header-top {
		border-bottom-color: '. elakisto_hex2rgba( $accent_color , 0.5 ) .';
	}

	.results-count {
		border-color: '. elakisto_hex2rgba( $text_color , 0.5 ) .';
	}

	


	.archive-layout-list #post-load article:not(:nth-of-type(1)):not(.sticky) .entry-wrapper,
	.front-archive-list article:not(:nth-of-type(1)):not(.sticky) .entry-wrapper {
		border-top-color: '. elakisto_hex2rgba( $text_color , 0.1 ) .';
	}

	.archive-layout-masonry #post-load article.sticky .entry-header,
	.archive-layout-side #post-load article.sticky .entry-header,
	.front-archive-masonry article.sticky .entry-header,
	.front-archive-side article.sticky .entry-header {
		border-bottom-color: '. elakisto_hex2rgba( $sec_text_color , 0.2 ) .';
	}

	.entry-content .readmore {
		border-color: '. elakisto_hex2rgba( $accent_color , 0.7 ) .';
	}

	.sticky .entry-content .readmore,
	.front-slider .entry-content .readmore {
		border-color: '. elakisto_hex2rgba( $sec_text_color , 0.7 ) .';
	}

	#post-load article.sticky .entry-wrapper,
	.front-archive article.sticky .entry-wrapper {
		background: '. esc_attr( $sec_body_bg_color ) .';
		color: '. esc_attr( $sec_text_color ) .';
	}

	.search .page-header {
		border-bottom-color: '. elakisto_hex2rgba( $accent_color , 0.5 ) .';
	}

	.search article:not(:last-of-type) .search-post-text-img {
		border-bottom-color: '. elakisto_hex2rgba( $text_color , 0.1 ) .';
	}

	.single .entry-header,
	.page:not(.page-template) .entry-header {
		border-bottom-color: '. elakisto_hex2rgba( $accent_color , 0.5 ) .';
	}

	.sharedaddy-holder .sd-social-icon.sd-sharing .sd-content ul li[class*=share-] a.sd-button,
	.sharedaddy-holder #sharing_email .sharing_send,
	.sharedaddy-holder .sd-content ul li .option a.share-ustom,
	.sharedaddy-holder .sd-content ul li a.sd-button,
	.sharedaddy-holder .sd-content ul li.advanced a.share-more,
	.sharedaddy-holder .sd-content ul li.preview-item div.option.option-smart-off a,
	.sharedaddy-holder .sd-social-icon .sd-content ul li a.sd-button,
	.sharedaddy-holder .sd-social-icon-text .sd-content ul li a.sd-button,
	.sharedaddy-holder .sd-social-official .sd-content>ul>li .digg_button>a,
	.sharedaddy-holder .sd-social-official .sd-content>ul>li>a.sd-button,
	.sharedaddy-holder .sd-social-text .sd-content ul li a.sd-button {
	    color: '. esc_attr( $text_color ) .' !important;
	    border-color: '. elakisto_hex2rgba( $text_color , 0.2 ) .';
	}

	.entry-content-wrapper blockquote,
	.entry-content-wrapper q {
		border-top-color: '. elakisto_hex2rgba( $text_color , 0.1 ) .';
	}

	.entry-content table td,
	.entry-content table th {
		border-color: '. esc_attr( $text_color ) .';
	}

	.gutenberg .wp-block-more {
	    color: '. esc_attr( $text_color ) .';
	    border-color: '. elakisto_hex2rgba( $text_color , 0.7 ) .';
	}

	.wp-block-separator {
	    border-bottom-color: '. esc_attr( $accent_color ) .';
	}

	.wp-block-code {
		border-color: '. elakisto_hex2rgba( $text_color , 0.1 ) .';
	}

	.entry-content .wp-block-separator.is-style-dots:before {
	    color: '. esc_attr( $accent_color ) .';
	}

	.front-slider-wrapper h2.section-title,
	.front-slider-wrapper .entry-text,
	.front-slider-two .front-slider-dots,
	.front-slider-float .front-slider-dots,
	.front-slider-side .entry-text {
		color: '. esc_attr( $sec_text_color ) .';
	}

	.front-slider-two .no-featured-image .entry-img {
		background: '. esc_attr( $sec_body_bg_color ) .';
	}

	.front-slider-side {
		background: '. esc_attr( $sec_body_bg_color ) .';
	}

	.front-slider-side h3 {
		border-bottom-color: '. elakisto_hex2rgba( $sec_text_color , 0.2 ) .';
	}

	.front-slider-side .front-slider-dots {
		color: '. esc_attr( $sec_text_color ) .';
	}

	.front-slider-float .front-slider-dots button:after {
		background: '. esc_attr( $sec_text_color ) .';
	}

	.front-cta {
		background: '. esc_attr( $sec_body_bg_color ) .';
	}

	.front-cta .front-cta-text {
		color: '. esc_attr( $sec_text_color ) .';
	}

	.front-cta-text > a.button {
	    border-color: '. esc_attr( $sec_text_color ) .';
	}

	.front-cta-text > a.button:hover {
	    background: '. elakisto_hex2rgba( $sec_text_color , 0.2 ) .';
	}

	.comments-title {
		border-color: '. elakisto_hex2rgba( $accent_color , 0.7 ) .';
	}

	.comments-title:hover {
		background: '. elakisto_hex2rgba( $accent_color , 0.2 ) .';
		border-color: '. elakisto_hex2rgba( $accent_color , 1 ) .';
	}

	.icon-arrow-down .icon-arrow-line {
		background: '. esc_attr( $text_color ) .';
	}

	.icon-arrow-down .icon-arrow-line:before,
	.icon-arrow-down .icon-arrow-line:after {
		background: '. esc_attr( $text_color ) .';
	}

	body #infinite-handle span {
		border-color: '. esc_attr( $text_color ) .';
	}

	body #infinite-handle span:hover {
		background: '. elakisto_hex2rgba( $text_color , 0.2 ) .';
	}

	.infinite-loader:before {
		background: '. esc_attr( $text_color ) .';
	}

	.related-holder #jp-relatedposts .jp-relatedposts-items .jp-relatedposts-post {
		border-bottom-color: '. elakisto_hex2rgba( $text_color , 0.1 ) .';
	}

	.related-holder #jp-relatedposts .jp-relatedposts-items .jp-relatedposts-post .jp-relatedposts-post-context {
		color: '. esc_attr( $accent_color ) .';
	}


	@media screen and (max-width: 1300px) {
		.has-sidebar #secondary,
		.front-archive-wrapper.archive-has-sidebar #secondary {
			border-top-color: '. elakisto_hex2rgba( $accent_color , 0.4 ) .';
		}
	}

	@media screen and (max-width: 1200px) {

		#mc_signup_form .mc_input,
		#mc_signup_submit {
			border-color: '. esc_attr( $text_color ) .';
		}

		.menu-wrapper,
		.social-wrapper {
			color: '. esc_attr( $sec_text_color ) .';
		}

		body .main-navigation .current-page-item > a,
		body .main-navigation .current-menu-item > a {
		    border-bottom-color: '. esc_attr( $sec_text_color ) .';
		}

		ul .icon-dropdown:before,
		ul .icon-dropdown:after {
		    background: '. esc_attr( $sec_text_color ) .';
		}

	}

	';

	return $change_colors_style;

}

?>
