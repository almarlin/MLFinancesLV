@extends('layouts.template')
@section('navbar')
    @extends('layouts.navbarAdmin')
@endsection
@section('script')
<script defer src="{{ asset('../resources/js/validateFindUser.js') }}"></script>

@endsection
@section('title', 'Buscar usuarios')
@section('script')
<script defer src="{{ asset('../resources/js/validateFindUser.js') }}"></script>

@endsection

@section('content')


    <div class="container mt-5">
        <h1 class="display-5">Buscar por NIF</h1>

        <form action="{{ route('usuarioPorNif') }}" method="post" onsubmit="return validateForm()">
            @csrf
            <div class="mb-3">
                <label for="inputNif" class="form-label">NIF</label>
                <input type="number" class="form-control" name="inputNif" id="inputNif" aria-describedby="helpNif" placeholder="">
                <small id="helpNif" class="form-text text-muted"></small>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
        
    </div>


@endsection
