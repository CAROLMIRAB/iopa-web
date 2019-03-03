@extends('front.iopa')

@section('content')
 <section class="section-medicos">
      <div class="container wow fadeIn" data-wow-delay=".1s">
        <div class="inner-section text-center">
          <h3 class="inner-title">
            Cirugías
          </h3>
          <p>
            Consequat posuere viverra fringilla volutpat parturient sociosqu
            tincidunt potenti, quis gravida Semper.
          </p>
        </div>

        <div class="row row-filters">
            <div class="col-md-12">
                <div align="center">
                    <button class="btn btn-theme02 filter-all border filter-button" data-filter="all"><div class="btn-sucursal">Ver todas</div>Nuestras cirugías</button>
                    <button class="btn btn-theme02 border filter-button" data-filter="providencia"><div class="btn-sucursal">Tus cirugías en</div> Providencia</button>
                    <button class="btn btn-theme02 border filter-button" data-filter="florida"><div class="btn-sucursal">Tus cirugías en</div>La Florida</button>
                    <button class="btn btn-theme02 border filter-button" data-filter="centro"><div class="btn-sucursal">Tus cirugías en</div>Santiago Centro</button>
                    <button class="btn btn-theme02 border filter-button" data-filter="buin"><div class="btn-sucursal">Tus cirugías en</div>Buin</button>
                    <button class="btn btn-theme02 border filter-button" data-filter="maipu"><div class="btn-sucursal">Tus cirugías en</div>Maipú </button>
                </div>
            </div>
        </div>


        <div class="row row-especialidades">
          <div class="col-sm-3 filter florida buin">
            <div class="item-especialidad">
              <a href="/descripcion.html">
                <img src="./assets/img/cirugias/caterata.jpg" alt="Catarata">
                <h5>Catarata</h5>
                <span class="ui-go">Ver más</span>
              </a>
            </div>
          </div>
          <div class="col-sm-3 filter providencia maipu">
            <div class="item-especialidad">
              <a href="/descripcion.html">
                <img src="./assets/img/cirugias/glaucoma.jpg" alt="">
                <h5>Glaucoma</h5>
                <span class="ui-go">Ver más</span>
              </a>
            </div>
          </div>
          <div class="col-sm-3 filter maipu buin">
            <div class="item-especialidad">
              <a href="/descripcion.html">
                <img src="./assets/img/cirugias/lasik.jpg" alt="">
                <h5>Lasik</h5>
                <span class="ui-go">Ver más</span>
              </a>
            </div>
          </div>
          <div class="col-sm-3 filter florida centro">
            <div class="item-especialidad">
              <a href="/descripcion.html">
                <img src="./assets/img/cirugias/retina.jpg" alt="">
                <h5>Retina</h5>
                <span class="ui-go">Ver más</span>
              </a>
            </div>
          </div>


        </div>

      </div>
    </section>
@endsection