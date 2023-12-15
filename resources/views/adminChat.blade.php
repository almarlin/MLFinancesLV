@extends('layouts.template')
@section('navbar')
    @extends('layouts.navbarAdmin')
@endsection
@section('script')
<script defer src="{{ asset('../resources/js/validateAdminChat.js') }}"></script>

@endsection

@section('title', 'Panel de respuesta')

@section('content')

    <div class="container mt-5">
        <div class="offcanvas-body small">
            <h3 class="fw-light fs-4">Chat</h3>

            <h3 class="fw-light fs-4 text-light bg-navbar p-2 mt-4 rounded-2" id="emailSelected">Atención al cliente
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

        </div>
        <form action="{{ route('adminSendMessage') }}" method='POST' id="form" onsubmit="return validateForm()">
            @csrf
            <div class="mb-3 container">
                <div class="row">
                    <div class="col-10">
                        <input type="text" class="form-control" name="inputMessage" id="inputMessage" placeholder="Mensaje">
                        <small id="helpMessage" class="form-text text-muted"></small>
                    </div>
                    <div class="col-2">
                        <input type="hidden" name="user_id" id="user_id" value="{{ $messages[0]->user_id }}">
                        <button type="submit" class="btn button-blue">Enviar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
