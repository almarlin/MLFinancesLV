@extends('layouts.template')

@section('navbar')
    @extends('layouts.navbarUser')
@endsection

@section('script')

@endsection

@section('title', 'Mis datos')

@section('content')

    <div class="container mt-5">

        <h1 class="display-5 mb-5">Mis datos</h1>

        <form action="{{route('actualizarDatos')}}" method="post">
            @csrf
            <div class="container">
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-12 col-md-1 mb-3">
                        <label for="inputName" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="inputName" id="inputName" aria-describedby="helpId"
                            placeholder="" />

                    </div>
                    <div class="col-12 col-md-1 mb-3">
                        <label for="inputSurname" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="inputSurname" id="inputSurname" aria-describedby="helpId"
                            placeholder="" />

                    </div>
                    <div class="col-12 col-md-2 mb-3">
                        <label for="inputBirthday" class="form-label">Fecha de nacimiento</label>
                        <input type="date" class="form-control" name="inputBirthday" id="inputBirthday" aria-describedby="helpId"
                            placeholder="" />

                    </div>
                    <div class="col-12 col-md-2 mb-3">
                        <label for="inputAddress" class="form-label">Dirección</label>
                        <input type="text" class="form-control" name="inputAddress" id="inputAddress" aria-describedby="helpId"
                            placeholder="" />

                    </div>
                    <div class="col-12 col-md-1 mb-3">
                        <label for="inputCP" class="form-label">CP</label>
                        <input type="number" class="form-control" name="inputCP" id="inputCP" aria-describedby="helpId"
                            placeholder="" />

                    </div>
                    <div class="col-12 col-md-1 mb-3">
                        <label for="inputCity" class="form-label">Ciudad</label>
                        <input type="text" class="form-control" name="inputCity" id="inputCity" aria-describedby="helpId"
                            placeholder="" />

                    </div>
                    <div class="col-12 col-md-1 mb-3">
                        <label for="inputProvince" class="form-label">Provincia</label>
                        <input type="text" class="form-control" name="inputProvince" id="inputProvince" aria-describedby="helpId"
                            placeholder="" />

                    </div>
                    <div class="col-12 col-md-1 mb-3">
                        <label for="inputCountry" class="form-label">País</label>
                        <input type="text" class="form-control" name="inputCountry" id="inputCountry" aria-describedby="helpId"
                            placeholder="" />

                    </div>
                </div>


            </div>

            <button type="submit" class="btn btn-danger">
                Actualizar
            </button>

        </form>

        <div class="row justify-content-center align-items-center gap-5">
            <div class="col-12 col-md-5 rounded-2 border border-2 border-danger">
                <h4 class="fw-light text-center">Cambiar contraseña</h4>
                <form action="{{route('actualizarPassword')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="inputOldPassword" class="form-label">Contraseña antigua</label>
                        <input type="password" class="form-control" name="inputOldPassword" id="inputOldPassword" aria-describedby="helpId"
                            placeholder="" />

                    </div>
                    <div class="mb-3">
                        <label for="inputNewPassword" class="form-label">Contraseña nueva</label>
                        <input type="password" class="form-control" name="inputNewPassword" id="inputNewPassword" aria-describedby="helpId"
                            placeholder="" />

                    </div>
                    <div class="mb-3">
                        <label for="inputNewPasswordRepeat" class="form-label">Repite la contraseña nueva</label>
                        <input type="password" class="form-control" name="inputNewPasswordRepeat" id="inputNewPasswordRepeat"
                            aria-describedby="helpId" placeholder="" />

                    </div>
                    <button type="submit" class="btn btn-danger">
                        Cambiar
                    </button>

                </form>
            </div>
            <div class="col-12 col-md-5 rounded-2 border border-2 border-danger">
                <h4 class="fw-light text-center">Cambiar foto de perfil</h4>
                <form action="" method="post">
                    @csrf
                    <div class="mb-3">
                        
                        <input type="file" name="inputProfilePhoto" id="ainputProfilePhoto" accept="image/*">

                    </div>
                    
                    <button type="submit" class="btn btn-danger">
                        Cambiar
                    </button>

                </form>
            </div>

        </div>
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>

    </div>

@endsection
