@extends('layouts.template')

@section('navbar')
    @extends('layouts.navbarhome')
@endsection

@section('title', 'Añadir contacto')

@section('content')
    <div class="container mt-5">
        <form action="{{ route('postAnyadirContacto') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="text" class="form-control" name="inputEmail" id="inputEmail" aria-describedby="helpId"
                    placeholder="Email del contacto a añadir">
                <small id="helpId" class="form-text text-muted"></small>
            </div>
            <button type="submit" class="btn btn-danger mt-5">Añadir</button>
        </form>
    </div>
@endsection