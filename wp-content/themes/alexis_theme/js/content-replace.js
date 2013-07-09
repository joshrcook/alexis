jQuery(function($) {
	if(Modernizr.history) {
		console.log('history is supported');

		$(document).on('click', 'a:not(a[rel=next], a[rel=prev], a.all-posts)', function(event) {

			_href = $(this).attr('href');

			// only take action if it is a link to an internal page
			if(_href.indexOf(window.location.origin) != -1  && _href.indexOf('wp-admin') != -1) {
				event.preventDefault();

			// change the url without a page refresh and add a history entry
			history.pushState(null, null, _href);

			// load the content
			loadContent(_href, 'slide', 'up', 'down');

			}
		});

		$(document).on('click', 'a[rel=next]', function(event) {
			event.preventDefault();

			_href = $(this).attr('href');

			// only take action if it is a link to an internal page
			if(_href.indexOf(window.location.origin) !== -1) {

				// change the url without a page refresh and add a history entry
				history.pushState(null, null, _href);

				// load the content
				loadContent(_href, 'slide', 'left', 'right');
			}

		});

		$(document).on('click', 'a[rel=prev]', function(event) {
			event.preventDefault();

			_href = $(this).attr('href');

			// only take action if it is a link to an internal page
			if(_href.indexOf(window.location.origin) !== -1) {

				// change the url without a page refresh and add a history entry
				history.pushState(null, null, _href);

				// load the content
				loadContent(_href, 'slide', 'right', 'left');
			}

		});

		$(document).on('click', 'a.all-posts', function(event) {
			event.preventDefault();

			_href = $(this).attr('href');

			// only take action if it is a link to an internal page
			if(_href.indexOf(window.location.origin) !== -1) {

				// change the url without a page refresh and add a history entry
				history.pushState(null, null, _href);

				// load the content
				loadContent(_href, 'slide', 'down', 'up');
			}

		});
	} else {
		console.log('history isn\'t supported');
	}


});

var $mainContent = jQuery('#content-wrapper'),
	$pageWrap = jQuery('#outer-container'),
	$baseHeight = 0,
	$el;

$baseHeight = $pageWrap.height() - $mainContent.height();

console.log($baseHeight);

function loadContent(href, animation, direction_hide, direction_show) {

	if(window.location.href != 'http://localhost:8888/alexis/') {
		jQuery('#outer-container.home').removeClass('home');
	}
	$mainContent.find('#content').hide(animation, { direction: direction_hide }, 500, function() {
		$mainContent.hide().load(href + ' #content', function() {
			$mainContent.show(animation, { direction: direction_show }, 500, function() {
				/*
				if(($baseHeight + $mainContent.height()) > jQuery(window).height()) {
					$pageWrap.animate({
						height: $baseHeight + $mainContent.height() + 'px'
					}, 'fast');
				} else {
					$pageWrap.animate({
						height: jQuery(window).height()
					});
				}
				*/

				// add the home class to the outer container when on the home page so it shows the background image
				if(window.location.href == window.location.origin || window.location.href == window.location.origin + '/alexis' || window.location.href == window.location.origin + '/alexis/') {
					jQuery('#outer-container').addClass('home');
				}
			});
		});
	});

	navLinks = jQuery('.nav a');

	jQuery.each(navLinks, function(i, link) {
		if(link == window.location.href) {
			theImg = jQuery('li.selected').removeClass('selected').find('img');
			jQuery(this).closest('li').addClass('selected').prepend(theImg);
			jQuery('#magic-line').remove();
			handleMagicLine();
			console.log('we have a match: ' + link);
		} else {
			console.log('nope');
		}
	});

	function handleMagicLine() {
		jQuery('.nav ul.magic-line').prepend('<li id="magic-line">&nbsp;</li>');
		setStartingPos();
	}
}

function setStartingPos() {
	startingPos = jQuery('.nav .selected').position().left;
	jQuery('#magic-line').stop().css('left', startingPos);
}

