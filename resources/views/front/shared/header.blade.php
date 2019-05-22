<div class="iopa-loader">
    <div class="self-building-square-spinner">
        <div class="square"></div>
        <div class="square"></div>
        <div class="square"></div>
        <div class="square clear"></div>
        <div class="square"></div>
        <div class="square"></div>
        <div class="square clear"></div>
        <div class="square"></div>
        <div class="square"></div>
    </div>
</div>

<header class="nav-header">

    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-top">
                    <a class="top-brand hidden-xs" href="{{ route('home') }}">
							<img src="{{ asset('img/logo-iopa220px.png') }}"  alt="Logo IOPA">
						</a>
                    <ul class="list-social">
                        @if(!is_null($config[3]['rrss']['content']['facebook']) && $config[3]['rrss']['content']['facebook'] != '')
                        <li>
                        <a href="{{ $config[3]['rrss']['content']['facebook'] }}" class="btn-social">
                                <img src="{{ asset('img/rrss/icon-facebook.png') }}"  alt="Facebook">
                            </a>
                        </li>
                        @endif
                        
                        @if(!is_null($config[3]['rrss']['content']['instagram']) &&$config[3]['rrss']['content']['instagram'] != '')
                        <li>
                        <a href="{{ $config[3]['rrss']['content']['instagram'] }}" class="btn-social">
									<img src="{{ asset('img/rrss/icon-instagram.png') }}" alt="Instagram">
                            </a> 
                        </li>
                        @endif
                        
                        @if(!is_null($config[3]['rrss']['content']['youtube']) && $config[3]['rrss']['content']['youtube'] != '')
                        <li>
                            <a href="{{ $config[3]['rrss']['content']['youtube'] }}" class="btn-social">
									<img src="{{ asset('img/rrss/icon-youtube.png') }}"  alt="Youtube">
                            </a> 
                        </li>
                        @endif
                       
                        @if(!is_null($config[3]['rrss']['content']['callcenter']) && $config[3]['rrss']['content']['callcenter'] != '')
                        <li class="visible-xs"><a href="#!" class="btn-social">
									<img src="{{ asset('img/rrss/icon-phone.png') }}" alt="Teléfono">
								</a> </li>
                        <li><a href="tel:+56933445672" class="call-link">
                             <img src="{{ asset('img/ico-support-04.png') }}"  alt="Support">
                        <span>{{ $config[3]['rrss']['content']['callcenter'] }}</span></a>
                        </li>
                        @endif

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--navbar-->
    <nav class="navbar navbar-default navbar-theme">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
                    aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
                <a class="navbar-brand visible-xs" href="#"><img src="{{ asset('img/logo-iopa220px.png') }}" alt="Logo IOPA"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Conócenos <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('aboutus.aboutus') }}">Sobre nosotros</a></li>
                            <li><a href="{{ route('aboutus.agreement') }}">Arancéles y Convenios</a></li>
                            <li><a href="{{ route('aboutus.query') }}">Consulta Médica</a></li>
                            <li><a href="{{ route('post.viewallservices') }}">Otros Servicios</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('doctor.viewalldoctors') }}">Médicos</a></li>
                    <li><a href="{{ route('specialty.viewallspecialties') }}">Especialidades</a></li>
                    <li><a href="{{ route('exam.viewallexams') }}">Exámenes</a></li>
                    <li><a href="{{ route('surgery.viewallsurgeries') }}">Cirugías</a></li>
                    <li><a href="{{ route('office.viewalloffices') }}">Sucursales</a></li>
                    <li><a href="{{ route('aboutus.contact') }}">Contacto</a></li>
                    <li><a class="cta-link --open-sys" href="#!">
								<i class="fa fa-calendar calendar-icon"></i> Reserva<br> tu hora
							</a>
                    </li>
                </ul>

            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
    <!--end navbar-->
</header>