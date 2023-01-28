"use strict";

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/**
 * Editor Wrapper
 */
function csEditorWrapper() {
  var Component = wp.element.Component;
  var registerPlugin = wp.plugins.registerPlugin;
  var _wp$data = wp.data,
      select = _wp$data.select,
      subscribe = _wp$data.subscribe;
  var cscoGutenberg = {};

  (function () {
    var $this;
    cscoGutenberg = {
      /*
      * Variables
      */
      wrapper: false,
      content: false,
      template: null,
      singularLayout: null,

      /*
      * Initialize
      */
      init: function init(e) {
        $this = cscoGutenberg; // Find wrapper and content elements.

        $this.content = document.querySelector('.block-editor-editor-skeleton__content, .interface-interface-skeleton__content');
        $this.wrapper = document.querySelector('.editor-styles-wrapper'); // Init events.

        if ('undefined' === typeof window.cscoGutenbergInit) {
          $this.events(e);
          window.cscoGutenbergInit = true;
        }
      },

      /*
      * Events
      */
      events: function events(e) {
        // Update singular layout.
        subscribe(function () {
          var meta = select('core/editor').getEditedPostAttribute('meta');

          if ('object' === _typeof(meta) && meta['csco_singular_sidebar']) {
            var newSingularLayout = meta['csco_singular_sidebar'];

            if (newSingularLayout !== $this.singularLayout) {
              $this.singularLayout = newSingularLayout;
              $this.changeLayout();
            }
          }
        }); // Update template.

        subscribe(function () {
          var newTemplate = select('core/editor').getEditedPostAttribute('template');

          if (newTemplate !== $this.template) {
            $this.template = newTemplate;
            $this.initPageTemplate();
            $this.changeLayout();
          }
        }); // Update Breakpoints during resize.

        window.addEventListener('resize', function (e) {
          $this.initBreakpoints();
          $this.initChanges();
        }); // Update Breakpoints.

        var observer = new MutationObserver(function (mutations) {
          mutations.forEach(function (mutation) {
            if (mutation.oldValue !== mutation.target.classList.value) {
              $this.initBreakpoints();
              $this.initChanges();
            }
          });
        });
        observer.observe(document.getElementsByTagName('body')[0], {
          attributes: true,
          subtree: false,
          attributeOldValue: true,
          attributeFilter: ["class"]
        });
        observer.observe(document.getElementsByClassName('edit-post-layout')[0], {
          attributes: true,
          subtree: false,
          attributeOldValue: true,
          attributeFilter: ["class"]
        });
      },

      /*
      * Get page template
      */
      getPageTemplate: function getPageTemplate() {
        return select('core/editor').getEditedPostAttribute('template');
      },

      /*
      * Initialize changes
      */
      initChanges: function initChanges() {
        setTimeout(function () {
          document.body.dispatchEvent(new Event('editor-render'));
        }, 200);
      },

      /*
      * Initialize page template
      */
      initPageTemplate: function initPageTemplate() {
        if ('template-canvas-fullwidth.php' === $this.getPageTemplate()) {
          document.body.classList.add('template-canvas-fullwidth');
        } else {
          document.body.classList.remove('template-canvas-fullwidth');
        }
      },

      /*
      * Initialize the breakpoints system
      */
      initBreakpoints: function initBreakpoints() {
        if ('undefined' === typeof $this) {
          return;
        }

        if (!$this.wrapper || !$this.content) {
          return;
        } // Default breakpoints that should apply to all observed
        // elements that don't define their own custom breakpoints.


        var breakpoints = {
          'cs-breakpoint-up-600px': 600,
          'cs-breakpoint-up-720px': 720,
          'cs-breakpoint-up-1020px': 1020,
          'cs-breakpoint-up-1200px': 1200,
          'cs-breakpoint-up-1920px': 1920
        }; // Update the matching breakpoints on the observed element.

        Object.keys(breakpoints).forEach(function (breakpoint) {
          var minWidth = breakpoints[breakpoint];

          if ($this.wrapper.clientWidth >= minWidth) {
            $this.content.classList.add(breakpoint);
          } else {
            $this.content.classList.remove(breakpoint);
          }
        });
      },

      /**
       * Init page layout.
       */
      initLayout: function initLayout() {
        if ('undefined' === typeof $this || !$this.wrapper) {
          return;
        }

        $this.wrapper.classList.add('cs-editor-styles-wrapper');

        if ('template-canvas-fullwidth.php' === $this.getPageTemplate()) {
          $this.wrapper.classList.add('cs-sidebar-disabled');
        } else {
          $this.wrapper.classList.add(cscoGWrapper.page_layout);
        }

        $this.wrapper.classList.add(cscoGWrapper.post_type);
        $this.wrapper.classList.add(cscoGWrapper.post_sidebar);
        $this.wrapper.classList.add(cscoGWrapper.section_heading);
      },

      /**
       * Get new page layout.
       */
      newLayout: function newLayout(layout) {
        if ('right' === layout || 'left' === layout) {
          return 'cs-sidebar-enabled';
        } else if ('disabled' === layout) {
          return 'cs-sidebar-disabled';
        } else {
          return cscoGWrapper.default_layout;
        }
      },

      /**
       * Update when page layout has changed.
       */
      changeLayout: function changeLayout() {
        if ('undefined' === typeof $this || !$this.wrapper) {
          return;
        }

        var layout = $this.singularLayout;

        if ('template-canvas-fullwidth.php' === $this.getPageTemplate()) {
          layout = 'disabled';
        }

        if ($this.newLayout(layout) === cscoGWrapper.page_layout) {
          return;
        }

        $this.wrapper.classList.remove('cs-sidebar-enabled');
        $this.wrapper.classList.remove('cs-sidebar-disabled');

        if ('right' === layout || 'left' === layout) {
          cscoGWrapper.page_layout = 'cs-sidebar-enabled';
          $this.wrapper.classList.add('cs-sidebar-enabled');
        } else if ('disabled' === layout) {
          cscoGWrapper.page_layout = 'cs-sidebar-disabled';
          $this.wrapper.classList.add('cs-sidebar-disabled');
        } else {
          cscoGWrapper.page_layout = cscoGWrapper.default_layout;
          $this.wrapper.classList.add(cscoGWrapper.default_layout);
        }

        $this.initChanges();
      }
    };
  })();

  var cscoGutenbergComponent = /*#__PURE__*/function (_Component) {
    _inherits(cscoGutenbergComponent, _Component);

    var _super = _createSuper(cscoGutenbergComponent);

    function cscoGutenbergComponent() {
      _classCallCheck(this, cscoGutenbergComponent);

      return _super.apply(this, arguments);
    }

    _createClass(cscoGutenbergComponent, [{
      key: "componentDidMount",
      value:
      /**
       * Add initial class.
       */
      function componentDidMount() {
        // Initialize.
        cscoGutenberg.init(); // Initialize Page Template.

        cscoGutenberg.initPageTemplate(); // Initialize Page Layout.

        cscoGutenberg.initLayout(); // Initialize Breakpoints

        cscoGutenberg.initBreakpoints();
      }
    }, {
      key: "componentDidUpdate",
      value: function componentDidUpdate() {
        // Initialize.
        cscoGutenberg.init(); // Initialize Page Template.

        cscoGutenberg.initPageTemplate(); // Update Page Layout.

        cscoGutenberg.initLayout(); // Update Breakpoints

        cscoGutenberg.initBreakpoints();
      }
    }, {
      key: "render",
      value: function render() {
        return null;
      }
    }]);

    return cscoGutenbergComponent;
  }(Component);

  registerPlugin('csco-editor-wrapper', {
    render: cscoGutenbergComponent
  });
}

csEditorWrapper();