@extends('layouts.template')

@section('navbar')
    @extends('layouts.navbarAdmin')
@endsection
@section('script')
<script defer src="{{ asset('../resources/js/validateForm.js') }}"></script>

@endsection

@section('title', 'Préstamos')

@section('content')

    <div class="row justify-content-center align-items-center me-0">
        <div class="col-12 col-md-6">

            <div class="container mt-5">
                <h1 class="display-5 fw-light mb-5">Todos los préstamos sin aprobar</h1>
                <form action="{{route('approveLoans')}}" method="POST" id="form">
                    @csrf
                    @foreach ($loans as $loan)
                        <div class="border border-2 border-danger rounded-2 p-3 mb-2">
                            <p class="text-center">Motivo: {{ $loan->concept }}</p>
                            <p class="text-center">Cantidad: {{ $loan->TOTAL }}</p>
                            <p class="text-center">Fecha de creación: {{ $loan->created_at }}</p>
                            <p class="text-center">Número de teléfono: {{ $loan->PHONENUMBER }}</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="{{$loan->id}}" value="true" id="approve_{{$loan->id}}" />
                                <label class="form-check-label" for="approve_{{$loan->id}}"> Aprobar </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="{{$loan->id}}" value="false" id="deny_{{$loan->id}}" />
                                <label class="form-check-label" for="deny_{{$loan->id}}"> Denegar </label>
                            </div>
                            
                            
                        </div>
                    @endforeach

                    <button type="submit" class="btn btn-danger">
                        Aceptar
                    </button>

                </form>
            </div>


        </div>
    </div>
@endsection
