<div class="form-group">
	{{ form()->label('file', 'Archivo', ['class' => 'control-label']) }}

	<div class="file-action">
		@isset($file)
			<div class="file-container mb-4">
				<p>
					{{ $file->basename }}
					<a href="{{ $file->getUrl() }}" target="_blank">
						<i data-feather="external-link"></i>
					</a>
				</p>
				
				@if ($file->isImage())
					<img src="{{ $file->getUrl() }}" class="d-block mb-2 img-fluid img-thumbnail rounded w-50 img-content" alt="{{ $file->name }}">
				@else
					<img src="/img/file-icon.svg" class="d-block mb-2 img-content" alt="{{ $file->name }}">
				@endif

				<a href="javascript:;" class="text-danger delete-file mt-2">
					<i data-feather="trash-2" class="feather"></i>
					<span>Borrar archivo</span>
				</a>
			</div>
		@endisset

		<div class="custom-file">
			{{ form()->label('file', 'Seleccione un archivo ...', ['class' => 'custom-file-label']) }}
			{{ form()->file('file', ['class' => 'custom-file-input', 'data-browse' => 'Elegir']) }}
		</div>

		{{ $slot }}
	</div>
</div>