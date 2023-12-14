<nav class="navbar navbar-expand-sm bg-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{route('index')}}">ML Finances</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex align-items-center" id="collapsibleNavId">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0 d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link text-light fs-6 fw-light" href="{{ route('login') }}" aria-current="page">Acceder </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light fs-6 fw-light" href="{{ route('crearCuenta') }}">Crear cuenta</a>
                </li>
               



            </ul>
        </div>
    </div>
</nav>
