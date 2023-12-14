@extends('layouts.template')

@section('navbar')
    @extends('layouts.navbarAdmin')
@endsection
@section('script')
    <script defer src="{{ asset('../resources/js/balanceToDecimal.js') }}"></script>

@endsection
@section('title', 'Cuentas')


@section('content')

    @php
        use App\Models\User;
    @endphp


    <div class="row justify-content-center align-items-center me-0">
        <div class="col-12 col-md-6">

            <div class="container mt-5">
                <h1 class="display-5 fw-light mb-5">Todas las cuentas</h1>
                <div class="row justify-content-center align-items-center g-2 me-0">


                    @foreach ($accounts as $bankAccount)
                        <div
                            class="container rounded border border-2 border-danger movimiento mb-2 row justify-content-center align-content-center p-3">
                            <div class="text-center col-12 col-md-3">
                                <p class="fw-ligth fs-5 text-muted">IBAN</p>
                                <p class=" font-size-2">{{ $bankAccount->IBAN }}</p>
                            </div>
                            <div class="text-center col-12 col-md-3">
                                <p class="fw-ligth fs-5 text-muted"> Balance</p>
                                <p class="balance font-size-2"> {{ $bankAccount->BALANCE }}</p>
                            </div>
                            <div class="text-center col-12 col-md-3">
                                <p class="fw-ligth fs-5 text-muted">Fecha de creación</p>
                                <p class=" font-size-2">{{ $bankAccount->created_at }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-center">{{ $accounts->links() }}</div>

        </div>
    </div>
@endsection
