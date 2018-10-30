@extends('back.theme') 
@section('content')

<div class="col-xl-8 mb-5 mb-xl-0">
	<div class="card shadow">
		<div class="card-header bg-transparent">
			<div class="row align-items-center">
				<div class="col">
					<h6 class="text-uppercase text-muted ls-1 mb-1">Medico</h6>
					<h2 class="mb-0">{{ _('Nuevo Medico') }}</h2>
				</div>
			</div>
		</div>
		<div class="card-body">
			<form action="{{ route('post.store') }}" method="post" id="post" enctype="multipart/form-data">

				<div class="form-group">
					<label for="name">{{ __('Nombre') }}</label>
					<input type="text" name="name" id="name" class="form-control @if ($errors->valid->has('name')) is-invalid @endif " data-slugit-target="#slug">					@if ($errors->valid->has('name'))
					<p class="invalid-feedback">{{ $errors->valid->first('name') }}</p> @endif
				</div>

				<div class="form-group">
					<label for="excerpt">{{ __('Extracto') }}</label>
					<textarea id="excerpt" name="excerpt" class="form-control @if ($errors->valid->has('excerpt')) is-invalid @endif "></textarea>					@if ($errors->valid->has('excerpt'))
					<p class="invalid-feedback">{{ $errors->valid->first('excerpt') }}</p> @endif
				</div>
				<div class="form-group">
					<label for="specialty_id">{{ __('Especilidad') }}</label>
					<select name="specialty_id" id="specialty_id" class="form-control"> 
						@foreach ($specialties as $esp)
								<option value="{{ $esp->id }}"> {{ $esp->name }}</option>
							@endforeach	
					</select>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="col-xl-4 mb-5 mb-xl-0">
	<div class="card shadow">
		<div class="card-header bg-transparent">
			<div class="row align-items-center">
				<div class="col">
					<div class="form-group">
						<button id="btn-save" class="btn btn-lg btn-primary" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Publicando...') }}">{{ __('Guardar Cambios') }}</button>
					</div>
				</div>
			</div>
		</div>
		<div class="card-body">

			<div class="form-group">
				<label for="image">{{ __('Imagen') }}</label>
				<input type="file" id="image">
				<div id="upload-demo"></div>
				<div id="preview-crop-image" style="background:#9d9d9d;width:300px;padding:50px 50px;height:300px;"></div>
				<button class="btn btn-primary btn-block upload-image" style="margin-top:2%">Upload Image</button>
			</div>
			{{ csrf_field() }}
		</div>
	</div>
</div>
@endsection
 
@section('scripts')

<script>
	$.ajaxSetup({
		headers: {
    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$(document).ready(function(){

		Doctors.imageUploadDoctor("{{ route('') }}"); 
		Doctors.eliminateMessages();
	});

</script>
@endsection