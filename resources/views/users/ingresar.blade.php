@extends('layouts.template')

@section('navbar')
@extends('layouts.navbarUser')
@endsection
@section('script')
<script defer src="{{ asset('../resources/js/validarIngresar.js') }}"></script>

@endsection
@section('title', 'Ingresar dinero')

@section('content')
    <div class="container mt-5">
        
    </div>

    <div class="border-red container mt-5 w-25">
        <h3 class="text-center fw-light fs-3 mt-4 mb-4">Ingresar</h3>
        <form action="{{ route('postIngresar') }}" method="POST" id="form">
            @csrf
        
            <div class="mb-3">
                <label for="inputConcept" class="form-label">Concepto</label>
                <input type="text" class="form-control" name="inputConcept" id="inputConcept" aria-describedby="helpConcept"
                    placeholder="" required>
                <small id="helpConcept" class="form-text text-muted"></small>
            </div>
        
            <div class="mb-3">
                <label for="inputQuantity" class="form-label">Cantidad</label>
                <input type="number" class="form-control" name="inputQuantity" id="inputQuantity" aria-describedby="helpQuantity"
                    placeholder="" required>
                <small id="helpQuantity" class="form-text text-muted"></small>
            </div>
        
            <div class="text-center">
                <button type="submit" class="btn button-red mt-5" onclick="validateForm()">Ingresar</button>
            </div>
        
        </form>
    </div>
@endsection
