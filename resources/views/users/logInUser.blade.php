@extends('layouts.template')

@section('title', 'Inicio de sesión')

@section('content')

    <div class="container mt-5">
        <form action="{{route('user.signIn')}}" method="POST">

            @csrf
            <div class="mb-3 row">
                <label for="inputNif" class="col-4 col-form-label">NIF</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="inputNif" id="inputNif" placeholder="NIF">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputHash" class="col-4 col-form-label">Contraseña</label>
                <div class="col-8">
                    <input type="password" class="form-control" name="inputHash" id="inputHash" placeholder="Contraseña">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
            </div>
        </form>
    </div>

@endsection