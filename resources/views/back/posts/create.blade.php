@extends('back.theme') 
@section('content')

<div class="col-xl-8 mb-5 mb-xl-0">
	<div class="card shadow">
		<div class="card-header bg-transparent">
			<div class="row align-items-center">
				<div class="col">
					<h6 class="text-uppercase text-muted ls-1 mb-1">Post</h6>
					<h2 class="mb-0">{{ _('Agregar Nuevo Post') }}</h2>
				</div>
			</div>
		</div>
		<div class="card-body">
			<form action="{{ route('post.store') }}" method="post" id="post" enctype="multipart/form-data">
				<div class="form-group">
					<div class="example-text"><span class="url-example"><strong> Url:</strong> {{ route('post.viewposts') }}/</span>
						<input size="65" type="text" name="slug" id="slug" class="slug" readonly>
					</div>
				</div>
				<div class="form-group">
					<label for="name">{{ __('Título') }}</label>
					<input type="text" name="name" id="name" class="form-control @if ($errors->valid->has('name')) is-invalid @endif " data-slugit-target="#slug" >
					@if ($errors->valid->has('name')) <p class="invalid-feedback">{{ $errors->valid->first('name') }}</p> @endif
				</div>

				<div class="form-group">
					<label for="excerpt">{{ __('Extracto') }}</label>
					<textarea id="excerpt" name="excerpt" class="form-control @if ($errors->valid->has('excerpt')) is-invalid @endif "></textarea>
					@if ($errors->valid->has('excerpt')) <p class="invalid-feedback">{{ $errors->valid->first('excerpt') }}</p> @endif
				</div>
				<div class="form-group">
					<label for="body">{{ __('Cuerpo') }}</label>
					<textarea id="body" name="body" class="form-control summernote"  @if ($errors->valid->has('body')) is-invalid @endif > </textarea>
					@if ($errors->valid->has('body')) <p class="invalid-feedback">{{ $errors->valid->first('body') }}</p> @endif

				</div>
				<div class="form-group">
					<label for="category_id">{{ __('Categorías') }}</label>
					<select name="category_id" id="category_id" class="form-control"> 
							@foreach ($categories as $cat)
								<option value="{{ $cat->id }}"> {{ $cat->name }}</option>
							@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="tags">{{ __('Etiquetas') }}</label>
					<input type="text" id="tags" name="tags" class="form-control">
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
			<!--<form method="post" id="post-img" enctype="multipart/form-data">-->
			<div class="form-group">
				<label for="status">{{ __('Estado') }}</label>
				<select id="status" name="status" class="form-control">
							<option value="PUBLISHED">Publicado</option>
							<option value="DRAFT">Borrador</option>
						</select>
			</div>
			<div class="form-group">
				<label for="image">{{ __('Imagen') }}</label>
				<!--<input type="file" name="image" id="image" class="form-control" accept="image/png, image/jpeg">
				<img class="thumb image-preview" />-->
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
	Posts.slug();
	Posts.editHTML();
	Posts.tagsInput();		
	Posts.imageUpload(image); 
	Posts.eliminateMessages();
	});

</script>
@endsection