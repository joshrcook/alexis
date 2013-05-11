jQuery(document).ready(function($) {
    // set the max width before it will automatically remove the active sidebar class
    var maxWindowWidth = 768, hideDelay = 200;
    $('.show-nav-off-canvas').on('click tap', 'img.inactive-sidebar', function() {
        showSidebar();
    });
    
    $('.show-nav-off-canvas').on('click tap', 'img.active-sidebar', function() {
       hideSidebar(); 
    });
    
    $(window).on('resize', function() {
        // if the window gets too big, hide the off-canvas nav
        if($(window).width() >= maxWindowWidth) {
            hideSidebar();
        }
    });
    
    function showSidebar() {
        // trade click handlers
        $('.show-nav-off-canvas img').removeClass('inactive-sidebar').addClass('active-sidebar');
        $('#outer-container').addClass('active-sidebar');
        $('section[role="complementary-nav"]').show();
    }
    
    function hideSidebar() {
        // trade click handlers
        $('.show-nav-off-canvas img').removeClass('active-sidebar').addClass('inactive-sidebar');
        $('#outer-container').removeClass('active-sidebar');
        window.setTimeout(function() {
            $('section[role="complementary-nav"]').hide();
        }, hideDelay);
    }
    
    // run removeSidebar once on page load
    hideSidebar();
});