(function($){
    $.fn.rotate = function(params){
        return this.each(function(index, el){
            var defaults = {
                text : [],
                interval : 2000
            };
            
            var options = $.extend({}, defaults, params);
            var i = 0;
            
            if(options.text.length){
                setInterval(function(){
                    i = i < options.text.length -1 ? ++i : 0;
                    $(el).fadeOut(function(){ 
                        $(this).text(options.text[i]).fadeIn();
                    });
                }, options.interval);
            }
        });
    };
})(jQuery);

jQuery(document).ready(function($) {
   $('.rw-1').rotate({
       text: ['creative thinker', 'problem solver', 'graphic artist'],
       interval: 2500 
   });
   
   $('.rw-2').rotate({
       text: ['design', 'art', 'illustration'],
       interval: 3000
   })
});
