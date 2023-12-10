@extends('layouts.template')

@section('navbar')
    @extends('layouts.navbarhome')
@endsection

@section('title', 'Préstamos')

@section('content')




    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-6">

            <div class="container mt-5">
                <h1 class="display-5 fw-light mb-5">Todos los préstamos sin aprobar</h1>
                @foreach ($loans as $loan)
               
                <div class="border border-2 border-danger rounded-2 p-3 mb-2">
                    <p class="text-center">Motivo: {{ $loan->concept }}</p>
                    <p class="text-center">Cantidad: {{ $loan->TOTAL }}</p>
                    <p class="text-center">Fecha de creación: {{ $loan->created_at }}</p>
                    <p class="text-center">Número de teléfono: {{ $loan->PHONENUMBER }}</p>
                </div>
                
                    
                @endforeach
            </div>
           

        </div>
    </div>
@endsection