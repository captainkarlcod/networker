/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.csThrottleScroll = csThrottleScroll;
exports.csGetCookie = csGetCookie;
exports.csSetCookie = csSetCookie;
exports.docH = exports.wndH = exports.wndW = exports.csco = exports.$body = exports.$doc = exports.$window = exports.$ = void 0;
// Create csco object.
var csco = {
  addAction: function addAction(x, y, z) {
    return;
  }
};
exports.csco = csco;

if ('undefined' !== typeof wp && 'undefined' !== typeof wp.hooks) {
  csco.addAction = wp.hooks.addAction;
}
/**
 * Window size
 */


var $ = jQuery;
exports.$ = $;
var $window = $(window);
exports.$window = $window;
var $doc = $(document);
exports.$doc = $doc;
var $body = $('body');
exports.$body = $body;
var wndW = 0;
exports.wndW = wndW;
var wndH = 0;
exports.wndH = wndH;
var docH = 0;
exports.docH = docH;

function csGetWndSize() {
  exports.wndW = wndW = $window.width();
  exports.wndH = wndH = $window.height();
  exports.docH = docH = $doc.height();
}

$window.on('resize load orientationchange', csGetWndSize);
csGetWndSize();
/**
 * Throttle scroll
 * thanks: https://jsfiddle.net/mariusc23/s6mLJ/31/
 */

var csHideOnScrollList = [];
var csDidScroll;
var csLastST = 0;
$window.on('scroll load resize orientationchange', function () {
  if (csHideOnScrollList.length) {
    csDidScroll = true;
  }
});

function csHasScrolled() {
  var ST = $window.scrollTop();
  var type = null;

  if (ST > csLastST) {
    type = 'down';
  } else if (ST < csLastST) {
    type = 'up';
  } else {
    type = 'none';
  }

  if (ST === 0) {
    type = 'start';
  } else if (ST >= docH - wndH) {
    type = 'end';
  }

  csHideOnScrollList.forEach(function (item) {
    if (typeof item === 'function') {
      item(type, ST, csLastST, $window);
    }
  });
  csLastST = ST;
}

setInterval(function () {
  if (csDidScroll) {
    csDidScroll = false;
    window.requestAnimationFrame(csHasScrolled);
  }
}, 250);

function csThrottleScroll(callback) {
  csHideOnScrollList.push(callback);
}
/**
 * In Viewport checker
 */


$.fn.isInViewport = function () {
  var elementTop = $(this).offset().top;
  var elementBottom = elementTop + $(this).outerHeight();
  var viewportTop = $(window).scrollTop();
  var viewportBottom = viewportTop + $(window).height();
  return elementBottom > viewportTop && elementTop < viewportBottom;
};
/**
 * Cookies
 */


function csGetCookie(name) {
  var matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}

function csSetCookie(name, value) {
  var props = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {};
  props = {
    path: '/'
  };

  if (props.expires instanceof Date) {
    props.expires = props.expires.toUTCString();
  }

  var updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);

  for (var optionKey in props) {
    updatedCookie += "; " + optionKey;
    var optionValue = props[optionKey];

    if (optionValue !== true) {
      updatedCookie += "=" + optionValue;
    }
  }

  document.cookie = updatedCookie;
}

/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(2);
__webpack_require__(3);
__webpack_require__(4);
__webpack_require__(5);
__webpack_require__(6);
__webpack_require__(7);
__webpack_require__(8);
__webpack_require__(9);
__webpack_require__(10);
__webpack_require__(11);
__webpack_require__(12);
__webpack_require__(13);
__webpack_require__(14);
__webpack_require__(15);
__webpack_require__(16);
module.exports = __webpack_require__(17);


