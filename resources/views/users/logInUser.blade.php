@extends('layouts.template')

@section('title', 'Inicio de sesión')
@section('script')
    <script defer src="{{ asset('../resources/js/validateLogin.js') }}"></script>
@endsection

@section('navbar')
 @extends('layouts.navbarHome')
@endsection
@section('content')

    <div class="border-red container mt-5 w-25 p-5">
        <h1 class="display-6 text-center mb-5">Iniciar sesión</h1>
        <form action="{{ route('inicia-sesion') }}" method="POST" id="form">
            @csrf
            <div class="container">
                <div class="mb-3 row">
                    <label for="inputEmail" class="col-4 col-form-label">Email</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="inputEmail" id="inputEmail"
                            placeholder="ejemplo@email.com" required>
                        <div class="invalid-feedback" id="emailError">
                            Por favor, ingrese un email válido.
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputHash" class="col-4 col-form-label">Contraseña</label>
                    <div class="col-8">
                        <input type="password" class="form-control" name="inputHash" id="inputHash" placeholder="Contraseña"
                            required>
                        <div class="invalid-feedback" id="passwordError">
                            Por favor, ingrese una contraseña.
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" class="btn button-blue" onclick="validateForm()">Entrar</button>
                </div>
            </div>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

@endsection
