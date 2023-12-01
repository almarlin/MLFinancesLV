@extends('layouts.template')

@section('navbar')
    @extends('layouts.navbarhome')
@endsection

@section('title', 'Retirar dinero')

@section('content')
    <div class="container mt-5">
        <form action="{{ route('postRetirar') }}" method="POST">
            @csrf

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
                <button type="submit" class="btn btn-danger mt-5">Retirar</button>
            </div>

        </form>
    </div>
@endsection