'use strict';

// Icons
feather.replace({ width: 17, height: 17 });

window.loadingButton = function (record) {

	jQuery('.btn-activity').on('click', function(event){
		
		var button = $(this);

		if (button.hasClass('btn-working')) return;

		button.addClass('btn-working').prop('tabindex', '-1');
		button.data('original-text', button.html());

		var loadingText = button.data('loading-text') || null;

		if (loadingText) {
			button.html('<i class="fa fa-circle-notch fa-spin mr-1"></i> ' + loadingText);
		} else {
			button.html('<i class="fa fa-circle-notch fa-spin ml-4 mr-4"></i>');
		}

		if (button.is('a')) {
			button.addClass('disabled').prop('aria-disabled', 'true');
		} else {
			button.prop('disabled', true);
		}

		var type = button.attr('type');

		if (typeof type !== typeof undefined && type !== false && type === 'submit') {
			$(this).parents('form').submit();
		}
	});

	jQuery('.btn-loading').on('click', function(event){

		var cancelButton = $('.btn-cancel-modal');

		cancelButton.prop('tabindex', '-1');

		if (cancelButton.is('a')) {
			cancelButton.addClass('disabled').prop('aria-disabled', 'true');
		} else {
			cancelButton.prop('disabled', true);
		}

		var form = document.getElementById('delete-form-' + record);

		if (form) {
			form.submit();
		} else {
			bootbox.alert({
				'title': 'Cancelado',
				'message': 'El registro no se ha borrado. Por favor comuníquese con el administrador',
				'animate': false
			});
		}

	});
};

// jQuery
jQuery(document).ready(function($){

	$('[data-toggle=popover]:not([data-popover-content])').popover({
		'trigger': 'focus'
	});

	$('[data-toggle=popover][data-popover-content]').popover({
		'trigger': 'focus',
		'html' : true,
		content: function() {
			window.foo = $(this);
			var content = $(this).data("popover-content");
			return $(content).children(".popover-body").html();
		},
	});
	
	var language = {
		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando _START_ - _END_ / _TOTAL_ registros",
		"sInfoEmpty":      "",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar: ",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando ...",
		"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		},
		buttons: {
			copyTitle: 'Copiar al Portapapeles',
			copySuccess: {
				_: 'Se copiaron %d registros',
				1: '1 registro copiado'
			}
		}
	};

	$('.datatable').DataTable({
		language: language,
		dom: 'Bfrtip'
		// buttons: buttons
	});

	$('.select2').select2();
	$('[data-toggle="tooltip"]').tooltip();
	$('body').tooltip( {selector: '[data-toggle=tooltip]'} );

	var options = {
		width: 18,
		height: 18
	};

	var iconOff = feather.icons['eye-off'].toSvg(options);
	var iconOn = feather.icons['eye'].toSvg(options);

	$("input[type='password'][data-eye]").each(function(i) {
		var $this = $(this);
		var eyeOff = '<span style="position: relative; top: 3px;">' + iconOff + '</span>';
		var eyeOn = '<span style="position: relative; top: 3px;">' + iconOn + '</span>';

		$this.wrap($("<div/>", {
			style: 'position:relative'
		}));
		$this.css({
			paddingRight: 60
		});
		$this.after($("<div/>", {
			html: eyeOff,
			class: 'btn btn-link btn-sm',
			id: 'passeye-toggle-'+i,
			style: 'position:absolute;right:10px;top:50%;transform:translate(0,-50%);-webkit-transform:translate(0,-50%);-o-transform:translate(0,-50%);padding: 2px 7px;font-size:12px;cursor:pointer;'
		}));
		$this.after($("<input/>", {
			type: 'hidden',
			id: 'passeye-' + i
		}));
		$this.on("keyup paste", function() {
			$("#passeye-"+i).val($(this).val());
		});
		$("#passeye-toggle-"+i).on("click", function() {
			if($this.hasClass("show")) {
				$this.attr('type', 'password');
				$this.removeClass("show");
				$(this).html(eyeOff).removeClass('text-primary');
			}else{
				$this.attr('type', 'text');
				$this.val($("#passeye-"+i).val());				
				$this.addClass("show");
				$(this).html(eyeOn).addClass('text-primary');
			}
		});
	});

	$('body').on('click', '.delete-record', function(event) {

		event.preventDefault();

		var record = $(this).data('record');
		var record_title = $(this).data('record-title');

		var dialog = bootbox.dialog({
			'title': 'Atención!',
			'message': 'Estás seguro de borrar este registro? Una vez eliminado, ya no podrás recuperar este dato.',
			'buttons': {
				'cancelar': {
					'label': 'Cancelar',
					'className': 'btn-default btn-cancel-modal ',
				},
				'confirmar': {
					'label': 'Sí, eliminar registro',
					'className': 'btn-danger btn-activity btn-loading',
				}
			},
			'animate': false,
			'closeButton': false
		});

		dialog.init(function(){
			loadingButton(record);
		});
	});

	$('.btn-loading, .btn-cancel-modal').each(function() {

		var button = $(this);

		if (button.is('a')) {
			button.prop('role', 'button');
		}
	});

});

