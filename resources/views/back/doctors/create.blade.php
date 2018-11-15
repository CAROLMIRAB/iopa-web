@extends('back.theme') 
@section('content')

<div class="col-xl-6 mb-6 mb-xl-0">
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
			<form action="{{ route('doctor.store') }}" method="post" id="doctor-form" >
				<div class="form-group">
					<label for="name">{{ __('Nombre') }}</label>
					<input type="text" name="name" id="name" class="form-control @if ($errors->valid->has('name')) is-invalid @endif " data-slugit-target="#slug">					@if ($errors->valid->has('name'))
					<p class="invalid-feedback">{{ $errors->valid->first('name') }}</p> @endif
				</div>
				<div class="form-group">
					<label for="phone">{{ __('Teléfono') }}</label>
					<input type="text" name="phone" id="phone" class="form-control @if ($errors->valid->has('phone')) is-invalid @endif " data-slugit-target="#slug">					@if ($errors->valid->has('phone'))
					<p class="invalid-feedback">{{ $errors->valid->first('phone') }}</p> @endif
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
				<input class="hidden" id="imgurl" name="imgurl" type="hidden">

				<div class="form-group">
					<button id="btn-save" class="btn btn-lg btn-primary" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Publicando...') }}">{{ __('Guardar Cambios') }}</button>
				</div>
				{{ csrf_field() }}
			</form>
		</div>
	</div>
</div>
<div class="col-xl-6 mb-6 mb-xl-0">
	<div class="card shadow">
		<div class="card-header bg-transparent">
			<div class="row align-items-center">
				<div class="col">
					
				</div>
			</div>
		</div>
	
		<div class="card-body">
			<input type="file" id="fileInput" class="form-control" accept="image/*" />
			<div id="canvas-div" style="max-height: 400px; height:400px">
				<canvas id="canvas">

				</canvas>
				<div id="preview-img"></div>
			</div>
			<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
			<div class="buttons-upload" style="float: left; width: 100%">
				<div style="float: left; width: 60%; display: inline-block;">
					<div style="float: left; width: 20%; display: inline-block;">

					</div>
					<div style="float: left; width: 20%; display: inline-block;"></div>
				</div>
				<button type="button" id="btnCrop" class="btn btn-lg btn-primary" value="Aceptar" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Cargando Imagen...">
				Cortar y Guardar
				</button>
				<div class="preview" style="display: table-cell; width: 100%">

				</div>
			
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

		Doctors.imageUploadDoctor("{{ route('doctor.storeimg') }}"); 
		Doctors.eliminateMessages();
	});
	</script>
@endsection