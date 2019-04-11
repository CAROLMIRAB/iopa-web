@extends('back.theme') 
@section('content')
<div class="col-xl-12 mb-5 mb-xl-0 agreements-content" data-route="{{ route('agreement.show-agreement') }}">
    <div class="card shadow">
        <div class="card-header bg-transparent">
            <div class="row align-items-center">
                <div class="col-8">
                    <h6 class="text-uppercase text-muted ls-1 mb-1">Configuraciones</h6>
                    <h2 class="mb-0">{{ __('Configuraciones') }}</h2>
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
                                    aria-selected="true">{{ __('GENERAL') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-2-tab" data-toggle="tab" href="#tabs-text-2" role="tab" aria-controls="tabs-text-2"
                                    aria-selected="false">{{ __('SOBRE NOSOTROS') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-2-tab" data-toggle="tab" href="#tabs-text-3" role="tab" aria-controls="tabs-text-3"
                                    aria-selected="false">{{ __('PAGINAS') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-3-tab" data-toggle="tab" href="#tabs-text-4" role="tab" aria-controls="tabs-text-4"
                                    aria-selected="false">{{ __('CONSULTA') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-4-tab" data-toggle="tab" href="#tabs-text-5" role="tab" aria-controls="tabs-text-5"
                                    aria-selected="false">{{ __('CONTACTO') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active in" id="tabs-text-1" role="tabpanel" aria-labelledby="tabs-text-1-tab">
    @include('back.configuration.sections.slides', ['slides' => isset($datarender[6]['slides']) ? $datarender[6]['slides'] :
                                    '', 'popup' => isset($datarender[5]['popup']) ? $datarender[5]['popup'] :
                                    '', 'rrss' => isset($datarender[4]['rrss']) ? $datarender[4]['rrss'] :
                                    ''])
                                </div>

                                <div class="tab-pane fade" id="tabs-text-2" role="tabpanel" aria-labelledby="tabs-text-2-tab">
    @include('back.configuration.sections.aboutus', ['aboutus' => isset($datarender[9]['aboutus']) ? $datarender[9]['aboutus']
                                    : '' ])
                                </div>

                                <div class="tab-pane fade active in" id="tabs-text-3" role="tabpanel" aria-labelledby="tabs-text-3-tab">
    @include('back.configuration.sections.pagesdescription', ['pagesdescription' => isset($datarender[7]['pages-description'])
                                    ? $datarender[7]['pages-description'] : ''])
                                </div>

                                <div class="tab-pane fade active in" id="tabs-text-4" role="tabpanel" aria-labelledby="tabs-text-4-tab">
    @include('back.configuration.sections.query', ['query' => isset($datarender[10]['query']) ? $datarender[10]['query'] : ''])
                                </div>

                                <div class="tab-pane fade active in" id="tabs-text-5" role="tabpanel" aria-labelledby="tabs-text-5-tab">
    @include('back.configuration.sections.contact', ['contact' => isset($datarender[11]['contact']) ? $datarender[11]['contact'] : ''])
                                </div>

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
        Agreement.savePago();

	});

</script>
@endsection