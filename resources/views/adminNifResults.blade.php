@extends('layouts.template')
@section('navbar')
    @extends('layouts.navbarAdmin')
@endsection
@section('script')
<script defer src="{{ asset('../resources/js/validateAdminChat.js') }}"></script>

@endsection

@section('title', 'Usuario y cuenta asociada')

@section('content')


    <div class="container mt-5">
        <h1 class="display-5">Buscar por NIF</h1>

        <div class="rounded-2 border border-2 border-danger p-2">
            <p>NIF: {{ $user->NIF }}</p>
            <p>Nombre: {{ $user->NAME }}</p>
            <p>Cuenta asociada: {{ $userAccount->IBAN }}</p>
            <p>Saldo: {{ $userAccount->BALANCE }}</p>
        </div>

        @foreach ($userMovements as $userMovement)
            <div class="border border-2 border-danger rounded-2 p-3 mb-2">
                <p class="text-center">Concepto: {{ $userMovement->CONCEPT }}</p>
                <p class="text-center">Cuenta de origen: {{ $userMovement->fromIBAN }}</p>
                <p class="text-center">Cuenta de destino: {{ $userMovement->toIBAN }}</p>
                <p class="text-center">Cantidad: {{ $userMovement->QUANTITY }}</p>
            </div>
        @endforeach

        <form action="{{route('usuarioBan')}}" method="POST" onsubmit="return validateForm()">
          @csrf
          <div class="mb-3">
              <label for="inputNif" class="form-label">NIF</label>
              <input type="text" class="form-control" name="inputNif" id="inputNif" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted"></small>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="userState" value='banUser' id="banUser">
              <label class="form-check-label" for="banUser">Bloquear usuario</label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="userState" value='unbanUser' id="unbanUser">
              <label class="form-check-label" for="unbanUser">Desbloquear usuario</label>
          </div>
          <button type="submit" class="btn btn-danger">Bloquear usuario</button>
          <small id="userStateError" class="form-text text-muted"></small>
      </form>

    </div>


@endsection
