@extends('layouts.app_front')
@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('{{ asset('/storage/img_inmuebles/' . $inmueble->img) }}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>Contrato</h1>
                        <span class="subheading">Contrato de {{ $inmueble->tipoInmueble()->first()->name }}.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <ul class="list-unstyled">

                        {{-- <li><b>Propietario: </b> {{ $inmueble->user->name }}.</li> --}}
                        {{-- <li><b>Zona: </b> {{ $inmueble->zona->name }}.</li> --}}
                        {{-- <li><b>Precio: </b> {{ $inmueble->precio }} $us.</li> --}}
                        {{-- <li><b>Servicios: </b> {{ $inmueble->servicios }}.</li> --}}
                        {{-- <li><b>Superficie: </b> {{ $inmueble->superficie }}.</li> --}}
                        {{-- @if ($inmueble->tipo_inmueble_id == 1) --}}
                            {{-- <li><b>Latidud y Longitud: </b> {{ $inmueble->latitud }} ; {{ $inmueble->longitud }}.</li> --}}
                        {{-- @endif --}}
                        {{-- <li><b>Contacto: </b> {{ $inmueble->user->phone }}.</li> --}}
                        {{-- esta parte va para alquiler --}}
                        {{-- @if ($inmueble->tipo_inmueble_id == 2) --}}
                            {{-- <li><b>Numero de habitaciones: </b> {{ $inmueble->nro_habitaciones }}.</li> --}}
                            {{-- <li><b>Numero de la Habitacion: </b> {{ $inmueble->nro_habitacion }}.</li> --}}
                            {{-- <li><b>Codigo de Cerradura: </b> {{ $inmueble->codigo_cerradura }}.</li> --}}

                            {{-- <li><b>Capacidad maxima: </b> {{ $inmueble->capacidad_maxima }}.</li> --}}
                        {{-- @endif --}}
                    </ul>
                    <div class="my-5">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->

                        <form id="propertyForm" action="{{ url('/contratos') }}" method="post">
                            @csrf
                            <div class="form-floating">
                                <input class="form-control" id="propietarioCi" name="propietarioCi" type="text" value="{{ $inmueble->user->name }}, con CI:  {{ $inmueble->user->cedula }}" @readonly(true) />
                                <label for="propietarioCi">Informacion del propietario:</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="propertyId" name="propertyId" type="text" value="{{ $inmueble->id}}" @readonly(true) style="display: none"/>
                                <label for="propertyId">Informacion del propietario:</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="price" name="price" type="text" value="{{ $inmueble->precio }}" @readonly(true) />
                                <label for="price">Precio:</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="servicios" name="servicios" type="text" value="{{ $inmueble->servicios }}" @readonly(true) />
                                <label for="servicios">Servicios:</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="superficie" name="superficie" type="text" value="{{ $inmueble->superficie }}" @readonly(true) />
                                <label for="superficie">Superficie(mtrs2):</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="longitud" name="longitud" type="text" value="{{ $inmueble->longitud }}" @readonly(true) />
                                <label for="longitud">Longitud: </label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="latitud" name="latitud" type="text" value="{{ $inmueble->latitud }}" @readonly(true) />
                                <label for="latitud">Latitud: </label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="zona" name="zona" type="text" value="{{ $inmueble->zona->name }}" @readonly(true) />
                                <label for="zona">Zona: </label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="newproperty" name="newproperty" type="text" value="{{ auth()->user()->name }}, con CI: {{auth()->user()->cedula}}" @readonly(true) style="display: none"/>
                                <label for="newproperty"></label>
                            </div>
                            {{-- <div class="form-floating">
                                <input class="form-control" id="ocupantes_adultos" name="ocupantes_adultos" type="number" placeholder="Enter your ocupantes_adultos..." required />
                                <label for="ocupantes_adultos">Numero de ocupantes adultos</label> --}}
                                {{-- <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div> --}}
                            {{-- </div> --}}
                            {{-- <div class="form-floating">
                                <input class="form-control" id="ocupantes_menores" name="ocupantes_menores" type="number" placeholder="Enter your ocupantes_menores..." required/>
                                <label for="ocupantes_menores">Numero de ocupantes menores</label> --}}
                                {{-- <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div> --}}
                            {{-- </div> --}}
                            {{-- <div class="form-floating">
                                <input class="form-control" id="phone" type="tel"
                                    placeholder="Enter your phone number..." data-sb-validations="required" />
                                <label for="phone">Phone Number</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.
                                </div>
                            </div> --}}
                            {{-- <div class="form-floating">
                                <input class="form-control" id="date_ini" name="date_ini" type="date"
                                    placeholder="igrese fecha de inicio..." required />
                                <label for="date_ini">Fecha inicial</label> --}}
                                {{-- <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required. --}}
                                {{-- </div> --}}
                            {{-- </div> --}}
                            {{-- <div class="form-floating">
                                <input class="form-control" id="date_fin" name="date_fin" type="date"
                                    placeholder="Igrese fecha final..." required />
                                <label for="date_fin">Fecha Fin</label> --}}
                                {{-- <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required. --}}
                                {{-- </div> --}}
                            {{-- </div> --}}
                            {{-- <div class="form-floating">
                                <input class="form-control" id="pago_total" name="pago_total" type="text"
                                    placeholder="ingrese monto..." required />
                                <label for="pago_total">Monto</label> --}}
                                {{-- <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required. --}}
                                {{-- </div> --}}
                            {{-- </div> --}}

                            {{-- <div class="form-floating">
                                <textarea class="form-control" id="message" placeholder="Enter your message here..." style="height: 12rem"
                                    data-sb-validations="required"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.
                                </div>
                            </div> --}}
                            <br />
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            {{-- <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a
                                        href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div> --}}
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            {{-- <div class="d-none" id="submitErrorMessage">
                                <div class="text-center text-danger mb-3">Error sending message!</div>
                            </div> --}}
                            <!-- Submit Button-->
                            <div class="d-flex justify-content-center mb-4">
                                <button class="btn btn-primary text-uppercase" type="submit"> Confirmar </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <!-- Latest compiled and minified JavaScript -->
    {{-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> --}}
    <script  src="{{asset('./../js/truffle-contract.js')}}"></script>
    {{-- C:\laragon\www\proysw\node_modules\@truffle\contract\browser-dist\truffle-contract.min.js --}}

    <script  src="{{ asset('./../js/app.js') }}"></script>
    <script  src="{{ asset('./../js/ui.js') }}"></script>
@endsection
