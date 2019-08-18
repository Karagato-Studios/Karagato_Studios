/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @since       3.2
 */

(function($) {
	
	function animateProgressBar() {
		$('.pro-bar').each(function(i, elem) {
			var	elem = $(this),
				percent = elem.attr('data-pro-bar-percent'),
				delay = elem.attr('data-pro-bar-delay');

			if (!elem.hasClass('animated'))
				elem.css({ 'width' : '0%' });

			if (elem.length) {
				setTimeout(function() {
					elem.animate({ 'width' : percent + '%' }, 2000).addClass('animated');
				}, delay);
			} 
		});
	}
	
	$(document).ready(function() {
		$('*[rel=tooltip]').tooltip()

		// Turn radios into btn-group
		$('.radio.btn-group label').addClass('btn');

		$('fieldset.btn-group').each(function() {
			// Handle disabled, prevent clicks on the container, and add disabled style to each button
			if ($(this).prop('disabled')) {
				$(this).css('pointer-events', 'none').off('click');
				$(this).find('.btn').addClass('disabled');
			}
		});

		$(".btn-group label:not(.active)").click(function()
		{
			var label = $(this);
			var input = $('#' + label.attr('for'));

			if (!input.prop('checked')) {
				label.closest('.btn-group').find("label").removeClass('active btn-success btn-danger btn-primary');
				if (input.val() == '') {
					label.addClass('active btn-primary');
				} else if (input.val() == 0) {
					label.addClass('active btn-danger');
				} else {
					label.addClass('active btn-success');
				}
				input.prop('checked', true);
				input.trigger('change');
			}
		});
		$(".btn-group input[checked=checked]").each(function()
		{
			if ($(this).val() == '') {
				$("label[for=" + $(this).attr('id') + "]").addClass('active btn-primary');
			} else if ($(this).val() == 0) {
				$("label[for=" + $(this).attr('id') + "]").addClass('active btn-danger');
			} else {
				$("label[for=" + $(this).attr('id') + "]").addClass('active btn-success');
			}
		});
		
		$('#back-top').on('click', function(e) {
			e.preventDefault();
			$("html, body").animate({scrollTop: 0}, 1000);
		});
		
		/* Carousel */		
		
		$(".single-carousel").owlCarousel({
			items : 1,
			itemsDesktop : [1000,1], 
			itemsDesktopSmall : [900,1],
			itemsTablet: [600,1], 
			navigation: false,
			pagination : true,
			autoPlay : 3000,
			slideSpeed : 300
		});
		
		$(".bannergroup").owlCarousel({
			items : 5,
			itemsDesktop : [1000,4], 
			itemsDesktopSmall : [900,3],
			itemsTablet: [600,2], 
			itemsMobile : false, 
			navigation: false,
			pagination : false,
			autoPlay : 3000,
			slideSpeed : 300
		});
		
		$('.itemHeader').appendTo('.section-top .container');
		
		animateProgressBar();
		
		/* mobile menu toggle */
		$('.menu-mobile').click(function(e){
			e.preventDefault();
			$('.navigation .nav-collapse').slideToggle();
		});
		
		/* mobile menu toggle first level */
		$('.navigation .nav > li.parent > a').click(function(e){
			if ($('.visible-xs').is(':hidden')) return;
			var p = $(this).parent();
			if (! p.hasClass('toggle-open')) {
			  e.preventDefault();
			  p.addClass('toggle-open');
			}
		});
	});
	
	$(window).load(function () {

		if($('.projects-grid').length){	
			var $container = $('.projects-grid');
			$container.isotope({
				// options
				itemSelector: '.project-item',
				filter: $('#portfolio-filter li a.active').attr('data-filter')
			});
				
			$container.imagesLoaded().progress( function() {
				$container.isotope('layout');
			});
				
			var selectors = $('#portfolio-filter li a');
			selectors.on('click', function(e){
				e.preventDefault();
				selectors.removeClass('active');
				$(this).addClass('active');
				var selector = $(this).attr('data-filter');
				$container.isotope({ filter: selector });
				return false;
			});
		}			
	});
	
	$(window).resize(function() {
		animateProgressBar();
	});
	
	$(window).scroll(function() {
		headerOffset = $('#header').innerHeight();
        $(this).scrollTop() > headerOffset ? $('#header').addClass("header-shrink") : $('#header').removeClass("header-shrink");
			
		animateProgressBar();
		if ($(window).scrollTop() + $(window).height() == $(document).height())
			animateProgressBar();
    });	
	
})(jQuery);