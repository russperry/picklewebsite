// FIRST OF ALL, TRIGGER MASONRY FOR THE GALLERY.
// SWEET, SWEET BRICKS OF IMAGEY GOODNESS.





/*
* Bones Scripts File
* Author: Eddie Machado
*
* This file should contain any js scripts you want to add to the site.
* Instead of calling it in the header or throwing it inside wp_head()
* this file will be called automatically in the footer so as not to
* slow the page load.
*
* There are a lot of example functions and tools in here. If you don't
* need any of it, just remove it. They are meant to be helpers and are
* not required. It's your world baby, you can do whatever you want.
*/


/*
* Get Viewport Dimensions
* returns object with viewport dimensions to match css in width and height properties
* ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
    var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
    return { width:x,height:y };
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
* Throttle Resize-triggered Events
* Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
* ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
    var timers = {};
    return function (callback, ms, uniqueId) {
        if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
        if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
        timers[uniqueId] = setTimeout(callback, ms);
    };
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
* Here's an example so you can see how we're using the above function
*
* This is commented out so it won't work, but you can copy it and
* remove the comments.
*
*
*
* If we want to only do it on a certain page, we can setup checks so we do it
* as efficient as possible.
*
* if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
*
* This once checks to see if you're on the home page based on the body class
* We can then use that check to perform actions on the home page only
*
* When the window is resized, we perform this function
* $(window).resize(function () {
*
*    // if we're on the home page, we wait the set amount (in function above) then fire the function
*    if( is_home ) { waitForFinalEvent( function() {
*
*	// update the viewport, in case the window size has changed
*	viewport = updateViewportDimensions();
*
*      // if we're above or equal to 768 fire this off
*      if( viewport.width >= 768 ) {
*        console.log('On home page and window sized to 768 width or more.');
*      } else {
*        // otherwise, let's do this instead
*        console.log('Not on home page, or window sized to less than 768.');
*      }
*
*    }, timeToWaitForLast, "your-function-identifier-string"); }
* });
*
* Pretty cool huh? You can create functions like this to conditionally load
* content and other stuff dependent on the viewport.
* Remember that mobile devices and javascript aren't the best of friends.
* Keep it light and always make sure the larger viewports are doing the heavy lifting.
*
*/

/*
* We're going to swap out the gravatars.
* In the functions.php file, you can see we're not loading the gravatar
* images on mobile to save bandwidth. Once we hit an acceptable viewport
* then we can swap out those images since they are located in a data attribute.
*/
function loadGravatars() {
// set the viewport using the function above
viewport = updateViewportDimensions();
// if the viewport is tablet or larger, we load in the gravatars
if (viewport.width >= 768) {
    jQuery('.comment img[data-gravatar]').each(function(){
        jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
    });
}
} // end function


