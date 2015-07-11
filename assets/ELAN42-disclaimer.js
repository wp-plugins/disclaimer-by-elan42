jQuery(document).ready(function ($) {

	var popupMarkup = '<div class="elan42-popup">\
							<div class="elan42-popup-container">\
								<div class="elan42-popup-header">\
									<div class="elan42-popup-title">\
									</div>\
									<div class="elan42-popup-close"><a href="#">X</a>\
									</div>\
								</div>\
								<div class="elan42-popup-content">\
								</div>\
							</div>\
						</div>';

	$('body').prepend(popupMarkup);

	var hoverActive = false;

	var is_open = false;

	var animationSpeed = 500;

	if('set' !== $.cookie('elan42-disclaimer-banner')) {

		hoverActive = true;

		var hoverMarkup = '<div class="elan42-disclaimer-banner"><div class="elan42-disclaimer-content"><p>';
		hoverMarkup += elan42_disclaimer.hover_box
						.replace(new RegExp('{PRIVACY}', 'g'), '<a class="elan42-disclaimer-policy-button" href="#">'+elan42_disclaimer.policy_title+'</a>')
						.replace(new RegExp('{TERMS}', 'g'), '<a class="elan42-disclaimer-conditions-button" href="#">'+elan42_disclaimer.terms_title+'</a>')
						.replace(new RegExp('{COMPANY}', 'g'), elan42_disclaimer.company_name);
		hoverMarkup += '</p></div><div class="elan42-disclaimer-accept">';
		hoverMarkup +=	'<a class="elan42-disclaimer-accept-button" href="#">' + elan42_disclaimer.button + '</a>';
		hoverMarkup += '</div></div>';

		$('body').prepend(hoverMarkup);

		$('.elan42-disclaimer-accept-button').click(function(e) {
			
			e.preventDefault();

			$.cookie('elan42-disclaimer-banner', 'set', {expires: 365});

			hoverActive = false;

			$('.elan42-disclaimer-banner').remove();

		});

	}

	$('.elan42-disclaimer-policy-button').click(function(e) {
		
		e.preventDefault();

		openPopup(elan42_disclaimer.policy_title, elan42_disclaimer.policy_text);

	});

	$('.elan42-disclaimer-conditions-button').click(function(e) {
		
		e.preventDefault();

		openPopup(elan42_disclaimer.terms_title, elan42_disclaimer.terms_text);

	});

	$('.elan42-disclaimer-return-button').click(function(e) {
		
		e.preventDefault();

		openPopup(elan42_disclaimer.return_title, elan42_disclaimer.return_text);

	});

	$('.elan42-popup-close a').click(function(e) {
		e.preventDefault;

		closePopup();
	});

	$(document).on('click', function(e) {

		if(is_open && !$(e.target).closest('.elan42-popup-container').length) {
			closePopup();
		}

	});

	$(document).on('keydown', function(e) {
		if(is_open && e.which == 27)
			closePopup();
	});

	var openPopup = function(title, text) {

		var windowWidth = $(window).width();
		var windowHeight = $(window).height();

		$('html, body').css({'overflow': 'hidden'});

		if(hoverActive) {
			$('.elan42-disclaimer-banner').slideToggle('slow');
		}

		$('.elan42-popup').css({'display': 'block', 'width': windowWidth, 'height': windowHeight});

		$('.elan42-popup-container').animate({'width': '50%', 'height': '70%'}, animationSpeed, function() {

			$('.elan42-popup-title').append('<h1>'+title+'</h1>');
			
			$('.elan42-popup-content').append(text
				.replace(new RegExp('{DOMAIN}', 'g'), '<a href="'+elan42_disclaimer.site_url+'">'+elan42_disclaimer.site_name+'</a>')
				.replace(new RegExp('{COMPANY}', 'g'), elan42_disclaimer.company_name));

		});
		setTimeout(function() {is_open = true;}, animationSpeed);

	}

	var closePopup = function() {

		$('.elan42-popup-title').empty();
		$('.elan42-popup-content').empty();
		

		$('.elan42-popup-container').animate({'width': '0',	'height': '0'},	animationSpeed, function() {
			
			$('.elan42-popup').css({'display': 'none'});
			$('html, body').css({'overflow': 'auto'});

			if(hoverActive) {
				$('.elan42-disclaimer-banner').slideToggle('slow');
			}

		});

		is_open = false;

	}

});