var isAdvancedUpload = function() {
	var div = document.createElement('div');
	return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
}();

;( function( $, window, document, undefined ){
	// feature detection for drag&drop upload

	var isAdvancedUpload = function() {
		var div = document.createElement('div');
		return ( ( 'draggable' in div ) || ( 'ondragstart' in div && 'ondrop' in div ) ) && 'FormData' in window && 'FileReader' in window;
	}();


	// applying the effect for every form

	$('.upload-box').each(function(){
		var $form		 = $(this),
			$input		 = $form.find('input[type="file"]'),
			$label		 = $form.find('label'),
			$errorMsg	 = $form.find('.upload-error span'),
			$restart	 = $form.find('.upload-restart'),
			droppedFiles = false,
			showFiles	 = function( files )
			{
				$label.text( files.length > 1 ? ( $input.attr( 'data-multiple-caption' ) || '' ).replace( '{count}', files.length ) : files[ 0 ].name );
			};

		console.log($input);

		// letting the server side to know we are going to make an Ajax request
		$form.append( '<input type="hidden" name="ajax" value="1" />' );

		// automatically submit the form on file select
		$input.on( 'change', function( e )
		{
			showFiles( e.target.files );

			
			$form.trigger( 'submit' );

			
		});


		// drag&drop files if the feature is available
		if( isAdvancedUpload )
		{
			$form
			.addClass( 'has-advanced-upload' ) // letting the CSS part to know drag&drop is supported by the browser
			.on( 'drag dragstart dragend dragover dragenter dragleave drop', function( e )
			{
				// preventing the unwanted behaviours
				e.preventDefault();
				e.stopPropagation();
			})
			.on( 'dragover dragenter', function() //
			{
				$form.addClass( 'is-dragover' );
			})
			.on( 'dragleave dragend drop', function()
			{
				$form.removeClass( 'is-dragover' );
			})
			.on( 'drop', function( e )
			{
				droppedFiles = e.originalEvent.dataTransfer.files; // the files that were dropped
				showFiles( droppedFiles );

				
				$form.trigger( 'submit' ); // automatically submit the form on file drop

				
			});
		}


		// if the form was submitted

		$form.on( 'submit', function( e )
		{
			// preventing the duplicate submissions if the current one is in progress
			if( $form.hasClass( 'is-uploading' ) ) return false;

			$form.addClass( 'is-uploading' ).removeClass( 'is-error' );

			if( isAdvancedUpload ) // ajax file upload for modern browsers
			{
				e.preventDefault();

				// gathering the form data
				var ajaxData = new FormData( $form.get( 0 ) );
				if( droppedFiles )
				{
					$.each( droppedFiles, function( i, file )
					{
						ajaxData.append( $input.attr( 'name' ), file );
					});
				}

				// ajax request
				$.ajax(
				{
					url: 			$form.attr( 'action' ),
					type:			$form.attr( 'method' ),
					data: 			ajaxData,
					dataType:		'json',
					cache:			false,
					contentType:	false,
					processData:	false,
					complete: function()
					{
						$form.removeClass( 'is-uploading' );
					},
					success: function( data )
					{
						$form.addClass( data.success == true ? 'is-success' : 'is-error' );
						if( !data.success ) $errorMsg.text( data.error );
					},
					error: function()
					{
						alert( 'Error. Please, contact the webmaster!' );
					}
				});
			}
			else // fallback Ajax solution upload for older browsers
			{
				var iframeName	= 'uploadiframe' + new Date().getTime(),
					$iframe		= $( '<iframe name="' + iframeName + '" style="display: none;"></iframe>' );

				$( 'body' ).append( $iframe );
				$form.attr( 'target', iframeName );

				$iframe.one( 'load', function()
				{
					var data = $.parseJSON( $iframe.contents().find( 'body' ).text() );
					$form.removeClass( 'is-uploading' ).addClass( data.success == true ? 'is-success' : 'is-error' ).removeAttr( 'target' );
					if( !data.success ) $errorMsg.text( data.error );
					$iframe.remove();
				});
			}
		});


		// restart the form if has a state of error/success

		$restart.on( 'click', function( e )
		{
			e.preventDefault();
			$form.removeClass( 'is-error is-success' );
			$input.trigger( 'click' );
		});

		// Firefox focus bug fix for file input
		$input
		.on( 'focus', function(){ $input.addClass( 'has-focus' ); })
		.on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
	});

})( jQuery, window, document );