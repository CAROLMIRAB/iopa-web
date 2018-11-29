@extends('back.theme') 
@section('content')

<div class="col-xl-8 mb-5 mb-xl-0">
	<div class="card shadow">
		<div class="card-header bg-transparent">
			<div class="row align-items-center">
				<div class="col">
					<h6 class="text-uppercase text-muted ls-1 mb-1">Post</h6>
					<h2 class="mb-0">{{ _('Agregar Nueva Sucursal') }}</h2>
				</div>
			</div>
		</div>
		<div class="card-body">
			<form action="{{ route('office.store') }}" method="post" id="office" enctype="multipart/form-data">
				
				<div class="form-group">
					<label for="name">{{ __('Nombre') }}</label>
					<input type="text" name="name" id="name" class="form-control @if ($errors->valid->has('name')) is-invalid @endif " data-slugit-target="#slug" >
					@if ($errors->valid->has('name')) <p class="invalid-feedback">{{ $errors->valid->first('name') }}</p> @endif
				</div>

				<div class="form-group">
					<label for="map">{{ __('Mapa Incrustado') }}</label>
					<textarea id="map" name="map" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label for="phone">{{ __('Teléfono') }}</label>
					<input id="phone" name="phone" class="form-control" />
					@if ($errors->valid->has('phone')) <p class="invalid-feedback">{{ $errors->valid->first('phone') }}</p> @endif
				</div>
				<div class="form-group">
					<label for="address">{{ __('Dirección') }}</label>
					<textarea id="address" name="address" class="form-control"></textarea>
				</div>
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
				<div id="image-preview" style="border: #619DC9 3px dashed;">
					<label for="image-upload" id="image-label"><img class="" src="{{ asset('back/img') }}/cloud-upload.png" width="60" height="60"/></label>
					<input type="file" name="image" id="image" accept="image/png, image/jpeg" />
				</div>
			</div>
			{{ csrf_field() }}
			</form>
		</div>


	</div>
</div>
@endsection
 
@section('scripts')

	<script>
		var image = "<img class='' src='{{ asset('back/img') }}/cloud-upload.png' width='60' height='60'/>";

	$(document).ready(function(){
		Offices.imageUpload(image); 
		Offices.eliminateMessages();
	});
	</script>
@endsection