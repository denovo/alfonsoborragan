
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


      var snappr_options = {
        panelSelector: '.royalSlider',
        directionThreshold: 50,
        slideSpeed: 200,
        easing: 'linear',
        keyboardNavigation: {
          enabled: true,
          nextPanelKey: 40,
          previousPanelKey: 38,
          wrapAround: true
        }
      };




      $(window).load(function() {

        if (!$('body').hasClass('mobile')) {
          var content_height = ($('.content').height());
          $('.sidebar').css("height", (content_height + 100));
        }

        // $('body').panelSnap();

        // set slider heights
        resizeSlider();

      });




      // set slider auto height to full screen height on window resize (uses debounce to minimise CPU usage)
      var resizeSlider = function () {
          // homepage slider resize function
          $('.royalSlider.new-royalslider-1.rsPete').css({
              width: $(window).innerWidth(),
              height: $(window).innerHeight()
          });

          // image gallery only posts slider resize js
          $('article .royalSlider').css({
              // width: $(window).innerWidth(),
              height: $(window).innerHeight()
          });

          console.log("resized the slider");
      };



      // debounce that mo-fo to save CPU
      $(window).resize(function() {
        clearTimeout($.data(this, "resizeTimer"));
        $.data(this, "resizeTimer", setTimeout(function() {
           resizeSlider();

        }, 200));
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
