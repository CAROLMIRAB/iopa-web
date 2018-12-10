@extends('back.theme') 
@section('content')

<form action="{{ route('doctor.store') }}" method="post" id="doctor-form" class="row">
	<div class="col-xl-8 order-xl-1">
		<div class="card shadow">
			<div class="card-header bg-transparent">
				<div class="row align-items-center">
					<div class="col-8">
						<h6 class="text-uppercase text-muted ls-1 mb-1">Medico</h6>
						<h2 class="mb-0">{{ _('Nuevo Medico') }}</h2>
					</div>
					<div class="col-4 text-right">
						<button class="btn btn-sm btn-primary" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Publicando...') }}">{{ __('Guardar Cambios') }}</button>
					</div>
				</div>
			</div>
			<div class="card-body">

				<div class="pl-lg-4">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="name">{{ __('Nombre') }}</label>
								<input type="text" name="name" id="name" class="form-control @if ($errors->valid->has('name')) is-invalid @endif " data-slugit-target="#slug">								@if ($errors->valid->has('name'))
								<p class="invalid-feedback">{{ $errors->valid->first('name') }}</p> @endif
							</div>

							<div class="form-group">
								<label for="phone">{{ __('Teléfono') }}</label>
								<input type="text" name="phone" id="phone" class="form-control @if ($errors->valid->has('phone')) is-invalid @endif " data-slugit-target="#slug">								@if ($errors->valid->has('phone'))
								<p class="invalid-feedback">{{ $errors->valid->first('phone') }}</p> @endif
							</div>

						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="name">{{ __('Apellido') }}</label>
								<input type="text" name="lastname" id="lastname" class="form-control @if ($errors->valid->has('lastname')) is-invalid @endif "
								 data-slugit-target="#slug"> @if ($errors->valid->has('lastname'))
								<p class="invalid-feedback">{{ $errors->valid->first('lastname') }}</p> @endif
							</div>
							<div class="form-group">
								<label for="specialty_id">{{ __('Especialidad') }}</label>
								<select name="specialty_id" id="specialty_id" class="form-control"> 
										@foreach ($specialties as $esp)
												<option value="{{ $esp->id }}"> {{ $esp->name }}</option>
											@endforeach	
											</select>
							</div>

						</div>

						<div class="col-lg-12">

							<div class="form-group">
								<label for="office">{{ __('Sucursales') }}</label>
								<select name="office[]" id="office" class="form-control" data-route="{{ route('office.find-office')}}"> 
									
										</select>
							</div>
						</div>
					</div>
				</div>
				<input class="hidden" id="imgurl" name="imgurl" type="hidden"> {{ csrf_field() }}

			</div>
		</div>


	</div>
	<div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
		<div class="card card-profile shadow">
			<div class="row justify-content-center">
				<div class="col-lg-3 order-lg-2">
					<div class="card-profile-image">
						<a data-toggle="modal" data-target="#modal-notification" id="btnmodal">
							<img src="{{ asset('images/avatar.jpg') }}" class="rounded-circle" id="avatar-doctor">
							</a>
						<div class="overlay-img " data-toggle="modal" data-target="#modal-notification" id="btnmodal">
							<span class="icon-img rounded-circle" title="Imagen Médico">
										<i class="ni ni-fat-add"></i>
								</span>
						</div>
					</div>
				</div>
			</div>
			<div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
				<div class="d-flex justify-content-between">

				</div>
			</div>
			<div class="card-body pt-0 pt-md-4">
				<div class="row">
					<div class="col">
						<div class="card-profile-stats d-flex justify-content-center mt-md-5">
						</div>
					</div>
				</div>
				<div class="text-center">
					<div class="form-group">
						<label for="excerpt">{{ __('Ficha Médico') }}</label>
						<textarea id="excerpt" name="excerpt" class="form-control @if ($errors->valid->has('excerpt')) is-invalid @endif "></textarea>						@if ($errors->valid->has('excerpt'))
						<p class="invalid-feedback">{{ $errors->valid->first('excerpt') }}</p> @endif
					</div>

				</div>
			</div>
		</div>
	</div>
</form>

<div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
	<div class="modal-dialog  modal-dialog-centered modal-" role="document">
		<div class="modal-content ">

			<div class="modal-header">
				<h6 class="modal-title" id="modal-title-notification"></h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
			</div>

			<div class="modal-body">

				<input type="file" id="fileInput" class="form-control" accept="image/*" />
				<div id="canvas-div" style="max-height: 300px; height:300px">
					<canvas id="canvas">

						</canvas>

				</div>
				<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
				<div class="buttons-upload" style="float: left; width: 100%">
					<div style="float: left; width: 60%; display: inline-block;">
						<div style="float: left; width: 20%; display: inline-block;">

						</div>
						<div style="float: left; width: 20%; display: inline-block;"></div>
					</div>

					<div class="preview" style="display: table-cell; width: 100%">

					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn  btn-primary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnCrop" class="btn btn-primary" value="Aceptar" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Cargando Imagen..."> Guardar</button>

				</div>

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
		Doctors.selectOffice();
	});

</script>
@endsection