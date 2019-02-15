@extends('back.theme') 
@section('content')
<div class="col-xl-12 mb-5 mb-xl-0">
    <div class="card shadow">
        <div class="card-header bg-transparent">
            <div class="row align-items-center">
                <div class="col-8">
                    <h6 class="text-uppercase text-muted ls-1 mb-1">Aranceles y Convenios</h6>
                    <h2 class="mb-0">{{ __('Aranceles y Convenios') }}</h2>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-12">
                    <div class="nav-wrapper">
                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-text" role="tablist">
                            <li class="nav-item active">
                                <a class="nav-link mb-sm-3 mb-md-0 show" id="tabs-text-1-tab" data-toggle="tab" href="#tabs-text-1" role="tab" aria-controls="tabs-text-1"
                                    aria-selected="true">{{ __('FONASA') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-2-tab" data-toggle="tab" href="#tabs-text-2" role="tab" aria-controls="tabs-text-2"
                                    aria-selected="false">{{ __('ISAPRES') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-3-tab" data-toggle="tab" href="#tabs-text-3" role="tab" aria-controls="tabs-text-3"
                                    aria-selected="false">{{ __('CONVENIOS') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-4-tab" data-toggle="tab" href="#tabs-text-4" role="tab" aria-controls="tabs-text-3"
                                    aria-selected="false">{{ __('PROMOCIONES') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-5-tab" data-toggle="tab" href="#tabs-text-5" role="tab" aria-controls="tabs-text-3"
                                    aria-selected="false">{{ __('ARANCELES') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-6-tab" data-toggle="tab" href="#tabs-text-6" role="tab" aria-controls="tabs-text-3"
                                    aria-selected="false">{{ __('MEDIOS DE PAGO') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade" id="tabs-text-1" role="tabpanel" aria-labelledby="tabs-text-1-tab">
                                    @include('back.agreement.sections.fonasa')
                                </div>
                                <div class="tab-pane fade active in" id="tabs-text-2" role="tabpanel" aria-labelledby="tabs-text-2-tab">
                                    @include('back.agreement.sections.isapres')
                                </div>
                                <div class="tab-pane fade" id="tabs-text-3" role="tabpanel" aria-labelledby="tabs-text-3-tab">
                                    <p class="description">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown
                                        aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan
                                        helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
                                </div>
                                <div class="tab-pane fade" id="tabs-text-4" role="tabpanel" aria-labelledby="tabs-text-3-tab">
                                    <p class="description">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown
                                        aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan
                                        helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
                                </div>
                                <div class="tab-pane fade" id="tabs-text-5" role="tabpanel" aria-labelledby="tabs-text-3-tab">
                                    <p class="description">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown
                                        aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan
                                        helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
                                </div>
                                <div class="tab-pane fade" id="tabs-text-6" role="tabpanel" aria-labelledby="tabs-text-3-tab">
                                    <p class="description">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown
                                        aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan
                                        helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
                                </div>
                            </div>
                        </div>
                    </div>

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
        Agreement.addFon();
        Agreement.addGes();
        Agreement.addCu();
        Agreement.imagesUp();
        Agreement.addTr();
        Agreement.isapreAdd();
	});

</script>
@endsection