/***/ }),
/* 2 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _utility = __webpack_require__(0);

(function () {
  function initCarousel() {
    /**
     * Carousel-type-1
     */
    (0, _utility.$)('.cnvs-block-posts-layout-carousel-type-1').each(function (indexBlock, objectBlock) {
      (0, _utility.$)(objectBlock).imagesLoaded(function (instance) {
        var rtl = _utility.$body.hasClass('rtl') ? true : false; // Loop.

        (0, _utility.$)(instance.elements).each(function (index, el) {
          var objectSlider = (0, _utility.$)(el).find('.cs-carousel__items'); // Get data.

          var autoPlay = (0, _utility.$)(objectBlock).find('.cs-flickity-init').data('autoplay'),
              pageDots = (0, _utility.$)(objectBlock).find('.cs-flickity-init').data('pagedots'),
              wrapAround = (0, _utility.$)(objectBlock).find('.cs-flickity-init').data('wraparound');
          console.log(autoPlay);
          var settings = {
            wrapAround: wrapAround ? true : false,
            autoPlay: autoPlay ? 5000 : false,
            prevNextButtons: false,
            pageDots: pageDots ? true : false,
            rightToLeft: rtl,
            resize: true
          };
          (0, _utility.$)(objectSlider).flickity(settings);
          var flkty = (0, _utility.$)(objectSlider).data('flickity');
          var $prev = (0, _utility.$)(objectBlock).find('.cs-carousel__arrow-previous');
          var $next = (0, _utility.$)(objectBlock).find('.cs-carousel__arrow-next');
          var elCount = (0, _utility.$)(objectSlider).find('.cs-carousel__cell').length;

          if (elCount >= 2) {
            (0, _utility.$)(objectSlider).flickity(settings);
          } else {
            (0, _utility.$)(objectSlider).flickity('destroy');
          } // Select the previous slide.


          $prev.on('click', function (event) {
            event.preventDefault();
            var type = rtl ? 'next' : 'previous';
            (0, _utility.$)(objectSlider).flickity(type);
          }); // Select the next slide.

          $next.on('click', function (event) {
            event.preventDefault();
            var type = rtl ? 'previous' : 'next';
            (0, _utility.$)(objectSlider).flickity(type);
          });

          if (!settings.wrapAround) {
            (0, _utility.$)(objectSlider).on('select.flickity', function () {
              // enable/disable previous/next buttons
              if (!flkty.slides[flkty.selectedIndex - 1]) {
                $prev.addClass('disabled');
                $next.removeClass('disabled'); // <-- remove disabled from the next
              } else if (!flkty.slides[flkty.selectedIndex + 1]) {
                $next.addClass('disabled');
                $prev.removeClass('disabled'); //<-- remove disabled from the prev
              } else {
                $prev.removeClass('disabled');
                $next.removeClass('disabled');
              }
            });
          }
        });
      });
    });
    /**
     * Wide Carousel
     */

    (0, _utility.$)('.cnvs-block-posts-layout-wide-type-2').each(function (indexBlock, objectBlock) {
      (0, _utility.$)(objectBlock).imagesLoaded(function (instance) {
        var rtl = _utility.$body.hasClass('rtl') ? true : false; // Loop.

        (0, _utility.$)(instance.elements).each(function (index, el) {
          var objectSlider = (0, _utility.$)(el).find('.cs-wide-carousel__items'); // Get data.

          var autoPlay = (0, _utility.$)(objectBlock).find('.cs-flickity-init').data('autoplay'),
              pageDots = (0, _utility.$)(objectBlock).find('.cs-flickity-init').data('pagedots'),
              wrapAround = (0, _utility.$)(objectBlock).find('.cs-flickity-init').data('wraparound');
          var settings = {
            wrapAround: wrapAround ? true : false,
            autoPlay: autoPlay ? 5000 : false,
            prevNextButtons: false,
            pageDots: pageDots ? true : false,
            rightToLeft: rtl,
            resize: true
          };
          (0, _utility.$)(objectSlider).flickity(settings);
          var flkty = (0, _utility.$)(objectSlider).data('flickity');
          var $prev = (0, _utility.$)(objectBlock).find('.cs-wide-carousel__arrow-previous');
          var $next = (0, _utility.$)(objectBlock).find('.cs-wide-carousel__arrow-next');
          var elCount = (0, _utility.$)(objectSlider).find('.cs-wide-carousel__cell').length;

          if (elCount >= 2) {
            (0, _utility.$)(objectSlider).flickity(settings);
          } else {
            (0, _utility.$)(objectSlider).flickity('destroy');
          } // Select the previous slide.


          $prev.on('click', function (event) {
            event.preventDefault();
            var type = rtl ? 'next' : 'previous';
            (0, _utility.$)(objectSlider).flickity(type);
          }); // Select the next slide.

          $next.on('click', function (event) {
            event.preventDefault();
            var type = rtl ? 'previous' : 'next';
            (0, _utility.$)(objectSlider).flickity(type);
          });

          if (!settings.wrapAround) {
            (0, _utility.$)(objectSlider).on('select.flickity', function () {
              // enable/disable previous/next buttons
              if (!flkty.slides[flkty.selectedIndex - 1]) {
                $prev.addClass('disabled');
                $next.removeClass('disabled'); // <-- remove disabled from the next
              } else if (!flkty.slides[flkty.selectedIndex + 1]) {
                $next.addClass('disabled');
                $prev.removeClass('disabled'); //<-- remove disabled from the prev
              } else {
                $prev.removeClass('disabled');
                $next.removeClass('disabled');
              }
            });
          }
        });
      });
    });
    /**
     * Wide Carousel-type-2
     */

    (0, _utility.$)('.cnvs-block-posts-layout-wide-type-3 ').each(function (indexBlock, objectBlock) {
      (0, _utility.$)(objectBlock).imagesLoaded(function (instance) {
        var rtl = _utility.$body.hasClass('rtl') ? true : false; // Loop.

        (0, _utility.$)(instance.elements).each(function (index, el) {
          var objectSlider = (0, _utility.$)(el).find('.cs-wide-carousel__items');
          var $current; // Point.

          var point = function point() {
            var points = [340, 370, 480, 565, 640, 720, 1020, 1200, 1440, 1660, 1920];
            var current = 0;

            for (var i in points) {
              if (window.innerWidth >= points[i]) {
                current = points[i];
              }
            }

            return current;
          }; // Get columns.


          var carouselColumns = parseInt(window.getComputedStyle((0, _utility.$)(objectBlock)[0]).getPropertyValue('--cs-carousel-columns')); // Get data.

          var autoPlay = (0, _utility.$)(objectBlock).find('.cs-flickity-init').data('autoplay'),
              pageDots = (0, _utility.$)(objectBlock).find('.cs-flickity-init').data('pagedots'),
              wrapAround = (0, _utility.$)(objectBlock).find('.cs-flickity-init').data('wraparound');
          var settings = {
            cellAlign: rtl ? 'right' : 'left',
            autoPlay: autoPlay ? 5000 : false,
            prevNextButtons: false,
            rightToLeft: rtl,
            wrapAround: wrapAround ? true : false,
            pageDots: pageDots ? true : false,
            resize: true
          };
          (0, _utility.$)(objectSlider).flickity(settings);
          var flkty = (0, _utility.$)(objectSlider).data('flickity');
          var $prev = (0, _utility.$)(objectBlock).find('.cs-wide-carousel__arrow-previous');
          var $next = (0, _utility.$)(objectBlock).find('.cs-wide-carousel__arrow-next');
          var elCount = (0, _utility.$)(objectSlider).find('.cs-wide-carousel__cell').length;

          if (elCount >= carouselColumns + 1) {
            (0, _utility.$)(objectSlider).flickity(settings);
          } else {
            (0, _utility.$)(objectSlider).flickity('destroy');
          } // Set current point();


          $current = point(); // Resize.

          (0, _utility.$)(window).resize(function () {
            var carouselColumnsResize = parseInt(window.getComputedStyle((0, _utility.$)(objectBlock)[0]).getPropertyValue('--cs-carousel-columns'));

            if ($current !== point() && elCount >= carouselColumnsResize + 1) {
              (0, _utility.$)(objectSlider).flickity(settings);
              $current = point();

              if ((0, _utility.$)(objectSlider).flickity(settings)) {
                (0, _utility.$)(objectSlider).flickity('destroy');
                (0, _utility.$)(objectSlider).flickity(settings);
              }
            } else if ($current !== point() && elCount <= carouselColumnsResize && (0, _utility.$)(objectSlider).flickity(settings)) {
              (0, _utility.$)(objectSlider).flickity('destroy');
              $current = point();
            }
          }); // Select the previous slide.

          $prev.on('click', function (event) {
            event.preventDefault();
            var type = rtl ? 'next' : 'previous';
            (0, _utility.$)(objectSlider).flickity(type);
          }); // Select the next slide.

          $next.on('click', function (event) {
            event.preventDefault();
            var type = rtl ? 'previous' : 'next';
            (0, _utility.$)(objectSlider).flickity(type);
          });

          if (!settings.wrapAround) {
            (0, _utility.$)(objectSlider).on('select.flickity', function () {
              // enable/disable previous/next buttons
              if (!flkty.slides[flkty.selectedIndex - 1]) {
                $prev.addClass('disabled');
                $next.removeClass('disabled'); // <-- remove disabled from the next
              } else if (!flkty.slides[flkty.selectedIndex + 1]) {
                $next.addClass('disabled');
                $prev.removeClass('disabled'); //<-- remove disabled from the prev
              } else {
                $prev.removeClass('disabled');
                $next.removeClass('disabled');
              }
            });
          }
        });
      });
    });
    /**
     * Wide Carousel-type-3
     */

    (0, _utility.$)('.cnvs-block-posts-layout-wide-type-4 ').each(function (indexBlock, objectBlock) {
      (0, _utility.$)(objectBlock).imagesLoaded(function (instance) {
        var rtl = _utility.$body.hasClass('rtl') ? true : false; // Loop.

        (0, _utility.$)(instance.elements).each(function (index, el) {
          var objectSlider = (0, _utility.$)(el).find('.cs-wide-carousel__items');
          var $current; // Point.

          var point = function point() {
            var points = [340, 370, 480, 565, 640, 720, 1020, 1200, 1440, 1660, 1920];
            var current = 0;

            for (var i in points) {
              if (window.innerWidth >= points[i]) {
                current = points[i];
              }
            }

            return current;
          }; // Get columns.


          var carouselColumns = parseInt(window.getComputedStyle((0, _utility.$)(objectBlock)[0]).getPropertyValue('--cs-carousel-columns')); // Get data.

          var autoPlay = (0, _utility.$)(objectBlock).find('.cs-flickity-init').data('autoplay'),
              pageDots = (0, _utility.$)(objectBlock).find('.cs-flickity-init').data('pagedots'),
              wrapAround = (0, _utility.$)(objectBlock).find('.cs-flickity-init').data('wraparound');
          var settings = {
            cellAlign: rtl ? 'right' : 'left',
            autoPlay: autoPlay ? 5000 : false,
            prevNextButtons: false,
            wrapAround: wrapAround ? true : false,
            pageDots: pageDots ? true : false,
            rightToLeft: rtl,
            resize: true
          };
          (0, _utility.$)(objectSlider).flickity(settings);
          var flkty = (0, _utility.$)(objectSlider).data('flickity');
          var $prev = (0, _utility.$)(objectBlock).find('.cs-wide-carousel__arrow-previous');
          var $next = (0, _utility.$)(objectBlock).find('.cs-wide-carousel__arrow-next');
          var elCount = (0, _utility.$)(objectSlider).find('.cs-wide-carousel__cell').length;

          if (elCount >= carouselColumns + 1) {
            (0, _utility.$)(objectSlider).flickity(settings);
          } else {
            (0, _utility.$)(objectSlider).flickity('destroy');
          } // Set current point();


          $current = point(); // Resize.

          (0, _utility.$)(window).resize(function () {
            var carouselColumnsResize = parseInt(window.getComputedStyle((0, _utility.$)(objectBlock)[0]).getPropertyValue('--cs-carousel-columns'));

            if ($current !== point() && elCount >= carouselColumnsResize + 1) {
              (0, _utility.$)(objectSlider).flickity(settings);
              $current = point();

              if ((0, _utility.$)(objectSlider).flickity(settings)) {
                (0, _utility.$)(objectSlider).flickity('destroy');
                (0, _utility.$)(objectSlider).flickity(settings);
              }
            } else if ($current !== point() && elCount <= carouselColumnsResize && (0, _utility.$)(objectSlider).flickity(settings)) {
              (0, _utility.$)(objectSlider).flickity('destroy');
              $current = point();
            }
          }); // Select the previous slide.

          $prev.on('click', function (event) {
            event.preventDefault();
            var type = rtl ? 'next' : 'previous';
            (0, _utility.$)(objectSlider).flickity(type);
          }); // Select the next slide.

          $next.on('click', function (event) {
            event.preventDefault();
            var type = rtl ? 'previous' : 'next';
            (0, _utility.$)(objectSlider).flickity(type);
          });

          if (!settings.wrapAround) {
            (0, _utility.$)(objectSlider).on('select.flickity', function () {
              // enable/disable previous/next buttons
              if (!flkty.slides[flkty.selectedIndex - 1]) {
                $prev.addClass('disabled');
                $next.removeClass('disabled'); // <-- remove disabled from the next
              } else if (!flkty.slides[flkty.selectedIndex + 1]) {
                $next.addClass('disabled');
                $prev.removeClass('disabled'); //<-- remove disabled from the prev
              } else {
                $prev.removeClass('disabled');
                $next.removeClass('disabled');
              }
            });
          }
        });
      });
    });
    /**
     * Large Carousel Type 1
     */

    (0, _utility.$)('.cnvs-block-posts-layout-large-type-1').each(function (indexBlock, objectBlock) {
      (0, _utility.$)(objectBlock).imagesLoaded(function (instance) {
        var rtl = _utility.$body.hasClass('rtl') ? true : false; // Loop.

        (0, _utility.$)(instance.elements).each(function (index, el) {
          var objectSlider = (0, _utility.$)(el).find('.cs-slider__items');
          var $current; // Point.

          var point = function point() {
            var points = [340, 370, 480, 565, 640, 720, 1020, 1200, 1440, 1660, 1920];
            var current = 0;

            for (var i in points) {
              if (window.innerWidth >= points[i]) {
                current = points[i];
              }
            }

            return current;
          }; // Get data.


          var autoPlay = (0, _utility.$)(objectBlock).find('.cs-flickity-init').data('autoplay'),
              pageDots = (0, _utility.$)(objectBlock).find('.cs-flickity-init').data('pagedots'),
              wrapAround = (0, _utility.$)(objectBlock).find('.cs-flickity-init').data('wraparound');
          var settings = {
            wrapAround: wrapAround ? true : false,
            contain: false,
            autoPlay: autoPlay ? 5000 : false,
            prevNextButtons: false,
            pageDots: pageDots ? true : false,
            rightToLeft: rtl,
            resize: true,
            selectedAttraction: 0.006,
            friction: 0.14
          };
          (0, _utility.$)(objectSlider).flickity(settings);
          var flkty = (0, _utility.$)(objectSlider).data('flickity');
          var $prev = (0, _utility.$)(objectBlock).find('.cs-slider__arrow-previous');
          var $next = (0, _utility.$)(objectBlock).find('.cs-slider__arrow-next');
          var elCount = (0, _utility.$)(objectSlider).find('.cs-slider__cell').length;

          if (elCount >= 2) {
            (0, _utility.$)(objectSlider).flickity(settings);
          } else {
            (0, _utility.$)(objectSlider).flickity('destroy');
          } // Set current point();


          $current = point(); // Resize.

          (0, _utility.$)(window).resize(function () {
            if ($current !== point() && elCount >= 2) {
              (0, _utility.$)(objectSlider).flickity(settings);
              $current = point();

              if ((0, _utility.$)(objectSlider).flickity(settings)) {
                (0, _utility.$)(objectSlider).flickity('destroy');
                (0, _utility.$)(objectSlider).flickity(settings);
              }
            } else if ($current !== point() && elCount <= 2 && (0, _utility.$)(objectSlider).flickity(settings)) {
              (0, _utility.$)(objectSlider).flickity('destroy');
              $current = point();
            }
          }); // Select the previous slide.

          $prev.on('click', function (event) {
            event.preventDefault();
            var type = rtl ? 'next' : 'previous';
            (0, _utility.$)(objectSlider).flickity(type);
          }); // Select the next slide.

          $next.on('click', function (event) {
            event.preventDefault();
            var type = rtl ? 'previous' : 'next';
            (0, _utility.$)(objectSlider).flickity(type);
          });

          if (!settings.wrapAround) {
            (0, _utility.$)(objectSlider).on('select.flickity', function () {
              // enable/disable previous/next buttons
              if (!flkty.slides[flkty.selectedIndex - 1]) {
                $prev.addClass('disabled');
                $next.removeClass('disabled'); // <-- remove disabled from the next
              } else if (!flkty.slides[flkty.selectedIndex + 1]) {
                $next.addClass('disabled');
                $prev.removeClass('disabled'); //<-- remove disabled from the prev
              } else {
                $prev.removeClass('disabled');
                $next.removeClass('disabled');
              }
            });
          }
        });
      });
    });
    /**
     * Large Carousel Type 2
     */

    (0, _utility.$)('.cnvs-block-posts-layout-large-type-2').each(function (indexBlock, objectBlock) {
      (0, _utility.$)(objectBlock).imagesLoaded(function (instance) {
        var rtl = _utility.$body.hasClass('rtl') ? true : false; // Loop.

        (0, _utility.$)(instance.elements).each(function (index, el) {
          var objectSlider = (0, _utility.$)(el).find('.cs-slider__items');
          var $current; // Point.

          var point = function point() {
            var points = [340, 370, 480, 565, 640, 720, 1020, 1200, 1440, 1660, 1920];
            var current = 0;

            for (var i in points) {
              if (window.innerWidth >= points[i]) {
                current = points[i];
              }
            }

            return current;
          }; // Get columns.


          var carouselColumns = parseInt(window.getComputedStyle((0, _utility.$)(objectBlock)[0]).getPropertyValue('--cs-carousel-columns')); // Get data.

          var autoPlay = (0, _utility.$)(objectBlock).find('.cs-flickity-init').data('autoplay'),
              pageDots = (0, _utility.$)(objectBlock).find('.cs-flickity-init').data('pagedots'),
              wrapAround = (0, _utility.$)(objectBlock).find('.cs-flickity-init').data('wraparound'),
              groupCells = (0, _utility.$)(objectBlock).find('.cs-flickity-init').data('groupcells');
          var settings = {
            wrapAround: wrapAround ? true : false,
            groupCells: groupCells ? true : false,
            autoPlay: autoPlay ? 5000 : false,
            prevNextButtons: false,
            pageDots: pageDots ? true : false,
            rightToLeft: rtl,
            resize: true,
            selectedAttraction: 0.006,
            friction: 0.14
          };

          if (settings.groupCells) {
            settings.groupCells = carouselColumns;
            (0, _utility.$)(objectSlider).addClass('cs-groupcells-active');
          }

          (0, _utility.$)(objectSlider).flickity(settings);
          var flkty = (0, _utility.$)(objectSlider).data('flickity');
          var $prev = (0, _utility.$)(objectBlock).find('.cs-slider__arrow-previous');
          var $next = (0, _utility.$)(objectBlock).find('.cs-slider__arrow-next');
          var elCount = (0, _utility.$)(objectSlider).find('.cs-slider__cell').length;

          if (elCount >= carouselColumns + 1) {
            (0, _utility.$)(objectSlider).flickity(settings);
          } else {
            (0, _utility.$)(objectSlider).flickity('destroy');
          } // Set current point();


          $current = point(); // Resize.

          (0, _utility.$)(window).resize(function () {
            var carouselColumnsResize = parseInt(window.getComputedStyle((0, _utility.$)(objectBlock)[0]).getPropertyValue('--cs-carousel-columns'));

            if ($current !== point() && elCount >= carouselColumnsResize + 1) {
              if (settings.groupCells) {
                settings.groupCells = carouselColumnsResize;
              }

              (0, _utility.$)(objectSlider).flickity(settings);
              $current = point();

              if ((0, _utility.$)(objectSlider).flickity(settings)) {
                (0, _utility.$)(objectSlider).flickity('destroy');

                if (settings.groupCells) {
                  settings.groupCells = carouselColumnsResize;
                }

                (0, _utility.$)(objectSlider).flickity(settings);
              }
            } else if ($current !== point() && elCount <= carouselColumnsResize && (0, _utility.$)(objectSlider).flickity(settings)) {
              (0, _utility.$)(objectSlider).flickity('destroy');
              $current = point();
            }
          }); // Select the previous slide.

          $prev.on('click', function (event) {
            event.preventDefault();
            var type = rtl ? 'next' : 'previous';
            (0, _utility.$)(objectSlider).flickity(type);
          }); // Select the next slide.

          $next.on('click', function (event) {
            event.preventDefault();
            var type = rtl ? 'previous' : 'next';
            (0, _utility.$)(objectSlider).flickity(type);
          });

          if (!settings.wrapAround) {
            (0, _utility.$)(objectSlider).on('select.flickity', function () {
              // enable/disable previous/next buttons
              if (!flkty.slides[flkty.selectedIndex - 1]) {
                $prev.addClass('disabled');
                $next.removeClass('disabled'); // <-- remove disabled from the next
              } else if (!flkty.slides[flkty.selectedIndex + 1]) {
                $next.addClass('disabled');
                $prev.removeClass('disabled'); //<-- remove disabled from the prev
              } else {
                $prev.removeClass('disabled');
                $next.removeClass('disabled');
              }
            });
          }
        });
      });
    });
  }

  function initIstagramWidgetCarousel() {
    /**
     * Instagram Widget Slider
     */
    (0, _utility.$)('.pk-instagram-template-slider .pk-slider-instagram-items').imagesLoaded(function (instance) {
      // Set unique id.
      var requestId; // Set rtl status.

      var rtl = (0, _utility.$)('body').hasClass('rtl') ? true : false;
      (0, _utility.$)(instance.elements).each(function (index, el) {
        var mainTicker = new Flickity(el, {
          freeScroll: true,
          accessibility: true,
          resize: true,
          wrapAround: true,
          prevNextButtons: false,
          pageDots: false,
          percentPosition: true,
          setGallerySize: true,
          adaptiveHeight: true,
          rightToLeft: rtl,
          on: {
            ready: function ready() {
              (0, _utility.$)(el).addClass('is-animate');
            }
          }
        });
        mainTicker.initAnimation = false; // Set initial position to be 0

        mainTicker.x = 0; // Main function that 'plays' the marquee.

        function flickity_play() {
          // Set the decrement of position x
          mainTicker.x = mainTicker.x - 0.5; // Settle position into the slider

          mainTicker.settle(mainTicker.x); // Set the requestId to the local letiable

          requestId = window.requestAnimationFrame(flickity_play);
        } // Main function to cancel the animation.


        function flickity_pause() {
          if (requestId) {
            // Cancel the animation.
            window.cancelAnimationFrame(requestId);
            requestId = undefined;
          }
        } // Main function init


        function flickity_init() {
          // The monitor.
          var isInView = (0, _utility.$)(el).isInViewport();

          if (isInView) {
            if (!mainTicker.initAnimation) {
              flickity_play();
              mainTicker.initAnimation = true;
            }
          } else {
            flickity_pause();
            mainTicker.initAnimation = false;
          }
        } // Document scroll.


        (0, _utility.$)(window).on('load scroll resize scrollstop', function () {
          flickity_init();
        }); // Document ready.

        (0, _utility.$)(document).ready(function () {
          flickity_init();
        }); // Pause on hover/focus.

        (0, _utility.$)(el).on('mouseenter focusin', function (e) {
          flickity_pause();
        }); // Unpause on mouse out / defocus.

        (0, _utility.$)(el).on('mouseleave', function (e) {
          flickity_play();
        });
      });
    });
  }

  function initIstagramFooterCarousel() {
    /**
     * Footer Instagram Slider
     */
    (0, _utility.$)('.pk-instagram-carousel ').each(function (indexBlock, objectBlock) {
      (0, _utility.$)(objectBlock).imagesLoaded(function (instance) {
        var rtl = _utility.$body.hasClass('rtl') ? true : false; // Loop.

        (0, _utility.$)(instance.elements).each(function (index, el) {
          var objectSlider = (0, _utility.$)(el).find('.pk-alt-instagram-items'); // Get columns.

          var carouselColumns = parseInt(window.getComputedStyle((0, _utility.$)(objectBlock)[0]).getPropertyValue('--cs-carousel-columns')); // Get data.

          var autoPlay = (0, _utility.$)(objectBlock).find('.cs-flickity-init').data('autoplay'),
              wrapAround = (0, _utility.$)(objectBlock).find('.cs-flickity-init').data('wraparound');
          var settings = {
            cellAlign: rtl ? 'right' : 'left',
            wrapAround: wrapAround ? true : false,
            autoPlay: autoPlay ? 5000 : false,
            prevNextButtons: false,
            pageDots: false,
            rightToLeft: rtl,
            resize: true
          };
          (0, _utility.$)(objectSlider).flickity(settings);
          var flkty = (0, _utility.$)(objectSlider).data('flickity');
          var $prev = (0, _utility.$)(objectBlock).find('.carousel-previous');
          var $next = (0, _utility.$)(objectBlock).find('.carousel-next');
          var elCount = (0, _utility.$)(objectSlider).find('.pk-alt-instagram-item').length;

          if (elCount >= carouselColumns + 1) {
            (0, _utility.$)(objectSlider).flickity(settings);
          } else {
            (0, _utility.$)(objectSlider).flickity('destroy');
          } // Select the previous slide.


          $prev.on('click', function (event) {
            event.preventDefault();
            var type = rtl ? 'next' : 'previous';
            (0, _utility.$)(objectSlider).flickity(type);
          }); // Select the next slide.

          $next.on('click', function (event) {
            event.preventDefault();
            var type = rtl ? 'previous' : 'next';
            (0, _utility.$)(objectSlider).flickity(type);
          });

          if (!settings.wrapAround) {
            (0, _utility.$)(objectSlider).on('select.flickity', function () {
              // enable/disable previous/next buttons
              if (!flkty.slides[flkty.selectedIndex - 1]) {
                $prev.addClass('disabled');
                $next.removeClass('disabled'); // <-- remove disabled from the next
              } else if (!flkty.slides[flkty.selectedIndex + 1]) {
                $next.addClass('disabled');
                $prev.removeClass('disabled'); //<-- remove disabled from the prev
              } else {
                $prev.removeClass('disabled');
                $next.removeClass('disabled');
              }
            });
          }
        });
      });
    });
  }

  initCarousel();
  initIstagramWidgetCarousel();
  initIstagramFooterCarousel();
  (0, _utility.$)(document).ready(function () {
    (0, _utility.$)(document.body).on('post-load', function () {
      initCarousel();
    });

    _utility.csco.addAction('canvas.components.serverSideRender.onChange', 'init-carousel', function (props) {
      if ('canvas/posts' === props.block) {
        initCarousel();
      }
    });
  });
})();

