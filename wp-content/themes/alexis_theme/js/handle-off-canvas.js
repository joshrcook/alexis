jQuery(document).ready(function($) {
    // set the max width before it will automatically remove the active sidebar class
    var maxWindowWidth = 768, hideDelay = 200;
    $('.show-nav-off-canvas').on('click tap', 'img.inactive-sidebar', function(e) {
        e.preventDefault();
        e.stopPropagation();
        showSidebar();
    });
    
    $('.show-nav-off-canvas').on('click tap', 'img.active-sidebar', function(e) {
        e.preventDefault();
        e.stopPropagation();
        hideSidebar(); 
    });
    
    $(window).on('resize', setSwipe());
    
    function setSwipe() {
        // if the window gets too big, hide the off-canvas nav
        if($(window).width() >= maxWindowWidth) {
            hideSidebar();
            $(document).off('swipeleft swiperight');
        } else {
            $(document).off('swipeleft').on('swipeleft', function() {
                showSidebar();
            });

            $(document).off('swiperight').on('swiperight', function() {
                hideSidebar();
            });
        }
        
        // run the resize of the sidebar no matter what
        setSidebarHeight();
    }
    
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
    
    function setSidebarHeight() {
        var newHeight = $('#outer-container').height();
        $('section[role="complementary-nav"]').height(newHeight);
        
    }
    
    // run removeSidebar once on page load
    hideSidebar();
    
    // set sidebar height
    setSidebarHeight();
    
    // set the swipe stuff
    setSwipe();
});