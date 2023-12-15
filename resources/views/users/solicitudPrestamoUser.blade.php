@extends('layouts.template')

@section('navbar')
    @extends('layouts.navbarUser')
@endsection
@section('script')
    <script defer src="{{ asset('../resources/js/validateLoanRequest.js') }}"></script>

@endsection
@section('title', 'Solicitud préstamo')

@section('content')
    <div class="border-red container mt-5">

        <h1 class="fw-light mb-4">Solicitar préstamo</h1>
        <p class="fs-6 mb-5 text-muted">Para que le sea concedido el préstamo ha de poseer al menos el 15% de la cantidad solicitada, ser mayor de 18 años y no tener otro préstamo pendiente de aprobación.</p>
        <form action="{{ route('postSolicitar') }}" method="POST" id="form">
            @csrf
            <div class="mb-3">
                <label for="inputConcept" class="form-label">Motivo de solicitud del préstamo</label>
                <input type="text" class="form-control" name="inputConcept" id="inputConcept" aria-describedby="helpConcept"
                    placeholder="">
                <small id="helpConcept" class="form-text text-muted"></small>
            </div>
            <div class="mb-3">
                <label for="inputQuantity" class="form-label">Cantidad</label>
                <input type="number" class="form-control" name="inputQuantity" id="inputQuantity" aria-describedby="helpQuantity"
                    placeholder="">
                <small id="helpQuantity" class="form-text text-muted"></small>
                <button type="submit" class="btn button-red mt-5" onclick="validateForm()">Solicitar</button>
            </div>
        </form>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>
@endsection
