@extends('layouts.template')

@section('title', 'Crear Usuario')

@section('content')

<strong>Database Connected: </strong>

    <div class="container mt-5">
        <form action={{ route('user.store') }} method="POST">
            {{-- Esto es un token de seguridad de laravel --}}
            @csrf

            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="inputName" id="inputName" aria-describedby="helpId"
                    placeholder="">
                <small id="helpId" class="form-text text-muted">Introduce tu nombre</small>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="inputSurname" id="inputSurName" aria-describedby="helpId"
                    placeholder="">
                <small id="helpId" class="form-text text-muted">Introduce tu apellido</small>
            </div>

            <button type="submit" class="btn btn-primary">Añadir</button>

        </form>

    </div>
@endsection
