@extends('layouts.template')

@section('navbar')
    @extends('layouts.navbarUser')
@endsection

@section('script')
    <script defer src="{{ asset('../resources/js/balanceToDecimal.js') }}"></script>
    <script defer src="{{ asset('../resources/js/currencyChange.js') }}"></script>
    <script defer src="{{ asset('../resources/js/dates.js') }}"></script>
@endsection

@section('title', 'Mi panel')

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

                <h3 class="fw-light fs-4 text-light bg-danger p-2 mt-4 rounded-2" id="emailSelected">Atención al cliente
                </h3>
                <div class="h-50 bg-light mb-2 mt-2 rounded-2 container overflow-auto">
                    @php
                        use App\Models\Message;

                        $idUser = auth()->user()->id;
                        $messages = Message::where('user_id', $idUser)
                            ->orWhere('receiver_id', $idUser)
                            ->get();

                    @endphp

                    @foreach ($messages as $message)
                        <div
                            class="d-flex mb-2 @if ($message->receiver_id == $idUser) justify-content-start @else justify-content-end @endif">
                            <p
                                class="d-flex p-1 rounded border border-1 border-danger @if ($message->receiver_id == $idUser) text-light bg-danger text-start @else text-end @endif">
                                {{ $message->content }}
                            </p>
                        </div>
                    @endforeach
                </div>
                <form action="{{ route('sendMessage') }}" method='POST'>
                    @csrf
                    <div class="mb-3 container">
                        <div class="row">
                            <div class="col-8">
                                <input type="text" class="form-control" name="inputMessage" id="inputMessage"
                                    placeholder="Mensaje">
                            </div>
                            <div class="col-3">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </aside>

    <div class="container-fluid mb-5">
        <div class="row justify-content-center align-items-center p-2">
            <div class="col-4"></div>
            <div class="col-4">
                <p class="text-center fw-light fs-5">Nº de cuenta</p>
                <p class="text-center"><strong>@auth {{ auth()->user()->accounts->first()->IBAN }} @endauth
                    </strong>
                </p>

            </div>
            <div class="col-4" id="date1"></div>
        </div>
        <div class="row justify-content-center align-items-center p-2">
            <div class="col-4"></div>
            <div class="col-4 text-center"><img src="{{ asset('../storage/app/public/icons/wallet-svgrepo-com.svg') }}"
                    class="img-fluid w-25 mb-4" alt="Imagen cartera" />
            </div>
            <div class="col-4 d-flex btn-group-md">
                <button onclick="changeCurrency('euro')" class="btn rounded-0 button-red" id='euro'>€</button>
                <button onclick="changeCurrency('dollar')" class="btn rounded-0 button-red" id='dollar'>$</button>
                <button onclick="changeCurrency('pound')" class="btn rounded-0 button-red" id='pound'>&</button>
                <button onclick="changeCurrency('yen')" class="btn rounded-0 button-red" id='yen'>#</button>
                <button onclick="changeCurrency('ruble')" class="btn rounded-0 button-red" id='ruble'>@</button>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <p class="text-center display-6 balance">
                    @auth
                        {{ auth()->user()->accounts->first()->BALANCE }}
                    @endauth
                </p>
            </div>
        </div>
        <div class="row justify-content-center align-items-center border border-1 m-5"></div>
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <p id="dayName" class="text-center fw-light fs-4">Hola <strong>{{ auth()->user()->NAME }}
                    </strong> hoy es </p>
            </div>
        </div>


    </div>

    <div class="container">

        <div class="row justify-content-center align-items-center">
            <div class="col-12 fw-light fs-3 mb-4">Últimos movimientos</div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6">

                @foreach ($lastMovements as $movement)
                    <div class="container rounded border border-2 border-danger movimiento mb-2">
                        <p class="text-center">De {{ $movement->fromIBAN }}</p>
                        <p class="text-center">A {{ $movement->toIBAN }}</p>
                        <p class="text-center">Concepto {{ $movement->CONCEPT }}</p>
                        <p class="text-center">Cantidad {{ $movement->QUANTITY }}</p>
                    </div>
                @endforeach



                <small><a href="{{ route('verMovimientos') }}">Ver todos los movimientos</a></small>
                <small><a href="{{ route('verPrestamos') }}">Consultar mis préstamos</a></small>

            </div>
            <div class="col-12 col-md-6">


                <a href="{{ route('ingresar') }}"><button class="btn button-green">Ingresar</button></a>
                <a href="{{ route('retirar') }}"><button class="btn button-red">Retirar</button></a>
                <a href="{{ route('enviar') }}"><button class="btn button-blue">Enviar</button></a>


            </div>

        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-12 text-center">
                <h1 class="display-6">¿Tienes problemas de solvencia?</h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-12 text-center">
                <p class="text-center fw-light fs-5">Consulta tu capacidad para pedir un préstamo y solicítalo aquí</p>
            </div>
        </div>
        <div class="row justify-content-center align-items-center g-2">
            <a href="{{ route('solicitar') }}"><button class="col-1 btn button-red">Solicitar</button></a>
        </div>
    </div>
@endsection
