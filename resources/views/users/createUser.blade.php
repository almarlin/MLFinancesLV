@extends('layouts.template')

@section('title', 'Crear Usuario')
@section('script')
    <script defer src="{{ asset('../resources/js/validateCreateUser.js') }}"></script>

@endsection

@section('navbar')
    @extends('layouts.navbarHome')
@endsection
@section('content')

    <div class="border-red container mt-5 w-25">
        <h1 class="display-6 text-center mt-4 mb-4">Crear cuenta</h1>
        <form action={{ route('user.store') }} method="POST" id="form">
            {{-- Esto es un token de seguridad de laravel --}}
            @csrf
            <div class="container">
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="inputName" id="inputName"
                                aria-describedby="helpId" placeholder="" required>
                            <small id="helpId" class="form-text text-muted">Introduce tu nombre</small>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Apellido</label>
                            <input type="text" class="form-control" name="inputSurname" id="inputSurName"
                                aria-describedby="helpId" placeholder="" required>
                            <small id="helpId" class="form-text text-muted">Introduce tu apellido</small>
                        </div>
                    </div>

                </div>
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" name="inputEmail" id="inputEmail"
                                aria-describedby="helpId" placeholder="" required>
                            <small id="helpId" class="form-text text-muted">Introduce tu apellido</small>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Fecha de nacimiento</label>
                            <input type="date" class="form-control" name="inputBirthday" id="inputBirthday"
                                aria-describedby="helpId" placeholder="" required>
                            <small id="helpId" class="form-text text-muted">Introduce tu fecha de nacimiento</small>
                        </div>
                    </div>

                </div>
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label">NIF</label>
                            <input type="number" class="form-control" name="inputNif" id="inputNif"
                                aria-describedby="helpId" placeholder="" required>
                            <small id="helpId" class="form-text text-muted">Introduce tu NIF</small>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label">País</label>
                            <input type="text" class="form-control" name="inputCountry" id="inputCountry"
                                aria-describedby="helpId" placeholder="" required>
                            <small id="helpId" class="form-text text-muted">Introduce tu país de residencia</small>
                        </div>
                    </div>

                </div>
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Provincia</label>
                            <input type="text" class="form-control" name="inputProvince" id="inputProvince"
                                aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Introduce tu provincia</small>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Ciudad</label>
                            <input type="text" class="form-control" name="inputCity" id="inputCity"
                                aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Introduce tu ciudad</small>
                        </div>
                    </div>

                </div>
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label">CP</label>
                            <input type="text" class="form-control" name="inputPC" id="inputPC"
                                aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Introduce tu provincia</small>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Dirección</label>
                            <input type="text" class="form-control" name="inputAddress" id="inputAddress"
                                aria-describedby="helpId" placeholder="" required>
                            <small id="helpId" class="form-text text-muted">Introduce tu dirección</small>
                        </div>
                    </div>

                </div>
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Nº de teléfono</label>
                            <input type="number" class="form-control" name="inputPhoneNumber" id="inputPhoneNumber"
                                aria-describedby="helpId" placeholder="" required>
                            <small id="helpId" class="form-text text-muted">Introduce tu número de teléfono</small>
                        </div>
                    </div>


                </div>
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" name="inputHash" id="inputHash"
                                aria-describedby="helpId" placeholder="" required>
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Repite la contraseña</label>
                            <input type="password" class="form-control" name="inputRepeatHash" id="inputRepeatHash"
                                aria-describedby="helpId" placeholder="" required>
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                    </div>

                </div>

            </div>

            <div class="text-center"> <button type="submit" class=" btn button-blue">Añadir</button></div>



        </form>

    </div>
@endsection