/***/ }),
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _utility = __webpack_require__(0);

/** ----------------------------------------------------------------------------
 * Comments Dropdown */
(function () {
  (0, _utility.$)(document).on('click', '.cs-entry__comments-show button', function (e) {
    (0, _utility.$)('.cs-entry__comments-collapse').show();
    (0, _utility.$)('.cs-entry__comments-show').remove();
  });
})();

/***/ }),
/* 4 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _utility = __webpack_require__(0);

/** ----------------------------------------------------------------------------
 * Detect Aligment */
(function () {
  var ticking = false;

  var update = function update() {
    // Sidebar.
    // -----------------------------------.
    (0, _utility.$)('.cs-site-primary').each(function () {
      var content = (0, _utility.$)(this).find('.entry-content');
      var sidebar = (0, _utility.$)(this).find('.cs-entry__metabar-inner'); // Vars offset.

      var offsetTop = 20;
      var offsetBottom = -20; // Search elements.

      var elements = [];
      elements.push('> .alignfull');
      elements.push('> .alignwide');
      var layouts = (0, _utility.$)(content).find(elements.join(','));

      if (0 === sidebar.length) {
        return;
      }

      if (0 === layouts.length) {
        return;
      }

      var disabled = false; // Get sidebar values.

      var sidebarTop = (0, _utility.$)(sidebar).offset().top;
      var sidebarHeight = (0, _utility.$)(sidebar).outerHeight(true);

      for (var i = 0; i < (0, _utility.$)(layouts).length; ++i) {
        if ('none' === (0, _utility.$)(layouts[i]).css('transform')) {
          continue;
        } // Get layout values.


        var layoutTop = (0, _utility.$)(layouts[i]).offset().top;
        var layoutHeight = (0, _utility.$)(layouts[i]).outerHeight(true); // Calc points.

        var pointTop = layoutTop - offsetTop;
        var pointBottom = layoutTop + layoutHeight + offsetBottom; // Detect sidebar location.

        if (sidebarTop + sidebarHeight >= pointTop && sidebarTop <= pointBottom) {
          disabled = true;
        }
      }

      if (disabled) {
        (0, _utility.$)(sidebar).css('opacity', '0');
      } else {
        (0, _utility.$)(sidebar).css('opacity', '1');
      }
    }); // Ticking.

    ticking = false;
  };

  var requestTick = function requestTick() {
    if (!ticking) {
      window.requestAnimationFrame(update);
      ticking = true;
    }
  };

  var onProcess = function onProcess() {
    requestTick();
  };

  (0, _utility.$)(window).on('scroll', onProcess);
  (0, _utility.$)(window).on('resize', onProcess);
  (0, _utility.$)(window).on('image-load', onProcess);
  (0, _utility.$)(window).on('post-load', onProcess);
})();

