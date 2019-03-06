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
            <article class="item-aranceles" id="fonasa">
              <div class="item-aranceles-content">
                <div class="row">
                  <div class="col-md-6">
                    <h2>FONASA</h2>

                    <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dolor sit amet consectetur adipiscing
                      elit ut aliquam purus. Sociis natoque penatibus et magnis dis parturient montes nascetur. Diam vel
                      quam elementum pulvinar etiam non.</p>

                    <h3>Bono PAD</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae voluptas quibusdam eos tempora minima
                      repellat libero fugit ipsam voluptatibus necessitatibus dolorum inventore hic commodi eligendi, odio
                      perspiciatis quod cupiditate! Iusto.</p>

                    <h3>Préstamo FONASA</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae voluptas quibusdam eos tempora minima
                      repellat libero fugit ipsam voluptatibus necessitatibus dolorum inventore hic commodi eligendi, odio
                      perspiciatis quod cupiditate! Iusto.</p>

                  </div>
                  <div class="col-md-6">
                    <img src="{{ asset('img/aranceles/logo-fonasa600x250.jpg') }}" class="img-responsive center-block" alt="">
                  </div>
                </div>
              </div>
              <div class="text-right mt-10 mb-10"><a href="#top" class="btn btn-primary btn-xs btn-gotop smooth">Ir arriba <i class="fa fa-arrow-up"></i></a></div>
              <div class="divider"></div>
            </article>

            <article class="item-aranceles" id="isapres">
              <div class="item-aranceles-content">

                <div class="row mt-20 mb-20">
                  <div class="col-md-12">
                    <h2>ISAPRES</h2>

                    <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dolor sit amet consectetur adipiscing
                      elit ut aliquam purus. Sociis natoque penatibus et magnis dis parturient montes nascetur. Diam vel
                      quam elementum pulvinar etiam non.</p>

                    <h3>Penatibus et magnis</h3>
                    <p> Sociis natoque penatibus et magnis dis parturient montes nascetur.</p>

                    <div class="table-responsive">
                      <table class="table table-hover ui-table">
                        <thead>
                          <tr>
                            <th>ISAPRE</th>
                            <th>GES</th>
                            <th>CUENTA CONOCIDA</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><img src="{{ asset('img/aranceles/logo-isapres.jpg') }}" class="img-responsive center-block"
                                alt=""></td>
                            <td>
                              <ul>
                                <li>Estrabismo</li>
                                <li>Desprendimiento de retina</li>
                                <li>Etc</li>
                              </ul>
                            </td>
                            <td>
                              <h4>Nombre de convenio</h4>
                              <ul>
                                <li>Catarata</li>
                                <li>Etc</li>
                              </ul>
                            </td>
                          </tr>
                          <tr>
                            <td><img src="{{ asset('img/aranceles/logo-isapres.jpg') }}" class="img-responsive center-block" alt=""></td>
                            <td>
                              <ul>
                                <li>Desprendimiento de retina</li>
                                <li>Retinopatía diabética</li>
                                <li>Etc</li>
                              </ul>
                            </td>
                            <td>
                              <h4>Nombre de convenio</h4>
                              <ul>
                                <li>Lasik</li>
                                <li>Etc</li>
                              </ul>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-right mt-10 mb-10"><a href="#top" class="btn btn-primary btn-xs btn-gotop smooth">Ir arriba <i class="fa fa-arrow-up"></i></a></div>
              <div class="divider"></div>
            </article>

            <article class="item-aranceles" id="convenios">
              <div class="item-aranceles-content">
                <div class="row">
                  <div class="col-md-12">
                    <h2>CONVENIOS EMPRESA</h2>

                    <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dolor sit amet consectetur adipiscing
                      elit ut aliquam purus. Sociis natoque penatibus et magnis dis parturient montes nascetur. Diam vel
                      quam elementum pulvinar etiam non.</p>

                  </div>
                  <div class="col-md-12">
                    <ul class="list-convenios">
                      <li class="list-convenios-item">
                        <img src="{{ asset('img/partners/partner01.jpg') }}" />
                      </li>
                      <li class="list-convenios-item">
                        <img src="{{ asset('img/partners/partner02.jpg') }}" />
                      </li>
                      <li class="list-convenios-item">
                        <img src="{{ asset('img/partners/partner03.jpg') }}" />
                      </li>
                      <li class="list-convenios-item">
                        <img src="{{ asset('img/partners/partner04.jpg') }}" />
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="text-right mt-10 mb-10"><a href="#top" class="btn btn-primary btn-xs btn-gotop smooth">Ir arriba <i class="fa fa-arrow-up"></i></a></div>
              <div class="divider"></div>
            </article>

            <article class="item-aranceles" id="promociones">
              <div class="item-aranceles-content">
                <div class="row">
                  <div class="col-md-12">
                    <h2>PROMOCIONES</h2>

                    <img src="{{ asset('img/aranceles/promocion.jpg') }}" class="img-responsive center-block mb-20" alt="">

                    <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dolor sit amet consectetur adipiscing
                      elit ut aliquam purus. Sociis natoque penatibus et magnis dis parturient montes nascetur. Diam vel
                      quam elementum pulvinar etiam non.</p>

                    <h3>Quae voluptas quibusdam</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae voluptas quibusdam eos tempora minima
                      repellat libero fugit ipsam voluptatibus necessitatibus dolorum inventore hic commodi eligendi, odio
                      perspiciatis quod cupiditate! Iusto.</p>

                  </div>
                </div>
              </div>
              <div class="text-right mt-10 mb-10"><a href="#top" class="btn btn-primary btn-xs btn-gotop smooth">Ir arriba <i class="fa fa-arrow-up"></i></a></div>
              <div class="divider"></div>
            </article>

            <article class="item-aranceles" id="aranceles">
              <div class="item-aranceles-content">
                <div class="row">
                  <div class="col-md-12">
                    <h2>ARANCELES</h2>

                    <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dolor sit amet consectetur adipiscing
                      elit ut aliquam purus. Sociis natoque penatibus et magnis dis parturient montes nascetur. Diam vel
                      quam elementum pulvinar etiam non.</p>



                    <div class="ui-download-box">
                      <a href="#!">
                                <i class="fa fa-download ico-download"></i>
                                <p class="title-download">DESCARGAR PDF</p>
                                <p class="details-download">Actualizado 12 Enero, 2019</p>
                            </a>
                    </div>

                  </div>
                </div>
              </div>
              <div class="text-right mt-10 mb-10"><a href="#top" class="btn btn-primary btn-xs btn-gotop smooth">Ir arriba <i class="fa fa-arrow-up"></i></a></div>
              <div class="divider"></div>
            </article>

            <article class="item-aranceles" id="medios">
              <div class="item-aranceles-content">
                <div class="row">
                  <div class="col-md-12">
                    <h2>MEDIOS DE PAGO</h2>

                    <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dolor sit amet consectetur adipiscing
                      elit ut aliquam purus. Sociis natoque penatibus et magnis dis parturient montes nascetur. Diam vel
                      quam elementum pulvinar etiam non.</p>

                  </div>
                  <div class="col-md-12">
                    <ul class="list-medio-pago">
                      <li class="list-medio-item">
                        <img src="{{ asset('img/aranceles/payment-webpay.jpg') }}" />
                      </li>
                      <li class="list-medio-item">
                        <img src="{{ asset('img/aranceles/payment-servipag.jpg') }}" />
                      </li>
                      <li class="list-medio-item">
                        <img src="{{ asset("img/aranceles/payment-santander.jpg") }}" />
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="text-right mt-10 mb-10"><a href="#top" class="btn btn-primary btn-xs btn-gotop smooth">Ir arriba <i class="fa fa-arrow-up"></i></a></div>
              <div class="divider"></div>
            </article>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection