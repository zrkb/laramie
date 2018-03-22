<!-- Optional Javascript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/r-2.2.1/datatables.min.js" type="text/javascript"></script>

<script src="{{ asset('assets/admin/js/all.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js/holder.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootbox/bootbox.js') }}"></script>
<script type="text/javascript">

	// Icons
	feather.replace({ width: 17, height: 17 });

	// jQuery
	jQuery(document).ready(function(){
		$('.select2').select2();
		$('[data-toggle="tooltip"]').tooltip();
		
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

		var buttons = [
			{
				extend: 'copy',
				title: 'Copiar'
			},
			{
				extend: 'excelHtml5',
				title: 'Excel',
				exportOptions: {
					columns: ':visible'
				}
			},
			{
				extend: 'csvHtml5',
				title: 'CSV',
				exportOptions: {
					columns: ':visible'
				}
			},
			'pdfHtml5',
		];

		$('.datatable').DataTable({
			language: language,
			dom: 'Bfrtip'
			// buttons: buttons
		});

		$('.delete-record').on('click', function(event) {

			event.preventDefault();

            var record = $(this).data('record');
            var record_title = $(this).data('record-title');

			var dialog = bootbox.dialog({
				'title': 'Atención!',
				'message': 'Estás seguro de borrar este registro? Una vez eliminado, ya no podrás recuperar este dato.',
				'buttons': {
					'cancelar': {
						'label': 'Cancelar',
						'className': 'btn-default btn-cancel-modal',
					},
					'confirmar': {
						'label': 'Sí, eliminar registro',
						'className': 'btn-danger btn-loading',
					}
				},
				'animate': false
			});

			dialog.init(function(){
				window.loadingButton(record);
			});
		});
	});

	var isAdvancedUpload = function() {
		var div = document.createElement('div');
		return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
	}();


	'use strict';

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

		$('.btn-loading, .btn-cancel-modal').each(function() {

			var button = $(this);

			if (button.is('a')) {
				button.prop('role', 'button');
			}
		});

		window.loadingButton = function (record) {

			jQuery('.btn-loading').on('click', function(event){

				$('.bootbox-close-button').remove();

				var button = $(this);

				if (button.hasClass('btn-activity')) return;

				button.addClass('btn-activity').prop('tabindex', '-1');
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

	})( jQuery, window, document );

</script>

@stack('scripts')
