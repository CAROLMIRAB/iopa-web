@extends('back.theme') 
@section('content')
<form action="{{ route('surgery.store') }}" method="post" id="surgery" enctype="multipart/form-data" class="row">
	<div class="col-xl-8 mb-5 mb-xl-0">
		<div class="card shadow">
			<div class="card-header bg-transparent">
				<div class="row align-items-center">
					<div class="col-8">
						<h6 class="text-uppercase text-muted ls-1 mb-1">Cirugías</h6>
						<h2 class="mb-0">{{ _('Nueva Cirugía') }}</h2>
					</div>
					<div class="col-4 text-right">
						<button id="btn-save" class="btn btn-sm btn-primary btn-save" type="button" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Publicando...') }}">{{ __('Guardar Cambios') }}</button>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="form-group">
					<input size="65" type="text" name="slug" id="slug" class="slug hidden" readonly data-route="{{ route('core.slug-create') }}">
					<div class="example-text">
					<span class="url-example"><strong> Url:</strong> 
					<a href="" data-slug="{{ route('surgery.viewallsurgeries') }}" id="slug-url">{{ route('surgery.viewallsurgeries') }}/</a></span>
					</div>
				</div>
				<div class="form-group">
					<label for="name">{{ __('Título') }}</label>
					<input type="text" name="name" id="name" class="form-control" data-slugit-target="#slug">
					<p class="invalid-feedback name-error"></p>
				</div>
				<div class="form-group">
					<label for="description">{{ __('Descripción') }}</label>
					<textarea id="description" name="description" class="form-control summernote"></textarea>
				</div>
				<div class="form-group">
					<label for="preparation">{{ __('Preparación') }}</label>
					<textarea id="preparation" name="preparation" class="form-control summernote"></textarea>
				</div>
				<div class="form-group">
					<label for="indications">{{ __('Indicaciones') }}</label>
					<textarea id="indications" name="indications" class="form-control summernote"></textarea>
				</div>
				<div class="form-group">
					<label for="office">{{ __('Sucursales') }}</label>
					<select name="office[]" id="office" class="form-control" data-route="{{ route('office.find-office')}}"> 				
					</select>
					<p class="invalid-feedback office-error"></p>
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
						<div data-toggle="modal" data-target="#modal-gallery" id="image-preview">
								<label for="image-upload" id="image-label"><img class="" src="{{ asset('back/img/cloud-upload.png') }}" width="60" height="60"/></label>
						</div>
						<input type="hidden" id="imgBase64" class="imgBase64" name="imgBase64">
					</div>
			</div>
		</div>
	</div>
	{{ csrf_field() }}
</form>
@endsection
 
@section('scripts')
<script>
	$.ajaxSetup({
		headers: {
    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	var image = "<img class='' src='{{ asset('back/img/cloud-upload.png') }}' width='60' height='60'/>";
	$(document).ready(function(){
	Surgery.slug();
	Surgery.editHTML();
	Surgery.imageUpload(image); 
	Offices.selectOffice();
	Surgery.createSurgery();
	});

</script>
@endsection