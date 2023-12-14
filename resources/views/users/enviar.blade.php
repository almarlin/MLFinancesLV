@extends('layouts.template')

@section('navbar')
    @extends('layouts.navbarUser')
@endsection
@section('script')
<script defer src="{{ asset('../resources/js/validateForm.js') }}"></script>

@endsection

@section('title', 'Enviar dinero')

@section('content')
   

    <div class="border-red container mt-5 w-25">
        <h3 class="text-center fw-light fs-3 mt-4 mb-4">Enviar</h3>
        <form action="{{ route('postEnviar') }}" method="POST" id="form">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Destinatario</label>
                <input type="text" class="form-control" name="inputEmail" id="inputEmail" aria-describedby="helpId"
                    placeholder="Email del destinatario">
                <small id="helpId" class="form-text text-muted"></small>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Concepto</label>
                <input type="text" class="form-control" name="inputConcept" id="inputConcept" aria-describedby="helpId"
                    placeholder="">
                <small id="helpId" class="form-text text-muted"></small>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Cantidad</label>
                <input type="number" class="form-control" name="inputQuantity" id="inputQuantity" aria-describedby="helpId"
                    placeholder="">
                <small id="helpId" class="form-text text-muted"></small>
                <div class="text-center"><button type="submit" class="btn button-red mt-5">Enviar</button></div>
            </div>

        </form>
    </div>
@endsection