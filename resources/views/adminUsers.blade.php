@extends('layouts.template')

@section('navbar')
    @extends('layouts.navbarAdmin')
@endsection

@section('title', 'Usuarios')

@section('content')




    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-6">

            <div class="container mt-5">
                <h1 class="display-5 fw-light mb-5">Todos los usuarios</h1>
                @foreach ($users as $user)
                @if($user->NAME!='admin')
                <div class="border border-2 border-danger rounded-2 p-3 mb-2">
                    <p class="text-center">NIF: {{ $user->NIF }}</p>
                    <p class="text-center">Nombre: {{ $user->NAME }}</p>
                    <p class="text-center">Apellidos: {{ $user->SURNAME }}</p>
                    <p class="text-center">Fecha de creación: {{ $user->created_at }}</p>
                    <p class="text-center">Número de teléfono: {{ $user->PHONENUMBER }}</p>
                </div>
                @endif
                    
                @endforeach
            </div>
            <div class="d-flex justify-content-center">{{ $users->links() }}</div>

        </div>
    </div>
@endsection