@extends('front.iopa') 
@section('content')

<section class="section-aranceles" id="top">
    <!--<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
        <div class="list-aranceles-sticky">
            <div class="list-group list-aranceles mt-40 mb-10">
        
              @if($agreement[0]['fonasa']['status'] == 'ACTIVE')
                <a href="#fonasa" class="list-group-item smooth">FONASA</a>
              @endif
    
              @if($agreement[1]['isapres']['status'] == 'ACTIVE')
                <a href="#isapres" class="list-group-item smooth">ISAPRES</a>
              @endif
    
              @if($agreement[2]['convenios']['status'] == 'ACTIVE')
                <a href="#convenios" class="list-group-item smooth">CONVENIOS EMPRESA</a>
              @endif
    
              @if($agreement[3]['promociones']['status'] == 'ACTIVE')
                <a href="#promociones" class="list-group-item smooth">PROMOCIONES</a>
              @endif
    
              @if($agreement[4]['aranceles']['status'] == 'ACTIVE')
                <a href="#aranceles" class="list-group-item smooth">ARANCELES</a>
              @endif
    
              @if($agreement[5]['medios-pagos']['status'] == 'ACTIVE')
                <a href="#medios" class="list-group-item smooth">MEDIOS DE PAGO</a>
              @endif
            </div>
          </div>
      
      </nav>-->
      
  <div class="container wow fadeIn" data-wow-delay=".1s">
     
    <div class="inner-section text-center">
      <h3 class="inner-title">
        Aranceles y Convenios
      </h3>
    </div>

    <div class="row row-filters">
      <div class="col-md-12">
          <div align="center">    
      
          @if($agreement[0]['fonasa']['status'] == 'ACTIVE')
          <button class="btn btn-theme02 border filter-button" id="fonasa" data-filter="fonasa">FONASA</button>
          @endif

          @if($agreement[1]['isapres']['status'] == 'ACTIVE')
          <button class="btn btn-theme02 border filter-button" id="isapres" data-filter="isapres">ISAPRES</button>
        @endif

        @if($agreement[2]['convenios']['status'] == 'ACTIVE')
        <button class="btn btn-theme02 border filter-button" id="convenios" data-filter="isapres">CONVENIOS EMPRESA</button>
        @endif

        @if($agreement[3]['promociones']['status'] == 'ACTIVE')
        <button class="btn btn-theme02 border filter-button" id="promociones" data-filter="isapres">PROMOCIONES</button>
        @endif

        @if($agreement[4]['aranceles']['status'] == 'ACTIVE')
        <button class="btn btn-theme02 border filter-button" id="aranceles" data-filter="isapres">ARANCELES</button>
        @endif

        @if($agreement[5]['medios-pagos']['status'] == 'ACTIVE')
        <button class="btn btn-theme02 border filter-button" id="medios" data-filter="isapres">MEDIOS DE PAGO</button>

        @endif

          </div>
      </div>
  </div>

    <div class="row row-aranceles mt-40">
       
      <div class="col-md-12">
        <div class="ui-blog-body">
          <div class="ui-blog-content mt-10 mb-10">

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