<footer class="ui-footer">
		<div class="ui-footer-bg">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-8 col-xs-12">
						<div class="f-item">
							<h3>Sucursales</h3>
							@foreach($offices as $office)
							<div class="row row-sucursales">
								<div class="col-md-7">
								<i class="fa fa-map-marker"></i> <span class="footer-sucursal"> 
									<a class="link-sucursal" href="{{ route('office.viewpost', $office->slug) }}">{{ $office->name }}</a></span> - {{ $office->address }}
								</div>
								<div class="col-md-3">
									<span><i class="fa fa-phone"></i> {{ $office->phone }}</span>
								</div>
							</div>
							@endforeach
							
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
							<h3>Revisa aquí</h3>
						<div class="f-item f-links">
							<div class="f-box">
								<a href="#!" class="f-box-item"><i class="fa fa-circle"></i> Revisa nuestras políticas de privacidad.</a>
								<a href="#!" class="f-box-item"><i class="fa fa-circle"></i> Revisa nuestro reglamento interno.</a>
								<a href="#!" class="f-box-item"><i class="fa fa-circle"></i> Descarga nuestra boleta electrónica</a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="f-social">
			<div class="container">
				<div class="row">
					<div class="col-sm-3 hidden-xs" >
						<div class="f-item ">
							<div class="f-social-buttons">
								<span>SÍGUENOS EN </span>
								<a href="#!" class="btn-social">
									<img src="{{ asset("img/rrss/icon-facebook.png") }}" alt="Facebook">
								</a>
								<a href="#!" class="btn-social">
									<img src="{{ asset("img/rrss/icon-instagram.png") }}" alt="Instagram">
								</a>
								<a href="#!" class="btn-social">
									<img src="{{ asset("img/rrss/icon-youtube.png") }}" alt="Youtube">
								</a>

							</div>
						</div>
					</div>
					<div class="col-sm-5  hidden-xs">
						<div class="f-item">
							<img src="{{ asset("img/f-logos.jpg") }}" class="img-responsive center-block" alt="">
						</div>
					</div>
					<div class="col-sm-4  ">
						<div class="f-item">
							<img src="{{ asset("img/logo-acreditado.jpg") }}" class="img-responsive center-block img-acreditado" alt="">
						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="f-porter">
			® 2019 PorderAdverticing / Digital Plus
		</div>
	</footer>


	<a href="tel:+935737208" class="btn mobile-cta">
		<i class="fa fa-calendar"></i> RESERVAR AHORA
	</a>
