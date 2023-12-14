<nav class="navbar navbar-expand-sm bg-navbar">
    <div class="container">
        <a class="navbar-brand" href="#">ML Finances</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex align-items-center" id="collapsibleNavId">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0 d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link text-light fs-6 fw-light" href="{{ route('panelAdmin') }}"
                        aria-current="page">Panel general </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light fs-6 fw-light" href="{{ route('cuentasBanco') }}">Cuentas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light fs-6 fw-light" href="{{ route('usuariosBanco') }}">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light fs-6 fw-light" href="{{ route('movimientosBanco') }}">Movimientos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light fs-6 fw-light" href="{{ route('prestamosBanco') }}">Préstamos</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}"> <button class="btn button-red">Salir</button></a>
                </li>


            </ul>
        </div>
    </div>
</nav>
