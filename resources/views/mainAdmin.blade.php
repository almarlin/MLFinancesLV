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
        <button class="btn button-red text-light fs-5 fw-light rounded-0" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Ayuda ></button>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title fs-4 fw-bold" id="offcanvasBottomLabel">Ayuda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body small">
                <h3 class="fw-light fs-4">Chat</h3>

                <h3 class="fw-light fs-4 text-light bg-navbar p-2 mt-4 rounded-2" id="emailSelected">Atención al cliente
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
                            <button type="submit" class="btn button-red">
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

    <div class="container mt-8">
        <h1 class="text-center display-5">Portal de administración</h1>

        <h2 class="fw-light font-size-2 mb-4">Últimos movimientos</h2>
        <div class="row justify-content-center align-items-center g-2 me-0">

            @foreach ($lastMovements as $bankMovement)
                <div class="container movement mb-2 row">
                    <div class="row justify-content-center align-items-center g-2 col-12 col-md-8">
                        <div class="col-12 col-md-8 row justify-content-center align-items-center g-2">
                            <div class="col-4">
                                <p class="">{{ $bankMovement->CONCEPT }}</p>
                            </div>
                            <div class="col-8">
                                <p class="">{{ $bankMovement->created_at }}</p>
                            </div>
                        </div>
                        <div class="row justify-content-center align-items-center g-2">
                            <div class="col-12 row">
                                <div class="col-6">
                                    <p class="text-muted">Origen</p>
                                    <p class="">{{ $bankMovement->fromIBAN }}</p>
                                </div>
                                <div class="col-6">
                                    <p class="text-muted">Destino</p>
                                    <p class="">{{ $bankMovement->toIBAN }}</p>
                                </div>
                                
                            </div>

                        </div>
                    </div>

                    <div class="row justify-content-center align-items-center g-2 col-12 col-md-4 movement-quantity">
                        {{ $bankMovement->QUANTITY }}
                    </div>
                </div>
            @endforeach
            <a href="{{ route('movimientosBanco') }}">Ver todos los movimientos</a>
        </div>

        <h2 class="fw-light font-size-2 mb-4 mt-4">Cuentas</h2>
        <div class="row justify-content-center align-items-center g-2 me-0">


            @foreach ($lastAccounts as $bankAccount)
                <div
                    class="container rounded border border-2 border-danger movimiento mb-2 row justify-content-center align-content-center p-3">
                    <div class="text-center col-12 col-md-3">
                        <p class="fw-ligth fs-5 text-muted">IBAN</p>
                        <p class=" font-size-2">{{ $bankAccount->IBAN }}</p>
                    </div>
                    <div class="text-center col-12 col-md-3">
                        <p class="fw-ligth fs-5 text-muted"> Balance</p>
                        <p class="balance font-size-2"> {{ $bankAccount->BALANCE }}</p>
                    </div>
                    <div class="text-center col-12 col-md-3">
                        <p class="fw-ligth fs-5 text-muted">Fecha de creación</p>
                        <p class=" font-size-2">{{ $bankAccount->created_at }}</p>
                    </div>
                </div>
            @endforeach
            <a href="{{ route('cuentasBanco') }}">Ver todas las cuentas</a>
        </div>

        <h2 class="fw-light font-size-2 mb-4 mt-4">Usuarios</h2>
        <div class="row justify-content-center align-items-center g-2 me-0">

            @foreach ($lastsUsers as $bankUser)
                @if ($bankUser->NAME != 'admin')

                    <div
                    class="container rounded border border-2 border-danger movimiento mb-2 row justify-content-center align-content-center p-3">
                    <div class="text-center col-12 col-md-3">
                        <p class="fw-ligth fs-5 text-muted">NIF</p>
                        <p class=" font-size-1">{{ $bankUser->NIF }}</p>
                    </div>
                    <div class="text-center col-12 col-md-2">
                        <p class="fw-ligth fs-5 text-muted"> Nombre</p>
                        <p class=" font-size-1"> {{ $bankUser->NAME }}</p>
                    </div>
                    <div class="text-center col-12 col-md-3">
                        <p class="fw-ligth fs-5 text-muted">Fecha de creación</p>
                        <p class=" font-size-1">{{ $bankUser->created_at }}</p>
                    </div>
                    <div class="text-center col-12 col-md-2">
                        <p class="fw-ligth fs-5 text-muted">Número de teléfono</p>
                        <p class=" font-size-1">{{ $bankUser->PHONENUMBER }}</p>
                    </div>
                </div>
                @endif
            @endforeach
            <a href="{{ route('usuariosBanco') }}">Ver todos los usuarios</a>
        </div>

    </div>

@endsection