/***/ }),
/* 5 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _utility = __webpack_require__(0);

/** ----------------------------------------------------------------------------
 * Comments Dropdown */
(function () {
  (0, _utility.$)(".cs-header__nav-inner > .menu-item").hover(function () {
    (0, _utility.$)(this).addClass('active').siblings('.menu-item').addClass('disable');
  }, function () {
    (0, _utility.$)(this).removeClass('active').siblings('.menu-item').removeClass('disable');
  });
})();

/***/ }),
/* 6 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _utility = __webpack_require__(0);

/** ----------------------------------------------------------------------------
 * Comments Dropdown */
(function () {
  (0, _utility.$)('.cs-layout-large__col').hover(function () {
    (0, _utility.$)(this).addClass('active').siblings().removeClass('active').closest('.cs-layout-large__wrap').find('.cs-overlay-background').removeClass('active').eq((0, _utility.$)(this).index()).addClass('active');
  }, function () {
    (0, _utility.$)(this).closest('.cs-layout-large__wrap').find('.cs-overlay-background').removeClass('active').eq((0, _utility.$)(this).index()).addClass('active');
  });
})();

/***/ }),
/* 7 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _utility = __webpack_require__(0);

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

if ('undefined' === typeof window.load_more_query) {
  window.load_more_query = [];
}
/**
 * Get next posts
 */


function csco_ajax_get_posts(object) {
  var container = (0, _utility.$)(object).closest('.cs-posts-area');
  var settings = (0, _utility.$)(object).data('settings');
  var page = (0, _utility.$)(object).data('page');
  (0, _utility.$)(object).data('loading', true); // Set button text to Load More.

  (0, _utility.$)(object).text(settings.translation.loading);
  var data = {
    action: 'csco_ajax_load_more',
    page: page,
    posts_per_page: settings.posts_per_page,
    query_data: settings.query_data,
    attributes: settings.attributes,
    options: settings.options,
    _ajax_nonce: settings.nonce
  }; // Request Url.

  var csco_pagination_url;

  if ('ajax_restapi' === settings.type) {
    csco_pagination_url = settings.rest_url;
  } else {
    csco_pagination_url = settings.url;
  } // Send Request.


  _utility.$.post(csco_pagination_url, data, function (res) {
    if (res.success) {
      // Get the posts.
      var data = (0, _utility.$)(res.data.content);

      if (data.length) {
        var cscoAppendEnd = function cscoAppendEnd() {
          // WP Post Load trigger.
          (0, _utility.$)(document.body).trigger('post-load'); // Reinit Facebook widgets.

          if ((0, _utility.$)('#fb-root').length && 'object' === (typeof FB === "undefined" ? "undefined" : _typeof(FB))) {
            FB.XFBML.parse();
          } // Set button text to Load More.


          (0, _utility.$)(object).text(settings.translation.load_more); // Increment a page.

          page = page + 1;
          (0, _utility.$)(object).data('page', page); // Set the loading state.

          (0, _utility.$)(object).data('loading', false);
        }; // Check archive type.


        if ((0, _utility.$)(container).find('.cs-posts-area__outer').hasClass('cs-posts-area__type-mixed')) {
          for (var key in data) {
            if (key % 1 !== 0) {
              continue;
            }

            var last_section = (0, _utility.$)(container).find('.cs-posts-area__outer .cs-posts-area__main ').last();
            var last_posts = (0, _utility.$)(last_section).find('article').length;
            var last_class = (0, _utility.$)(last_section).attr('class');
            var new_section = false;
            var point_end = window.getComputedStyle((0, _utility.$)(last_section)[0]).getPropertyValue('--cs-posts-area-grid-columns-const') * 2;

            if ((0, _utility.$)(last_section).hasClass('cs-posts-area__alt')) {
              new_section = 'cs-posts-area__grid';
            }

            if ((0, _utility.$)(last_section).hasClass('cs-posts-area__grid') && last_posts === point_end) {
              new_section = 'cs-posts-area__alt';
            } // Append new section.


            if (new_section) {
              (0, _utility.$)('<div></div>').appendTo((0, _utility.$)(container).find('.cs-posts-area__outer')).addClass(last_class).removeClass('cs-posts-area__alt cs-posts-area__grid').addClass(new_section);
            } // Append new posts to layout.


            (0, _utility.$)(container).find('.cs-posts-area__outer .cs-posts-area__main').last().append(data[key]);
          }

          cscoAppendEnd();
        } else {
          (0, _utility.$)(container).find('.cs-posts-area__main').append(data);
          cscoAppendEnd();
        }
      } // Remove Button on Posts End.


      if (res.data.posts_end || !data.length) {
        // Remove Load More button.
        (0, _utility.$)(object).remove();
      }
    } else {// console.log(res);
    }
  }).fail(function (xhr, textStatus, e) {// console.log(xhr.responseText);
  });
}
/**
 * Initialization Load More
 */


function csco_load_more_init(infinite) {
  (0, _utility.$)('.cs-posts-area').each(function () {
    if ((0, _utility.$)(this).data('init')) {
      return false;
    }

    var csco_ajax_settings;

    if (typeof csco_ajax_pagination !== 'undefined') {
      csco_ajax_settings = csco_ajax_pagination;
    }

    var archive_data = (0, _utility.$)(this).data('posts-area');

    if (archive_data) {
      csco_ajax_settings = JSON.parse(window.atob(archive_data));
    }

    if (csco_ajax_settings) {
      if (!infinite && csco_ajax_settings.infinite_load) {
        return false;
      } // Add load more button.


      (0, _utility.$)(this).append('<div class="cs-posts-area__pagination"><button class="cs-load-more">' + csco_ajax_settings.translation.load_more + '</button></div>'); // Set load more settings.

      (0, _utility.$)(this).find('.cs-load-more').data('settings', csco_ajax_settings);
      (0, _utility.$)(this).find('.cs-load-more').data('page', 2);
      (0, _utility.$)(this).find('.cs-load-more').data('loading', false);
      (0, _utility.$)(this).find('.cs-load-more').data('scrollHandling', {
        allow: _utility.$.parseJSON(csco_ajax_settings.infinite_load),
        delay: 400
      });
    }

    (0, _utility.$)(this).data('init', true);
  });
}

csco_load_more_init(true);

_utility.csco.addAction('canvas.components.serverSideRender.onChange', 'posts-init-loadmore', function (props) {
  if ('canvas/posts' === props.block) {
    csco_load_more_init(false);
  }
}); // On Scroll Event.


(0, _utility.$)(window).scroll(function () {
  (0, _utility.$)('.cs-posts-area .cs-load-more').each(function () {
    var loading = (0, _utility.$)(this).data('loading');
    var scrollHandling = (0, _utility.$)(this).data('scrollHandling');

    if ('undefined' === typeof scrollHandling) {
      return;
    }

    if ((0, _utility.$)(this).length && !loading && scrollHandling.allow) {
      scrollHandling.allow = false;
      (0, _utility.$)(this).data('scrollHandling', scrollHandling);
      var object = this;
      setTimeout(function () {
        var scrollHandling = (0, _utility.$)(object).data('scrollHandling');

        if ('undefined' === typeof scrollHandling) {
          return;
        }

        scrollHandling.allow = true;
        (0, _utility.$)(object).data('scrollHandling', scrollHandling);
      }, scrollHandling.delay);
      var offset = (0, _utility.$)(this).offset().top - (0, _utility.$)(window).scrollTop();

      if (4000 > offset) {
        csco_ajax_get_posts(this);
      }
    }
  });
}); // On Click Event.

(0, _utility.$)('body').on('click', '.cs-load-more', function () {
  var loading = (0, _utility.$)(this).data('loading');

  if (!loading) {
    csco_ajax_get_posts(this);
  }
});

