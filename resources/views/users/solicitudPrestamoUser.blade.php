@extends('layouts.template')

@section('navbar')
@extends('layouts.navbarUser')
@endsection

@section('title', 'Solicitud préstamo')

@section('content')
    <div class="container mt-5">
        <form action="{{ route('postSolicitar') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Motivo de solicitud del préstamo</label>
                <input type="text" class="form-control" name="inputConcept" id="inputConcept" aria-describedby="helpId"
                    placeholder="">
                <small id="helpId" class="form-text text-muted"></small>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Cantidad</label>
                <input type="number" class="form-control" name="inputQuantity" id="inputQuantity" aria-describedby="helpId"
                    placeholder="">
                <small id="helpId" class="form-text text-muted">Deberá tener al menos el 15% de la cantidad solicitada. </small>
                <button type="submit" class="btn btn-danger mt-5">Solicitar</button>
            </div>

        </form>
    </div>
@endsection