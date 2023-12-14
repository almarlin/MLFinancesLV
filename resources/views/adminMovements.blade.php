@extends('layouts.template')

@section('navbar')
    @extends('layouts.navbarAdmin')
@endsection

@section('title', 'Movimientos')

@section('content')


    <div class="row justify-content-center align-items-center me-0">
        <div class="col-12 col-md-6">

            <div class="container mt-5">
                <h1 class="display-5 fw-light mb-5">Todos los movimientos</h1>
                @foreach ($movements as $movement)
                <div class="container movement mb-2 row">
                    <div class="row justify-content-center align-items-center g-2 col-12 col-md-8">
                        <div class="col-12 col-md-8 row justify-content-center align-items-center g-2">
                            <div class="col-4">
                                <p class="">{{ $movement->CONCEPT }}</p>
                            </div>
                            <div class="col-8">
                                <p class="">{{ $movement->created_at }}</p>
                            </div>
                        </div>
                        <div class="row justify-content-center align-items-center g-2">
                            <div class="col-12">
                                <p class="text-muted">Origen</p>
                                <p class="">{{ $movement->fromIBAN }}</p>
                                <p class="text-muted">Destino</p>
                                <p class="">{{ $movement->toIBAN }}</p>
                            </div>

                        </div>
                    </div>

                    <div class="row justify-content-center align-items-center g-2 col-12 col-md-4 movement-quantity">
                        {{$movement->QUANTITY}}
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">{{ $movements->links() }}</div>

        </div>
    </div>
@endsection