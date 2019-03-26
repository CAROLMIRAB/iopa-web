@extends('front.iopa') 
@section('content')
<section class="section-aranceles" id="top">
  <div class="container wow fadeIn" data-wow-delay=".1s">
    <div class="inner-section text-center">
      <h3 class="inner-title">
        Aranceles y Convenios
      </h3>
    </div>

    <div class="row row-aranceles mt-40">
      <div class="col-md-3 pt-20 list-aranceles-sticky">
        <div class="list-group list-aranceles mt-40 mb-10">
          {{ dd($agreement[0]['fonasa']) }}
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
      <div class="col-md-9">
        <div class="ui-blog-body">
          <div class="ui-blog-content mt-10 mb-10">

            @if($agreement[0]['fonasa']['status'] == 'ACTIVE')
  @include('front.sections.agreesections.fonasa', ['fonasa' => isset($agreement[0]['fonasa'])
            ? $agreement[0]['fonasa'] : '']) @endif
            
            @if($agreement[0]['isapres']['status'] == 'ACTIVE')
  @include('front.sections.agreesections.isapre',
            ['isapre' => isset($agreement[1]['isapres']) ? $agreement[1]['isapres'] : '']) @endif 
            
            @if($agreement[0]['convenios']['status']== 'ACTIVE')
  @include('front.sections.agreesections.convenios', ['convenio' => isset($agreement[2]['convenios']) 
            ? $agreement[2]['convenios'] : '' ]) @endif 
            
            @if($agreement[0]['promociones']['status'] == 'ACTIVE')
  @include('front.sections.agreesections.promociones',
            ['promo' => isset($agreement[3]['promociones']) ? $agreement[3]['promociones'] : '' ]) @endif

            @if($agreement[0]['aranceles']['status'] == 'ACTIVE')
  @include('front.sections.agreesections.aranceles',
            ['arancel' => isset($agreement[4]['aranceles']) ? $agreement[4]['aranceles'] : '' ]) @endif

            @if($agreement[0]['medios-pagos']['status'] == 'ACTIVE')
  @include('front.sections.agreesections.pago',
            ['pago' => isset($agreement[5]['medios-pagos']) ? $agreement[5]['medios-pagos'] : '' ]) @endif

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection