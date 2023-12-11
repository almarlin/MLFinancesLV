@extends('layouts.template')
@section('navbar')
    @extends('layouts.navbarAdmin')
@endsection

@section('title', 'Panel de administración')

@php
    use App\Models\Movement;
    use App\Models\Message;
    use App\Models\Account;
    use App\Models\User;

@endphp

@section('content')

    <aside class="mt-1">
        <button class="btn btn-danger text-light fs-5 fw-light rounded-0" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Ayuda ></button>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title fs-4 fw-bold" id="offcanvasBottomLabel">Ayuda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body small">
                <h3 class="fw-light fs-4">Chat</h3>

                <h3 class="fw-light fs-4 text-light bg-danger p-2 mt-4 rounded-2" id="emailSelected">Atención al cliente
                </h3>
                <div class="h-50 bg-light mb-2 mt-2 rounded-2 container overflow-auto">
                    <form action="{{ route('adminChat') }}" method="POST">
                        @csrf
                        @foreach ($userNames as $name)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="inputUsername" id="{{ $name }}"
                                    value="{{ $name }}" />
                                <label class="form-check-label" for="{{ $name }}"> {{ $name }} </label>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-danger">
                            Responder
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </aside>

    <div class="container mt-5">
        <h1 class="text-center display-5">Portal de administración</h1>

        <h2 class="fw-light fs-3 mb-4">Últimos movimientos</h2>
        <div class="row justify-content-center align-items-center g-2">
            @php

                $bankMovements = Movement::all();
                $count = 0;
            @endphp
            @foreach ($bankMovements as $bankMovement)
                <div class="container rounded border border-2 border-danger movimiento mb-2">
                    <p class="text-center">De {{ $bankMovement->fromIBAN }}</p>
                    <p class="text-center">A {{ $bankMovement->toIBAN }}</p>
                    <p class="text-center">Concepto {{ $bankMovement->CONCEPT }}</p>
                    <p class="text-center">Cantidad {{ $bankMovement->QUANTITY }}</p>
                </div>
                @php
                    $count++;
                    if ($count == 2) {
                        break;
                    }
                @endphp
            @endforeach
            <a href="{{ route('movimientosBanco') }}">Ver todos los movimientos</a>
        </div>

        <h2 class="fw-light fs-3 mt-4 mb-4">Cuentas</h2>
        <div class="row justify-content-center align-items-center g-2">
            @php

                $bankAccount = Account::all();
                $count = 0;
            @endphp
            @foreach ($bankAccount as $bankAccount)
                @php
                    $accountUser = User::where('id', $bankAccount->user_id);
                @endphp
                <div class="container rounded border border-2 border-danger movimiento mb-2">
                    <p class="text-center">IBAN {{ $bankAccount->IBAN }}</p>
                    <p class="text-center">Balance {{ $bankAccount->BALANCE }}</p>
                    <p class="text-center">Fecha de creación {{ $bankAccount->created_at }}</p>
                    <p class="text-center">Titular {{ $accountUser->first()->NIF }}</p>
                </div>
                @php
                    $count++;
                    if ($count == 2) {
                        break;
                    }
                @endphp
            @endforeach
            <a href="{{ route('cuentasBanco') }}">Ver todas las cuentas</a>
        </div>

        <h2 class="fw-light fs-3 mt-4 mb-4">Usuarios</h2>
        <div class="row justify-content-center align-items-center g-2">
            @php

                $bankUsers = User::all();
                $count = 0;
            @endphp
            @foreach ($bankUsers as $bankUser)
                @if ($bankUser->NAME != 'admin')
                    <div class="container rounded border border-2 border-danger movimiento mb-2">
                        <p class="text-center">NIF {{ $bankUser->NIF }}</p>
                        <p class="text-center">Nombre {{ $bankUser->NAME }}</p>
                        <p class="text-center">Fecha de creación {{ $bankUser->created_at }}</p>
                        <p class="text-center">Número de teléfono {{ $bankUser->PHONENUMBER }}</p>
                    </div>
                    @php
                        $count++;
                        if ($count == 2) {
                            break;
                        }
                    @endphp
                @endif
            @endforeach
            <a href="{{ route('usuariosBanco') }}">Ver todos los usuarios</a>
        </div>

    </div>

@endsection
