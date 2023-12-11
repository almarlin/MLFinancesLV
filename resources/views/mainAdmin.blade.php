@extends('layouts.template')
@section('navbar')
    @extends('layouts.navbarAdmin')
@endsection

@section('title', 'Panel de administración')

@section('content')

    <div class="container mt-5">
        <h1 class="text-center display-5">Portal de administración</h1>

        <h2 class="fw-light fs-3 mb-4">Últimos movimientos</h2>
        <div class="row justify-content-center align-items-center g-2">
            @php
                use App\Models\Movement;
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
            <a href="{{route('movimientosBanco')}}">Ver todos los movimientos</a>
        </div>

        <h2 class="fw-light fs-3 mt-4 mb-4">Cuentas</h2>
        <div class="row justify-content-center align-items-center g-2">
            @php
                use App\Models\Account;
                use App\Models\User;
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
            <a href="{{route('cuentasBanco')}}">Ver todas las cuentas</a>
        </div>

        <h2 class="fw-light fs-3 mt-4 mb-4">Usuarios</h2>
        <div class="row justify-content-center align-items-center g-2">
            @php

                $bankUsers = User::all();
                $count = 0;
            @endphp
            @foreach ($bankUsers as $bankUser)
                @if($bankUser->NAME!='admin')
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
            <a href="{{route('usuariosBanco')}}">Ver todos los usuarios</a>
        </div>

    </div>

@endsection
