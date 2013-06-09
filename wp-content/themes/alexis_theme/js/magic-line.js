jQuery(document).ready(function($) {
   var startingWidth = $('.nav .selected').width();
   var startingPosition = $('.nav .selected').position().left;
   
   // remove no js
   $('.nav .no-js').removeClass('no-js');
   
   // add in magic line
   $('.nav ul.magic-line').prepend('<li id="magic-line">&nbsp;</li>').ready(setStartingPosition);
   
   // when the magic line has been inserted, set it's starting position and width
   
   
   $('.magic-line li').on('mouseover', function() {
       // get the position of the hovered element
      var newPosition = $(this).position().left;
      // get the width of the hovered element
      var newWidth = $(this).width;
      // set the new position and width
      $('#magic-line').stop().animate({
          left: newPosition,
          width: newWidth
      });
   });
   
   $('.magic-line').on('mouseleave', function() {
       // reset everything
       $('#magic-line').stop().animate({
          left: startingPosition,
          width: startingWidth
       });
   });

   function setStartingPosition() {
      startingPosition = $('.nav .selected').position().left;
       $('#magic-line').stop().animate({
          left: startingPosition 
       });
   }
   
   $(window).resize(setStartingPosition);
});