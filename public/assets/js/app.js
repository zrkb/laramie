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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/app.js":
/*!************************************!*\
  !*** ./resources/assets/js/app.js ***!
  \************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _user_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./user.js */ "./resources/assets/js/user.js");
/* harmony import */ var _user_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_user_js__WEBPACK_IMPORTED_MODULE_0__);
//
// demo.js
// Theme module
//




var demoMode = function () {
  //
  // Variables
  //
  var form = document.querySelector('#demoForm');
  var topnav = document.querySelector('#topnav');
  var topbar = document.querySelector('#topbar');
  var sidebar = document.querySelector('#sidebar');
  var sidebarSmall = document.querySelector('#sidebarSmall');
  var sidebarUser = document.querySelector('#sidebarUser');
  var sidebarUserSmall = document.querySelector('#sidebarSmallUser');
  var sidebarSizeContainer = document.querySelector('#sidebarSizeContainer');
  var navPositionToggle = document.querySelectorAll('input[name="navPosition"]');
  var containers = document.querySelectorAll('[class^="container"]');
  var stylesheets = document.querySelectorAll('#stylesheetLight, #stylesheetDark');
  var stylesheetLight = document.querySelector('#stylesheetLight');
  var stylesheetDark = document.querySelector('#stylesheetDark');
  var config = {
    colorScheme: localStorage.getItem('dashkitColorScheme') ? localStorage.getItem('dashkitColorScheme') : 'light',
    navPosition: localStorage.getItem('dashkitNavPosition') ? localStorage.getItem('dashkitNavPosition') : 'sidenav',
    navColor: localStorage.getItem('dashkitNavColor') ? localStorage.getItem('dashkitNavColor') : 'default',
    sidebarSize: localStorage.getItem('dashkitSidebarSize') ? localStorage.getItem('dashkitSidebarSize') : 'base' //
    // Functions
    //

  };

  function parseUrl() {
    var search = window.location.search.substring(1);
    var params = search.split('&');

    for (var i = 0; i < params.length; i++) {
      var arr = params[i].split('=');
      var prop = arr[0];
      var val = arr[1];

      if (prop == 'colorScheme' || prop == 'navPosition' || prop == 'navColor' || prop == 'sidebarSize') {
        // Save to localStorage
        localStorage.setItem('dashkit' + prop.charAt(0).toUpperCase() + prop.slice(1), val); // Update local variables

        config[prop] = val;
      }
    }
  }

  function toggleColorScheme(colorScheme) {
    if (colorScheme == 'light') {
      stylesheetLight.disabled = false;
      stylesheetDark.disabled = true;
      colorScheme = 'light';
    } else if (colorScheme == 'dark') {
      stylesheetLight.disabled = true;
      stylesheetDark.disabled = false;
      colorScheme = 'dark';
    }
  }

  function toggleNavPosition(navPosition) {
    if (topnav && topbar && sidebar && sidebarSmall && sidebarUser && sidebarUserSmall) {
      if (navPosition == 'topnav') {
        hideNode(topbar);
        hideNode(sidebar);
        hideNode(sidebarSmall);

        for (var i = 0; i < containers.length; i++) {
          containers[i].classList.remove('container-fluid');
          containers[i].classList.add('container');
        }
      } else if (navPosition == 'combo') {
        hideNode(topnav);
        hideNode(sidebarUser);
        hideNode(sidebarUserSmall);

        for (var i = 0; i < containers.length; i++) {
          containers[i].classList.remove('container');
          containers[i].classList.add('container-fluid');
        }
      } else if (navPosition == 'sidenav') {
        hideNode(topnav);
        hideNode(topbar);

        for (var i = 0; i < containers.length; i++) {
          containers[i].classList.remove('container');
          containers[i].classList.add('container-fluid');
        }
      }
    }
  }

  function toggleNavColor(navColor) {
    if (sidebar && sidebarSmall && topnav) {
      if (navColor == 'default') {
        // Sidebar
        sidebar.classList.add('navbar-light'); // Sidebar small

        sidebarSmall.classList.add('navbar-light'); // Topnav

        topnav.classList.add('navbar-light');
      } else if (navColor == 'inverted') {
        // Sidebar
        sidebar.classList.add('navbar-dark'); // Sidebar small

        sidebarSmall.classList.add('navbar-dark'); // Topnav

        topnav.classList.add('navbar-dark');
      } else if (navColor == 'vibrant') {
        // Sidebar
        sidebar.classList.add('navbar-dark', 'navbar-vibrant'); // Sidebar small

        sidebarSmall.classList.add('navbar-dark', 'navbar-vibrant'); // Sidebar small

        topnav.classList.add('navbar-dark', 'navbar-vibrant');
      }
    }
  }

  function toggleSidebarSize(sidebarSize) {
    if (sidebarSize == 'base') {
      hideNode(sidebarSmall);
    } else if (sidebarSize == 'small') {
      hideNode(sidebar);
    }
  }

  function toggleFormControls(form, colorScheme, navPosition, navColor, sidebarSize) {
    $(form).find('[name="colorScheme"][value="' + colorScheme + '"]').closest('.btn').button('toggle');
    $(form).find('[name="navPosition"][value="' + navPosition + '"]').closest('.btn').button('toggle');
    $(form).find('[name="navColor"][value="' + navColor + '"]').closest('.btn').button('toggle');
    $(form).find('[name="sidebarSize"][value="' + sidebarSize + '"]').closest('.btn').button('toggle');
  }

  function toggleSidebarSizeCongainer(navPosition) {
    if (navPosition == 'topnav') {
      $(sidebarSizeContainer).collapse('hide');
    } else {
      $(sidebarSizeContainer).collapse('show');
    }
  }

  function submitForm(form) {
    var colorScheme = form.querySelector('[name="colorScheme"]:checked').value;
    var navPosition = form.querySelector('[name="navPosition"]:checked').value;
    var navColor = form.querySelector('[name="navColor"]:checked').value;
    var sidebarSize = form.querySelector('[name="sidebarSize"]:checked').value; // Save data to localStorage

    localStorage.setItem('dashkitColorScheme', colorScheme);
    localStorage.setItem('dashkitNavPosition', navPosition);
    localStorage.setItem('dashkitNavColor', navColor);
    localStorage.setItem('dashkitSidebarSize', sidebarSize); // Reload page

    window.location = window.location.pathname;
  }

  function hideNode(node) {
    node.setAttribute('style', 'display: none !important');
  } //
  // Event
  //
  // Parse url


  parseUrl(); // Toggle color scheme

  toggleColorScheme(config.colorScheme); // Toggle nav position

  toggleNavPosition(config.navPosition); // Toggle sidebar color

  toggleNavColor(config.navColor); // Toggle sidebar size

  toggleSidebarSize(config.sidebarSize); // Toggle form controls

  toggleFormControls(form, config.colorScheme, config.navPosition, config.navColor, config.sidebarSize); // Toggle sidebarSize container

  toggleSidebarSizeCongainer(config.navPosition); // Enable body

  document.body.style.display = 'block';

  if (form) {
    // Form submitted
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      submitForm(form);
    }); // Nav position changed

    [].forEach.call(navPositionToggle, function (el) {
      el.parentElement.addEventListener('click', function () {
        var navPosition = el.value;
        toggleSidebarSizeCongainer(navPosition);
      });
    });
  } //
  // Return
  //


  return true;
}();

