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
					<label for="name">{{ __('Título') }}</label>
					<input type="text" name="name" id="name" class="form-control" data-slugit-target="#slug">
					<div class="example-text"><span class="url-example">Url: {{ route('post.viewposts') }}/</span><input size="65" type="text" name="slug" id="slug"
						 class="slug">
					</div>
				</div>
				<div class="form-group">
					<label for="excerpt">{{ __('Extracto') }}</label>
					<textarea id="excerpt" name="excerpt" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label for="body">{{ __('Cuerpo') }}</label>
					<textarea id="body" name="body" class="form-control summernote"></textarea>
				</div>
				<div class="form-group">
					<label for="category_id">{{ __('Categorías') }}</label>
					<select name="category_id" id="category_id" class="form-control"> 
							
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
						<button id="btn-save" class="btn btn-lg btn-primary" type="submit">{{ __('Guardar Cambios') }}</button>
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
				<input type="file" name="image" id="image" class="form-control" accept="image/png, image/jpeg">
			</div>
			{{ csrf_field() }}
			</form>
		</div>
	</div>
</div>
@endsection
 
@section('scripts')
<script src="{{ asset('back/vendor/stringToSlug/jquery.slugit.min.js') }}"></script>
<script src="{{ asset('back/vendor/summernote/summernote.min.js') }}"></script>
<script src="{{ asset('back/vendor/amsify-suggestags/js/jquery.amsify.suggestags.js') }}"></script>
<script src="{{ asset('back/js/posts.js') }}"></script>

<script>
	//Posts.storePost();
	$(document).ready(function(){
		$('#name').slugit({
  		event: 'blur'
		});

		$('#body').summernote({
				height: 200
			});
			$('input[name="tags"]').amsifySuggestags({
				type : 'amsify',
				suggestions: ['Black', 'White', 'Red', 'Blue', 'Green', 'Orange']
				});

	});

</script>
@endsection