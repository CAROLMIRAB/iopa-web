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
                                <a class="nav-link mb-sm-3 mb-md-0 show" id="tabs-text-8-tab" data-toggle="tab" href="#tabs-text-8" role="tab" aria-controls="tabs-text-8"
                                    aria-selected="false">{{ __('HOME') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 " id="tabs-text-1-tab" data-toggle="tab" href="#tabs-text-1" role="tab" aria-controls="tabs-text-1"
                                    aria-selected="true">{{ __('SLIDE') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-2-tab" data-toggle="tab" href="#tabs-text-2" role="tab" aria-controls="tabs-text-2"
                                    aria-selected="false">{{ __('NOSOTROS') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-3-tab" data-toggle="tab" href="#tabs-text-3" role="tab" aria-controls="tabs-text-3"
                                    aria-selected="false">{{ __('PAGINAS') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-4-tab" data-toggle="tab" href="#tabs-text-4" role="tab" aria-controls="tabs-text-4"
                                    aria-selected="false">{{ __('CONSULTA') }}</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-6-tab" data-toggle="tab" href="#tabs-text-6" role="tab" aria-controls="tabs-text-6"
                                        aria-selected="false">{{ __('POPUP') }}</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-7-tab" data-toggle="tab" href="#tabs-text-7" role="tab" aria-controls="tabs-text-7"
                                        aria-selected="false">{{ __('RRSS') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-5-tab" data-toggle="tab" href="#tabs-text-5" role="tab" aria-controls="tabs-text-5"
                                    aria-selected="false">{{ __('CONTACTO') }}</a>
                            </li>
                           
                        </ul>
                    </div>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade " id="tabs-text-1" role="tabpanel" aria-labelledby="tabs-text-1-tab">
    @include('back.configuration.sections.slides', ['slide' =>  isset($datarender[5]['slides']) ? $datarender[5]['slides'] : ''])
                                </div>

                                <div class="tab-pane fade" id="tabs-text-2" role="tabpanel" aria-labelledby="tabs-text-2-tab">
    @include('back.configuration.sections.aboutus', ['aboutus' => isset($datarender[8]['aboutus']) ? $datarender[8]['aboutus']
                                    : '' ])
                                </div>

                                <div class="tab-pane fade" id="tabs-text-3" role="tabpanel" aria-labelledby="tabs-text-3-tab">
    @include('back.configuration.sections.pagesdescription', ['pagesdescription' => isset($datarender[6]['pages-description'])
                                    ? $datarender[6]['pages-description'] : ''])
                                </div>

                                <div class="tab-pane fade" id="tabs-text-4" role="tabpanel" aria-labelledby="tabs-text-4-tab">
    @include('back.configuration.sections.query', ['query' => isset($datarender[9]['query']) ? $datarender[9]['query'] : ''])
                                </div>

                                <div class="tab-pane fade" id="tabs-text-6" role="tabpanel" aria-labelledby="tabs-text-6-tab">
                                        @include('back.configuration.sections.popup', ['popup' => isset($datarender[4]['popup']) ? $datarender[4]['popup'] : ''])
                                </div>

                                <div class="tab-pane fade" id="tabs-text-7" role="tabpanel" aria-labelledby="tabs-text-7-tab">
    @include('back.configuration.sections.rrss', ['rrss' => isset($datarender[3]['rrss']) ? $datarender[3]['rrss'] : ''])
                                </div>

                                <div class="tab-pane fade" id="tabs-text-5" role="tabpanel" aria-labelledby="tabs-text-5-tab">
    @include('back.configuration.sections.contact', ['contact' => isset($datarender[10]['contact']) ? $datarender[10]['contact'] : '', 'offices' => $offices])
                                </div>

                                <div class="tab-pane fade active in" id="tabs-text-8" role="tabpanel" aria-labelledby="tabs-text-8-tab">
    @include('back.configuration.sections.home', ['home' => isset($datarender[11]['home']) ? $datarender[11]['home'] : ''])
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

        Configuration.editHTMLAboutus();
        Configuration.editHTMLContact();
        Configuration.editHTMLPopup();
       
        Configuration.slideAdd();
        Configuration.imagesUpSlide(img);
        Configuration.saveSlide();
        Configuration.selectSpecialty();

        Configuration.queryAdd();
        Configuration.imagesUpQuery(img);
        Configuration.saveQuery();

        Configuration.savePagesDescription();
        
        Configuration.saveContact();

        Configuration.saveAboutUs();

        Configuration.savePopup();

        Configuration.saveRRSS();

        Configuration.addEmailContact();

        Configuration.addPdf();

        Configuration.minTrPolitica();

        Configuration.saveSpecialties();
	});

</script>
@endsection