@extends('front.iopa') 
@section('content')

<section class="section-contacto">
    <div class="container wow fadeIn" data-wow-delay=".1s">
        <div class="inner-section text-center">
            <h1 class="inner-title">
                Su opinión nos importa
            </h1>
            <p>

                Su opinión es muy importante para nosotros, por esto contamos con usted para mejorar la calidad de nuestro servicio. Lo invitamos
                a envíar sus comentarios a tráves del formulario de Felicitaciones, Sugerencias y Reclamos.
            </p>
        </div>
        <div class="row mt-40">
            <div class="col-md-8 col-md-offset-2">
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
                                        <select name="" id="" class="form-control">
                        <option value="">Selecciona una opción</option>
                        <option value="">Felicitaciones</option>
                        <option value="">Sugerencias</option>
                        <option value="">Reclamos</option>
                      </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="ui-label" for="respuesta">¿Cómo prefiere recibir la respuesta?</label>
                                        <select name="" id="" class="form-control">
                        <option value="">Selecciona una opción</option>
                        <option value="">Carta Certificada a mi domicilio</option>
                        <option value="">Correo electrónico. </option>
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
                                        <label class="ui-label" for="name">Nombre</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="apellido">Apellido</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="rut">RUT</label>
                                        <input type="text" placeholder="11.111.111-0" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="telefono">Teléfono</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="correo">Correo</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="residencia">Residencia</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="region">Región</label>
                                        <select name="" id="" class="form-control">
                            <option value="">Selecciona una opción</option>
                          </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="comuna">Comuna</label>
                                        <select name="" id="" class="form-control">
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
                                        <select name="" id="" class="form-control">
                        <option value="">Selecciona una opción</option>
                      </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="ui-label" for="area">Área</label>
                                        <select name="" id="" class="form-control">
                        <option value="">Selecciona una opción</option>
                      </select>
                                    </div>
                                </div>
                                <div class="col-sm-4"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="ui-label" for="comentario">Describa los hechos</label>
                                        <textarea class="form-control" id="" cols="3" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="ui-label" for="comentario">Peticiones concretas</label>
                                        <textarea class="form-control" id="" cols="3" rows="3"></textarea>
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
            </div>
        </div>
    </div>
</section>
@endsection