/*
* Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {

// Contact Form
$('a[href="/contact?inpage"]').click(function(e){

    e.preventDefault();

    var elem = $('.button-wrap');
    var shortcode = $(this).attr('shortcode');

    elem.fadeOut(500);

    window.setTimeout(function(){
        $('.inpage-contact').removeClass('hidden').animate({'opacity' : 1});
    }, 500);

    
    // $.get('/wp-content/themes/designpickle/includes/email-call.php', function( data ) {
    //     $('.inpage-contact').html( data );
    //     alert( "Load was performed." );
    // });

});


$('body').on('click', '.add-file', function(e){
    e.preventDefault()
    var wrapper = $(this).parent().parent().find('.extrafilewrap.hidden').first()

    wrapper.removeClass('hidden').find('input')[0].click();

    if (wrapper.next('.extrafilewrap.hidden').length) {
        // $(this).addClass('disabled')
    } else {
         $(this).addClass('disabled')
    }
});

$('body').on('click', '.add-url', function(e){
    e.preventDefault()
    if (!$(this).hasClass('disabled')) {
        var wrapper = $(this).parent().parent().find('.extraurlwrap.hidden').first();
        wrapper.removeClass('hidden').find('input').focus();
        if (!wrapper.next('.extraurlwrap.hidden').length) {
             $(this).addClass('disabled')
        }
    }
    
});

$('body').on('click', '.choose-file', function(e){
    e.preventDefault();
    $(this).closest('.inputfilewrap').find('input')[0].click();
});

$('body').on('change', 'input[type="file"]', function(){
    var string = $(this).attr('name');
    var filesrc = $(this).val().split('\\').pop();
    $('.filesrc[field="'+string+'"]').text(filesrc);
})

$('body').on('click', '.delete-field', function(e){
    e.preventDefault();
    var input = $(this).parent().find('input');

    if (input.attr('type') == 'file') {
        input.removeAttr('value');
        input.replaceWith( input = input.clone( true ) );
        input.closest('.extrainputwrap').addClass('hidden').find('.filesrc').text('No file chosen');
        input.closest('.file-upload-wrap').find('.add-file').removeClass('disabled');
    } else {
        input.removeAttr('value');
        input.closest('.extrainputwrap').addClass('hidden');
        input.replaceWith( input = input.clone( true ) );
        input.closest('.file-upload-wrap').find('.add-url').removeClass('disabled');
    }
})

$('body').on('change', '.plan-switcher input[type="checkbox"]', function(){

    $('.plan-price').each(function(){
        var h = $(this).height();
        $(this).height(h);
    })

    if ($(this).is(':checked')) {
        // yearly pricing
        $('.monthly-price, .yearly-price').animate({'opacity' : 0}, 500);
        setTimeout(function(){
            $('.monthly-price').addClass('hidden');
            $('.yearly-price').removeClass('hidden').animate({'opacity' : 1}, 500);
        }, 500)

        $('.plan-switcher').addClass('annual-plan');

        $('.plan-button').each(function(){
            var but = $(this);
            var url = but.attr('href') + '-annual';

            but.attr('href', url);

        });

    } else {
        // monthly pricing
        $('.monthly-price, .yearly-price').animate({'opacity' : 0}, 500);
        setTimeout(function(){
            $('.yearly-price').addClass('hidden');
            $('.monthly-price').removeClass('hidden').animate({'opacity' : 1}, 500);
        }, 500)

         $('.plan-switcher').removeClass('annual-plan');
        $('.plan-button').each(function(){
            var but = $(this);
            var url = but.attr('href').replace('-annual','');;

            but.attr('href', url);

        });
    }
});



$('header nav').click(function(e){
    e.stopPropagation();
});

$('body').click(function() {
    if ($('body').hasClass('showsidemenu')) {
        $('body').removeClass('showsidemenu');
    }
});

$('.sidemenubutton').click(function(e){
    if ($('body').hasClass('showsidemenu')) {
        $('body').removeClass('showsidemenu');
    } else { 
        $('body').addClass('showsidemenu');
    }
    e.stopPropagation();
});

$('.closebutton').click(function(){
    if ($('body').hasClass('showsidemenu')) {
        $('body').removeClass('showsidemenu');
    }
});

var isTouch = ('ontouchstart' in window) || (navigator.msMaxTouchPoints > 0);


$(document).on('touchstart', function(){
    if (isTouch) {
        if ($('.plan-item-has-tooltip span').hasClass('hover')) {
            $('.plan-item-has-tooltip span').removeClass('hover');
        }
    }
});

$('.plan-item-has-tooltip span').click(function(){
    if (isTouch) {
        $(this).addClass('hover');
        e.stopPropagation();
    }
});

$('.plan-item-has-tooltip span').mouseover(function(){
    if (!isTouch) {
        $(this).toggleClass('hover');
    }
}).mouseout(function(){
    if (!isTouch) {
        $(this).toggleClass('hover');
    }
})




fixSidebar();

$(document).scroll(function(e){
    fixSidebar();

    if ($('body').hasClass('page-template-page-home-php')) {
        homeBlocksScroll();
    }

});

$(window).resize(function(){
    fixSidebar();
});
    
function fixSidebar() {
    var vW = $(window).width(); 

    if (vW > 1260) {
        $('.sidebar').each(function(){

            // Variables useful for top + bottom
            var item = $(this);
            var iH = $(this).outerHeight();
            var sCH = $('.sidebar-inner').outerHeight() // Inner sidebar height
            var sP = $(document).scrollTop();           // Window Scroll Position
            var wH = $(window).height();                // Window Height

            if (sCH > wH) {

                // Reset CSS
                item.css({
                    'position' : '',
                    'height' : '',
                    'top' : '',
                    'right' : '',
                    'align-self' : ''
                });

                // Break out of function
                return false;
            }

            // Variables useful for top
            var nH = $('header > nav').outerHeight();   // Nav height
            var oT = $('body > header').outerHeight();  // Header Height
            var sidebarTopOffset = oT-nH-sP;            // When sidebar hits nav, this will be ZERO

            // Variables useful for bottom
            var fH = $('.footer-cta + footer').outerHeight();   // footer height
            var fCTAH = $('.footer-cta').outerHeight();         // footer-cta height 
            var totFoot = fH + fCTAH;                           // height of total footer block
            var dH = $(document).height();                      // Document Height
            var oB = fH + fCTAH;
            sidebarBotOffset = dH - sP - wH - totFoot;          // When sidebar hits bottom, this will be ZERO;


            // First of all, set height to account for nav
            item.css({'height' : wH - nH, 'min-height' : wH - nH});

            console.log (sidebarBotOffset);


            if (sidebarTopOffset < 0 && sidebarBotOffset > 0 ) {
                item.css({
                    'position' : 'fixed',
                    'top' : nH,
                    'right' : 0,
                    'align-self' : ''
                });
            } else if (sidebarBotOffset < 0){
                item.css({
                    'position' : '',
                    'top' : '',
                    'right' : '',
                    'align-self' : 'flex-end'
                });
            } else {
                item.css({
                    'position' : '',
                    'top' : '',
                    'right' : '',
                    'align-self' : ''
                });
            }
        });
    } else {
        var item = $(this);

        item.css({
            'position' : '',
            'height' : '',
            'min-height' : '',
            'top' : '',
            'right' : '',
            'align-self' : ''
        });
    }
}

function homeBlocksScroll() {
    var sP = $(document).scrollTop();
    var wW = $(window).width();

    if (wW > 900 && $('body').hasClass('page-template-page-home-php') ) {
        // SECTION ONE
        var sec1 = $('.core-point:nth-child(1)')
        var sec1OfTop = sec1.offset().top;
        var sec1Tex = sec1.find('.core-point-text')

        if (sP > sec1OfTop) {
            sec1Tex.css({
                'position' : 'fixed',
                'top' : sec1Tex.position().top,
                'left' : sec1Tex.offset().left,
                'width' : sec1Tex.outerWidth(),
            })

        } else {
            sec1Tex.css({
                'position' : '',
                'top' : '',
                'left' : '',
                'width' : ''
            })
        }

        // SECTION TWO
        var sec2 = $('.core-point:nth-child(2)');
        var sec2OfTop = sec2.offset().top;
        var sec2Tex = sec2.find('.core-point-text')

        if (sP > sec2OfTop) {

            sec1Tex.css({
                'position' : '',
                'top' : '',
                'left' : '',
                'width' : ''
            })

            sec2Tex.css({
                'position' : 'fixed',
                'top' : sec2Tex.position().top,
                'left' : sec2Tex.offset().left,
                'width' : sec2Tex.outerWidth(),
            })
        } else {
            sec2Tex.css({
                'position' : '',
                'top' : '',
                'left' : '',
                'width' : ''
            })
        }

        // SECTION THREE
        var sec3 = $('.core-point:nth-child(3)');
        var sec3OfTop = sec3.offset().top;
        var sec3Tex = sec3.find('.core-point-text')

        if (sP > sec3OfTop) {
            sec2Tex.css({
                'position' : '',
                'top' : '',
                'left' : '',
                'width' : ''
            })
        }
    }

}


}); /* end of as page load scripts */
