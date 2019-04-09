'use strict';

window.feather = require('feather-icons');

window.dd = function(data)
{
	console.log(data);
};


jQuery(document).ready(function ($) {
	/*
	 |--------------------------------------------------------------------
	 | Vendor Plugins
	 |--------------------------------------------------------------------
	 */
	// Feather Icons
	feather.replace();

	// Select2
	$('.select2').each(function (index, element) {
		let el = $(this);

		let cssClass = el.data('container-css-class') ? el.data('container-css-class') : '';

		var settings = {
			containerCssClass: cssClass,
		};

		if (el.hasClass('form-segment-dropdown')) {
			settings.minimumResultsForSearch = 'Infinity';
		}

		el.select2(settings);
	});

	// Currency
	$('.input-currency').mask('#.##0', { reverse: true });

	/*
	 |--------------------------------------------------------------------
	 | Bootstrap Components
	 |--------------------------------------------------------------------
	 */
	// Modal
	$('.modal[data-show="true"]').modal('show');
	
	// Tooltip
	$('[data-toggle="tooltip"]').tooltip();

	// Popover
	// data-popover-content="#popover-container"
	$('[data-toggle="popover"]').popover({
		html : true,
		trigger: 'focus',
		container: '.root',
		content: function() {
			var content = $(this).attr("data-popover-content");
			return $(content).children(".popover-body").html();
		},
		title: function() {
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
		let el = $(this);
		let parent = el.parents('.file-action');
		let container = parent.find('.file-container');
		let inputFile = parent.find('.custom-file');
		container.remove();
		inputFile.removeClass('d-none');
	});

	// Delete Record
	$('body').on('click', '.delete-record', function(event) {

		event.preventDefault();

		let el = $(this);
		let form = $(el.data('form'));
		let forceDelete = el.data('delete') == 'hard';

		let title = forceDelete ? 'Estás seguro de borrar este registro?' : 'Estás seguro de inactivar este registro?';
		let message = forceDelete ? 'Una vez eliminado, ya no podrás recuperar este dato y todos los datos relacionados serán borrados de la Base de Datos!' : 'Para activar de vuelta este registro puedes usar el botón Restaurar.';

		var modal = bootbox.dialog({
			title: title,
			message: message,
			buttons: {
				cancel: {
					label: 'Cancelar',
					className: 'btn-default btn-cancel-modal',
				},
				confirm: {
					label: 'Sí, eliminar registro',
					className: 'btn-danger btn-activity btn-loading',
					callback: function () {
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
	});

	// Input File
	$('.custom-file input[type="file"]').change(function(event){
		let el = $(this);
		let filename = event.target.files[0].name;
		el.parent().find('.custom-file-label').html(filename);
	});

	/*
	 |--------------------------------------------------------------------
	 | Stations
	 |--------------------------------------------------------------------
	 */
	// Form Relations
	$('.material-checkbox').on('change', function (event) {

		let el = $(this);
		let parent = el.parents('.material-relation');

		let variantCheckbox = parent.find('.variant-checkbox');
		let stationSlotinput = parent.find('.station-slots-quantity-input');

		let elements = [
			variantCheckbox,
			stationSlotinput,
		];

		if (this.checked) {
			elements.forEach((item) => {
				item.removeAttr('disabled');
			});
		} else {
			elements.forEach((item) => {
				item.attr('disabled', 'disabled')
			});
		}

		variantCheckbox.trigger('change');

	}).trigger('change');

	$('.variant-checkbox').on('change', function (event) {
		let el = $(this);
		let parent = el.parents('.variant-relation');
		let value = el.val();
		let originalCheckbox = parent.find('#variant-' + value + '-originals .original-checkbox');

		let enabled = this.disabled == false && this.checked;

		if (enabled) {
			originalCheckbox.removeAttr('disabled');
		} else {
			originalCheckbox.attr('disabled', 'disabled');
		}

		originalCheckbox.trigger('change');
		
	}).trigger('change');

	$('.original-checkbox').on('change', function (event) {

		let el = $(event.target);
		let target = el.data('target');

		let enabled = this.disabled == false && this.checked;

		if (enabled) {
			$(target).removeAttr('disabled');
		} else {
			$(target).attr('disabled', 'disabled');
		}
	}).trigger('change');

	$('.accordion-group .collapse').on('show.bs.collapse', function(event) {
		let el = $(event.target);
		$('.accordion-group').find('.collapse.show').collapse('hide');
	});

	/*
	 |--------------------------------------------------------------------
	 | Campaigns
	 |--------------------------------------------------------------------
	 */
	// Form - Service Type
	$('.campaign-type-radio').on('change', function (event) {
		let el = $(event.target);
		let manufacturingServiceTypeChecked = el.val() != 'manufacturing' && this.checked;

		let countrysideInstallationCheckbox = $('#campaign-countryside-installation');

		if (manufacturingServiceTypeChecked) {
			countrysideInstallationCheckbox.attr('disabled', 'disabled');
		} else {
			countrysideInstallationCheckbox.removeAttr('disabled');
		}
	}).trigger('change');

	$('.show-station-collapse').on('click', function (event) {
		let el = $(event.target);
		let target = el.data('target');

		$(target).collapse('show');
	});

	$('.close-station-collapse').on('click', function (event) {
		let el = $(event.target);
		let target = el.data('target');

		$(target).collapse('hide');
	});
});