/***/ }),
/* 8 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _utility = __webpack_require__(0);

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/**
 * Check if Load Nextpost is defined by the wp_localize_script
 */
if (typeof csco_ajax_nextpost !== 'undefined') {
  var objNextparent = (0, _utility.$)('.cs-site-primary > .cs-site-content'),
      objNextsect = '.cs-nextpost-section',
      objNextpost = null,
      currentNTitle = document.title,
      currentNLink = window.location.href,
      loadingNextpost = false,
      scrollNextpost = {
    allow: true,
    reallow: function reallow() {
      scrollNextpost.allow = true;
    },
    delay: 400 //(milliseconds) adjust to the highest acceptable value

  }; // Init.

  if (csco_ajax_nextpost.next_post) {
    (0, _utility.$)(objNextparent).after('<div class="cs-nextpost-inner"></div>');
    objNextpost = (0, _utility.$)('.cs-nextpost-inner');
  }
}
/**
 * Get next post
 */


function csco_ajax_get_nextpost() {
  loadingNextpost = true; // Set class loading.

  var data = {
    action: 'csco_ajax_load_nextpost',
    not_in: csco_ajax_nextpost.not_in,
    current_user: csco_ajax_nextpost.current_user,
    nonce: csco_ajax_nextpost.nonce,
    next_post: csco_ajax_nextpost.next_post
  }; // Request Url.

  var csco_ajax_nextpost_url;

  if ('ajax_restapi' === csco_ajax_nextpost.type) {
    csco_ajax_nextpost_url = csco_ajax_nextpost.rest_url;
  } else {
    csco_ajax_nextpost_url = csco_ajax_nextpost.url;
  } // Send Request.


  _utility.$.post(csco_ajax_nextpost_url, data, function (res) {
    csco_ajax_nextpost.next_post = false;

    if (res.success) {
      // Get the posts.
      var data = (0, _utility.$)(res.data.content); // Check if there're any posts.

      if (data.length) {
        // Set the loading state.
        loadingNextpost = false; // Set not_in.

        csco_ajax_nextpost.not_in = res.data.not_in; // Set next data.

        csco_ajax_nextpost.next_post = res.data.next_post; // Remove loader.

        (0, _utility.$)(objNextpost).siblings('.cs-nextpost-loading').remove(); // Append new post.

        (0, _utility.$)(objNextpost).append(data); // Reinit facebook.

        if ((0, _utility.$)('#fb-root').length && 'object' === (typeof FB === "undefined" ? "undefined" : _typeof(FB))) {
          FB.XFBML.parse();
        }

        (0, _utility.$)(document.body).trigger('post-load');
      }
    } else {// console.log(res);
    }
  }).fail(function (xhr, textStatus, e) {// console.log(xhr.responseText);
  });
}
/**
 * Check if Load Nextpost is defined by the wp_localize_script
 */


if (typeof csco_ajax_nextpost !== 'undefined') {
  // On Scroll Event.
  (0, _utility.$)(window).scroll(function () {
    var scrollTop = (0, _utility.$)(window).scrollTop(); // Init nextpost.

    if (csco_ajax_nextpost.next_post) {
      if (objNextpost.length && !loadingNextpost && scrollNextpost.allow) {
        scrollNextpost.allow = false;
        setTimeout(scrollNextpost.reallow, scrollNextpost.delay); // Calc current offset.

        var offset = objNextpost.offset().top + objNextpost.innerHeight() - scrollTop; // Load nextpost.

        if (4000 > offset) {
          (0, _utility.$)(objNextpost).after('<div class="cs-nextpost-loading"></div>');
          csco_ajax_get_nextpost();
        }
      }
    } // Reset browser data link.


    var objFirst = (0, _utility.$)(objNextsect).first();

    if (objFirst.length) {
      var firstTop = (0, _utility.$)(objFirst).offset().top; // If there has been a change.

      if (scrollTop < firstTop && window.location.href !== currentNLink) {
        document.title = currentNTitle;
        window.history.pushState(null, currentNTitle, currentNLink);
      }
    } // Set browser data link.


    (0, _utility.$)(objNextsect).each(function (index, elem) {
      var elemTop = (0, _utility.$)(elem).offset().top;
      var elemHeight = (0, _utility.$)(elem).innerHeight();

      if (scrollTop > elemTop && scrollTop < elemTop + elemHeight) {
        // If there has been a change.
        if (window.location.href !== (0, _utility.$)(elem).data('url')) {
          // New title.
          document.title = (0, _utility.$)(elem).data('title'); // New link.

          window.history.pushState(null, (0, _utility.$)(elem).data('title'), (0, _utility.$)(elem).data('url')); // Google Analytics.

          if (typeof gtag === 'function' && _typeof(window.gaData) === 'object') {
            var trackingId = Object.keys(window.gaData)[0];

            if (trackingId) {
              gtag('config', trackingId, {
                'page_title': (0, _utility.$)(elem).data('title'),
                'page_location': (0, _utility.$)(elem).data('url')
              });
              gtag('event', 'page_view', {
                'send_to': trackingId
              });
            }
          }
        }
      }
    });
  });
}

/***/ }),
/* 9 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _utility = __webpack_require__(0);

/** ----------------------------------------------------------------------------
 * Mega Menu */
(function () {
  /*
  * Load Mega Menu Posts
  */
  function cscoLoadMenuPosts(menuItem) {
    var dataTerm = menuItem.children('a').data('term'),
        dataPosts = menuItem.children('a').data('posts'),
        dataNumberposts = menuItem.children('a').data('numberposts'),
        menuContainer,
        postsContainer; // Containers.

    if (menuItem.hasClass('cs-mega-menu-term')) {
      menuContainer = menuItem;
      postsContainer = menuContainer.find('.cs-mm__posts');
    }

    if (menuItem.hasClass('cs-mega-menu-posts')) {
      menuContainer = menuItem;
      postsContainer = menuContainer.find('.cs-mm__posts');
    }

    if (menuItem.hasClass('cs-mega-menu-child-term')) {
      menuContainer = menuItem.closest('.sub-menu');
      postsContainer = menuContainer.find('.cs-mm__posts[data-term="' + dataTerm + '"]');
    } // Check Menu Container.


    if (!menuContainer || typeof menuContainer === 'undefined') {
      return false;
    } // Check Container.


    if (!postsContainer || typeof postsContainer === 'undefined') {
      return false;
    } // Set Active.


    menuContainer.find('.menu-item, .cs-mm__posts').removeClass('cs-active-item');
    menuItem.addClass('cs-active-item');

    if (postsContainer) {
      postsContainer.addClass('cs-active-item');
    } // Check Loading.


    if (menuItem.hasClass('cs-mm-loading') || menuItem.hasClass('loaded')) {
      return false;
    } // Create Data.


    var data = {
      'term': dataTerm,
      'posts': dataPosts,
      'per_page': dataNumberposts
    };

    if ('undefined' === typeof csco_mega_menu) {
      return;
    } // Get Results.


    _utility.$.ajax({
      url: csco_mega_menu.rest_url,
      type: 'GET',
      data: data,
      global: false,
      async: true,
      beforeSend: function beforeSend() {
        menuItem.addClass('cs-mm-loading');
        postsContainer.addClass('cs-mm-loading');
      },
      success: function success(res) {
        if (res.status && 'success' === res.status) {
          // Set the loaded state.
          menuItem.addClass('loaded');
          postsContainer.addClass('loaded'); // Check if there're any posts.

          if (res.content && res.content.length) {
            (0, _utility.$)(res.content).imagesLoaded(function () {
              // Append Data.
              postsContainer.html(res.content);
            });
          }
        }
      },
      complete: function complete() {
        // Set the loading state.
        menuItem.removeClass('cs-mm-loading');
        postsContainer.removeClass('cs-mm-loading');
      }
    });
  }
  /*
  * Get First Tab
  */


  function cscoGetFirstTab(container) {
    var firstTab = false;
    container.find('.cs-mega-menu-child').each(function (index, el) {
      if ((0, _utility.$)(el).hasClass('cs-mega-menu-child')) {
        firstTab = (0, _utility.$)(el);
        return false;
      }
    });
    return firstTab;
  }
  /*
  * Menu on document ready
  */


  (0, _utility.$)(document).ready(function () {
    /*
    * Get Menu Posts on Hover
    */
    (0, _utility.$)('.cs-header__nav .menu-item.cs-mega-menu-posts').on('mouseenter', function () {
      cscoLoadMenuPosts((0, _utility.$)(this));
    });
    (0, _utility.$)('.cs-header__nav .menu-item.cs-mega-menu-term').on('mouseenter', function () {
      cscoLoadMenuPosts((0, _utility.$)(this));
    });
    (0, _utility.$)('.cs-header__nav .menu-item.cs-mega-menu-child').on('mouseenter', function () {
      cscoLoadMenuPosts((0, _utility.$)(this));
    });
    /*
    * Load First Tab on Mega Menu Hover
    */

    (0, _utility.$)('.cs-header__nav .menu-item.cs-mega-menu-terms').on('mouseenter', function () {
      var tab = cscoGetFirstTab((0, _utility.$)(this));

      if (tab) {
        cscoLoadMenuPosts(tab);
      }
    });
  });
  /*
  * Load First Tab on Navbar Ready.
  */

  (0, _utility.$)(document, '.cs-header__nav').ready(function () {
    var tab = false; // Autoload First Tab.

    (0, _utility.$)('.cs-header__nav .menu-item.cs-mega-menu-terms').each(function (index, el) {
      tab = cscoGetFirstTab((0, _utility.$)(this));

      if (tab) {
        cscoLoadMenuPosts(tab);
      }
    }); // Autoload Posts.

    (0, _utility.$)('.cs-header__nav .menu-item.cs-mega-menu-posts').each(function (index, el) {
      cscoLoadMenuPosts((0, _utility.$)(this));
    }); // Autoload Term.

    (0, _utility.$)('.cs-header__nav .menu-item.cs-mega-menu-term').each(function (index, el) {
      cscoLoadMenuPosts((0, _utility.$)(this));
    });
  });
})();

/***/ }),
/* 10 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _utility = __webpack_require__(0);

/** ----------------------------------------------------------------------------
 * Navigation */
var cscoNavigation = {};

