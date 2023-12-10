@extends('layouts.template')

@section('navbar')
    @extends('layouts.navbarhome')
@endsection

@section('title', 'Cuentas')

@section('content')

@php
   use App\Models\User;
@endphp


    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-6">

            <div class="container mt-5">
                <h1 class="display-5 fw-light mb-5">Todas las cuentas</h1>
                @foreach ($accounts as $account)
                    <div class="border border-2 border-danger rounded-2 p-3 mb-2">
                        <p class="text-center">IBAN: {{ $account->IBAN }}</p>
                        <p class="text-center">Balance: {{ $account->BALANCE }}</p>
                        <p class="text-center">Fecha de creación: {{ $account->created_at }}</p>
                        <p class="text-center">Titular: {{ User::where('id', $account->user_id)->first()->NIF }}</p>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">{{ $accounts->links() }}</div>

        </div>
    </div>
@endsection
