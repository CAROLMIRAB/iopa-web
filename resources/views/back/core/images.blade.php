@extends('back.theme') 
@section('content')
<div class="col-xl-12 mb-5 mb-xl-0">
    <div class="card shadow">
        <div class="card-header bg-transparent">
            <div class="row align-items-center">
                <div class="col-8">
                    <h6 class="text-uppercase text-muted ls-1 mb-1">Imagenes</h6>
                    <h2 class="mb-0">{{ _('Gallería') }}</h2>
                </div>
                
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-12">
                    <table id="table-exams" class="table-flush datatable-images hover" role="grid" data-route="{{ route('core.gallery-images-all') }}" >
                        <thead class="thead-light">
                            <tr>
                                <th class="no-sort" width="15%" >{{ __('Image') }}</th>
                                <th class="sorting" width="10%" >{{ __('Nombre') }}</th>
                                <th class="sorting" width="10%" >{{ __('Acción') }}</th>
                            </tr>
                        </thead>
                    </table>
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
	$(function(){
    Core.imagesDataTable();
	});

</script>
@endsection