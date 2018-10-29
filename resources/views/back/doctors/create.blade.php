@extends('back.theme') 
@section('content')

<div class="col-xl-8 mb-5 mb-xl-0">
	<div class="card shadow">
		<div class="card-header bg-transparent">
			<div class="row align-items-center">
				<div class="col">
					<h6 class="text-uppercase text-muted ls-1 mb-1">Medico</h6>
					<h2 class="mb-0">{{ _('Agregar Nuevo Medico') }}</h2>
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
							
					</select>
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
	
	Doctors.imageUpload(image); 
	Doctors.eliminateMessages();

	});

</script>
@endsection