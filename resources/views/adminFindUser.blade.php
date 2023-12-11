@extends('layouts.template')
@section('navbar')
    @extends('layouts.navbarAdmin')
@endsection

@section('title', 'Buscar usuarios')

@section('content')


    <div class="container mt-5">
        <h1 class="display-5">Buscar por NIF</h1>

        <form action="{{ route('usuarioPorNif') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">NIF</label>
                <input type="number" class="form-control" name="inputNif" id="inputNif" aria-describedby="helpId"
                    placeholder="">

            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>


@endsection
