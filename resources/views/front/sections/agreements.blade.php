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
          <a href="#fonasa" class="list-group-item smooth">FONASA</a>
          <a href="#isapres" class="list-group-item smooth">ISAPRES</a>
          <a href="#convenios" class="list-group-item smooth">CONVENIOS EMPRESA</a>
          <a href="#promociones" class="list-group-item smooth">PROMOCIONES</a>
          <a href="#aranceles" class="list-group-item smooth">ARANCELES</a>
          <a href="#medios" class="list-group-item smooth">MEDIOS DE PAGO</a>
        </div>
      </div>
      <div class="col-md-9">
        <div class="ui-blog-body">
          <div class="ui-blog-content mt-10 mb-10">
            @include('front.sections.agreesections.fonasa', ['fonasa' => isset($agreement[0]['fonasa']) ? $agreement[0]['fonasa'] : ''])
            
            @include('front.sections.agreesections.isapre', ['isapre' => isset($agreement[1]['isapres']) ? $agreement[1]['isapres']
            : ''])
            @include('front.sections.agreesections.convenios', ['convenio' => isset($agreement[2]['convenios']) ? $agreement[2]['convenios']
            : '' ])
            @include('front.sections.agreesections.promociones', ['promo' => isset($agreement[3]['promociones']) ? $agreement[3]['promociones']
            : '' ])
            @include('front.sections.agreesections.aranceles', ['arancel' => isset($agreement[4]['aranceles']) ? $agreement[4]['aranceles']
            : '' ])
            @include('front.sections.agreesections.pago', ['pago' => isset($agreement[5]['medios-pagos']) ? $agreement[5]['medios-pagos']
            : '' ])

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection