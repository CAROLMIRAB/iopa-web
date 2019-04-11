@extends('back.theme') 
@section('content')
<form action="{{ route('specialty.edit') }}" method="post" id="specialty" enctype="multipart/form-data" class="row">
	<div class="col-xl-8 mb-5 mb-xl-0">
		<div class="card shadow">
			<div class="card-header bg-transparent">
				<div class="row align-items-center">
					<div class="col-8">
						<h6 class="text-uppercase text-muted ls-1 mb-1">Especialidades</h6>
						<h2 class="mb-0">{{ _('Editar Especialidad') }}</h2>
					</div>
					<div class="col-4 text-right">
						<button id="btn-save" class="btn btn-sm btn-primary" type="button" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Publicando...') }}">{{ __('Guardar Cambios') }}</button>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="form-group">
					<input size="65" type="text" name="slug" id="slug" value="{{ $specialty->slug }}" class="slug hidden" readonly data-route="{{ route('core.slug-create') }}">
					<div class="example-text">
						<span class="url-example"><strong> Url:</strong> 
						<a target="_blank" href="{{ $specialty->slug_url }}" data-slug="{{ route('specialty.viewallspecialties') }}" id="slug-url">{{ $specialty->slug_url }}</a></span></div>
				</div>
				<div class="form-group">
					<label for="name">{{ __('Título') }}</label>
					<input type="text" name="name" id="name" value="{{ $specialty->name }}" class="form-control" data-slugit-target="#slug">
					<p class="invalid-feedback"></p>
				</div>
				<div class="form-group">
					<label for="body">{{ __('Descripción') }}</label>
					<textarea id="body" name="body" class="form-control summernote">{{ $specialty->body }}</textarea>
				</div>

			</div>
		</div>
	</div>
	<div class="col-xl-4 mb-5 mb-xl-0">
		<div class="card shadow">
			<div class="card-body">
				<div class="form-group">
					<label for="status">{{ __('Estado') }}</label>
					<select id="status" name="status" class="form-control">
								<option value="PUBLISHED">Publicado</option>
								<option value="DRAFT">Borrador</option>
							</select>
				</div>
				<div class="form-group">
					<label for="image">{{ __('Imagen') }}</label>
					<div id="image-preview" style="border: #619DC9 3px dashed;">
						<label for="image-upload" id="image-label"><img class="" src="{{ asset('back/img') }}/cloud-upload.png" width="60" height="60"/></label>
						<input type="file" name="image" id="image" accept="image/png, image/jpeg" required/>
						<input type="hidden" class="imgBase64" name="imgBase64">
					</div>
				</div>
			</div>


		</div>
	</div>
	<input id="id_specialty" name="id_specialty" type="hidden" value="{{ $specialty->id }}"> {{ csrf_field() }}

</form>
@endsection
 
@section('scripts')
<script>
	$.ajaxSetup({
		headers: {
    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	var image = "<img class='' src='{{ asset('back/img') }}/cloud-upload.png' width='60' height='60'/>";
	$(document).ready(function(){
	Surgery.slug();
	Surgery.editHTML();
	Surgery.imageUpload(image); 
	Surgery.editSurgery();
	Offices.selectOfficeEdit();
	});

</script>
@endsection