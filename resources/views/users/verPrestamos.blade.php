@extends('layouts.template')

@section('navbar')
    @extends('layouts.navbarUser')
@endsection

@section('title', 'Consultar mis préstamos')

@section('content')


    <div class="row justify-content-center align-items-center me-0">
        <div class="col-12 col-md-6">

            <div class="container mt-5">
                <h1 class="display-5 fw-light mb-5">Mis préstamos</h1>
                @foreach ($loans as $loan)
                    <div class="container movement mb-2 row">
                        <div class="row justify-content-center align-items-center g-2 col-12 col-md-8">
                            <div class="col-12 col-md-8 row justify-content-center align-items-center g-2">
                                <div class="col-5">
                                    <p class="">{{ $loan->concept }}</p>
                                </div>
                                <div class="col-7">
                                    <p class="">{{ $loan->created_at }}</p>
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center g-2">
                                <div class="col-12 col-md-6">
                                    <p class="text-muted">Fecha del próximo pago</p>
                                    <p class="">{{ $loan->NEXTPAYMENT }}</p>
                                </div>
                                <div class="col-12 col-md-6">
                                    <p class="text-muted">Estado</p>
                                    <p class="">
                                        @if ($loan->APPROVED)
                                            Aprobado
                                        @elseif($loan->APPROVED == 'null')
                                            Pendiente de aprobación
                                        @else
                                            Denegado
                                        @endif
                                    </p>
                                </div>

                            </div>
                        </div>

                        <div
                            class="row justify-content-center align-items-center g-2 col-12 col-md-4 movement-quantity p-3">
                            {{ $loan->TOTAL }}€
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">{{ $loans->links() }}</div>

        </div>
    </div>
@endsection
