@extends('layouts.template')

@section('navbar')
@extends('layouts.navbarUser')
@endsection

@section('title', 'Consultar mis movimientos')

@section('content')


    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-6">

            <div class="container mt-5">
                <h1 class="display-5 fw-light mb-5">Mis movimientos</h1>
                @foreach ($movements as $movement)
                    <div class="border border-2 border-danger rounded-2 p-3 mb-2">
                        <p class="text-center">Concepto: {{ $movement->CONCEPT }}</p>
                        <p class="text-center">Cuenta de origen: {{$movement->fromIBAN}}</p>
                        <p class="text-center">Cuenta de destino: {{$movement->toIBAN}}</p>
                        <p class="text-center">Cantidad: {{$movement->QUANTITY}}</p>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">{{ $movements->links() }}</div>

        </div>
    </div>
@endsection