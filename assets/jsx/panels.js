"use strict";

function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _iterableToArrayLimit(arr, i) { if (typeof Symbol === "undefined" || !(Symbol.iterator in Object(arr))) return; var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/**
 * Register Panel
 */
function csRegisterPanels() {
  var __ = wp.i18n.__;
  var compose = wp.compose.compose;
  var _wp$components = wp.components,
      TextControl = _wp$components.TextControl,
      RangeControl = _wp$components.RangeControl,
      SelectControl = _wp$components.SelectControl,
      CheckboxControl = _wp$components.CheckboxControl,
      ToggleControl = _wp$components.ToggleControl;
  var _wp$data = wp.data,
      withSelect = _wp$data.withSelect,
      withDispatch = _wp$data.withDispatch,
      dispatch = _wp$data.dispatch,
      select = _wp$data.select;
  var registerPlugin = wp.plugins.registerPlugin;
  var _wp$element = wp.element,
      useState = _wp$element.useState,
      Fragment = _wp$element.Fragment;
  var PluginDocumentSettingPanel = wp.editPost.PluginDocumentSettingPanel;
  var applyFilters = wp.hooks.applyFilters;

  var csGetPostMeta = function csGetPostMeta(slug) {
    var meta = select('core/editor').getEditedPostAttribute('meta');

    if ('object' === _typeof(meta) && meta[slug]) {
      return meta[slug];
    }
  };
  /**
   * ==================================
   * Layout Options
   * ==================================
   */


  var SingularSidebar = compose([withSelect(function (select) {
    return {
      getPostMeta: csGetPostMeta('csco_singular_sidebar')
    };
  }), withDispatch(function (dispatch) {
    return {
      setPostMeta: function setPostMeta(value) {
        dispatch('core/editor').editPost({
          meta: {
            csco_singular_sidebar: value
          }
        });
      }
    };
  })])(function (props) {
    if (csPanelsData.singularSidebar) {
      return /*#__PURE__*/React.createElement(SelectControl, {
        label: __('Sidebar', 'networker'),
        value: props.getPostMeta,
        onChange: props.setPostMeta,
        options: csPanelsData.singularSidebar
      });
    }
  });
  var PageHeaderType = compose([withSelect(function (select) {
    return {
      getPostMeta: csGetPostMeta('csco_page_header_type')
    };
  }), withDispatch(function (dispatch) {
    return {
      setPostMeta: function setPostMeta(value) {
        dispatch('core/editor').editPost({
          meta: {
            csco_page_header_type: value
          }
        });
      }
    };
  })])(function (props) {
    if (csPanelsData.pageHeaderType) {
      return /*#__PURE__*/React.createElement(SelectControl, {
        label: __('Page Header Type', 'networker'),
        value: props.getPostMeta,
        onChange: props.setPostMeta,
        options: csPanelsData.pageHeaderType
      });
    }
  });
  var AppearanceGrid = compose([withSelect(function (select) {
    return {
      getPostMeta: csGetPostMeta('csco_appearance_grid')
    };
  }), withDispatch(function (dispatch) {
    return {
      setPostMeta: function setPostMeta(value) {
        dispatch('core/editor').editPost({
          meta: {
            csco_appearance_grid: value
          }
        });
      }
    };
  })])(function (props) {
    if (csPanelsData.appearanceGrid) {
      return /*#__PURE__*/React.createElement(SelectControl, {
        label: __('Custom Appearance in Grid Layout', 'networker'),
        value: props.getPostMeta,
        onChange: props.setPostMeta,
        options: csPanelsData.appearanceGrid
      });
    }
  });
  var PageLoadNextpost = compose([withSelect(function (select) {
    return {
      getPostMeta: csGetPostMeta('csco_page_load_nextpost')
    };
  }), withDispatch(function (dispatch) {
    return {
      setPostMeta: function setPostMeta(value) {
        dispatch('core/editor').editPost({
          meta: {
            csco_page_load_nextpost: value
          }
        });
      }
    };
  })])(function (props) {
    if (csPanelsData.pageLoadNextpost) {
      return /*#__PURE__*/React.createElement(SelectControl, {
        label: __('Auto Load Next Post', 'networker'),
        value: props.getPostMeta,
        onChange: props.setPostMeta,
        options: csPanelsData.pageLoadNextpost
      });
    }
  });

  if ('post' === csPanelsData.postType || 'page' === csPanelsData.postType) {
    var csThemeLayoutOptions = function csThemeLayoutOptions() {
      return /*#__PURE__*/React.createElement(PluginDocumentSettingPanel, {
        className: "cs-theme-layout-options",
        title: __("Layout Options", "networker")
      }, applyFilters('csco.panel.layout.start', null, csPanelsData), /*#__PURE__*/React.createElement(SingularSidebar, null), /*#__PURE__*/React.createElement(PageHeaderType, null), /*#__PURE__*/React.createElement(AppearanceGrid, null), /*#__PURE__*/React.createElement(PageLoadNextpost, null), applyFilters('csco.panel.layout.end', null, csPanelsData));
    };

    registerPlugin('cs-theme-layout-options', {
      render: csThemeLayoutOptions,
      icon: false
    });
  }
  /**
   * ==================================
   * Video Background
   * ==================================
   */


  var VideoLocation = compose([withSelect(function (select) {
    return {
      getPostMeta: function getPostMeta(slug) {
        var list = csGetPostMeta('csco_post_video_location');
        return list.indexOf(slug) !== -1 ? true : false;
      }
    };
  }), withDispatch(function (dispatch) {
    return {
      setPostMeta: function setPostMeta(value, slug) {
        var list = select('core/editor').getEditedPostAttribute('meta')['csco_post_video_location'];

        if (value && list.indexOf(slug) === -1) {
          list.push(slug);
        }

        if (!value && list.indexOf(slug) !== -1) {
          list.splice(list.indexOf(slug), 1);
        }

        dispatch('core/editor').editPost({
          meta: {
            csco_post_video_location: list
          }
        }); // Update hash.

        dispatch('core/editor').editPost({
          meta: {
            csco_post_video_location_hash: String(Math.random().toString(36).substring(2) + Date.now().toString(36))
          }
        });
      }
    };
  })])(function (props) {
    return /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("p", null, __('Location', 'networker')), /*#__PURE__*/React.createElement("ul", null, csPanelsData.videoLocationList.map(function (item) {
      var _useState = useState(props.getPostMeta(item.value)),
          _useState2 = _slicedToArray(_useState, 2),
          isChecked = _useState2[0],
          setChecked = _useState2[1];

      return /*#__PURE__*/React.createElement("li", null, /*#__PURE__*/React.createElement(CheckboxControl, {
        label: item.label,
        checked: isChecked,
        onChange: function onChange(val) {
          props.setPostMeta(val, item.value);
          setChecked(props.getPostMeta(item.value));
        },
        value: item.value
      }));
    })));
  });
  var VideoURL = compose([withSelect(function (select) {
    return {
      getPostMeta: csGetPostMeta('csco_post_video_url')
    };
  }), withDispatch(function (dispatch) {
    return {
      setPostMeta: function setPostMeta(value) {
        dispatch('core/editor').editPost({
          meta: {
            csco_post_video_url: value
          }
        });
      }
    };
  })])(function (props) {
    return /*#__PURE__*/React.createElement(TextControl, {
      className: 'csVideoURL',
      label: __('YouTube URL', 'networker'),
      value: props.getPostMeta,
      onChange: props.setPostMeta
    });
  });
  var VideoStartTime = compose([withSelect(function (select) {
    return {
      getPostMeta: csGetPostMeta('csco_post_video_bg_start_time')
    };
  }), withDispatch(function (dispatch) {
    return {
      setPostMeta: function setPostMeta(value) {
        dispatch('core/editor').editPost({
          meta: {
            csco_post_video_bg_start_time: value
          }
        });
      }
    };
  })])(function (props) {
    return /*#__PURE__*/React.createElement(RangeControl, {
      label: __('Start Time (sec)', 'networker'),
      value: props.getPostMeta,
      onChange: props.setPostMeta,
      step: 1,
      min: 0,
      max: 10000
    });
  });
  var VideoEndTime = compose([withSelect(function (select) {
    return {
      getPostMeta: csGetPostMeta('csco_post_video_bg_end_time')
    };
  }), withDispatch(function (dispatch) {
    return {
      setPostMeta: function setPostMeta(value) {
        dispatch('core/editor').editPost({
          meta: {
            csco_post_video_bg_end_time: value
          }
        });
      }
    };
  })])(function (props) {
    return /*#__PURE__*/React.createElement(RangeControl, {
      label: __('End Time (sec)', 'networker'),
      value: props.getPostMeta,
      onChange: props.setPostMeta,
      step: 1,
      min: 0,
      max: 10000
    });
  });

  if ('post' === csPanelsData.postType || 'page' === csPanelsData.postType) {
    var csThemeVideoOptions = function csThemeVideoOptions() {
      return /*#__PURE__*/React.createElement(PluginDocumentSettingPanel, {
        className: "cs-theme-video_options",
        title: __("Video Background", "networker")
      }, /*#__PURE__*/React.createElement(VideoLocation, null), /*#__PURE__*/React.createElement(VideoURL, null), /*#__PURE__*/React.createElement(VideoStartTime, null), /*#__PURE__*/React.createElement(VideoEndTime, null));
    };

    registerPlugin('cs-theme-video-options', {
      render: csThemeVideoOptions,
      icon: false
    });
  }
}

csRegisterPanels();