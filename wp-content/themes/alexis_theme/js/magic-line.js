jQuery(document).ready(function($) {

   var startingWidth = $('.nav .selected').width();
   var startingPosition = $('.nav .selected').position().left;
   
   // remove no js
   $('.nav .no-js').removeClass('no-js');
   
   // add in magic line
   $('.nav ul.magic-line').prepend('<li id="magic-line">&nbsp;</li>').ready(setStartingPosition);
  
   
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
       // recalculate to make sure we're going back to the right place
       setStartingPosition();
       setStartingWidth();

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

   function setStartingWidth() {
      startingWidth = $('.nav .selected').width();
   }
   
   $(window).resize(setStartingPosition);
});