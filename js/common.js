(function($) { 'use strict';

	// Calculate clients viewport
	function viewport() {
		var e = window, a = 'inner';
		if(!('innerWidth' in window )) {
			a = 'client';
			e = document.documentElement || document.body;
		}
		return { width : e[ a+'Width' ] , height : e[ a+'Height' ] };
	}

	// Strech center aligned images

	var centerAlignedImages = function () {

		viewport();
		var w=window,d=document,
		e=d.documentElement,
		g=d.getElementsByTagName('body')[0],
		x=w.innerWidth||e.clientWidth||g.clientWidth, // Viewport Width
		y=w.innerHeight||e.clientHeight||g.clientHeight; // Viewport Height

		var body = $('body');


		if(body.hasClass('single') && !body.hasClass('page-template-gallery-page') && body.hasClass('no-sidebar')){
			var centerAlignImg = $('.content-area .aligncenter');

			if(centerAlignImg.length){
				$('#primary').imagesLoaded(function(){
					centerAlignImg.each(function(){
						var $this = $(this);
						var centerAlignImgWidth;
						var entryContentWidth = $('.entry-content').width();

						if($this.is('img')){
							centerAlignImgWidth = $this.attr('width');

							if (centerAlignImgWidth > 920) {
								centerAlignImgWidth = 920;
							}
						}
						else{
							centerAlignImgWidth = $this.find('img').attr('width');

							if (centerAlignImgWidth > 920) {
								centerAlignImgWidth = 920;
							}

							if(x > 1620){
								$this.css({width: centerAlignImgWidth});
							}
							else{
								$this.css({width: ''});
							}
						}


						if(x > 1620){
							if(centerAlignImgWidth > entryContentWidth){
								if(centerAlignImgWidth > 920){
									$this.css({marginLeft: -((920 - entryContentWidth) / 2)});
								}
								else{
									$this.css({marginLeft: -((centerAlignImgWidth - entryContentWidth) / 2)});
								}
							}
						}
						else{
							$this.css({marginLeft: ''});
						}
						$this.css('opacity', 1);
					});
				});

			}
		};
	};

	$(document).ready(function($){

		// Calculate clients viewport
		function viewport() {
			var e = window, a = 'inner';
			if(!('innerWidth' in window )) {
				a = 'client';
				e = document.documentElement || document.body;
			}
			return { width : e[ a+'Width' ] , height : e[ a+'Height' ] };
		}

		var w=window,d=document,
		e=d.documentElement,
		g=d.getElementsByTagName('body')[0],
		x=w.innerWidth||e.clientWidth||g.clientWidth, // Viewport Width
		y=w.innerHeight||e.clientHeight||g.clientHeight; // Viewport Height

		// Global Vars

		var body = $('body'),
			mainContent = $('#content'),
			sidebar = $('.sidebar-hide-scroll');


		// Outline none on mousedown for focused elements

		body.on('mousedown', '*', function(e) {
			if(($(this).is(':focus') || $(this).is(e.target)) && $(this).css('outline-style') == 'none') {
				$(this).css('outline', 'none').on('blur', function() {
					$(this).off('blur').css('outline', '');
				});
			}
		});

		// Disable search submit if input empty
		$( '.search-submit' ).prop( 'disabled', true );
		$( '.search-field' ).keyup( function() {
			$('.search-submit').prop( 'disabled', this.value === "" ? true : false );
		});

		// dropdown button

		var menuDropdownLink = $('.main-navigation .menu-item-has-children>a, .main-navigation .page_item_has_children>a');

		var dropDownArrow = $('<button class="dropdown-toggle clear-button"><span class="screen-reader-text">toggle child menu</span><span class="icon-dropdown"></span></button>');

		menuDropdownLink.after(dropDownArrow);


		// dropdown open on click

		var dropDownButton = $('button.dropdown-toggle');

		dropDownButton.on('click', function(e){
			e.preventDefault();
			var $this = $(this);
			$this.parent('li').toggleClass('toggle-on').find('.toggle-on').removeClass('toggle-on');
			$this.parent('li').siblings().removeClass('toggle-on');
		});

		$('.main-navigation').on('mouseleave', function () {
			$(this).find('.toggle-on').removeClass('toggle-on');
		});

		// Checkbox and Radio buttons

		//if buttons are inside label
		function radio_checkbox_animation() {
			var checkBtn = $('label').find('input[type="checkbox"]');
			var checkLabel = checkBtn.parent('label');
			var radioBtn = $('label').find('input[type="radio"]');

			checkLabel.addClass('checkbox');

			checkLabel.click(function(){
				var $this = $(this);
				if($this.find('input').is(':checked')){
					$this.addClass('checked');
				}
				else{
					$this.removeClass('checked');
				}
			});

			var checkBtnAfter = $('label + input[type="checkbox"]');
			var checkLabelBefore = checkBtnAfter.prev('label');

			checkLabelBefore.click(function(){
				var $this = $(this);
				$this.toggleClass('checked');
			});

			radioBtn.change(function(){
				var $this = $(this);
				if($this.is(':checked')){
					$this.parent('label').siblings().removeClass('checked');
					$this.parent('label').addClass('checked');
				}
				else{
					$this.parent('label').removeClass('checked');
				}
			});
		}

		radio_checkbox_animation();

		// Sharedaddy

		function shareDaddy(){
			var shareTitle = $('.sd-sharing .sd-title');

			if(shareTitle.length){
				var shareWrap = shareTitle.closest('.sd-sharing-enabled');
				shareWrap.attr({'tabindex': '0'});
				shareTitle.on('click', function(){
					$(this).closest('.sd-sharing-enabled').toggleClass('sd-open');
				});

				$(document).keyup(function(e) {
					if(shareWrap.find('a').is(':focus') && e.keyCode == 9){
						shareWrap.addClass('sd-open');
					}
					else if(!(shareWrap.find('a').is(':focus')) && e.keyCode == 9){
						shareWrap.removeClass('sd-open');
					}
				});
			}
		}

		shareDaddy();

		// Big search field

		var bigSearchWrap = $('div.search-wrap');
		var bigSearchButtons = $('div.search-button');
		var bigSearchField = bigSearchWrap.find('.search-field');
		var bigSearchTrigger = $('.big-search-trigger');
		var bigSearchCloseBtn = $('.big-search-close');
		var bigSearchClose = bigSearchButtons.add(bigSearchCloseBtn);
		var bigSearchBackground = $('.search-wrap ~ .menu-background');

		// close sidemenu modal on ESC

		var toggleBigSearch = function() {
			if(body.hasClass('big-search-open')){
				body.removeClass('big-search-open');
				setTimeout(function(){
					$('.search-wrap').find('.search-field').blur();
				}, 50);
			} else {
				body.addClass('big-search-open');
				setTimeout(function(){
					$('.search-wrap').find('.search-field').focus();
				}, 50);
			};
		}


		bigSearchCloseBtn.on('click', function(e){
			e.preventDefault();
		});

		bigSearchClose.on('click', function(){
			var $this = $(this);
			toggleBigSearch();
		});

		bigSearchTrigger.on('click', function(e){
			e.preventDefault();
			e.stopPropagation();
			toggleBigSearch();
		});

		bigSearchBackground.on('click', function(e){
			if (body.hasClass('big-search-open')) {
				toggleBigSearch();
			} else if (body.hasClass('social-menu-open')) {
				body.removeClass('social-menu-open');
			}
		});

		bigSearchField.on('click', function(e){
			e.stopPropagation();
		});

		$().on('click', function(e){
			e.stopPropagation();
		});

		// close sidemenu modal on ESC

		$(document).keyup(function(e) {
			if (e.keyCode == 27) {
				if(body.hasClass('big-search-open')){
					body.removeClass('big-search-open');
					setTimeout(function(){
						$('.search-wrap').find('.search-field').blur();
					}, 50);
				}
			}
		});

		// Disable scroll if big search sidemenu is open

		// left: 37, up: 38, right: 39, down: 40,
		// spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
		var keys = {37: 1, 38: 1, 39: 1, 40: 1, 32: 1, 33: 1, 34: 1, 35: 1, 36: 1};

		var preventDefault = function (e) {
			e = e || window.event;
				if (e.preventDefault)
					e.preventDefault();
				e.returnValue = false;
		};

		var preventDefaultForScrollKeys = function (e) {
			if (keys[e.keyCode]) {
				preventDefault(e);
				return false;
			}
		};

		$(document.body).on('post-load', function(){

			var $container = $('#post-load');
			if ($container.length) {

				// Reactivate masonry on post load
				var newEl = $container.children().not('article.post-loaded, span.infinite-loader').addClass('post-loaded');

				newEl.imagesLoaded(function () {

					// Reactivate masonry on post load

					var newElNeedAnimate = $container.children().not('.animate, span.infinite-loader');

					setTimeout(function(){
						$container.masonry('appended', newElNeedAnimate, true).masonry('layout');
					}, 50);

					setTimeout(function(){
						newEl.each(function(i){
							var $this = $(this);

							if($this.find('iframe').length){
								var $iframe = $this.find('iframe');
								var $iframeSrc = $iframe.attr('src');

								$iframe.load($iframeSrc, function(){
									$container.masonry('layout');
								});
							}
						});
						newEl.addClass('animate');
					}, 150);

				});
			}

			radio_checkbox_animation();

		});

		var $commentTitle = $('.comments-title');

		if ($commentTitle.length) {
			var $comment = $('#comments');
			$commentTitle.on('click', function() {
				if ($('.comment-list-wrapper').css('display') == 'block') {
					$('.comment-list-wrapper').fadeOut();
					$commentTitle.removeClass('opened');
				} else {
					$('.comment-list-wrapper').fadeIn();
					$commentTitle.addClass('opened');
				}
			});
		};

		var socialButton = $('.social-button');

		if (socialButton.length) {
			socialButton.on('click', function(){
				if (body.hasClass('social-menu-open')) {
					body.removeClass('social-menu-open');
				} else {
					body.addClass('social-menu-open');
				}
			});

			var removeHiderClass = $('.social-wrapper .jetpack-social-navigation-genericons .screen-reader-text');
			removeHiderClass.each(function(){
				$(this).removeClass('screen-reader-text');
			})
		};

		if ($('body.single-format-gallery').length) {
			var singleTopGallery = $('.site-main > .entry-gallery.slick-wrapper > .gallery');

			if (singleTopGallery.length) {


				var direction;
				if(body.hasClass('rtl')){
					direction = true;
				}
				else{
					direction = false;
				}

				singleTopGallery.slick({
					dots: false,
					infinite: true,
					speed: 300,
					slidesToShow: 1,
					centerMode: true,
					variableWidth: true,
					arrows: false,
					touchThreshold: 20,
					cssEase: 'cubic-bezier(0.28, 0.12, 0.22, 1)',
					rtl: direction,
					/*
					slide: 'figure',
					speed: 300,
					arrows: true,
					fade: false,
					useTransform: false,
					infinite: true,
					centerMode: false,
					centerPadding: false,
					initialSlide: false,
					variableWidth: true,
					dots: false,
					draggable: true,
					touchThreshold: 20,
					cssEase: 'cubic-bezier(0.28, 0.12, 0.22, 1)',

					*/
				});

				// Add next/prev navigation to the carousel
				singleTopGallery.click( function(e) {
					var clickXPosition = e.pageX - this.offsetLeft;

					// Go to the previous image if the click occurs in the left half of gallery,
					// or the next image if the click occurs in the right half.
					if (clickXPosition < $( window ).width() / 2 ) {
						singleTopGallery.slick("slickPrev");
					} else {
						singleTopGallery.slick("slickNext");
					}
					return false;
				} );

	            // Add classes to allow next/prev cursor styling
				singleTopGallery.mousemove( function(e){
					var mouseXPosition = e.pageX - this.offsetLeft;
					if (mouseXPosition < $( window ).width() / 2 ) {
						singleTopGallery.removeClass( "right-arrow" );
						singleTopGallery.addClass( "left-arrow" );
					} else {
						singleTopGallery.removeClass( "left-arrow" );
						singleTopGallery.addClass( "right-arrow" );
					}
				});

			}
		}

		var frontSliders = $('.front-slider-wrapper');
		if (frontSliders.length) {
			frontSliders.each(function() {
				var frontSliderWrapper = $(this),
					frontSlider = $(this).find('.front-slider');

				if (frontSlider.hasClass('front-slider-two') ) {
					frontSlider.slick({
						slide: 'article',
						speed: 400,
						arrows: true,
						appendArrows: frontSlider.find('.front-slider-arrows'),
						infinite: true,
						slidesToShow: 3,
						slidesToScroll: 1,
						//fade: false,
						//useTransform: true,
						//centerMode: true,
						//centerPadding: false,
						variableWidth: true,
						dots: true,
						appendDots: frontSlider.find('.dots-wrapper'),
						//draggable: true,
						//touchThreshold: 20,
						cssEase: 'cubic-bezier(.27,.01,.65,1)',
						rtl: direction,
					});

					var nextButton = frontSlider.find('.slick-next.slick-arrow');

					nextButton.on('mouseenter', function(){
						frontSlider.addClass('next-button-hover');
					});

					nextButton.on('mouseleave', function(){
						frontSlider.removeClass('next-button-hover');
					})


				} else {
					frontSlider.slick({
						slide: 'article',
						speed: 400,
						arrows: true,
						appendArrows: frontSlider.find('.front-slider-arrows'),
						fade: true,
						useTransform: false,
						centerMode: false,
						centerPadding: false,
						slidesToShow: 1,
						variableWidth: false,
						dots: true,
						appendDots: frontSlider.find('.dots-wrapper'),
						draggable: true,
						touchThreshold: 20,
						cssEase: 'cubic-bezier(0.28, 0.12, 0.22, 1)',
						rtl: direction,
					});
				}
			})
		}


	}); // End Document Ready

	$(window).on('load pageshow', function(){

		// Calculate clients viewport
		function viewport() {
			var e = window, a = 'inner';
			if(!('innerWidth' in window )) {
				a = 'client';
				e = document.documentElement || document.body;
			}
			return { width : e[ a+'Width' ] , height : e[ a+'Height' ] };
		}

		var w=window,d=document,
		e=d.documentElement,
		g=d.getElementsByTagName('body')[0],
		x=w.innerWidth||e.clientWidth||g.clientWidth, // Viewport Width
		y=w.innerHeight||e.clientHeight||g.clientHeight; // Viewport Height

		// Global Vars

		var body = $('body');

		// enable masonry
		var $container = $('#post-load');
		if ($container.length) {

			$container.imagesLoaded( function() {
				$container.masonry({
					transitionDuration: 0,
					columnWidth: 'article:not(.sticky)',
					horizontalOrder: true,
					percentPosition: true,
				}).masonry('layout');

				var masonryChild = $container.find('article:not(.post-loaded), .posts-navigation, #infinite-handle');

				masonryChild.addClass('post-loaded animate');

			});
		}

		var $frontContainers = $('.front-archive');
		if ($frontContainers.length) {
			$frontContainers.each(function(index) {
				var $frontContainer = $(this);

				$frontContainer.imagesLoaded( function() {
					$frontContainer.masonry({
						transitionDuration: 0,
						columnWidth: 'article:not(.sticky)',
						horizontalOrder: true,
						percentPosition: true,
					}).masonry('layout');

					var masonryChild = $frontContainer.find('article:not(.post-loaded), .posts-navigation, #infinite-handle');

					masonryChild.addClass('post-loaded animate');

				});
			});
		}

		// Preloader - show content

		var preload = function() {

			$('body').addClass('show');
			$('body').removeClass('leaving');
		};

		// centerAlignedImages();

		preload();


	}); // End Window Load

	$(window).resize(function(){

		// Calculate clients viewport
		function viewport() {
			var e = window, a = 'inner';
			if(!('innerWidth' in window )) {
				a = 'client';
				e = document.documentElement || document.body;
			}
			return { width : e[ a+'Width' ] , height : e[ a+'Height' ] };
		}

		var w=window,d=document,
		e=d.documentElement,
		g=d.getElementsByTagName('body')[0],
		x=w.innerWidth||e.clientWidth||g.clientWidth, // Viewport Width
		y=w.innerHeight||e.clientHeight||g.clientHeight; // Viewport Height

		// Global Vars

		var body = $('body'),
			mainContent = $('#content');

		// centerAlignedImages();

		var preload = function() {

			$('body').addClass('show');
			$('body').removeClass('leaving');
		};

		preload();

	});

	// window unload

	$(window).on('beforeunload', function () {

		$('body').addClass('leaving');

		setTimeout(function() {
			$('#site-navigation').removeClass('toggled');
			$('body').removeClass('main-menu-open');
			return true;
		}, 150)

	});

	//LightGallery
	$( '.small-thumbs' ).each(function( index ) {
		$( this ).lightGallery({
			//mode: 'lg-slide',
			//selector: '.small-thumb',
			showThumbByDefault: false,
			download: false,
			autoplay: false,
			zoom: false,
			fullscreen: false,
			share: false,
			autoplayFirstVideo: true,
		} );
	} ); 

	//Portfolio title BG
	var textPostLink = $('.text-post a');
	textPostLink.on('mouseenter', function(e){
		e.preventDefault();
		$("#thumbs-bg").attr("style", "background-image: url('" + $(this).data("featured") + "')");
	});
	textPostLink.on('mouseleave', function(e){
		e.preventDefault();
		$("#thumbs-bg").removeAttr("style");
	});
	

})(jQuery);