(function () {
  var $this;
  cscoNavigation = {
    /** Initialize */
    init: function init(e) {
      if ((0, _utility.$)('body').hasClass('wp-admin')) {
        return;
      }

      $this = cscoNavigation; // Init events.

      $this.events(e);
    },

    /** Events */
    events: function events(e) {
      // DOM Load
      window.addEventListener('load', function (e) {
        $this.smartLevels(e);
        $this.adaptTablet(e);
        $this.stickyScroll(e);
      }); // Resize

      window.addEventListener('resize', function (e) {
        $this.smartLevels(e);
        $this.adaptTablet(e);
        $this.stickyScroll(e);
      });
    },

    /** Smart multi-Level menu */
    smartLevels: function smartLevels(e) {
      var windowWidth = _utility.$window.width(); // Reset Calc.


      (0, _utility.$)('.cs-header__nav-inner li').removeClass('cs-sm__level');
      (0, _utility.$)('.cs-header__nav-inner li').removeClass('cs-sm-position-left cs-sm-position-right');
      (0, _utility.$)('.cs-header__nav-inner li .sub-menu').removeClass('cs-mm__position-init'); // Set Settings.

      (0, _utility.$)('.cs-header__nav-inner > li.menu-item').not('.cs-mm').each(function (index, parent) {
        var position = 'cs-sm-position-right'; //right

        var objPrevWidth = 0;
        (0, _utility.$)(parent).find('.sub-menu').each(function (index, el) {
          // Reset child levels.
          (0, _utility.$)(el).parent().next('li').addClass('cs-sm__level');

          if ((0, _utility.$)(el).parent().hasClass('cs-sm__level')) {
            (0, _utility.$)(el).parent().removeClass('cs-mm-level');
            position = 'cs-sm-position-right'; //right

            objPrevWidth = 0;
          } // Find out position items.


          var offset = (0, _utility.$)(el).offset();
          var objOffset = offset.left;

          if ('cs-sm-position-right' === position && (0, _utility.$)(el).outerWidth() + objOffset > windowWidth) {
            position = 'cs-sm-position-left';
          }

          if ('cs-sm-position-left' === position && objOffset - ((0, _utility.$)(el).outerWidth() + objPrevWidth) < 0) {
            position = 'cs-sm-position-right'; //right
          }

          objPrevWidth = (0, _utility.$)(el).outerWidth();
          (0, _utility.$)(el).addClass('cs-sm-position-init').parent().addClass(position);
        });
      });
    },

    /** Adapting nav bar for tablet */
    adaptTablet: function adaptTablet(e) {
      // Click outside.
      (0, _utility.$)(document).on('touchstart', function (e) {
        if (!(0, _utility.$)(e.target).closest('.cs-header__nav-inner').length) {
          (0, _utility.$)('.cs-header__nav-inner .menu-item-has-children').removeClass('submenu-visible');
        } else {
          (0, _utility.$)(e.target).parents('.menu-item').siblings().find('.menu-item').removeClass('submenu-visible');
          (0, _utility.$)(e.target).parents('.menu-item').siblings().closest('.menu-item').removeClass('submenu-visible');
        }
      });
      (0, _utility.$)('.cs-header__nav-inner .menu-item-has-children').each(function (e) {
        // Reset class.
        (0, _utility.$)(this).removeClass('submenu-visible'); // Remove expanded.

        (0, _utility.$)(this).find('> a > .expanded').remove(); // Add a caret.

        if ('ontouchstart' in document.documentElement) {
          (0, _utility.$)(this).find('> a').append('<span class="expanded"></span>');
        } // Check touch device.


        (0, _utility.$)(this).addClass('ontouchstart' in document.documentElement ? 'touch-device' : '');
        (0, _utility.$)('> a .expanded', this).on('touchstart', function (e) {
          e.preventDefault();
          (0, _utility.$)(this).closest('.menu-item-has-children').toggleClass('submenu-visible');
        });

        if ('#' === (0, _utility.$)('> a', this).attr('href')) {
          (0, _utility.$)('> a', this).on('touchstart', function (e) {
            e.preventDefault();

            if (!(0, _utility.$)(e.target).hasClass('expanded')) {
              (0, _utility.$)(this).closest('.menu-item-has-children').toggleClass('submenu-visible');
            }
          });
        }
      });
    },

    /** Make nav bar sticky */
    stickyScroll: function stickyScroll(e) {
      // Get css variables
      var headerLargeHeight = parseInt(getComputedStyle(document.documentElement).getPropertyValue('--cs-header-initial-height')),
          headerCompactHeight = parseInt(getComputedStyle(document.documentElement).getPropertyValue('--cs-header-height')); //Get header elements

      var headerStick = (0, _utility.$)('.cs-navbar-sticky-enabled .cs-header'),
          headerBefore = (0, _utility.$)('.cs-header-before'),
          headerStretch = (0, _utility.$)('.cs-header-stretch'),
          headerStretchInaccuracy = headerStretch.length > 0 ? 10 : 0,
          headerStickHeight = (0, _utility.$)('.cs-navbar-sticky-enabled .cs-header-stretch'),
          wpAdminBar = (0, _utility.$)('#wpadminbar'),
          headerSearch = (0, _utility.$)('.cs-search'),
          offCanvas = (0, _utility.$)('.cs-offcanvas'); //Comb out the heights

      var headerDelta = headerStickHeight.length > 0 ? headerLargeHeight - headerCompactHeight : 0,
          wpAdminBarHeight = wpAdminBar.length > 0 ? wpAdminBar.outerHeight() : 0,
          smartStart = headerBefore.length > 0 ? headerBefore.offset().top : headerStick.length > 0 ? headerStick.offset().top + wpAdminBarHeight : wpAdminBarHeight; //Set values to hide

      var scrollPoint = 200,
          scrollPrev = 200,
          scrollUpAmount = 0,
          windowWidth = _utility.$window.width();

      (0, _utility.$)(window).scroll(function () {
        var scrolled = (0, _utility.$)(window).scrollTop(),
            headerStickPosition = headerStick.length > 0 ? headerStick.offset().top : 0;

        if (scrolled > smartStart + headerDelta + scrollPoint + headerStretchInaccuracy && scrolled > scrollPrev) {
          headerStick.addClass('cs-scroll-active');
          headerSearch.slideUp();
          (0, _utility.$)(document).trigger('sticky-nav-hide');
        } else {
          if (scrollUpAmount >= scrollPoint || scrolled === 0) {
            headerStick.removeClass('cs-scroll-active');
            (0, _utility.$)(document).trigger('sticky-nav-visible');
          }
        }

        if (headerStickHeight.length > 0) {
          if (headerStickPosition <= scrolled + wpAdminBarHeight && scrolled > smartStart + headerDelta) {
            headerStick.addClass('cs-scroll-sticky');
            (0, _utility.$)(document).trigger('stretch-nav-to-small');
          } else {
            if (scrolled <= smartStart) {
              headerStick.removeClass('cs-scroll-sticky');
              (0, _utility.$)(document).trigger('stretch-nav-to-big');
            }
          }
        } else {
          if (headerStickPosition <= scrolled + wpAdminBarHeight && scrolled + wpAdminBarHeight > smartStart) {
            headerStick.addClass('cs-scroll-sticky');

            if (headerStretch.length > 0) {
              (0, _utility.$)(document).trigger('stretch-nav-to-small');
            }
          } else {
            headerStick.removeClass('cs-scroll-sticky');

            if (headerStretch.length > 0) {
              (0, _utility.$)(document).trigger('stretch-nav-to-big');
            }
          }
        }

        if (scrolled < scrollPrev) {
          scrollUpAmount += scrollPrev - scrolled;
        } else {
          scrollUpAmount = 0;
        }

        if (wpAdminBar.length > 0 && _utility.wndW <= 600 && scrolled >= wpAdminBarHeight) {
          offCanvas.addClass('cs-offcanvas_scrolled');
        } else {
          offCanvas.removeClass('cs-offcanvas_scrolled');
        }

        scrollPrev = scrolled;
      });
    }
  };
})(); // Initialize.


cscoNavigation.init();

/***/ }),
/* 11 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _utility = __webpack_require__(0);

/** ----------------------------------------------------------------------------
 * Offcanvas */
(function () {
  (0, _utility.$)('.cs-header__offcanvas-toggle, .cs-site-overlay, .cs-offcanvas__toggle').on('click', function (e) {
    e.preventDefault(); // Transition.

    if (!_utility.$body.hasClass('cs-offcanvas-active')) {
      _utility.$body.addClass('cs-offcanvas-transition');
    } else {
      setTimeout(function () {
        _utility.$body.removeClass('cs-offcanvas-transition');
      }, 400);
    } // Toogle offcanvas.


    _utility.$body.toggleClass('cs-offcanvas-active');
  });
})();

/***/ }),
/* 12 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _utility = __webpack_require__(0);

/** ----------------------------------------------------------------------------
 * Responsive Embeds */
(function () {
  /**
   * Add max-width & max-height to <iframe> elements, depending on their width & height props.
   */
  function initResponsiveEmbeds() {
    var proportion, parentWidth; // Loop iframe elements.

    (0, _utility.$)('.entry-content').find('iframe').each(function (index, iframe) {
      // Don't handle if the parent automatically resizes itself.
      if ((0, _utility.$)(iframe).closest('div').is('[data-video-start], [data-video-end]')) {
        return;
      } // Only continue if the iframe has a width & height defined.


      if (iframe.width && iframe.height) {
        // Calculate the proportion/ratio based on the width & height.
        proportion = parseFloat(iframe.width) / parseFloat(iframe.height); // Get the parent element's width.

        parentWidth = parseFloat(window.getComputedStyle(iframe.parentElement, null).width.replace('px', '')); // Set the max-width & height.

        iframe.style.maxWidth = '100%';
        iframe.style.maxHeight = Math.round(parentWidth / proportion).toString() + 'px';
      }
    });
  } // Document ready.


  _utility.$doc.ready(function () {
    initResponsiveEmbeds();
  }); // Post load.


  _utility.$body.on('post-load', function () {
    initResponsiveEmbeds();
  }); // Document resize.


  _utility.$window.on('resize', function () {
    initResponsiveEmbeds();
  }); // Run on initial load.


  initResponsiveEmbeds();
})();

/***/ }),
/* 13 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _utility = __webpack_require__(0);

/** ----------------------------------------------------------------------------
 * Color Scheme Toogle */
var cscoDarkMode = {};

