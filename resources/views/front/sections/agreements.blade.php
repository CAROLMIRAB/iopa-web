@extends('front.iopa') 
@section('content')

<section class="section-aranceles" id="top">
      
  <div class="container wow fadeIn" data-wow-delay=".1s">
     
    <div class="inner-section text-center">
      <h3 class="inner-title">
        Aranceles y Convenios
      </h3>
    </div>

    <div class="row row-filters">
      <div class="col-md-12">
          <div align="center" class="nav" role="tablist">    
      
          @if($agreement[0]['fonasa']['status'] == 'ACTIVE')
          <a class="btn btn-theme02 border filter-button nav-item nav-link active" id="fonasa" data-filter="fonasa" data-toggle="tab" href="#nav-fonasa" role="tab" aria-controls="nav-fonasa" aria-selected="true">FONASA</a>
          @endif

          @if($agreement[1]['isapres']['status'] == 'ACTIVE')
          <a class="btn btn-theme02 border filter-button nav-item nav-link" id="nav-isapre-tab" data-filter="isapres" data-toggle="tab" href="#nav-isapre" role="tab" aria-controls="nav-isapre" aria-selected="true">ISAPRES</a>
        @endif

        @if($agreement[2]['convenios']['status'] == 'ACTIVE')
        <a class="btn btn-theme02 border filter-button nav-item nav-link" id="nav-convenio-tab" data-filter="isapres" data-toggle="tab" href="#nav-convenio" role="tab" aria-controls="nav-convenio" aria-selected="true">CONVENIOS EMPRESA</a>
        @endif

        @if($agreement[3]['promociones']['status'] == 'ACTIVE')
        <a class="btn btn-theme02 border filter-button nav-item nav-link" id="nav-promos-tab" data-filter="isapres" data-toggle="tab" href="#nav-promos" role="tab" aria-controls="nav-promos" aria-selected="true">PROMOCIONES</a>
        @endif

        @if($agreement[4]['aranceles']['status'] == 'ACTIVE')
        <a class="btn btn-theme02 border filter-button nav-item nav-link" id="nav-arancel-tab" data-filter="isapres" data-toggle="tab" href="#nav-arancel" role="tab" aria-controls="nav-arancel" aria-selected="true">ARANCELES</a>
        @endif

        @if($agreement[5]['medios-pagos']['status'] == 'ACTIVE')
        <a class="btn btn-theme02 border filter-button nav-item nav-link" id="nav-medios-tab" data-filter="isapres" data-toggle="tab" href="#nav-medios" role="tab" aria-controls="nav-medios" aria-selected="true">MEDIOS DE PAGO</a>

        @endif

          </div>
      </div>
  </div>

    <div class="row row-aranceles mt-40">
       
      <div class="col-md-12">
        <div class="ui-blog-body">
          <div class="ui-blog-content mt-10 mb-10 tab-content">

            @if($agreement[0]['fonasa']['status'] == 'ACTIVE')
  @include('front.sections.agreesections.fonasa', ['fonasa' => isset($agreement[0]['fonasa'])
            ? $agreement[0]['fonasa'] : '']) @endif
            
            @if($agreement[1]['isapres']['status'] == 'ACTIVE')
  @include('front.sections.agreesections.isapre',
            ['isapre' => isset($agreement[1]['isapres']) ? $agreement[1]['isapres'] : '']) @endif 
            
            @if($agreement[2]['convenios']['status']== 'ACTIVE')
  @include('front.sections.agreesections.convenios', ['convenio' => isset($agreement[2]['convenios']) 
            ? $agreement[2]['convenios'] : '' ]) @endif 
            
            @if($agreement[3]['promociones']['status'] == 'ACTIVE')
  @include('front.sections.agreesections.promociones',
            ['promo' => isset($agreement[3]['promociones']) ? $agreement[3]['promociones'] : '' ]) @endif

            @if($agreement[4]['aranceles']['status'] == 'ACTIVE')
  @include('front.sections.agreesections.aranceles',
            ['arancel' => isset($agreement[4]['aranceles']) ? $agreement[4]['aranceles'] : '' ]) @endif

            @if($agreement[5]['medios-pagos']['status'] == 'ACTIVE')
  @include('front.sections.agreesections.pago',
            ['pago' => isset($agreement[5]['medios-pagos']) ? $agreement[5]['medios-pagos'] : '' ]) @endif

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection