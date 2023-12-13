@extends('layouts.template')

@section('title', 'Inicio de sesión')
@section('script')
    <script defer src="{{ asset('../resources/js/validateForm.js') }}"></script>
@endsection
@section('content')

    <div class="container mt-5">
        <form action="{{ route('inicia-sesion') }}" method="POST" id="form">

            @csrf
            <div class="mb-3 row">
                <label for="inputNif" class="col-4 col-form-label">Email</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="inputEmail" id="inputEmail"
                        placeholder="ejemplo@email.com" required>
                </div>
                <div class="invalid-feedback">
                    Por favor, ingrese un email válido.
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputHash" class="col-4 col-form-label">Contraseña</label>
                <div class="col-8">
                    <input type="password" class="form-control" name="inputHash" id="inputHash" placeholder="Contraseña"
                        required>
                </div>
                <div class="invalid-feedback">
                    Por favor, ingrese una contraseña.
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="rememberCheck" name="remember">
                <label class="form-check-label" for="rememberCheck">
                    Recordarme
                </label>
            </div>

            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" class="btn btn-primary">Entrar</button>
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
