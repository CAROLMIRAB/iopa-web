@extends('front.iopa') 
@section('content')

<section class="section-contacto">
    <div class="container wow fadeIn" data-wow-delay=".1s">
        <div class="inner-section text-center">
            <h1 class="inner-title">
                Su opinión nos importa
            </h1>
            <p>

             {!! isset($config[6]['pages-description']['content']['page-contacto']) ? $config[6]['pages-description']['content']['page-contacto'] : '' !!}

            </p>
        </div>
        <div class="row mt-40">
            <div class="col-md-12">
            <form name="opinion" action="{{ route('contact.send-opinion') }}" method="POST">
                <div class="ui-form contact-form">
                    <div class="form-loader hide">
                        <i class="fa fa-circle-o-notch text-primary fa-spin fa-3x"></i>
                    </div>
                    <div class="ui-contact-body">
                        <h4>Motivo de su contacto</h4>
                        <div class="ui-fields">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="motivo">Motivo</label>
                                        <select name="motivo" id="" class="form-control">
                        <option value="">Selecciona una opción</option>
                        <option value="Felicitaciones">Felicitaciones</option>
                        <option value="Sugerencias">Sugerencias</option>
                        <option value="Reclamos">Reclamos</option>
                      </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="ui-label" for="respuesta">¿Cómo prefiere recibir la respuesta?</label>
                                        <select name="respuesta" id="" class="form-control">
                        <option value="">Selecciona una opción</option>
                        <option value="Carta Certificada a mi domicilio">Carta Certificada a mi domicilio</option>
                        <option value="Correo electrónico.">Correo electrónico. </option>
                      </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4>Datos personales</h4>
                        <div class="ui-fields">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="name">Nombre (*)</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="apellido">Apellido (*)</label>
                                        <input type="text" name="lastname" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="rut">RUT (*)</label>
                                        <input type="text" name="rut" placeholder="11.111.111-0" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="telefono">Teléfono (*)</label>
                                        <input type="text" name="phone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="correo">Correo (*)</label>
                                        <input type="text" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="residencia">Residencia (*)</label>
                                        <input type="text" name="residencia" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="region">Región</label>
                                    <select name="region" id="" class="form-control region_chile" data-url="{{ route('contact.communes') }}">
                                    <option value="">Selecciona una opción</option>
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->name }}">{{ $region->name }}</option>
                                    @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="comuna">Comuna</label>
                                        <select name="comuna" id="" class="form-control comuna_chile">
                            <option value="">Selecciona una opción</option>
                          </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4>Dependencia reclamada</h4>
                        <div class="ui-fields">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="sucursales">Sucursal</label>
                                        <select name="office" id="" class="form-control">
                        <option value="">Selecciona una opción</option>
                        @foreach($offices as $office)
                                        <option value="{{ $office->name }}">{{ $office->name }}</option>
                        @endforeach
                      </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="area">Área</label>
                                        <select name="area" id="" class="form-control">
                        <option value="">Selecciona una opción</option>
                        <option value="Call Center">Call Center</option>
                        <option value="Consulta Médica">Consulta Médica</option>
                        <option value="Dpto. Admisión">Dpto. Admisión</option>
                        <option value="Imagenología /Exámenes">Imagenología /Exámenes</option>
                        <option value="Pabellón">Pabellón</option>
                        <option value="Otros">Otros</option>
                      </select>
                                    </div>
                                </div>
                                <div class="col-sm-4"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="ui-label" for="comentario">Describa los hechos</label>
                                        <textarea name="hechos" class="form-control" id="" cols="3" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="ui-label" for="comentario">Peticiones concretas</label>
                                        <textarea name="comentario" class="form-control" id="" cols="3" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui-fields">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-success hide" id="sendSuccess">
                                        ¡Mensaje enviado correctamente!
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <p class="text-muted"> (*) Son campos obligatorios que nos facilitarán responder su consulta o solicitud</p>
                                </div>
                                <div class="col-sm-4 text-right">
                                    <button type="submit" class="btn btn-primary btn-lg" id="submit">Enviar mensaje</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{ csrf_field() }}
            </form>
            </div>
        </div>
    </div>
</section>
@endsection