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
                {{-- {{dd($loans)}} --}}
                @if (!$loans->isEmpty())
                    <form action="{{ route('approveLoans') }}" method="POST" id="form">
                        @csrf
                        @foreach ($loans as $loan)
                            <div class="container movement mb-2 row">
                                <div class="row justify-content-center align-items-center g-2 col-12 col-md-8">
                                    <div class="col-12 col-md-8 row justify-content-center align-items-center g-2">
                                        <div class="col-5">
                                            <p class="">Motivo: </p>
                                            <p>{{ $loan->concept }}</p>
                                        </div>
                                        <div class="col-7">
                                            <p class="">Fecha de solicitud:</p>
                                            <p> {{ $loan->created_at }}</p>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center align-items-center g-2">
                                        <div class="col-12">
                                            <p class="text-muted">Estado</p>
                                            <p class="">
                                                @if ($loan->APPROVED)
                                                    Aprobado
                                                @elseif($loan->APPROVED == 'null')
                                                    Denegado
                                                @else
                                                    Pendiente de aprobación
                                                @endif
                                            </p>
                                        </div>

                                    </div>

                                </div>

                                <div
                                    class="row justify-content-center align-items-center g-2 col-12 col-md-4 movement-quantity p-3">
                                    Cantidad solicitada: {{ $loan->TOTAL }}€
                                </div>

                                <div class="row justify-content-center align-items-center g-2 p-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="{{ $loan->id }}"
                                            value="true" id="approve_{{ $loan->id }}" />
                                        <label class="form-check-label" for="approve_{{ $loan->id }}"> Aprobar </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="{{ $loan->id }}"
                                            value="false" id="deny_{{ $loan->id }}" />
                                        <label class="form-check-label" for="deny_{{ $loan->id }}"> Denegar </label>
                                    </div>
                                </div>

                            </div>
                        @endforeach

                        <button type="submit" class="btn button-red">
                            Aceptar
                        </button>

                    </form>
                @else
                    <p class="">No hay préstamos por aprobar</p>
                @endif
            </div>


        </div>
    </div>
@endsection
