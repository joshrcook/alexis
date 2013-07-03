jQuery(document).ready(function($) {
	$controls = $('.flex-direction-navigation');
  $('.flexslider').flexslider({
    animation: "slide",
    animationLoop: true,
    controlsContainer: $controls,
    prevText: '<i class="icon-angle-left"></i>',
    nextText: '<i class="icon-angle-right"></i>'
  });
});