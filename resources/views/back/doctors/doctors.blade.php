@extends('back.theme') 
@section('content')
<div class="col-xl-12 mb-5 mb-xl-0">
    <div class="card shadow">
        <div class="card-header bg-transparent">
            <div class="row align-items-center">
                <div class="col-8">
                    <h6 class="text-uppercase text-muted ls-1 mb-1">Noticias</h6>
                    <h2 class="mb-0">{{ _('Todas las Noticias') }}</h2>
                </div>
                <div class="col-4 text-right">
                    <a class="btn btn-md btn-primary" href="{{ route('doctor.createview') }}">{{ __('Nuevo Médico') }}</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-12">
                    <table id="table-posts" class="table-flush datatable-doctors hover" role="grid" data-route="{{ route('doctor.all-doctors') }}">
                        <thead class="thead-light">
                            <tr>
                                <th class="sorting" width="20%" >{{ __('') }}</th>
                                <th class="no-sort" width="15%" >{{ __('Nombre') }}</th>
                                <th class="sorting" width="10%" >{{ __('Telefono') }}</th>
                                <th class="sorting" width="10%" >{{ __('Fecha') }}</th>
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
	Doctors.allDoctors();
	});

</script>
@endsection