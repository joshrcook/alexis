jQuery(document).ready(function($) {
    var back = $('.back');
    $('.flipbox').on('click', function() {
        
       $('.flipbox').flippy({
          verso: back,
          duration: '500',
          noCSS: true,
          depth: 0
       });
    });
});