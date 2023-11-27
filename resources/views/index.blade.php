{{-- Para utilizar una plantilla de layout en la vista, se utiliza @extends() --}}
@extends('layouts.template')

{{-- Para establecer los elementos variables de la platilla se utiliza @section('', '') --}}
@section('title', 'Home')


@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-3">Logo
            </div>
            <div class="row justify-content-center align-items-center col-12 col-md-9">
                <div class="col-12 text-center">
                    <h1 class="fw-light p-3">Bienvenido a ML Finances</h1>
                </div>
                <div class="col-12">ML Finances es el <strong>servicio financiero líder</strong> en Ilerna. Lorem, ipsum
                    dolor sit amet
                    consectetur adipisicing elit. Suscipit minima laborum explicabo
                    fugit vitae amet fugiat officia quis doloremque sunt! Aut distinctio reiciendis maxime, aperiam
                    consequuntur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus necessitatibus vel
                    consequuntur dignissimos ipsa id porro iste animi magni architecto veniam et atque eum est minus
                    temporibus,
                    in odit optio.
                    molestiae incidunt sit. Sint?</div>
            </div>
        </div>
        <?php
        try {
            \DB::connection()->getPDO();
            echo \DB::connection()->getDatabaseName();
        } catch (\Exception $e) {
            echo 'None';
        }
        ?>
    </div>

@endsection()
