@extends('back.theme') 
@section('content')
<div class="col-xl-12 mb-5 mb-xl-0">
    <div class="card shadow">
        <div class="card-header bg-transparent">
            <div class="row align-items-center">
                <div class="col-8">
                    <h6 class="text-uppercase text-muted ls-1 mb-1">Sucursales</h6>
                    <h2 class="mb-0">{{ _('Todas las Sucursales') }}</h2>
                </div>
                <div class="col-4 text-right">
                    <a class="btn btn-md btn-primary" href="{{ route('office.createview') }}">{{ __('Nueva Sucursal') }}</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-12">
                    <table id="table-offices" class="table-flush datatable-offices hover" role="grid" data-route="{{ route('office.all-offices') }}">
                        <thead class="thead-light">
                            <tr>
                                <th class="sorting" width="20%" >{{ __('Nombre') }}</th>
                                <th class="no-sort" width="15%" >{{ __('Telefono') }}</th>
                                <th class="sorting" width="10%" >{{ __('Dirección') }}</th> 
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
	Offices.allOffices();
	});

</script>
@endsection