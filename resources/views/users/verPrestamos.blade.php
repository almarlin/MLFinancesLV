@extends('layouts.template')

@section('navbar')
    @extends('layouts.navbarUser')
@endsection

@section('title', 'Consultar mis préstamos')

@section('content')


    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-6">

            <div class="container mt-5">
                <h1 class="display-5 fw-light mb-5">Mis préstamos</h1>
                @foreach ($loans as $loan)
                    <div class="border border-2 border-danger rounded-2 p-3">
                        <p class="text-center">Cantidad solicitada: {{ $loan->TOTAL }}</p>
                        <p class="text-center">Aprobación: @if ($loan->APPROVED == 0)
                                Denegado
                            @elseif($loan->APPROVED == 1)
                                Aprobado
                            @else
                                Pendiente
                            @endif
                        </p>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">{{ $loans->links() }}</div>

        </div>
    </div>
@endsection
