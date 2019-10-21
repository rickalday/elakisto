( function( $ ) { 'use strict';

	var front_repeater_hider = function() {
		var $repeaters = $('#customize-control-elakisto-front_action .repeater-row');

		$repeaters.each( function(index) {

			var $this = $(this);
			var $this_action_type = $this.find('.repeater-field-action_type');

			var selected_value = $this_action_type.find("input[data-field='action_type']:checked").val();

			if ( 'slider' == selected_value ) {
				$this.find('.repeater-field-action_title').show();
				$this.find('.repeater-field-action_slider_style').show();
				$this.find('.repeater-field-action_archive_style').hide();
				$this.find('.repeater-field-action_portfolio_archive_style').hide();
				$this.find('.repeater-field-action_category').show();
				$this.find('.repeater-field-action_number').show();
				$this.find('.repeater-field-action_cta_image').hide();
				$this.find('.repeater-field-action_cta_text').hide();
				$this.find('.repeater-field-action_cta_link').hide();
				$this.find('.repeater-field-action_cta_button').hide();
			} else if ( 'archive' == selected_value ) {
				$this.find('.repeater-field-action_title').show();
				$this.find('.repeater-field-action_slider_style').hide();
				$this.find('.repeater-field-action_archive_style').show();
				$this.find('.repeater-field-action_portfolio_archive_style').hide();
				$this.find('.repeater-field-action_category').show();
				$this.find('.repeater-field-action_number').show();
				$this.find('.repeater-field-action_cta_image').hide();
				$this.find('.repeater-field-action_cta_text').hide();
				$this.find('.repeater-field-action_cta_link').hide();
				$this.find('.repeater-field-action_cta_button').hide();
			} else if ( 'portfolio-archive' == selected_value ) {
				$this.find('.repeater-field-action_title').show();
				$this.find('.repeater-field-action_slider_style').hide();
				$this.find('.repeater-field-action_archive_style').hide();
				$this.find('.repeater-field-action_portfolio_archive_style').show();
				$this.find('.repeater-field-action_category').hide();
				$this.find('.repeater-field-action_number').show();
				$this.find('.repeater-field-action_cta_image').hide();
				$this.find('.repeater-field-action_cta_text').hide();
				$this.find('.repeater-field-action_cta_link').hide();
				$this.find('.repeater-field-action_cta_button').hide();
			}	else if ( 'cta' == selected_value ) {
				$this.find('.repeater-field-action_title').show();
				$this.find('.repeater-field-action_slider_style').hide();
				$this.find('.repeater-field-action_archive_style').hide();
				$this.find('.repeater-field-action_portfolio_archive_style').hide();
				$this.find('.repeater-field-action_category').hide();
				$this.find('.repeater-field-action_number').hide();
				$this.find('.repeater-field-action_cta_image').show();
				$this.find('.repeater-field-action_cta_text').show();
				$this.find('.repeater-field-action_cta_link').show();
				$this.find('.repeater-field-action_cta_button').show();
			} else if ( 'portfolio-slider' == selected_value ) {
				$this.find('.repeater-field-action_title').show();
				$this.find('.repeater-field-action_slider_style').show();
				$this.find('.repeater-field-action_archive_style').hide();
				$this.find('.repeater-field-action_portfolio_archive_style').hide();
				$this.find('.repeater-field-action_category').hide();
				$this.find('.repeater-field-action_number').show();
				$this.find('.repeater-field-action_cta_image').hide();
				$this.find('.repeater-field-action_cta_text').hide();
				$this.find('.repeater-field-action_cta_link').hide();
				$this.find('.repeater-field-action_cta_button').hide();
			} else {
				$this.find('.repeater-field-action_title').hide();
				$this.find('.repeater-field-action_slider_style').hide();
				$this.find('.repeater-field-action_archive_style').hide();
				$this.find('.repeater-field-action_portfolio_archive_style').hide();
				$this.find('.repeater-field-action_category').hide();
				$this.find('.repeater-field-action_number').hide();
				$this.find('.repeater-field-action_cta_image').hide();
				$this.find('.repeater-field-action_cta_text').hide();
				$this.find('.repeater-field-action_cta_link').hide();
				$this.find('.repeater-field-action_cta_button').hide();
			} 

			$this_action_type.change( function() {
				selected_value = $this_action_type.find("input[data-field='action_type']:checked").val();

				// Show / Hide elements depending on selection

				if ( 'slider' == selected_value ) {
					$this.find('.repeater-field-action_title').show();
					$this.find('.repeater-field-action_slider_style').show();
					$this.find('.repeater-field-action_archive_style').hide();
					$this.find('.repeater-field-action_portfolio_archive_style').hide();
					$this.find('.repeater-field-action_category').show();
					$this.find('.repeater-field-action_number').show();
					$this.find('.repeater-field-action_cta_image').hide();
					$this.find('.repeater-field-action_cta_text').hide();
					$this.find('.repeater-field-action_cta_link').hide();
					$this.find('.repeater-field-action_cta_button').hide();
				} else if ( 'archive' == selected_value ) {
					$this.find('.repeater-field-action_title').show();
					$this.find('.repeater-field-action_slider_style').hide();
					$this.find('.repeater-field-action_archive_style').show();
					$this.find('.repeater-field-action_portfolio_archive_style').hide();
					$this.find('.repeater-field-action_category').show();
					$this.find('.repeater-field-action_number').show();
					$this.find('.repeater-field-action_cta_image').hide();
					$this.find('.repeater-field-action_cta_text').hide();
					$this.find('.repeater-field-action_cta_link').hide();
					$this.find('.repeater-field-action_cta_button').hide();
				} else if ( 'portfolio-archive' == selected_value ) {
					$this.find('.repeater-field-action_title').show();
					$this.find('.repeater-field-action_slider_style').hide();
					$this.find('.repeater-field-action_archive_style').hide();
					$this.find('.repeater-field-action_portfolio_archive_style').show();
					$this.find('.repeater-field-action_category').hide();
					$this.find('.repeater-field-action_number').show();
					$this.find('.repeater-field-action_cta_image').hide();
					$this.find('.repeater-field-action_cta_text').hide();
					$this.find('.repeater-field-action_cta_link').hide();
					$this.find('.repeater-field-action_cta_button').hide();
				} else if ( 'cta' == selected_value ) {
					$this.find('.repeater-field-action_title').show();
					$this.find('.repeater-field-action_slider_style').hide();
					$this.find('.repeater-field-action_archive_style').hide();
					$this.find('.repeater-field-action_portfolio_archive_style').hide();
					$this.find('.repeater-field-action_category').hide();
					$this.find('.repeater-field-action_number').hide();
					$this.find('.repeater-field-action_cta_image').show();
					$this.find('.repeater-field-action_cta_text').show();
					$this.find('.repeater-field-action_cta_link').show();
					$this.find('.repeater-field-action_cta_button').show();
				} else if ( 'portfolio-slider' == selected_value ) {
					$this.find('.repeater-field-action_title').show();
					$this.find('.repeater-field-action_slider_style').show();
					$this.find('.repeater-field-action_archive_style').hide();
					$this.find('.repeater-field-action_portfolio_archive_style').hide();
					$this.find('.repeater-field-action_category').hide();
					$this.find('.repeater-field-action_number').show();
					$this.find('.repeater-field-action_cta_image').hide();
					$this.find('.repeater-field-action_cta_text').hide();
					$this.find('.repeater-field-action_cta_link').hide();
					$this.find('.repeater-field-action_cta_button').hide();
				} else {
					$this.find('.repeater-field-action_title').hide();
					$this.find('.repeater-field-action_slider_style').hide();
					$this.find('.repeater-field-action_archive_style').hide();
					$this.find('.repeater-field-action_portfolio_archive_style').hide();
					$this.find('.repeater-field-action_category').hide();
					$this.find('.repeater-field-action_number').hide();
					$this.find('.repeater-field-action_cta_image').hide();
					$this.find('.repeater-field-action_cta_text').hide();
					$this.find('.repeater-field-action_cta_link').hide();
					$this.find('.repeater-field-action_cta_button').hide();
				} 
			});
		});
	};

	$( document ).ready( function() {

		wp.customizerCtrlEditor = {

			init: function() {

				$(window).load(function(){

					$('textarea.wp-editor-area').each(function(){
						var tArea = $(this),
							id = tArea.attr('id'),
							input = $('input[data-customize-setting-link="'+ id +'"]'),
							editor = tinyMCE.get(id),
							setChange,
							content;

						if(editor){
							editor.onChange.add(function (ed, e) {
								ed.save();
								content = editor.getContent();
								clearTimeout(setChange);
								setChange = setTimeout(function(){
									input.val(content).trigger('change');
								},500);
							});
						}

						if(editor){
							editor.onChange.add(function (ed, e) {
								ed.save();
								content = editor.getContent();
								clearTimeout(setChange);
								setChange = setTimeout(function(){
									input.val(content).trigger('change');
								},500);
							});
						}

						tArea.css({
							visibility: 'visible'
						}).on('keyup', function(){
							content = tArea.val();
							clearTimeout(setChange);
							setChange = setTimeout(function(){
								input.val(content).trigger('change');
							},500);
						});
					});
				});
			}

		};

		wp.customizerCtrlEditor.init();

		$( window ).load( function() {
			if ( false == wp.customize.control( 'custom_logo' ).setting() ) {
				// wp.customize.control( 'logo_size' ).deactivate();
				$( '#customize-control-logo-size' ).hide();
			}
		});

	}); // $( document ).ready

	$( window ).load( function() {


		$('#customize-control-elakisto-front_action .repeater-add').on('click', function() {

			setTimeout(function() {
				front_repeater_hider();
				$('#customize-control-elakisto-front_action .repeater-row-remove').on('click', function() {
					setTimeout(function() {
						front_repeater_hider();
					}, 50);
				});
			}, 50);

		});

		front_repeater_hider();

	});

}) ( jQuery );

