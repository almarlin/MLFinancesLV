{{-- Para utilizar una plantilla de layout en la vista, se utiliza @extends() --}}
@extends('layouts.template')

{{-- Para establecer los elementos variables de la platilla se utiliza @section('', '') --}}
@section('title', 'Home')
@section('navbar')
    @extends('layouts.navbarhome')
@endsection

@section('content')
    <div class="container-fluid mt-5 p-0"><img src="{{ asset('../storage/app/public/imgs/banner.png') }}" class="img-fluid"
            alt="" /></div>
    <div class="container mt-5">


        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-3"><img src="{{ asset('../storage/app/public/icons/MLFinancesLeftlLogo.svg') }}" class="img-fluid p-4"
                alt="" />
            </div>
            <div class="row justify-content-center align-items-center col-12 col-md-9">
                <div class="col-12 text-center">
                    <h1 class="fw-light p-3">Bienvenido a ML Finances</h1>
                </div>
                <div class="col-12 justificar-texto">
                    <p class="mb-3 ">
                        ML Finances es el <strong>servicio financiero líder</strong> en Ilerna. Nuestra misión es
                        proporcionar soluciones financieras innovadoras y servicios de alta calidad para satisfacer las
                        necesidades de nuestros clientes.
                    </p>

                    <p class="mb-3 ">
                        En ML Finances, nos enorgullece ofrecer una amplia gama de productos y servicios, desde cuentas de
                        ahorro hasta préstamos y asesoramiento financiero personalizado. Nuestro compromiso con la
                        excelencia y la integridad nos ha convertido en la elección preferida para miles de clientes en
                        Ilerna.
                    </p>

                    <p class="mb-3 ">
                        Contamos con un equipo de profesionales altamente calificados y dedicados que están listos para
                        ayudarte a alcanzar tus metas financieras. Ya sea que estés buscando gestionar tus ahorros, obtener
                        un préstamo para tu hogar o recibir asesoramiento financiero, en ML Finances estamos aquí para
                        brindarte el respaldo que necesitas.
                    </p>

                    <p class="">
                        Descubre cómo ML Finances puede ser tu socio financiero confiable. ¡Bienvenido a una experiencia
                        financiera excepcional!
                    </p>
                </div>


            </div>
        </div>

        <div class="row justify-content-center align-items-center mt-5 bg-light p-2">
            <div class="col-12 col-md-6">
                <video width="640" height="360" controls autoplay>
                    <source src="{{ asset('../storage/app/public/videos/homeVideo.mp4') }}" type="video/mp4">
                    Tu navegador no soporta el elemento de video.
                </video>
            </div>
            <div class="col-12 col-md-6">
                <h3 class="fw-light text-center mb-4">Únete a ML Finances</h3>
                <p class="text-center">ML Finances cuenta con una gran cantidad de usuarios actualmente. ¡Únete y conoce nuestras ventajas!</p>
               <div class="text-center"><a href="{{ route('crearCuenta') }}"><button class="btn button-red button-movement">Unirse</button></div></a> 
            </div>
        </div>


    </div>

@endsection()