/***/ }),

/***/ "./resources/assets/js/user.js":
/*!*************************************!*\
  !*** ./resources/assets/js/user.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
//
// user.js
// User scripts
//


function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

window.dd = function (data) {
  console.log(data);
};

window.slugify = function (text) {
  var separator = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '-';
  text = text.toString().toLowerCase().trim();
  var sets = [{
    to: 'a',
    from: '[ÀÁÂÃÄÅÆĀĂĄẠẢẤẦẨẪẬẮẰẲẴẶ]'
  }, {
    to: 'c',
    from: '[ÇĆĈČ]'
  }, {
    to: 'd',
    from: '[ÐĎĐÞ]'
  }, {
    to: 'e',
    from: '[ÈÉÊËĒĔĖĘĚẸẺẼẾỀỂỄỆ]'
  }, {
    to: 'g',
    from: '[ĜĞĢǴ]'
  }, {
    to: 'h',
    from: '[ĤḦ]'
  }, {
    to: 'i',
    from: '[ÌÍÎÏĨĪĮİỈỊ]'
  }, {
    to: 'j',
    from: '[Ĵ]'
  }, {
    to: 'ij',
    from: '[Ĳ]'
  }, {
    to: 'k',
    from: '[Ķ]'
  }, {
    to: 'l',
    from: '[ĹĻĽŁ]'
  }, {
    to: 'm',
    from: '[Ḿ]'
  }, {
    to: 'n',
    from: '[ÑŃŅŇ]'
  }, {
    to: 'o',
    from: '[ÒÓÔÕÖØŌŎŐỌỎỐỒỔỖỘỚỜỞỠỢǪǬƠ]'
  }, {
    to: 'oe',
    from: '[Œ]'
  }, {
    to: 'p',
    from: '[ṕ]'
  }, {
    to: 'r',
    from: '[ŔŖŘ]'
  }, {
    to: 's',
    from: '[ßŚŜŞŠ]'
  }, {
    to: 't',
    from: '[ŢŤ]'
  }, {
    to: 'u',
    from: '[ÙÚÛÜŨŪŬŮŰŲỤỦỨỪỬỮỰƯ]'
  }, {
    to: 'w',
    from: '[ẂŴẀẄ]'
  }, {
    to: 'x',
    from: '[ẍ]'
  }, {
    to: 'y',
    from: '[ÝŶŸỲỴỶỸ]'
  }, {
    to: 'z',
    from: '[ŹŻŽ]'
  }, {
    to: '-',
    from: '[·/_,:;\']'
  }];
  sets.forEach(function (set) {
    text = text.replace(new RegExp(set.from, 'gi'), set.to);
  });
  text = text.toString().toLowerCase().replace(/\s+/g, '-') // Replace spaces with -
  .replace(/&/g, '-and-') // Replace & with 'and'
  .replace(/[^\w\-]+/g, '') // Remove all non-word chars
  .replace(/\--+/g, '-') // Replace multiple - with single -
  .replace(/^-+/, '') // Trim - from start of text
  .replace(/-+$/, ''); // Trim - from end of text

  if (typeof separator !== 'undefined' && separator !== '-') {
    text = text.replace(/-/g, separator);
  }

  return text;
};

jQuery(document).ready(function ($) {
  /*
   |--------------------------------------------------------------------
   | Vendor Plugins
   |--------------------------------------------------------------------
   */
  // Currency
  // $('.input-currency').mask('#.##0', { reverse: true });

  /*
   |--------------------------------------------------------------------
   | Bootstrap Components
   |--------------------------------------------------------------------
   */
  // Modal
  // $('.modal[data-show="true"]').modal('show');
  // Tooltip
  // $('[data-toggle="tooltip"]').tooltip();
  // Popover
  // data-popover-content="#popover-container"
  // $('[data-toggle="popover"]').popover({
  // 	html : true,
  // 	trigger: 'focus',
  // 	container: '.root',
  // 	content: function() {
  // 		var content = $(this).attr("data-popover-content");
  // 		return $(content).children(".popover-body").html();
  // 	},
  // 	title: function() {
  // 		var title = $(this).attr("data-popover-content");
  // 		return $(title).children(".popover-heading").html();
  // 	}
  //    });

  /*
   |--------------------------------------------------------------------
   | Resource Form
   |--------------------------------------------------------------------
   */
  // Autofocus Form
  // $('.main-content form input:text:visible:first').focus();
  // Delete File
  // $('.upload-wrapper .delete-file').on('click', function (event) {
  // 	let el = $(this);
  // 	let parent = el.parents('.upload-wrapper');
  // 	let filePreview = parent.find('.file-preview');
  // 	let uploadBox = parent.find('.upload-box');
  // 	filePreview.remove();
  // 	uploadBox.removeClass('d-none');
  // });
  // Delete Record
  $('body').on('click', '.delete-record', function (event) {
    event.preventDefault();
    var el = $(this);
    var form = $(el.data('form'));
    var forceDelete = el.data('delete') == 'hard';
    var title = forceDelete ? 'Estás seguro de borrar este registro?' : 'Estás seguro de inactivar este registro?';
    var message = forceDelete ? 'Una vez eliminado, ya no podrás recuperar este dato y todos los datos relacionados serán borrados de la Base de Datos!' : 'Para activar de vuelta este registro puedes usar el botón Restaurar.';
    var modal = bootbox.dialog({
      title: title,
      message: message,
      buttons: {
        cancel: {
          label: 'Cancelar',
          className: 'btn-white btn-cancel-modal'
        },
        confirm: {
          label: 'Sí, eliminar registro',
          className: 'btn-danger btn-activity btn-loading',
          callback: function callback() {
            form.submit();
          }
        }
      },
      animate: false,
      closeButton: false
    });

    if (forceDelete) {
      modal.find('.modal-header').addClass('bg-danger text-white');
    }

    modal.init();
  }); // Input File
  // $('.custom-file input[type="file"]').change(function(event){
  // 	let el = $(this);
  // 	let filename = event.target.files[0].name;
  // 	el.parent().find('.custom-file-label').html(filename);
  // });
  // feature detection for drag&drop upload

  var isAdvancedUpload = function () {
    var div = document.createElement('div');
    return ('draggable' in div || 'ondragstart' in div && 'ondrop' in div) && 'FormData' in window && 'FileReader' in window;
  }();

  $('form').each(function () {
    var $form = $(this),
        $wrapper = $form.find('.upload-wrapper'),
        $box = $wrapper.find('.upload-box'),
        $input = $box.find('input[type="file"]'),
        $multipleAttr = $input.attr('multiple'),
        $label = $wrapper.find('.upload-dragndrop'),
        $errorMsg = $wrapper.find('.upload-error span'),
        $restart = $wrapper.find('.upload-restart'),
        droppedFiles = false,
        $fileHasMultipleAttr = _typeof($multipleAttr) !== ( true ? "undefined" : undefined) && $multipleAttr !== false,
        showFiles = function showFiles(files, isMultiple) {
      $label.text(isMultiple && files.length > 1 ? ($input.attr('data-multiple-caption') || '').replace('{count}', files.length) : files[0].name);
    };

    $input.on('change', function (e) {
      showFiles(e.target.files, $fileHasMultipleAttr);
    }); // drag&drop files if the feature is available

    if (isAdvancedUpload) {
      $wrapper.addClass('has-advanced-upload') // letting the CSS part to know drag&drop is supported by the browser
      .on('drag dragstart dragend dragover dragenter dragleave drop', function (e) {
        // preventing the unwanted behaviours
        e.preventDefault();
        e.stopPropagation();
      }).on('dragover dragenter', function () {
        $box.addClass('is-dragover');
      }).on('dragleave dragend drop', function () {
        $box.removeClass('is-dragover');
      }).on('drop', function (e) {
        droppedFiles = e.originalEvent.dataTransfer.files;
        showFiles(droppedFiles, $fileHasMultipleAttr);
        $input.get(0).files = droppedFiles;
      });
    } // Firefox focus bug fix for file input


    $input.on('focus', function () {
      $input.addClass('has-focus');
    }).on('blur', function () {
      $input.removeClass('has-focus');
    });
  });
});

/***/ }),

/***/ "./resources/assets/scss/app.scss":
/*!****************************************!*\
  !*** ./resources/assets/scss/app.scss ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!***************************************************************************!*\
  !*** multi ./resources/assets/js/app.js ./resources/assets/scss/app.scss ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/zerokb/Documents/Code/www/laramie/resources/assets/js/app.js */"./resources/assets/js/app.js");
module.exports = __webpack_require__(/*! /Users/zerokb/Documents/Code/www/laramie/resources/assets/scss/app.scss */"./resources/assets/scss/app.scss");


/***/ })

/******/ });