"use strict";

/**
 * Enqueue editor scripts.
 */

/**
 * Add wrapper to widgets editor.
 */
wp.data.subscribe(function () {
  setTimeout(function () {
    var elements = document.querySelectorAll('#widgets-editor .editor-styles-wrapper:not(.cs-editor-styles-wrapper)');

    if (elements && elements.length) {
      elements.forEach(function (wrapper) {
        wrapper.classList.add('cs-editor-styles-wrapper');
      });
    }
  }, 1);
});