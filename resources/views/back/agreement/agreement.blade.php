@extends('back.theme') 
@section('content')
<div class="col-xl-12 mb-5 mb-xl-0 agreements-content" data-route="{{ route('agreement.show-agreement') }}">
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
                                <div class="tab-pane fade active in" id="tabs-text-1" role="tabpanel" aria-labelledby="tabs-text-1-tab">
    @include('back.agreement.sections.fonasa', ['fonasa' => isset($datarender[0]['fonasa']) ? $datarender[0]['fonasa'] : ''])
                                </div>
                                <div class="tab-pane fade" id="tabs-text-2" role="tabpanel" aria-labelledby="tabs-text-2-tab">
    @include('back.agreement.sections.isapres', ['isapre' => isset($datarender[1]['isapres']) ? $datarender[1]['isapres'] : ''
                                    ])
                                </div>
                                <div class="tab-pane fade" id="tabs-text-3" role="tabpanel" aria-labelledby="tabs-text-3-tab">
    @include('back.agreement.sections.convenios', ['convenio' => isset($datarender[2]['convenios']) ? $datarender[2]['convenios']
                                    : '' ])
                                </div>
                                <div class="tab-pane fade" id="tabs-text-4" role="tabpanel" aria-labelledby="tabs-text-3-tab">
    @include('back.agreement.sections.promos', ['promo' => isset($datarender[3]['promociones']) ? $datarender[3]['promociones']
                                    : '' ])
                                </div>
                                <div class="tab-pane fade" id="tabs-text-5" role="tabpanel" aria-labelledby="tabs-text-3-tab">
    @include('back.agreement.sections.aranceles', ['arancel' => isset($datarender[4]['aranceles']) ? $datarender[4]['aranceles']
                                    : '' ])
                                </div>
                                <div class="tab-pane fade" id="tabs-text-6" role="tabpanel" aria-labelledby="tabs-text-3-tab">
    @include('back.agreement.sections.pago', ['pago' => isset($datarender[5]['medios-pagos']) ? $datarender[5]['medios-pagos']
                                    : '' ])
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
    $(function(){
        var img ='<i class="ni ni-cloud-download-95 i-img"></i>';
        $.ajaxSetup({
           headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
        
        Core.removeImg();
        Core.sortableImg();

        /**** Fonasa *****/
        Agreement.fonasaAdd();
        Agreement.minTrFonasa();
        Agreement.saveFonasa();
        Agreement.imageUpload(img);
        Agreement.editHTMLFonasa();
       
        /**** Isapres *****/
        Agreement.addGes();
        Agreement.addCu();
        Agreement.imagesUp(img);
        Agreement.minTr();
        Agreement.saveIsapre();
        Agreement.isapreAdd();
        Agreement.editHTMLIsapre();

        /**** Convenios *****/
        Agreement.imagesUpCon(img);
        Agreement.convenioAdd();
        Agreement.saveConvenio();
        Agreement.editHTMLConvenio();

        /**** Promociones *****/
        Agreement.imagesUpProm(img);
        Agreement.editHTMLProm();
        Agreement.saveProm();

        /**** Aranceles *****/
        Agreement.addArancel();
        Agreement.minTrArancel();
        Agreement.saveArancel();
        Agreement.imagesUpArancel(img);
        Agreement.editHTMLArancel();

        /**** Medios de Pago ****/
        Agreement.editHTMLPago();
        Agreement.imagesUpPago(img);
        Agreement.imagesSubUpPago(img);
        Agreement.pagoAdd();

	});

</script>
@endsection