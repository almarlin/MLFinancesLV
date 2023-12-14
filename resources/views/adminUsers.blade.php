@extends('layouts.template')

@section('navbar')
    @extends('layouts.navbarAdmin')
@endsection

@section('title', 'Usuarios')

@section('content')




    <div class="row justify-content-center align-items-center me-0">
        <div class="col-12 col-md-6">

            <div class="container mt-5">
                <h1 class="display-5 fw-light mb-5">Todos los usuarios</h1>
                @foreach ($users as $bankUser)
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
            </div>
            <div class="d-flex justify-content-center">{{ $users->links() }}</div>

        </div>
    </div>
@endsection