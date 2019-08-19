'use strict';

window.feather = require('feather-icons');
import EditorJS from '@editorjs/editorjs';

window.dd = function(data)
{
	console.log(data);
};

window.slugify = function(text, separator = '-') {
    text = text.toString().toLowerCase().trim();

    const sets = [
        {to: 'a', from: '[ÀÁÂÃÄÅÆĀĂĄẠẢẤẦẨẪẬẮẰẲẴẶ]'},
        {to: 'c', from: '[ÇĆĈČ]'},
        {to: 'd', from: '[ÐĎĐÞ]'},
        {to: 'e', from: '[ÈÉÊËĒĔĖĘĚẸẺẼẾỀỂỄỆ]'},
        {to: 'g', from: '[ĜĞĢǴ]'},
        {to: 'h', from: '[ĤḦ]'},
        {to: 'i', from: '[ÌÍÎÏĨĪĮİỈỊ]'},
        {to: 'j', from: '[Ĵ]'},
        {to: 'ij', from: '[Ĳ]'},
        {to: 'k', from: '[Ķ]'},
        {to: 'l', from: '[ĹĻĽŁ]'},
        {to: 'm', from: '[Ḿ]'},
        {to: 'n', from: '[ÑŃŅŇ]'},
        {to: 'o', from: '[ÒÓÔÕÖØŌŎŐỌỎỐỒỔỖỘỚỜỞỠỢǪǬƠ]'},
        {to: 'oe', from: '[Œ]'},
        {to: 'p', from: '[ṕ]'},
        {to: 'r', from: '[ŔŖŘ]'},
        {to: 's', from: '[ßŚŜŞŠ]'},
        {to: 't', from: '[ŢŤ]'},
        {to: 'u', from: '[ÙÚÛÜŨŪŬŮŰŲỤỦỨỪỬỮỰƯ]'},
        {to: 'w', from: '[ẂŴẀẄ]'},
        {to: 'x', from: '[ẍ]'},
        {to: 'y', from: '[ÝŶŸỲỴỶỸ]'},
        {to: 'z', from: '[ŹŻŽ]'},
        {to: '-', from: '[·/_,:;\']'}
    ];

    sets.forEach(set => {
        text = text.replace(new RegExp(set.from,'gi'), set.to);
    });

    text = text.toString().toLowerCase()
        .replace(/\s+/g, '-')         // Replace spaces with -
        .replace(/&/g, '-and-')       // Replace & with 'and'
        .replace(/[^\w\-]+/g, '')     // Remove all non-word chars
        .replace(/\--+/g, '-')        // Replace multiple - with single -
        .replace(/^-+/, '')           // Trim - from start of text
        .replace(/-+$/, '');          // Trim - from end of text

    if ((typeof separator !== 'undefined') && (separator !== '-')) {
        text = text.replace(/-/g, separator);
    }

    return text;
}


jQuery(document).ready(function ($) {
	/*
	 |--------------------------------------------------------------------
	 | Vendor Plugins
	 |--------------------------------------------------------------------
	 */
	// Feather Icons
	feather.replace();

	const MediumEditor = require('medium-editor');
	const editor = new MediumEditor('.editable', {
		placeholder: {
			text: 'Escriba el contenido aquí ...',
			hideOnClick: false
		},
		toolbar: {
			/* These are the default options for the toolbar,
			if nothing is passed this is what is used */
			allowMultiParagraphSelection: true,
			buttons: ['bold', 'italic', 'underline', 'anchor', 'h2', 'h3', 'quote'],
			diffLeft: 0,
			diffTop: -10,
			firstButtonClass: 'medium-editor-button-first',
			lastButtonClass: 'medium-editor-button-last',
			relativeContainer: null,
			standardizeSelectionStart: false,
			static: false,
			/* options which only apply when static is true */
			align: 'center',
			sticky: false,
			updateOnEmptySelection: false
		}
	});

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

		if (el.data('placeholder')) {
			settings.placeholder = el.data('placeholder');
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
	$('.upload-wrapper .delete-file').on('click', function (event) {
		let el = $(this);
		let parent = el.parents('.upload-wrapper');
		let filePreview = parent.find('.file-preview');
		let uploadBox = parent.find('.upload-box');
		filePreview.remove();
		uploadBox.removeClass('d-none');
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

	// feature detection for drag&drop upload
	var isAdvancedUpload = function() {
		var div = document.createElement('div');
		return ( ( 'draggable' in div ) || ( 'ondragstart' in div && 'ondrop' in div ) ) && 'FormData' in window && 'FileReader' in window;
	}();

	$('form').each(function () {
		var $form		 = $(this),
			$wrapper	 = $form.find('.upload-wrapper'),
			$box		 = $wrapper.find('.upload-box'),
			$input		 = $box.find('input[type="file"]'),
			$multipleAttr= $input.attr('multiple'),
			$label		 = $wrapper.find('.upload-dragndrop'),
			$errorMsg	 = $wrapper.find('.upload-error span'),
			$restart	 = $wrapper.find('.upload-restart'),
			droppedFiles = false,
			$fileHasMultipleAttr = (typeof $multipleAttr !== typeof undefined && $multipleAttr !== false),
			showFiles	 = function( files, isMultiple )
			{
				$label.text( isMultiple && files.length > 1 ? ( $input.attr( 'data-multiple-caption' ) || '' ).replace( '{count}', files.length ) : files[ 0 ].name );
			};

		$input.on('change', function (e) {
			showFiles(e.target.files, $fileHasMultipleAttr);
		});

		// drag&drop files if the feature is available
		if (isAdvancedUpload) {
			$wrapper
			.addClass( 'has-advanced-upload' ) // letting the CSS part to know drag&drop is supported by the browser
			.on( 'drag dragstart dragend dragover dragenter dragleave drop', function (e) {
				// preventing the unwanted behaviours
				e.preventDefault();
				e.stopPropagation();
			})
			.on( 'dragover dragenter', function () {
				$box.addClass( 'is-dragover' );
			})
			.on( 'dragleave dragend drop', function () {
				$box.removeClass( 'is-dragover' );
			})
			.on( 'drop', function (e) {
				droppedFiles = e.originalEvent.dataTransfer.files;
				showFiles( droppedFiles, $fileHasMultipleAttr );
				$input.get(0).files = droppedFiles;
			});
		}

		// Firefox focus bug fix for file input
		$input
			.on( 'focus', function(){ $input.addClass( 'has-focus' ); })
			.on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
	});
});