@extends('front.iopa')

@section('content')
<section class="section-medicos">
    <div class="container wow fadeIn" data-wow-delay=".1s">
      <div class="inner-section text-center">
        <h3 class="inner-title">
          Nuestros Médicos
        </h3>
        <p>
          Consequat posuere viverra fringilla volutpat parturient sociosqu
          tincidunt potenti, quis gravida Semper.
        </p>
      </div>

      <div class="row row-filters">
          <div class="col-md-12">
              <div align="center">
                  <button class="btn btn-theme02 filter-all border filter-button" data-filter="all"><div class="btn-sucursal">Ver todos</div>Nuestros médicos</button>
                  <button class="btn btn-theme02 border filter-button" data-filter="providencia"><div class="btn-sucursal">Tus médicos en</div> Providencia</button>
                  <button class="btn btn-theme02 border filter-button" data-filter="florida"><div class="btn-sucursal">Tus médicos en</div>La Florida</button>
                  <button class="btn btn-theme02 border filter-button" data-filter="centro"><div class="btn-sucursal">Tus médicos en</div>Santiago Centro</button>
                  <button class="btn btn-theme02 border filter-button" data-filter="buin"><div class="btn-sucursal">Tus médicos en</div>Buin</button>
                  <button class="btn btn-theme02 border filter-button" data-filter="maipu"><div class="btn-sucursal">Tus médicos en</div>Maipú </button>
              </div>
          </div>
      </div>

      <div class="row row-medicos-mobile">
        <div class="col-xs-12">
            <ul class="media-list mobile-medic-list">
                <li class="media filter providencia">
                  <div class="media-left">
                    <a href="javascript:void(0);">
                      <img class="media-object" src="./assets/img/medicos/happydoctor.jpg" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Angel Molina</h4>
                    <p class="media-description">
                      <a class="show-details" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Ver detalles
                      </a>
                    </p>
                  </div>
                  <div class="collapse doc-details" id="collapseExample">
                    <div class="well">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias ea officiis blanditiis eos dolorem hic. Inventore doloribus obcaecati minima quasi quisquam similique dignissimos consequatur deleniti, quibusdam, nam dolorem tempora exercitationem?
                        <div class="mt-20"></div>
                        <a href="#" class="btn btn-theme04">Reserva tu hora</a>
                    </div>
                  </div>
                </li>
                <li class="media filter buin florida">
                  <div class="media-left">
                    <a href="javascript:void(0);">
                      <img class="media-object" src="./assets/img/medicos/happydoctor.jpg" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Angel Molina</h4>
                    <p class="media-description">
                      <a class="show-details" role="button" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
                        Ver detalles
                      </a>
                    </p>
                  </div>
                  <div class="collapse doc-details" id="collapseExample2">
                    <div class="well">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias ea officiis blanditiis eos dolorem hic. Inventore doloribus obcaecati minima quasi quisquam similique dignissimos consequatur deleniti, quibusdam, nam dolorem tempora exercitationem?
                        <div class="mt-20"></div>
                        <a href="#" class="btn btn-theme04">Reserva tu hora</a>
                    </div>
                  </div>
                </li>
                <li class="media filter providencia centro">
                  <div class="media-left">
                    <a href="javascript:void(0);">
                      <img class="media-object" src="./assets/img/medicos/happydoctor.jpg" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Angel Molina</h4>
                    <p class="media-description">
                      <a class="show-details" role="button" data-toggle="collapse" href="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3">
                        Ver detalles
                      </a>
                    </p>
                  </div>
                  <div class="collapse doc-details" id="collapseExample3">
                    <div class="well">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias ea officiis blanditiis eos dolorem hic. Inventore doloribus obcaecati minima quasi quisquam similique dignissimos consequatur deleniti, quibusdam, nam dolorem tempora exercitationem?
                      <div class="mt-20"></div>
                      <a href="#" class="btn btn-theme04">Reserva tu hora</a>
                    </div>
                  </div>
                </li>
                <li class="media filter florida">
                  <div class="media-left">
                    <a href="javascript:void(0);">
                      <img class="media-object" src="./assets/img/medicos/happydoctor.jpg" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Angel Molina</h4>
                    <p class="media-description">
                      <a class="show-details" role="button" data-toggle="collapse" href="#collapseExample4" aria-expanded="false" aria-controls="collapseExample4">
                        Ver detalles
                      </a>
                    </p>
                  </div>
                  <div class="collapse doc-details" id="collapseExample4">
                    <div class="well">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias ea officiis blanditiis eos dolorem hic. Inventore doloribus obcaecati minima quasi quisquam similique dignissimos consequatur deleniti, quibusdam, nam dolorem tempora exercitationem?
                        <div class="mt-20"></div>
                        <a href="#" class="btn btn-theme04">Reserva tu hora</a>
                    </div>
                  </div>
                </li>
                <li class="media filter maipu providencia">
                  <div class="media-left">
                    <a href="javascript:void(0);">
                      <img class="media-object" src="./assets/img/medicos/happydoctor.jpg" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Angel Molina</h4>
                    <p class="media-description">
                      <a class="show-details" role="button" data-toggle="collapse" href="#collapseExample5" aria-expanded="false" aria-controls="collapseExample5">
                        Ver detalles
                      </a>
                    </p>
                  </div>
                  <div class="collapse doc-details" id="collapseExample5">
                    <div class="well">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias ea officiis blanditiis eos dolorem hic. Inventore doloribus obcaecati minima quasi quisquam similique dignissimos consequatur deleniti, quibusdam, nam dolorem tempora exercitationem?
                        <div class="mt-20"></div>
                        <a href="#" class="btn btn-theme04">Reserva tu hora</a>
                    </div>
                  </div>
                </li>
                <li class="media filter centro">
                  <div class="media-left">
                    <a href="javascript:void(0);">
                      <img class="media-object" src="./assets/img/medicos/happydoctor.jpg" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Angel Molina</h4>
                    <p class="media-description">
                      <a class="show-details" role="button" data-toggle="collapse" href="#collapseExample6" aria-expanded="false" aria-controls="collapseExample6">
                        Ver detalles
                      </a>
                    </p>
                  </div>
                  <div class="collapse doc-details" id="collapseExample6">
                    <div class="well">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias ea officiis blanditiis eos dolorem hic. Inventore doloribus obcaecati minima quasi quisquam similique dignissimos consequatur deleniti, quibusdam, nam dolorem tempora exercitationem?
                        <div class="mt-20"></div>
                        <a href="#" class="btn btn-theme04">Reserva tu hora</a>
                    </div>
                  </div>
                </li>
            </ul>
        </div>

      </div>

      <div class="row row-medicos row-rotating-cards" id="team">
        <!-- Team member -->
        <div class="col-xs-12 col-sm-4 col-md-3 filter providencia">
          <div
            class="image-flip"
            ontouchstart="this.classList.toggle('click');"
          >
            <div class="mainflip">
              <div class="frontside">
                <div class="card">
                  <div class="card-body text-center">
                    <p>
                      <img
                        class=" img-fluid "
                        src="./assets/img/medicos/happydoctor.jpg"
                        alt="card image"
                      />
                    </p>
                    <h4 class="card-title">Angel Molina</h4>
                    <p class="card-subtitle">Cirujano</p>
                    <p class="card-text">
                      Es un hecho establecido hace demasiado tiempo que un
                      lector se distraerá con el contenido.
                    </p>
                  </div>
                </div>
              </div>
              <div class="backside">
                <div class="card">
                  <div class="card-body text-center mt-4">
                    <h4 class="card-title">Angel Molina</h4>
                    <p class="card-subtitle">Cirujano</p>
                    <p class="card-text">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore
                      magna aliqua. Ut enim ad minim veniam, quis nostrud
                      exercitation ullamco laboris nisi ut aliquip ex ea
                      commodo consequat.
                    </p>
                    <p>
                      <a href="#!" class="btn btn-theme04"
                        >RESERVA TU HORA</a
                      >
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ./Team member -->
        <!-- Team member -->
        <div class="col-xs-12 col-sm-4 col-md-3 filter florida centro">
          <div
            class="image-flip"
            ontouchstart="this.classList.toggle('click');"
          >
            <div class="mainflip">
              <div class="frontside">
                <div class="card">
                  <div class="card-body text-center">
                    <p>
                      <img
                        class=" img-fluid"
                        src="./assets/img/medicos/happydoctor.jpg"
                        alt="card image"
                      />
                    </p>
                    <h4 class="card-title">Angel Molina</h4>
                    <p class="card-subtitle">Cirujano</p>
                    <p class="card-text">
                      Es un hecho establecido hace demasiado tiempo que un
                      lector se distraerá con el contenido.
                    </p>
                  </div>
                </div>
              </div>
              <div class="backside">
                <div class="card">
                  <div class="card-body text-center mt-4">
                    <h4 class="card-title">Angel Molina</h4>
                    <p class="card-subtitle">Cirujano</p>
                    <p class="card-text">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore
                      magna aliqua. Ut enim ad minim veniam, quis nostrud
                      exercitation ullamco laboris nisi ut aliquip ex ea
                      commodo consequat.
                    </p>
                    <p>
                      <a href="#!" class="btn btn-theme04"
                        >RESERVA TU HORA</a
                      >
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ./Team member -->
        <!-- Team member -->
        <div class="col-xs-12 col-sm-4 col-md-3 filter centro">
          <div
            class="image-flip"
            ontouchstart="this.classList.toggle('click');"
          >
            <div class="mainflip">
              <div class="frontside">
                <div class="card">
                  <div class="card-body text-center">
                    <p>
                      <img
                        class=" img-fluid"
                        src="./assets/img/medicos/happydoctor.jpg"
                        alt="card image"
                      />
                    </p>
                    <h4 class="card-title">Angel Molina</h4>
                    <p class="card-subtitle">Cirujano</p>
                    <p class="card-text">
                      Es un hecho establecido hace demasiado tiempo que un
                      lector se distraerá con el contenido.
                    </p>
                  </div>
                </div>
              </div>
              <div class="backside">
                <div class="card">
                  <div class="card-body text-center mt-4">
                    <h4 class="card-title">Angela Molina</h4>
                    <p class="card-subtitle">Cirujano</p>
                    <p class="card-text">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore
                      magna aliqua. Ut enim ad minim veniam, quis nostrud
                      exercitation ullamco laboris nisi ut aliquip ex ea
                      commodo consequat.
                    </p>
                    <p>
                      <a href="#!" class="btn btn-theme04"
                        >RESERVA TU HORA</a
                      >
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ./Team member -->

        <!-- Team member -->
        <div class="col-xs-12 col-sm-4 col-md-3 filter providencia">
          <div
            class="image-flip"
            ontouchstart="this.classList.toggle('click');"
          >
            <div class="mainflip">
              <div class="frontside">
                <div class="card">
                  <div class="card-body text-center">
                    <p>
                      <img
                        class=" img-fluid"
                        src="./assets/img/medicos/happydoctor.jpg"
                        alt="card image"
                      />
                    </p>
                    <h4 class="card-title">Angel Molina</h4>
                    <p class="card-subtitle">Cirujano</p>
                    <p class="card-text">
                      Es un hecho establecido hace demasiado tiempo que un
                      lector se distraerá con el contenido.
                    </p>
                  </div>
                </div>
              </div>
              <div class="backside">
                <div class="card">
                  <div class="card-body text-center mt-4">
                    <h4 class="card-title">Angel Molina</h4>
                    <p class="card-subtitle">Cirujano</p>
                    <p class="card-text">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore
                      magna aliqua. Ut enim ad minim veniam, quis nostrud
                      exercitation ullamco laboris nisi ut aliquip ex ea
                      commodo consequat.
                    </p>
                    <p>
                      <a href="#!" class="btn btn-theme04"
                        >RESERVA TU HORA</a
                      >
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ./Team member -->

         <!-- Team member -->
         <div class="col-xs-12 col-sm-4 col-md-3 filter maipu">
          <div
            class="image-flip"
            ontouchstart="this.classList.toggle('click');"
          >
            <div class="mainflip">
              <div class="frontside">
                <div class="card">
                  <div class="card-body text-center">
                    <p>
                      <img
                        class=" img-fluid"
                        src="./assets/img/medicos/happydoctor.jpg"
                        alt="card image"
                      />
                    </p>
                    <h4 class="card-title">Angel Molina</h4>
                    <p class="card-subtitle">Cirujano</p>
                    <p class="card-text">
                      Es un hecho establecido hace demasiado tiempo que un
                      lector se distraerá con el contenido.
                    </p>
                  </div>
                </div>
              </div>
              <div class="backside">
                <div class="card">
                  <div class="card-body text-center mt-4">
                    <h4 class="card-title">Angel Molina</h4>
                    <p class="card-subtitle">Cirujano</p>
                    <p class="card-text">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore
                      magna aliqua. Ut enim ad minim veniam, quis nostrud
                      exercitation ullamco laboris nisi ut aliquip ex ea
                      commodo consequat.
                    </p>
                    <p>
                      <a href="#!" class="btn btn-theme04"
                        >RESERVA TU HORA</a
                      >
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ./Team member -->

         <!-- Team member -->
         <div class="col-xs-12 col-sm-4 col-md-3 filter florida">
          <div
            class="image-flip"
            ontouchstart="this.classList.toggle('click');"
          >
            <div class="mainflip">
              <div class="frontside">
                <div class="card">
                  <div class="card-body text-center">
                    <p>
                      <img
                        class=" img-fluid"
                        src="./assets/img/medicos/happydoctor.jpg"
                        alt="card image"
                      />
                    </p>
                    <h4 class="card-title">Angel Molina</h4>
                    <p class="card-subtitle">Cirujano</p>
                    <p class="card-text">
                      Es un hecho establecido hace demasiado tiempo que un
                      lector se distraerá con el contenido.
                    </p>
                  </div>
                </div>
              </div>
              <div class="backside">
                <div class="card">
                  <div class="card-body text-center mt-4">
                    <h4 class="card-title">Angel Molina</h4>
                    <p class="card-subtitle">Cirujano</p>
                    <p class="card-text">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore
                      magna aliqua. Ut enim ad minim veniam, quis nostrud
                      exercitation ullamco laboris nisi ut aliquip ex ea
                      commodo consequat.
                    </p>
                    <p>
                      <a href="#!" class="btn btn-theme04"
                        >RESERVA TU HORA</a
                      >
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ./Team member -->

         <!-- Team member -->
         <div class="col-xs-12 col-sm-4 col-md-3 filter buin">
          <div
            class="image-flip"
            ontouchstart="this.classList.toggle('click');"
          >
            <div class="mainflip">
              <div class="frontside">
                <div class="card">
                  <div class="card-body text-center">
                    <p>
                      <img
                        class=" img-fluid"
                        src="./assets/img/medicos/happydoctor.jpg"
                        alt="card image"
                      />
                    </p>
                    <h4 class="card-title">Angel Molina</h4>
                    <p class="card-subtitle">Cirujano</p>
                    <p class="card-text">
                      Es un hecho establecido hace demasiado tiempo que un
                      lector se distraerá con el contenido.
                    </p>
                  </div>
                </div>
              </div>
              <div class="backside">
                <div class="card">
                  <div class="card-body text-center mt-4">
                    <h4 class="card-title">Angel Molina</h4>
                    <p class="card-subtitle">Cirujano</p>
                    <p class="card-text">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore
                      magna aliqua. Ut enim ad minim veniam, quis nostrud
                      exercitation ullamco laboris nisi ut aliquip ex ea
                      commodo consequat.
                    </p>
                    <p>
                      <a href="#!" class="btn btn-theme04"
                        >RESERVA TU HORA</a
                      >
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ./Team member -->

         <!-- Team member -->
         <div class="col-xs-12 col-sm-4 col-md-3 filter centro">
          <div
            class="image-flip"
            ontouchstart="this.classList.toggle('click');"
          >
            <div class="mainflip">
              <div class="frontside">
                <div class="card">
                  <div class="card-body text-center">
                    <p>
                      <img
                        class=" img-fluid"
                        src="./assets/img/medicos/happydoctor.jpg"
                        alt="card image"
                      />
                    </p>
                    <h4 class="card-title">Angel Molina</h4>
                    <p class="card-subtitle">Cirujano</p>
                    <p class="card-text">
                      Es un hecho establecido hace demasiado tiempo que un
                      lector se distraerá con el contenido.
                    </p>
                  </div>
                </div>
              </div>
              <div class="backside">
                <div class="card">
                  <div class="card-body text-center mt-4">
                    <h4 class="card-title">Angela Molina</h4>
                    <p class="card-subtitle">Cirujano</p>
                    <p class="card-text">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore
                      magna aliqua. Ut enim ad minim veniam, quis nostrud
                      exercitation ullamco laboris nisi ut aliquip ex ea
                      commodo consequat.
                    </p>
                    <p>
                      <a href="#!" class="btn btn-theme04"
                        >RESERVA TU HORA</a
                      >
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ./Team member -->

         <!-- Team member -->
         <div class="col-xs-12 col-sm-4 col-md-3 filter providencia">
          <div
            class="image-flip"
            ontouchstart="this.classList.toggle('click');"
          >
            <div class="mainflip">
              <div class="frontside">
                <div class="card">
                  <div class="card-body text-center">
                    <p>
                      <img
                        class=" img-fluid"
                        src="./assets/img/medicos/happydoctor.jpg"
                        alt="card image"
                      />
                    </p>
                    <h4 class="card-title">Angel Molina</h4>
                    <p class="card-subtitle">Cirujano</p>
                    <p class="card-text">
                      Es un hecho establecido hace demasiado tiempo que un
                      lector se distraerá con el contenido.
                    </p>
                  </div>
                </div>
              </div>
              <div class="backside">
                <div class="card">
                  <div class="card-body text-center mt-4">
                    <h4 class="card-title">Angel Molina</h4>
                    <p class="card-subtitle">Cirujano</p>
                    <p class="card-text">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore
                      magna aliqua. Ut enim ad minim veniam, quis nostrud
                      exercitation ullamco laboris nisi ut aliquip ex ea
                      commodo consequat.
                    </p>
                    <p>
                      <a href="#!" class="btn btn-theme04"
                        >RESERVA TU HORA</a
                      >
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ./Team member -->

         <!-- Team member -->
         <div class="col-xs-12 col-sm-4 col-md-3 filter centro">
          <div
            class="image-flip"
            ontouchstart="this.classList.toggle('click');"
          >
            <div class="mainflip">
              <div class="frontside">
                <div class="card">
                  <div class="card-body text-center">
                    <p>
                      <img
                        class=" img-fluid"
                        src="./assets/img/medicos/happydoctor.jpg"
                        alt="card image"
                      />
                    </p>
                    <h4 class="card-title">Angel Molina</h4>
                    <p class="card-subtitle">Cirujano</p>
                    <p class="card-text">
                      Es un hecho establecido hace demasiado tiempo que un
                      lector se distraerá con el contenido.
                    </p>
                  </div>
                </div>
              </div>
              <div class="backside">
                <div class="card">
                  <div class="card-body text-center mt-4">
                    <h4 class="card-title">Angel Molina</h4>
                    <p class="card-subtitle">Cirujano</p>
                    <p class="card-text">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore
                      magna aliqua. Ut enim ad minim veniam, quis nostrud
                      exercitation ullamco laboris nisi ut aliquip ex ea
                      commodo consequat.
                    </p>
                    <p>
                      <a href="#!" class="btn btn-theme04"
                        >RESERVA TU HORA</a
                      >
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ./Team member -->

         <!-- Team member -->
         <div class="col-xs-12 col-sm-4 col-md-3 filter buin">
          <div
            class="image-flip"
            ontouchstart="this.classList.toggle('click');"
          >
            <div class="mainflip">
              <div class="frontside">
                <div class="card">
                  <div class="card-body text-center">
                    <p>
                      <img
                        class=" img-fluid"
                        src="./assets/img/medicos/happydoctor.jpg"
                        alt="card image"
                      />
                    </p>
                    <h4 class="card-title">Angel Molina</h4>
                    <p class="card-subtitle">Cirujano</p>
                    <p class="card-text">
                      Es un hecho establecido hace demasiado tiempo que un
                      lector se distraerá con el contenido.
                    </p>
                  </div>
                </div>
              </div>
              <div class="backside">
                <div class="card">
                  <div class="card-body text-center mt-4">
                    <h4 class="card-title">Angel Molina</h4>
                    <p class="card-subtitle">Cirujano</p>
                    <p class="card-text">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore
                      magna aliqua. Ut enim ad minim veniam, quis nostrud
                      exercitation ullamco laboris nisi ut aliquip ex ea
                      commodo consequat.
                    </p>
                    <p>
                      <a href="#!" class="btn btn-theme04"
                        >RESERVA TU HORA</a
                      >
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ./Team member -->





        
      </div>
      <!-- end -->
    </div>
  </section>
@endsection