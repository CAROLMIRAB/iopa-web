<div class="bt-whatsme">
	<a href="https://api.whatsapp.com/send?phone=56935737234&text=Hola!%20Quiero%20obtener%20mas%20información">
		<svg class="whatsapp-figure" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
	 id="Capa_1" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 90 90" style="enable-background:new 0 0 90 90;" xml:space="preserve">
		  <g>
			<path
			  id="WhatsApp"
			  d="M90,43.841c0,24.213-19.779,43.841-44.182,43.841c-7.747,0-15.025-1.98-21.357-5.455L0,90l7.975-23.522   c-4.023-6.606-6.34-14.354-6.34-22.637C1.635,19.628,21.416,0,45.818,0C70.223,0,90,19.628,90,43.841z M45.818,6.982   c-20.484,0-37.146,16.535-37.146,36.859c0,8.065,2.629,15.534,7.076,21.61L11.107,79.14l14.275-4.537   c5.865,3.851,12.891,6.097,20.437,6.097c20.481,0,37.146-16.533,37.146-36.857S66.301,6.982,45.818,6.982z M68.129,53.938   c-0.273-0.447-0.994-0.717-2.076-1.254c-1.084-0.537-6.41-3.138-7.4-3.495c-0.993-0.358-1.717-0.538-2.438,0.537   c-0.721,1.076-2.797,3.495-3.43,4.212c-0.632,0.719-1.263,0.809-2.347,0.271c-1.082-0.537-4.571-1.673-8.708-5.333   c-3.219-2.848-5.393-6.364-6.025-7.441c-0.631-1.075-0.066-1.656,0.475-2.191c0.488-0.482,1.084-1.255,1.625-1.882   c0.543-0.628,0.723-1.075,1.082-1.793c0.363-0.717,0.182-1.344-0.09-1.883c-0.27-0.537-2.438-5.825-3.34-7.977   c-0.902-2.15-1.803-1.792-2.436-1.792c-0.631,0-1.354-0.09-2.076-0.09c-0.722,0-1.896,0.269-2.889,1.344   c-0.992,1.076-3.789,3.676-3.789,8.963c0,5.288,3.879,10.397,4.422,11.113c0.541,0.716,7.49,11.92,18.5,16.223   C58.2,65.771,58.2,64.336,60.186,64.156c1.984-0.179,6.406-2.599,7.312-5.107C68.398,56.537,68.398,54.386,68.129,53.938z"
			  fill="#FFF"
			/>
		  </g>
		</svg>
	</a>
	<span class="callme"> Escríbenos +56935737234</span>
</div>

<div class="sys-popup" id="sysPopup">
	<div class="sys-popup-header">
		<div class="sys-popup-title --open-sys">Reserva <strong>tu Hora</strong></div>
		<div class="sys-popup-controls">
			<button class="sys-action --sys-close --open-sys"><i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="sys-popup-content">
		contenido
	</div>
</div>

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
								<i class="fa fa-map-marker"></i> 
									<a class="footer-sucursal" href="{{ route('office.viewpost', $office->slug) }}"><span class=""> {{ $office->name }}</span></a> - {{
								$office->address }}
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
				<div class="col-sm-3 hidden-xs">
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
		® 2019 Porter Advertising / Digital Plus
	</div>
</footer>


<a href="tel:+935737208" class="btn mobile-cta">
		<i class="fa fa-calendar"></i> RESERVAR AHORA
	</a>