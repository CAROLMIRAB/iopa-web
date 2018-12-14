@extends('back.theme') 
@section('content')
<form action="{{ route('surgery.store') }}" method="post" id="surgery" enctype="multipart/form-data" class="row">
	<div class="col-xl-12 mb-5 mb-xl-0">
		<div class="card shadow">
			<div class="card-header bg-transparent">
				<div class="row align-items-center">
					<div class="col-8">
						<h6 class="text-uppercase text-muted ls-1 mb-1">Cirugías</h6>
						<h2 class="mb-0">{{ _('Nueva Cirugía') }}</h2>
					</div>
					<div class="col-4 text-right">
						<button id="btn-save" class="btn btn-sm btn-primary" type="submit" data-loading-text="<i class='fa fa-spin fa-spinner'></i> {{ __('Publicando...') }}">{{ __('Guardar Cambios') }}</button>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="form-group">
					<div class="example-text"><span class="url-example"><strong> Url:</strong> {{ url('') }}/</span>
						<input size="65" type="text" name="slug" id="slug" class="slug" readonly data-route="{{ route('surgery.slug-create') }}">
					</div>
				</div>
				<div class="form-group">
					<label for="name">{{ __('Título') }}</label>
					<input type="text" name="name" id="name" class="form-control @if ($errors->valid->has('name')) is-invalid @endif " data-slugit-target="#slug">					@if ($errors->valid->has('name'))
					<p class="invalid-feedback">{{ $errors->valid->first('name') }}</p> @endif
				</div>
				<div class="form-group">
					<label for="body">{{ __('Cuerpo') }}</label>
					<textarea id="body" name="body" class="form-control summernote" @if ($errors->valid->has('body')) is-invalid @endif > </textarea>					@if ($errors->valid->has('body'))
					<p class="invalid-feedback">{{ $errors->valid->first('body') }}</p> @endif
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
	var image = "<img class='' src='{{ asset('back/img') }}/cloud-upload.png' width='60' height='60'/>";
	$(document).ready(function(){
	Posts.slug();
	Posts.editHTML();
	Posts.tagsInput();		
	Posts.imageUpload(image); 
	Posts.eliminateMessages();
	});

</script>
@endsection