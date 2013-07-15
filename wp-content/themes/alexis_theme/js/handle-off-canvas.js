jQuery(document).ready(function($) {
    // set the max width before it will automatically remove the active sidebar class
    var maxWindowWidth = 768, hideDelay = 200;
    var menu = $('section[role=complementary-nav] ul');
    var offCanvasWindow = $('section[role=complementary-nav]');
    var origMenuPosition = menu.position();
    $('.show-nav-off-canvas').on('click tap', '.inactive-sidebar', function(e) {
        e.preventDefault();
        e.stopPropagation();
        showSidebar();
    });
    
    $('.show-nav-off-canvas').on('click tap', '.active-sidebar', function(e) {
        e.preventDefault();
        e.stopPropagation();
        hideSidebar(); 
    });
    
    // $(window).on('resize', setSwipe);
    
    function setSwipe() {
        // run the resize of the sidebar no matter what
        setSidebarHeight();

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
    }
    
    function showSidebar() {
        // run the resize of the sidebar no matter what
        setSidebarHeight();

        // trade click handlers
        $('.show-nav-off-canvas i').removeClass('inactive-sidebar').addClass('active-sidebar');
        $('#outer-container').addClass('active-sidebar');
        offCanvasWindow.show();
        

        // add handler for menu position
        $(window).on('scrollstop', handleNavPosition);
        if(!navInScreenTop()) {
            // make sure the menu is in the screen on top
            menu.css('top', (getScrollTop() - origMenuPosition.top));
        }
    }
    
    function hideSidebar() {
        // run the resize of the sidebar no matter what
        setSidebarHeight();

        // trade click handlers
        $('.show-nav-off-canvas i').removeClass('active-sidebar').addClass('inactive-sidebar');
        $('#outer-container').removeClass('active-sidebar');
        window.setTimeout(function() {
            offCanvasWindow.hide();
        }, hideDelay);

        // turn off the menu position handler
        $(window).off('scrollstop', handleNavPosition);
        resetNavPosition();
    }
    
    function setSidebarHeight() {
        var outerHeight = $('#outer-container').height();
        offCanvasWindow.height(outerHeight);
    }
    
    // run removeSidebar once on page load
    hideSidebar();
    
    // set sidebar height
    setSidebarHeight();
    
    // set the swipe stuff
    // setSwipe();



    var oldScrollTop = $('body').scrollTop();

    function getScrollTop() {
        return $('body').scrollTop();
    }

    function setScrollTop() {
        oldScrollTop = getScrollTop();
    }

    function getScrollBottom() {
        return getScrollTop() + $(window).height();
    }

    function scrolledDown() {
        if(getScrollTop() > oldScrollTop) {
            return true;
        } else {
            return false;
        }
    }

    function findNavTop() {
        return menu.position().top;
    }

    function findNavBottom() {
        return menu.position().top + menu.height();
    }

    function navInScreenBottom() {
        if(findNavBottom() < getScrollBottom()) {
            return true;
        } else {
            return false;
        }
    }

    function navInScreenTop() {
        if(findNavTop() > getScrollTop()) {
            return true;
        } else {
            return false;
        }
    }

    function resetNavPosition() {
        menu.css('top', 0);
    }

    function handleNavPosition() {
        if(scrolledDown()) {
            if(!navInScreenTop()) {
                // make sure the menu is in the screen on top
                menu.css('top', (getScrollTop() - origMenuPosition.top));
            }
        } else { // scrolled up!
            if(!navInScreenBottom()) {
                // out of the bottom of the screen
                var newTop = getScrollBottom() - menu.height() - origMenuPosition.top;
                if(newTop < origMenuPosition.top) {
                    // menu.css('top', origMenuPosition.top);
                    menu.css('top', 0);
                } else {
                    menu.css('top', (getScrollBottom() - menu.height() - origMenuPosition.top));
                }
            }
        }

        setScrollTop(); // set this for next time
    }
});