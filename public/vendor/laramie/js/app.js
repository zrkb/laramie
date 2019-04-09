(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/public/vendor/laramie/js/app"],{

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


window.feather = __webpack_require__(/*! feather-icons */ "./node_modules/feather-icons/dist/feather.js");

window.dd = function (data) {
  console.log(data);
};

jQuery(document).ready(function ($) {
  /*
   |--------------------------------------------------------------------
   | Vendor Plugins
   |--------------------------------------------------------------------
   */
  // Feather Icons
  feather.replace(); // Select2

  $('.select2').each(function (index, element) {
    var el = $(this);
    var cssClass = el.data('container-css-class') ? el.data('container-css-class') : '';
    var settings = {
      containerCssClass: cssClass
    };

    if (el.hasClass('form-segment-dropdown')) {
      settings.minimumResultsForSearch = 'Infinity';
    }

    el.select2(settings);
  }); // Currency

  $('.input-currency').mask('#.##0', {
    reverse: true
  });
  /*
   |--------------------------------------------------------------------
   | Bootstrap Components
   |--------------------------------------------------------------------
   */
  // Modal

  $('.modal[data-show="true"]').modal('show'); // Tooltip

  $('[data-toggle="tooltip"]').tooltip(); // Popover
  // data-popover-content="#popover-container"

  $('[data-toggle="popover"]').popover({
    html: true,
    trigger: 'focus',
    container: '.root',
    content: function content() {
      var content = $(this).attr("data-popover-content");
      return $(content).children(".popover-body").html();
    },
    title: function title() {
      var title = $(this).attr("data-popover-content");
      return $(title).children(".popover-heading").html();
    }
  });
  /*
   |--------------------------------------------------------------------
   | Resource Form
   |--------------------------------------------------------------------
   */
  // Autofocus Form
  // $('.main-content form input:text:visible:first').focus();
  // Delete File

  $('.delete-file').on('click', function (event) {
    var el = $(this);
    var parent = el.parents('.file-action');
    var container = parent.find('.file-container');
    var inputFile = parent.find('.custom-file');
    container.remove();
    inputFile.removeClass('d-none');
  }); // Delete Record

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
          className: 'btn-default btn-cancel-modal'
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

  $('.custom-file input[type="file"]').change(function (event) {
    var el = $(this);
    var filename = event.target.files[0].name;
    el.parent().find('.custom-file-label').html(filename);
  });
  /*
   |--------------------------------------------------------------------
   | Stations
   |--------------------------------------------------------------------
   */
  // Form Relations

  $('.material-checkbox').on('change', function (event) {
    var el = $(this);
    var parent = el.parents('.material-relation');
    var variantCheckbox = parent.find('.variant-checkbox');
    var stationSlotinput = parent.find('.station-slots-quantity-input');
    var elements = [variantCheckbox, stationSlotinput];

    if (this.checked) {
      elements.forEach(function (item) {
        item.removeAttr('disabled');
      });
    } else {
      elements.forEach(function (item) {
        item.attr('disabled', 'disabled');
      });
    }

    variantCheckbox.trigger('change');
  }).trigger('change');
  $('.variant-checkbox').on('change', function (event) {
    var el = $(this);
    var parent = el.parents('.variant-relation');
    var value = el.val();
    var originalCheckbox = parent.find('#variant-' + value + '-originals .original-checkbox');
    var enabled = this.disabled == false && this.checked;

    if (enabled) {
      originalCheckbox.removeAttr('disabled');
    } else {
      originalCheckbox.attr('disabled', 'disabled');
    }

    originalCheckbox.trigger('change');
  }).trigger('change');
  $('.original-checkbox').on('change', function (event) {
    var el = $(event.target);
    var target = el.data('target');
    var enabled = this.disabled == false && this.checked;

    if (enabled) {
      $(target).removeAttr('disabled');
    } else {
      $(target).attr('disabled', 'disabled');
    }
  }).trigger('change');
  $('.accordion-group .collapse').on('show.bs.collapse', function (event) {
    var el = $(event.target);
    $('.accordion-group').find('.collapse.show').collapse('hide');
  });
  /*
   |--------------------------------------------------------------------
   | Campaigns
   |--------------------------------------------------------------------
   */
  // Form - Service Type

  $('.campaign-type-radio').on('change', function (event) {
    var el = $(event.target);
    var manufacturingServiceTypeChecked = el.val() != 'manufacturing' && this.checked;
    var countrysideInstallationCheckbox = $('#campaign-countryside-installation');

    if (manufacturingServiceTypeChecked) {
      countrysideInstallationCheckbox.attr('disabled', 'disabled');
    } else {
      countrysideInstallationCheckbox.removeAttr('disabled');
    }
  }).trigger('change');
  $('.show-station-collapse').on('click', function (event) {
    var el = $(event.target);
    var target = el.data('target');
    $(target).collapse('show');
  });
  $('.close-station-collapse').on('click', function (event) {
    var el = $(event.target);
    var target = el.data('target');
    $(target).collapse('hide');
  });
});

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/zerokb/Documents/Code/www/laramie/packages/imfx/laramie/resources/js/app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! /Users/zerokb/Documents/Code/www/laramie/packages/imfx/laramie/resources/sass/app.scss */"./resources/sass/app.scss");


/***/ })

},[[0,"/public/vendor/laramie/js/manifest","/public/vendor/laramie/js/vendor"]]]);