/*
panther Scripts File
Author: Jon Wadsworth

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/

// IE8 ployfill for GetComputed Style (for Responsive Script below)
if (!window.getComputedStyle) {
    window.getComputedStyle = function(el, pseudo) {
        this.el = el;
        this.getPropertyValue = function(prop) {
            var re = /(\-([a-z]){1})/g;
            if (prop == 'float') prop = 'styleFloat';
            if (re.test(prop)) {
                prop = prop.replace(re, function () {
                    return arguments[2].toUpperCase();
                });
            }
            return el.currentStyle[prop] ? el.currentStyle[prop] : null;
        }
        return this;
    }
}

// as the page loads, call these scripts
jQuery(document).ready(function($) {

    $('fieldset > p').remove();
    /*
    Responsive jQuery is a tricky thing.
    There's a bunch of different ways to handle
    it, so be sure to research and find the one
    that works for you best.
    */
    
    /* getting viewport width */
    var responsive_viewport = $(window).width();
    
    /* if is below 481px */
    if (responsive_viewport < 481) {
    
    } /* end smallest screen */
    
    /* if is larger than 481px */
    if (responsive_viewport > 481) {
        
    } /* end larger than 481px */

    if (responsive_viewport < 768) {
        $('[data-toggle="tab"]').click(function(e){
            $('html, body').animate({scrollTop: $('.tab-content').offset().top}, 1200, 'easeInOutQuart');
        });
    }
    
    /* if is above or equal to 768px */
    if (responsive_viewport >= 768) {
    
        /* load gravatars */
        $('.comment img[data-gravatar]').each(function(){
            $(this).attr('src',$(this).attr('data-gravatar'));
        });
        
    }
    
    /* off the bat large screen actions */
    if (responsive_viewport > 1030) {
        
    }
    
	
	// add all your scripts here
    $('.search-link').click(function(){
        $('.search-bar').toggleClass('active').fadeToggle();
    })

    $('sup:contains("SM")').css('font-size', '12px').css('top', '-25px');

    // Colorbox
    $('a[title="lightbox"]').colorbox({maxWidth: '90%', maxHeight: '90%'});
    $('a[title="youtube"]').colorbox({iframe:true, innerWidth:420, innerHeight:700, maxWidth: '90%', maxHeight: '90%'});


    // Called on window scroll event
    function scrollWin() {
        var scrollTop = $(window).scrollTop();
        if(scrollTop > $('header.header').height()){
            $('header.header').addClass('fixed-top');
        } else {
            $('header.header').removeClass('fixed-top');
        }
    }

    // Called on window resize event
    function resizeWin() {
        scrollWin();
        if($(window).width() > 767){
            $('.vertical-center').each(function(){
                $(this).css('top', $(this).parent().height()/2);
            });
        } else {
            $('.vertical-center').each(function(){
                $(this).css('top', 0);
            });
        }
    }

    $(window).resize(function(e) {
        resizeWin();
    }).resize();

    $(window).scroll(function(e) {
        scrollWin();
    });


    // Keyboard shortcuts
    $(window).keypress(function(e) {
        if(e.keyCode == 210 || e.keyCode == 197) {      // Go to login screen - 'shift' + 'alt' + 'l'
                                                        // Go to admin dashboard - 'shift' + 'alt' + 'a'
            e.preventDefault();
            if($('#btn-login').length > 0) {
                openURL(String($('#btn-login').attr('href')), '_self');
            } else {
                openURL(String($('#btn-admin').attr('href')), '_self');
            }
        }

        if(e.keyCode == 180) {                          // Edit current page - 'shift' + 'alt' + 'e'
            e.preventDefault();
            if($('#btn-login').length > 0) {
                openURL(String($('#btn-login').attr('href')), '_self');
            } else {
                openURL(String($('.post-edit-link').attr('href')), '_self');
            }
        }
    });

    // force external links to open in a '_blank' window
    $('a').each(function() {
        var a = new RegExp('/' + window.location.host + '/');
        if(!a.test(this.href)) {
            $(this).attr('target', '_blank');
            // $(this).click(function(e) {
            //     e.preventDefault();
            //     e.stopPropagation();
            //     window.open(this.href, '_blank');
            // });
        }
    });

    // build mmenu from #main-navigation
    draggable = ($(window).width() <= 768) ? true : false;

    $('#mobile-navigation')
        .mmenu({
            onClick: {
                close: false
            },
            dragOpen: {
                open: draggable
            },
            header: false,
            labels: {
                fixed: false
            },
            offCanvas: {
                position: 'right',
                moveBackground: true,
            },
        }, {
            clone: false,
            transitionDuration: 400,
            classNames: {
                selected: "active"
            }
        });
    $('#mobile-navigation .dropdown-toggle-mm').click(function(e){
        e.preventDefault();
        $('ul'+$(this).prev().attr('href')).trigger('open.mm');
    });

    // $('#main-navigation').show();
    // Fix FOUT bug
    // $('#mobile-navigation').css({opacity:1});

    var supportsOrientationChange = "onorientationchange" in window,
        orientationEvent = supportsOrientationChange ? "orientationchange" : "resize";

    window.addEventListener(orientationEvent, function() {
        resizeWin();
    }, false);

    ifvisible.on("focus", function() {
        resizeWin();
    });
    ifvisible.on("wakeup", function() {
        resizeWin();
    });

    resizeWin();

    // Called on window load event
    $(window).load(function(e) {

        resizeWin();

        // $('.page-body').css('min-height', function(){
        //     if($('body').hasClass('admin-bar')){
        //         return $(window).height() - ($('header.header').outerHeight() + $('footer.footer').outerHeight(true)) - 32;
        //     } else {
        //         return $(window).height() - ($('header.header').outerHeight() + $('footer.footer').outerHeight(true));
        //     }
        // });

    });


    /* Looks for rel=popover and rel=tooltip for Bootstrap JS */
    jQuery("a[rel=popover]").popover().click(function(e) {
        e.preventDefault()
    });

    jQuery("a[rel=tooltip]").tooltip();

    $('.section img').addClass('img-responsive');

    $('html.no-touch .dropdown-toggle').addClass('disabled');
    if($('html').hasClass('touch')){
        $('li.dropdown').each(function(){
            var dup_el = $(this).clone();
            dup_el.removeClass('dropdown active current-menu-item current_page_item').find('ul').remove();
            dup_el.find('a').addClass('disabled').find('b').remove();
            $(this).find('.dropdown-menu').first().prepend(dup_el);
        });
    }
    $('.link-boxes li').prepend('<span class="fa fa-angle-right"></span>');

    // Smooth scroll all internal anchor links
    $('a[href^="#"]:not([href="#"])').on('click',function (e) {
        e.preventDefault();

        var target = this.hash;
        var $target = $(target);

        $('html, body').stop().animate({
            'scrollTop': $target.offset().top - 80
        }, 700, 'swing', function () {
            window.location.hash = target;
        });
    });

    $('.background-cover img').each(function(){
        var src = $(this).attr('src');
        $(this).css({'visibility': 'hidden'})
        $(this).closest('.column').css({

            'backgroundSize': 'cover',
            'backgroundImage': 'url('+src+')',
            'overflow': 'visible'
        });
    });

    $('.page-body').fitVids();
    
	
 
}); /* end of as page load scripts */


/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(w){
	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){ return; }
    var doc = w.document;
    if( !doc.querySelector ){ return; }
    var meta = doc.querySelector( "meta[name=viewport]" ),
        initialContent = meta && meta.getAttribute( "content" ),
        disabledZoom = initialContent + ",maximum-scale=1",
        enabledZoom = initialContent + ",maximum-scale=10",
        enabled = true,
		x, y, z, aig;
    if( !meta ){ return; }
    function restoreZoom(){
        meta.setAttribute( "content", enabledZoom );
        enabled = true; }
    function disableZoom(){
        meta.setAttribute( "content", disabledZoom );
        enabled = false; }
    function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );
		// If portrait orientation and in one of the danger zones
        if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){ disableZoom(); } }
		else if( !enabled ){ restoreZoom(); } }
	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );
})( this );