(function () {
  var $this;
  cscoDarkMode = {
    /** Initialize */
    init: function init(e) {
      $this = cscoDarkMode; // Init events.

      $this.events(e);
    },

    /** Events */
    events: function events(e) {
      if ((0, _utility.$)('body').hasClass('wp-admin')) {
        return;
      } // DOM Load


      window.addEventListener('load', function (e) {
        $this.initMode(e);
      });
      window.matchMedia('(prefers-color-scheme: dark)').addListener(function (e) {
        $this.initMode(e);
      }); // Switch

      (0, _utility.$)(document).on('click', '.cs-site-scheme-toggle', function (e) {
        $this.changeMode(e);
      });
    },

    /** Detect Color Scheme */
    detectColorScheme: function detectColorScheme(color) {
      var level = 190; // Set alpha channel.

      var alpha = 1;
      var rgba = [255, 255, 255];
      var color_rgba = false; // Trim color.

      color = color.trim(); // If HEX format.

      if ('#' === color[0]) {
        // Remove '#' from start.
        color = color.replace('#', '').trim();

        if (3 === color.length) {
          color = color[0] + color[0] + color[1] + color[1] + color[2] + color[2];
        }

        rgba[0] = parseInt(color.substr(0, 2), 16);
        rgba[1] = parseInt(color.substr(2, 2), 16);
        rgba[2] = parseInt(color.substr(4, 2), 16);
      } else if (color_rgba = color.replace(/\s/g, '').match(/^rgba?\((\d+),(\d+),(\d+),?([^,\s)]+)?/i)) {
        // Convert RGB or RGBA.
        rgba[0] = parseInt(color_rgba[1]);
        rgba[1] = parseInt(color_rgba[2]);
        rgba[2] = parseInt(color_rgba[3]);

        if (color_rgba[4] !== undefined) {
          alpha = parseFloat(color_rgba[4]);
        }
      } // Apply alpha channel.


      rgba.forEach(function myFunction(channel, key, stack) {
        stack[key] = String(channel + Math.ceil((255 - channel) * (1 - alpha))).padStart(2, '0');
      }); // Set default scheme.

      var scheme = 'default'; // Get brightness.

      var brightness = (rgba[0] * 299 + rgba[1] * 587 + rgba[2] * 114) / 1000; // If color gray.

      if (rgba[0] === rgba[1] && rgba[1] === rgba[2]) {
        if (brightness < level) {
          scheme = 'dark';
        }
      } else {
        if (brightness < level) {
          scheme = 'inverse';
        }
      }

      return scheme;
    },

    /** Set Individual Scheme */
    setIndividualScheme: function setIndividualScheme() {
      var list = {
        'body': '--cs-color-site-background',
        '.cs-topbar': '--cs-color-topbar-background',
        '.cs-header': '--cs-color-header-background',
        '.cs-header__nav-inner .sub-menu': '--cs-color-submenu-background',
        '.cs-header__multi-column-container': '--cs-color-submenu-background',
        '.cs-header__widgets': '--cs-color-submenu-background',
        '.cs-offcanvas__header': '--cs-color-header-background',
        '.cs-search': '--cs-color-search-background',
        '.cs-footer': '--cs-color-footer-background'
      };

      for (var key in list) {
        if ((0, _utility.$)(key).length <= 0) {
          continue;
        }
        /* jshint ignore:start */


        (0, _utility.$)(key).each(function (index, element) {
          var color = window.getComputedStyle((0, _utility.$)(element)[0]).getPropertyValue(list[key]);
          var scheme = $this.detectColorScheme(color);
          (0, _utility.$)(element).attr('data-scheme', scheme);
        });
        /* jshint ignore:end */
      }
    },

    /** Init Mode */
    initMode: function initMode(e) {
      // Get system scheme.
      var systemSchema = 'default';

      if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        systemSchema = 'dark';
      }

      (0, _utility.csSetCookie)('_color_system_schema', systemSchema, {
        expires: 2592000
      }); // Set site scheme.

      var siteScheme = 'default';

      switch (csLocalize.siteSchemeMode) {
        case 'dark':
          siteScheme = 'dark';
          break;

        case 'light':
          siteScheme = 'default';
          break;

        case 'system':
          siteScheme = systemSchema;
          break;
      }

      if (csLocalize.siteSchemeToogle) {
        if ('default' === (0, _utility.csGetCookie)('_color_schema')) {
          siteScheme = 'default';
        }

        if ('dark' === (0, _utility.csGetCookie)('_color_schema')) {
          siteScheme = 'dark';
        }
      } // Change site scheme


      if (siteScheme !== _utility.$body.attr('data-site-scheme')) {
        $this.changeScheme(siteScheme, false);
      }
    },

    /** Change Mode */
    changeMode: function changeMode(e) {
      if ('dark' === _utility.$body.attr('data-site-scheme')) {
        $this.changeScheme('default', true);
      } else {
        $this.changeScheme('dark', true);
      }
    },

    /** Change Scheme */
    changeScheme: function changeScheme(scheme, cookie) {
      _utility.$body.addClass('cs-scheme-toggled');

      _utility.$body.attr('data-site-scheme', scheme);

      $this.setIndividualScheme();

      if (cookie) {
        (0, _utility.csSetCookie)('_color_schema', scheme, {
          expires: 2592000
        });
        (0, _utility.csSetCookie)('_color_system_schema', null, {
          expires: 2592000
        });
      }

      setTimeout(function () {
        _utility.$body.removeClass('cs-scheme-toggled');
      }, 100);
    }
  };
})(); // Initialize.


cscoDarkMode.init();

/***/ }),
/* 14 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _utility = __webpack_require__(0);

/** ----------------------------------------------------------------------------
 * Search Dropdown */
(function () {
  var focusSearchTimeout;
  (0, _utility.$)('.cs-header__search-toggle').click(function (e) {
    if (!(0, _utility.$)('.cs-search').is(":visible")) {
      focusSearchTimeout = setTimeout(function () {
        (0, _utility.$)('.cs-search .cs-search__input').focus();
      }, 300);
    } else {
      clearTimeout(focusSearchTimeout);
    }

    (0, _utility.$)('.cs-search').stop().slideToggle();
    e.preventDefault();
  });
  (0, _utility.$)('.cs-search__close').click(function (e) {
    (0, _utility.$)('.cs-search').slideUp();
    e.preventDefault();
    clearTimeout(focusSearchTimeout);
  });
})();

/***/ }),
/* 15 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _utility = __webpack_require__(0);

/** ----------------------------------------------------------------------------
 * Sticky Sidebar */
(function () {
  var stickyElementsSmart = [],
      stickyElements = [];
  stickyElementsSmart.push('.cs-navbar-smart-enabled .cs-entry__metabar-inner');
  stickyElementsSmart.push('.cs-sticky-sidebar-enabled.cs-navbar-smart-enabled.cs-stick-to-top .cs-sidebar__inner');
  stickyElementsSmart.push('.cs-sticky-sidebar-enabled.cs-navbar-smart-enabled.cs-stick-last .cs-sidebar__inner .widget:last-child');
  stickyElementsSmart.push('.cs-sticky-sidebar-enabled.cs-navbar-smart-enabled .cnvs-block-section-sidebar-sticky-top .cnvs-block-section-sidebar-inner');
  stickyElementsSmart.push('.cs-sticky-sidebar-enabled.cs-navbar-smart-enabled .cnvs-block-section-sidebar-sticky-top-last-block .cnvs-block-section-sidebar-inner > :last-child');
  stickyElements.push('.cs-navbar-sticky-enabled .cs-entry__metabar-inner');
  stickyElements.push('.cs-sticky-sidebar-enabled.cs-navbar-sticky-enabled.cs-stick-to-top .cs-sidebar__inner');
  stickyElements.push('.cs-sticky-sidebar-enabled.cs-navbar-sticky-enabled.cs-stick-last .cs-sidebar__inner .widget:last-child');
  stickyElements.push('.cs-sticky-sidebar-enabled.cs-navbar-sticky-enabled .cnvs-block-section-sidebar-sticky-top .cnvs-block-section-sidebar-inner');
  stickyElements.push('.cs-sticky-sidebar-enabled.cs-navbar-sticky-enabled .cnvs-block-section-sidebar-sticky-top-last-block .cnvs-block-section-sidebar-inner > :last-child');

  _utility.$doc.ready(function () {
    var headerStick = (0, _utility.$)('.cs-header'),
        wpAdminBar = (0, _utility.$)('#wpadminbar'),
        headerStickHeight = headerStick.outerHeight(),
        wpAdminBarHeight = wpAdminBar.outerHeight(),
        headerStretch = (0, _utility.$)('.cs-header-stretch'),
        headerStretchHeight = headerStretch.outerHeight(),
        allHeight = (headerStickHeight || 0) + (wpAdminBarHeight || 0) + 20,
        windowWidth = (0, _utility.$)(window).width(); // Sticky sidebar for mozilla.

    if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
      stickyElementsSmart.push('.cs-sticky-sidebar-enabled.cs-stick-to-bottom .cs-sidebar__inner');
      stickyElements.push('.cs-sticky-sidebar-enabled.cs-stick-to-bottom .cs-sidebar__inner');
      stickyElementsSmart.push('.cnvs-block-section-sidebar-sticky-bottom .cnvs-block-section-sidebar-inner');
      stickyElements.push('.cnvs-block-section-sidebar-sticky-bottom .cnvs-block-section-sidebar-inner');
    } // Join elements.


    stickyElementsSmart = stickyElementsSmart.join(',');
    stickyElements = stickyElements.join(','); // Sticky nav visible.

    _utility.$doc.on('sticky-nav-visible', function () {
      headerStickHeight = parseInt(getComputedStyle(document.documentElement).getPropertyValue('--cs-header-height'));

      if (headerStretchHeight) {
        allHeight = (headerStretchHeight || 0) + (wpAdminBarHeight || 0) + 20;
      } else {
        allHeight = (headerStickHeight || 0) + (wpAdminBarHeight || 0) + 20;
      }

      (0, _utility.$)(stickyElementsSmart).css('top', allHeight + 'px');
    }); // Sticky nav hide.


    _utility.$doc.on('sticky-nav-hide', function () {
      headerStickHeight = 0;
      allHeight = (headerStickHeight || 0) + (wpAdminBarHeight || 0) + 20;
      (0, _utility.$)(stickyElementsSmart).css('top', allHeight + 'px');
    });

    _utility.$doc.on('stretch-nav-to-small', function () {
      headerStretchHeight = parseInt(getComputedStyle(document.documentElement).getPropertyValue('--cs-header-height'));

      if (headerStretchHeight) {
        allHeight = (headerStretchHeight || 0) + (wpAdminBarHeight || 0) + 20;
      } else {
        allHeight = (headerStickHeight || 0) + (wpAdminBarHeight || 0) + 20;
      }

      if (headerStretch.hasClass("cs-scroll-sticky") && !headerStretch.hasClass("cs-scroll-active")) {
        (0, _utility.$)(stickyElementsSmart).css('top', allHeight + 'px');
      }
    });

    _utility.$doc.on('stretch-nav-to-big', function () {
      headerStretchHeight = parseInt(getComputedStyle(document.documentElement).getPropertyValue('--cs-header-initial-height'));
    }); // Add top style


    if (_utility.$body.hasClass('cs-navbar-smart-enabled') && windowWidth >= 1020) {
      if (headerStretchHeight) {
        allHeight = (headerStretchHeight || 0) + (wpAdminBarHeight || 0) + 20;
      } else {
        allHeight = (headerStickHeight || 0) + (wpAdminBarHeight || 0) + 20;
      }

      (0, _utility.$)(stickyElementsSmart).css('top', allHeight + 'px');
    } else if (_utility.$body.hasClass('cs-navbar-sticky-enabled') && windowWidth >= 1020) {
      if (headerStretchHeight) {
        allHeight = (headerStretchHeight || 0) + (wpAdminBarHeight || 0) + 20;
      } else {
        allHeight = (headerStickHeight || 0) + (wpAdminBarHeight || 0) + 20;
      }

      (0, _utility.$)(stickyElements).css('top', allHeight + 'px');
    } // Remove top style rafter resize


    _utility.$window.resize(function () {
      var windowWidthResize = _utility.$window.width();

      if (windowWidthResize < 1020) {
        (0, _utility.$)(stickyElements).removeAttr('style');
        (0, _utility.$)(stickyElementsSmart).removeAttr('style');
      }
    });
  });
})();

