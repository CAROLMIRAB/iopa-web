@extends('back.theme') 
@section('content')
<form action="{{ route('surgery.store') }}" method="post" id="surgery" enctype="multipart/form-data" class="row">
	<div class="col-xl-8 mb-5 mb-xl-0">
		<div class="card shadow">
			<div class="card-header bg-transparent">
				<div class="row align-items-center">
					<div class="col-8">
						<h6 class="text-uppercase text-muted ls-1 mb-1">Exámenes</h6>
						<h2 class="mb-0">{{ _('Nueva Examen') }}</h2>
					</div>
					<div class="col-4 text-right">
						<button id="btn-save" class="btn btn-sm btn-primary" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Publicando...') }}">{{ __('Guardar Cambios') }}</button>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="form-group">
					<div class="example-text"><span class="url-example"><strong> Url:</strong> {{ url('') }}/cirugias/</span>
						<input size="65" type="text" name="slug" id="slug" class="slug" readonly data-route="{{ route('core.slug-create') }}">
					</div>
				</div>
				<div class="form-group">
					<label for="name">{{ __('Título') }}</label>
					<input type="text" name="name" id="name" class="form-control @if ($errors->valid->has('name')) is-invalid @endif " value="{{ old('name') }}" data-slugit-target="#slug">					@if ($errors->valid->has('name'))
					<p class="invalid-feedback">{{ $errors->valid->first('name') }}</p> @endif
				</div>
				<div class="form-group">
					<label for="body">{{ __('Descripción') }}</label>
					<textarea id="description" name="description" class="form-control summernote" > {!! old('description') !!}</textarea>					
				</div>
				<div class="form-group">
					<label for="body">{{ __('Preparación') }}</label>
					<textarea id="preparation" name="preparation" class="form-control summernote" > {!! old('preparation') !!}</textarea>					
				</div>
				<div class="form-group">
					<label for="body">{{ __('Indicaciones') }}</label>
					<textarea id="indications" name="indications" class="form-control summernote" > {!! old('indications') !!}</textarea>					
				</div>
				<div class="form-group">
					<label for="office">{{ __('Sucursales') }}</label>
					<select name="office[]" id="office" class="form-control" data-route="{{ route('office.find-office')}}" @if ($errors->valid->has('office')) is-invalid @endif> 				
					</select>
					@if ($errors->valid->has('office'))<p class="invalid-feedback">{{ $errors->valid->first('office') }}</p> @endif
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
							<input type="file" name="image" id="image" accept="image/png, image/jpeg" />
						</div>
					</div>
					{{ csrf_field() }}
	
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
	var image = "<img class='' src='{{ asset('back/img') }}/cloud-upload.png' width='60' height='60'/>";
	$(document).ready(function(){
	Exams.slug();
	Exams.editHTML();
	Exams.imageUpload(image); 
	Offices.selectOffice();
	});

</script>
@endsection