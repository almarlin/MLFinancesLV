@extends('layouts.template')

@section('navbar')
    @extends('layouts.navbarhome')
@endsection

@section('title', 'Mi panel')

@section('content')

    <aside class="mt-1">
        <button class="btn btn-danger text-light fs-5 fw-light rounded-0" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Chat ></button>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title fs-4 fw-bold" id="offcanvasBottomLabel">Chat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body small">
                <h3 class="fw-light fs-4">Contactos</h3>
                <div>lista contactos</div>
                <div>imagen añadir contactos</div>
                <h3 class="fw-light fs-4 text-light bg-danger p-2 mt-4 rounded-2">Contacto 1</h3>
                <div class="h-50 bg-light mb-2 mt-2 rounded-2 container">
                    @php
                        use App\Models\Message;

                        $idUser = auth()->user()->id;
                        $messages = Message::where('user_id', $idUser)
                            ->orWhere('receiver_id', $idUser)
                            ->get();
                    @endphp

                    @for ($i = count($messages) - 1; $i >= 0; $i--)
                        @php
                            $message = $messages[$i];
                        @endphp

                        <div class="row mb-2">
                            <p class="col-6 rounded border border-2 border-danger">{{ $message->content}}</p>
                        </div>
                    @endfor
                </div>
                <form action="{{route('sendMessage')}}" method='POST'>
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
                <p class="text-center">Nº de cuenta</p>
                <p class="text-center">@auth {{ auth()->user()->accounts->first()->IBAN }} @endauth
                </p>

            </div>
            <div class="col-4">{{ \Carbon\Carbon::now()->format('d-m-Y') }}</div>
        </div>
        <div class="row justify-content-center align-items-center p-2">
            <div class="col-4"></div>
            <div class="col-4 text-center">Img cartera</div>
            <div class="col-4 d-flex btn-group-md">
                <button class="btn rounded-0 btn-primary active">€</button>
                <button class="btn rounded-0 btn-primary">$</button>
                <button class="btn rounded-0 btn-primary">&</button>
                <button class="btn rounded-0 btn-primary">@</button>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <p class="text-center display-6">
                    @auth
                        {{ auth()->user()->accounts->first()->BALANCE }}
                    @endauth
                </p>
            </div>
        </div>
        <div class="row justify-content-center align-items-center border border-1 m-5"></div>
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <p class="text-center fw-light fs-4">Hola <strong>{{ auth()->user()->NAME }}
                    </strong> hoy es {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
            </div>
        </div>


    </div>

    <div class="container">

        <div class="row justify-content-center align-items-center">
            <div class="col-12 fw-light fs-3">Últimos movimientos</div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6">

                @php
                    use App\Models\Movement;
                    // Para identificar todos los movimientos del usuario, recibidos y realizados.
                    // Cogemos su id (desde la autenticacion) y lo buscamos en la bbdd tanto como destinatario como ejecutor.
                    // Finalmente mostramos los movimientos de mas reciente a mas antiguo.
                    $idUserAccount = auth()
                        ->user()
                        ->accounts->first()->id;
                    $movements = Movement::where('account_id', $idUserAccount)
                        ->orWhere('toaccount_id', $idUserAccount)
                        ->get();
                    $count = 0;
                @endphp

                @for ($i = count($movements) - 1; $i >= 0; $i--)
                    @php
                        $movement = $movements[$i];
                    @endphp

                    <div class="container rounded border border-2 border-danger movimiento mb-2">
                        <p class="text-center">De {{ $movement->fromIBAN }}</p>
                        <p class="text-center">A {{ $movement->toIBAN }}</p>
                        <p class="text-center">Concepto {{ $movement->CONCEPT }}</p>
                        <p class="text-center">Cantidad {{ $movement->QUANTITY }}</p>
                    </div>

                    @php
                        $count++;
                        if ($count == 2) {
                            break;
                        }
                    @endphp
                @endfor



                <small><a href="{{ route('verMovimientos') }}">Ver todos los movimientos</a></small>
                <small><a href="{{ route('verPrestamos') }}">Consultar mis préstamos</a></small>

            </div>
            <div class="col-12 col-md-6">


                <a href="{{ route('ingresar') }}"><button class="btn btn-danger">Ingresar</button></a>
                <a href="{{ route('retirar') }}"><button class="btn btn-danger">Retirar</button></a>
                <a href="{{ route('enviar') }}"><button class="btn btn-danger">Enviar</button></a>


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
            <a href="{{ route('solicitar') }}"><button class="col-1 btn btn-danger">Solicitar</button></a>
        </div>
    </div>
@endsection
