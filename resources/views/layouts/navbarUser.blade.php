<nav class="navbar navbar-expand-sm navbar-danger bg-danger">
    <div class="container">
        <a class="navbar-brand" href="#">ML Finances</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-light fs-6 fw-light" href="{{ route('mipanel') }}" aria-current="page">Mi
                        panel </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light fs-6 fw-light" href="{{ route('verMovimientos') }}">Movimientos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light fs-6 fw-light" href="{{ route('verPrestamos') }}">Préstamos</a>
                </li>
                <li class="dropdown">
                    <img class="img-responsive mb-4 btn btn-danger dropdown-toggle col-2 rounded-circle border border-2 border-light"
                        src="{{ asset('../storage/app/public/' . Auth::user()->PROFILEPHOTO) }}" alt="Foto de Perfil"
                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <ul class="dropdown-menu bg-danger">
                        <li><a class="dropdown-item  text-light" href="{{ route('datosUsuario') }}">Mis datos</a></li>
                        <li><a class="dropdown-item  text-light" href="{{ route('logout') }}">Cerrar sesión</a></li>

                    </ul>
                </li>



            </ul>
        </div>
    </div>
</nav>
