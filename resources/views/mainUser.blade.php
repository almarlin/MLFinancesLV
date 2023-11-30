@extends('layouts.template')

@section('navbar')
    @extends('layouts.navbarhome')
@endsection

@section('title', 'Mi panel')

@section('content')
    <div class="container-fluid mb-5">
        <div class="row justify-content-center align-items-center p-2">
            <div class="col-4"></div>
            <div class="col-4">Nº de cuenta</div>
            <div class="col-4">fechaActual</div>
        </div>
        <div class="row justify-content-center align-items-center p-2">
            <div class="col-4"></div>
            <div class="col-4">Img cartera</div>
            <div class="col-4 d-flex btn-group-md">
                <button class="btn rounded-0 btn-primary active">€</button>
                <button class="btn rounded-0 btn-primary">$</button>
                <button class="btn rounded-0 btn-primary">&</button>
                <button class="btn rounded-0 btn-primary">@</button>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-12 text-center">Saldo</div>
        </div>
        <div class="row justify-content-center align-items-center border border-1 m-5"></div>
        <div class="row justify-content-center align-items-center">
            <div class="col-12 text-center">Hola @auth {{ auth()->user()->NAME }} @endauth hoy es fechaActual</div>
        </div>


    </div>

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 fw-light fs-3">Últimos movimientos</div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6">
                <?php
                echo 'movimientos';
                ?>
                <small><a href="#">Ver todos los movimientos</a></small>
                <small><a href="#">Consultar mis préstamos</a></small>

            </div>
            <div class="col-12 col-md-6">


                <button class="btn btn-danger">Ingresar</button>
                <button class="btn btn-danger">Retirar</button>
                <button class="btn btn-danger">Enviar</button>


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
            <button class="col-1 btn btn-danger">Solicitar</button>
        </div>
    </div>
@endsection
