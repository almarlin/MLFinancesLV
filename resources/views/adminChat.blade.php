@extends('layouts.template')
@section('navbar')
    @extends('layouts.navbarAdmin')
@endsection
@section('script')
<script defer src="{{ asset('../resources/js/validateForm.js') }}"></script>

@endsection

@section('title', 'Panel de respuesta')

@section('content')

    <div class="container mt-5">
        <div class="offcanvas-body small">
            <h3 class="fw-light fs-4">Chat</h3>

            <h3 class="fw-light fs-4 text-light bg-danger p-2 mt-4 rounded-2" id="emailSelected">Atención al cliente
            </h3>
            <div class="h-50 bg-light mb-2 mt-2 rounded-2 container overflow-auto">
                @foreach ($messages as $message)
                <div class="d-flex mb-2 @if ($message->receiver_id == 1) justify-content-end @endif">
                    <p class="d-flex p-1 rounded border border-1 border-danger @if ($message->receiver_id == 1) text-light bg-danger @else text-end @endif">
                        {{ $message->content }}
                    </p>
                </div>
            @endforeach
            </div>

        </div>
        <form action="{{ route('adminSendMessage') }}" method='POST' id="form">
            @csrf
            <div class="mb-3 container">
                <div class="row">
                    <div class="col-10">
                        <input type="text" class="form-control" name="inputMessage" id="inputMessage"
                            placeholder="Mensaje">
                    </div>
                    <div class="col-2">
                        <input type="hidden" name="user_id" id="user_id" value="{{ $messages[0]->user_id }}">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </div>
            </div>
           


        </form>
    </div>
@endsection
