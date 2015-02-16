
/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function ($) {
// Use this variable to set up the common and page specific functions. If you
// rename this variable, you will also need to rename the namespace below.
var Roots = {

  // All pages
  common: {
    init: function () {

      // JavaScript to be fired on all pages
      $(document).foundation(); // Initialize foundation JS for all pages

      // handle mailto links - show confirm before launching mail client
      $(".menu-contact").find("a").confirmMailto();

      var lastScrollTop = $(window).scrollTop();
      if (lastScrollTop !== 0) {
        var delta = $('#new-royalslider-1').height() - lastScrollTop;
        $('#new-royalslider-1 .rsGCaption').css({
          opacity: delta/900
        });
      }

      // fade effect for header/top image royal slider - debounced 25ms
      $(window).scroll(function(event){

        clearTimeout($.data(this, "fadeTimer"));
        $.data(this, "fadeTimer", setTimeout(function() {

          var scrollAmt = $(this).scrollTop();
          var deltaS = scrollAmt - lastScrollTop;

            $('#new-royalslider-1 .rsGCaption').css({
              opacity: "-=" + deltaS/400,

            });

            $('#new-royalslider-1 .js-content-link').css({
            opacity: "-=" + deltaS/400
            });

            $('#new-royalslider-1 .rsMainSlideImage').css({
              opacity: "-=" + deltaS/700
            });

          lastScrollTop = scrollAmt;

        }, 5));

      }); // end scroll funk


      // smooth scrolling for in-page links
      $('a[href*=#]:not([href=#])').click(function() {

        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
          }
        }
      });


      // Sidebar JS
      // check for links with siblings and add toggleable to the parent item link

      $( ".list__sidebar__artworks__parent-item" ).each(function( index ) {
         var dis = $(this);
         if (dis.find(".list__sidebar__artworks__children").length)
         {
            dis.addClass("toggleable");
            dis.find("> a").append('<span class="toggle-icon-arrow"></span>')
         }

      });


      // setup menu bindings for expandable menu headings
      $( ".list__sidebar__artworks__parent-item.toggleable" ).on( "click", "> a span", function(e) {

        e.preventDefault();
        var dis = $(this);
        dis.closest("li").toggleClass("closed");

      });



      $(window).load(function() {
        if (!$('body').hasClass('mobile')) {
          var content_height = ($('.content').height());
          $('.sidebar').css("height", (content_height + 100));
        }
      });







    }



  },
  // Home page
  home: {
    init: function() {
      // JavaScript to be fired on the home page

      // split the news/events list into two columns on desktop on desktop and tablet

      if (!$('body').hasClass('mobile')) {
        var num_cols = 2,
        container = $('.list__news_events'),
        listItem = 'li',
        listClass = 'sub-list';
        container.each(function() {
            var items_per_col = [],
            items = $(this).find(listItem),
            min_items_per_col = Math.floor(items.length / num_cols),
            difference = items.length - (min_items_per_col * num_cols);
            for (var i = 0; i < num_cols; i++) {
                if (i < difference) {
                    items_per_col[i] = min_items_per_col + 1;
                } else {
                    items_per_col[i] = min_items_per_col;
                }
            }
            for (i = 0; i < num_cols; i++) {
                $(this).append($('<ul ></ul>').addClass(listClass).addClass('medium-8 columns no-pad-l'));
                for (var j = 0; j < items_per_col[i]; j++) {
                    var pointer = 0;
                    for (var k = 0; k < i; k++) {
                        pointer += items_per_col[k];
                    }
                    $(this).find('.' + listClass).last().append(items[j + pointer]);
                }
            }
        });


      } // end  if (!$('body').hasClass('mobile'))


    }
  },
  // About us page, note the change from about-us to about_us.
  about_us: {
    init: function() {
      // JavaScript to be fired on the about us page
    }
  }
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = Roots;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
  }
};

$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