/***/ }),
/* 16 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _utility = __webpack_require__(0);

/** ----------------------------------------------------------------------------
 * Video Background */
(function () {
  var initAPI = false;
  var process = false;
  var contex = [];
  var players = [];
  var attrs = []; // Create deferred object

  var YTdeferred = _utility.$.Deferred();

  window.onYouTubePlayerAPIReady = function () {
    // Resolve when youtube callback is called
    // passing YT as a parameter.
    YTdeferred.resolve(window.YT);
  }; // Embedding youtube iframe api.


  function embedYoutubeAPI() {
    var tag = document.createElement('script');
    tag.src = 'https://www.youtube.com/iframe_api';
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
  } // Video rescale.


  function rescaleVideoBackground() {
    (0, _utility.$)('.cs-video-init').each(function () {
      var w = (0, _utility.$)(this).parent().width();
      var h = (0, _utility.$)(this).parent().height();
      var hideControl = 400;
      var id = (0, _utility.$)(this).attr('data-uid');

      if (w / h > 16 / 9) {
        players[id].setSize(w, w / 16 * 9 + hideControl);
      } else {
        players[id].setSize(h / 9 * 16, h + hideControl);
      }
    });
  } // Init video background.


  function initVideoBackground() {
    if ((0, _utility.$)('body').hasClass('wp-admin')) {
      return;
    }

    if (process) {
      return;
    }

    process = true; // Smart init API.

    if (!initAPI) {
      var elements = (0, _utility.$)('.cs-video-wrapper[data-video-id]');

      if (elements.length) {
        embedYoutubeAPI();
        initAPI = true;
      }
    }

    if (!initAPI) {
      process = false;
      return;
    } // Whenever youtube callback was called = deferred resolved
    // your custom function will be executed with YT as an argument.


    YTdeferred.done(function (YT) {
      (0, _utility.$)('.cs-video-inner').each(function () {
        // The state.
        var isInit = (0, _utility.$)(this).hasClass('cs-video-init');
        var id = null; // Generate unique ID.

        if (!isInit) {
          id = Math.random().toString(36).substr(2, 9);
        } else {
          id = (0, _utility.$)(this).attr('data-uid');
        } // Create contex.


        contex[id] = this; // The actived.

        var isActive = (0, _utility.$)(contex[id]).hasClass('active'); // The monitor.

        var isInView = (0, _utility.$)(contex[id]).isInViewport(); // Initialization.

        if (isInView && !isInit) {
          // Add init class.
          (0, _utility.$)(contex[id]).addClass('cs-video-init'); // Add unique ID.

          (0, _utility.$)(contex[id]).attr('data-uid', id); // Get video attrs.

          var videoID = (0, _utility.$)(contex[id]).parent().data('video-id');
          var videoStart = (0, _utility.$)(contex[id]).parent().data('video-start');
          var videoEnd = (0, _utility.$)(contex[id]).parent().data('video-end'); // Check video id.

          if (typeof videoID === 'undefined' || !videoID) {
            return;
          } // Video attrs.


          attrs[id] = {
            'videoId': videoID,
            'startSeconds': videoStart,
            'endSeconds': videoEnd,
            'suggestedQuality': 'hd720'
          }; // Creating a player.

          players[id] = new YT.Player(contex[id], {
            playerVars: {
              autoplay: 0,
              autohide: 1,
              modestbranding: 1,
              rel: 0,
              showinfo: 0,
              controls: 0,
              disablekb: 1,
              enablejsapi: 0,
              iv_load_policy: 3,
              playsinline: 1,
              loop: 1
            },
            events: {
              'onReady': function onReady() {
                players[id].loadVideoById(attrs[id]);
                players[id].mute();
              },
              'onStateChange': function onStateChange(e) {
                if (e.data === 1) {
                  (0, _utility.$)(contex[id]).parents('.cs-overlay, .cs-video-wrap').addClass('cs-video-bg-init');
                  (0, _utility.$)(contex[id]).addClass('active');
                } else if (e.data === 0) {
                  players[id].seekTo(attrs[id].startSeconds);
                }
              }
            }
          });
          rescaleVideoBackground();
        } // Pause and play.


        var control = (0, _utility.$)(contex[id]).parents('.cs-overlay, .cs-video-wrap').find('.cs-player-state');

        if (isActive && isInit && !(0, _utility.$)(control).hasClass('cs-player-upause')) {
          if (isInView && (0, _utility.$)(control).hasClass('cs-player-play')) {
            // Change icon.
            (0, _utility.$)(control).removeClass('cs-player-play').addClass('cs-player-pause'); // Pause video.

            players[id].playVideo();
          }

          if (!isInView && (0, _utility.$)(control).hasClass('cs-player-pause')) {
            // Change icon.
            (0, _utility.$)(control).removeClass('cs-player-pause').addClass('cs-player-play'); // Pause video.

            players[id].pauseVideo();
          }
        }
      });
    });
    process = false;
  } // State Control.


  _utility.$doc.on('click', '.cs-player-state', function () {
    var container = (0, _utility.$)(this).parents('.cs-overlay, .cs-video-wrap').find('.cs-video-inner');
    var id = (0, _utility.$)(container).attr('data-uid');
    (0, _utility.$)(this).toggleClass('cs-player-pause cs-player-play');

    if ((0, _utility.$)(this).hasClass('cs-player-pause')) {
      (0, _utility.$)(this).removeClass('cs-player-upause');
      players[id].playVideo();
    } else {
      (0, _utility.$)(this).addClass('cs-player-upause');
      players[id].pauseVideo();
    }
  }); // Stop Control.


  _utility.$doc.on('click', '.cs-player-stop', function () {
    var container = (0, _utility.$)(this).parents('.cs-overlay, .cs-video-wrap').find('.cs-video-inner');
    var id = (0, _utility.$)(container).attr('data-uid');
    (0, _utility.$)(this).siblings('.cs-player-state').removeClass('cs-player-pause').addClass('cs-player-play');
    (0, _utility.$)(this).siblings('.cs-player-state').addClass('cs-player-upause');
    players[id].pauseVideo();
  }); // Volume Control.


  _utility.$doc.on('click', '.cs-player-volume', function () {
    var container = (0, _utility.$)(this).parents('.cs-overlay, .cs-video-wrap').find('.cs-video-inner');
    var id = (0, _utility.$)(container).attr('data-uid');
    (0, _utility.$)(this).toggleClass('cs-player-mute cs-player-unmute');

    if ((0, _utility.$)(this).hasClass('cs-player-unmute')) {
      players[id].unMute();
    } else {
      players[id].mute();
    }
  }); // Document scroll.


  _utility.$window.on('load scroll resize scrollstop', function () {
    initVideoBackground();
  }); // Document ready.


  _utility.$doc.ready(function () {
    initVideoBackground();
  }); // Post load.


  _utility.$body.on('post-load', function () {
    initVideoBackground();
  }); // Document resize.


  _utility.$window.on('resize', function () {
    rescaleVideoBackground();
  }); // Init.


  initVideoBackground();
})();

/***/ }),
/* 17 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _utility = __webpack_require__(0);

/** ----------------------------------------------------------------------------
 * Widget Nav Menu */
(function () {
  _utility.$.fn.responsiveNav = function () {
    this.removeClass('menu-item-expanded');

    if (this.prev().hasClass('submenu-visible')) {
      this.prev().removeClass('submenu-visible').slideUp(350);
      this.parent().removeClass('menu-item-expanded');
    } else {
      this.parent().parent().find('.menu-item .sub-menu').removeClass('submenu-visible').slideUp(350);
      this.parent().parent().find('.menu-item-expanded').removeClass('menu-item-expanded');
      this.prev().toggleClass('submenu-visible').hide().slideToggle(350);
      this.parent().toggleClass('menu-item-expanded');
    }
  }; //
  // Navigation Menu Widget
  //


  (0, _utility.$)(document).ready(function (e) {
    (0, _utility.$)('.widget_nav_menu .menu-item-has-children').each(function (e) {
      // Add a caret.
      (0, _utility.$)(this).append('<span></span>'); // Fire responsiveNav() when clicking a caret.

      (0, _utility.$)('> span', this).on('click', function (e) {
        e.preventDefault();
        (0, _utility.$)(this).responsiveNav();
      }); // Fire responsiveNav() when clicking a parent item with # href attribute.

      if ('#' === (0, _utility.$)('> a', this).attr('href')) {
        (0, _utility.$)('> a', this).on('click', function (e) {
          e.preventDefault();
          (0, _utility.$)(this).next().next().responsiveNav();
        });
      }
    });
  });
})();

/***/ })
/******/ ]);