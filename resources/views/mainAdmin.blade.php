@extends('layouts.template')
@section('navbar')
    @extends('layouts.navbarAdmin')
@endsection
@section('script')
    <script defer src="{{ asset('../resources/js/balanceToDecimal.js') }}"></script>
@endsection

@section('title', 'Panel de administración')


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
                    @if ($userNames)
                        <form action="{{ route('adminChat') }}" method="POST">
                            @csrf
                            @foreach ($userNames as $name)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="inputUsername"
                                        id="{{ $name }}" value="{{ $name }}" />
                                    <label class="form-check-label" for="{{ $name }}"> {{ $name }} </label>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-danger">
                                Responder
                            </button>
                        </form>
                    @else
                        <p class="text-center">No hay chats</p>
                    @endif
                </div>

            </div>
        </div>
    </aside>

    <div class="container mt-5">
        <h1 class="text-center display-5">Portal de administración</h1>

        <h2 class="fw-light fs-3 mb-4">Últimos movimientos</h2>
        <div class="row justify-content-center align-items-center g-2 me-0">

            @foreach ($lastMovements as $bankMovement)
                <div class="container rounded border border-2 border-danger movimiento mb-2">
                    <p class="text-center">De {{ $bankMovement->fromIBAN }}</p>
                    <p class="text-center">A {{ $bankMovement->toIBAN }}</p>
                    <p class="text-center">Concepto {{ $bankMovement->CONCEPT }}</p>
                    <p class="text-center">Cantidad {{ $bankMovement->QUANTITY }}</p>
                </div>
            @endforeach
            <a href="{{ route('movimientosBanco') }}">Ver todos los movimientos</a>
        </div>

        <h2 class="fw-light fs-3 mt-4 mb-4">Cuentas</h2>
        <div class="row justify-content-center align-items-center g-2 me-0">


            @foreach ($lastAccounts as $bankAccount)
                <div class="container rounded border border-2 border-danger movimiento mb-2">
                    <p class="text-center">IBAN {{ $bankAccount->IBAN }}</p>
                    <p class="text-center ">Balance: <span class="balance"> {{ $bankAccount->BALANCE }}</span> </p>
                    <p class="text-center">Fecha de creación {{ $bankAccount->created_at }}</p>
                </div>
            @endforeach
            <a href="{{ route('cuentasBanco') }}">Ver todas las cuentas</a>
        </div>

        <h2 class="fw-light fs-3 mt-4 mb-4">Usuarios</h2>
        <div class="row justify-content-center align-items-center g-2 me-0">

            @foreach ($lastsUsers as $bankUser)
                @if ($bankUser->NAME != 'admin')
                    <div class="container rounded border border-2 border-danger movimiento mb-2">
                        <p class="text-center">NIF {{ $bankUser->NIF }}</p>
                        <p class="text-center">Nombre {{ $bankUser->NAME }}</p>
                        <p class="text-center">Fecha de creación {{ $bankUser->created_at }}</p>
                        <p class="text-center">Número de teléfono {{ $bankUser->PHONENUMBER }}</p>
                    </div>
                @endif
            @endforeach
            <a href="{{ route('usuariosBanco') }}">Ver todos los usuarios</a>
        </div>

    </div>

@endsection
