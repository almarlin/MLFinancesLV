@extends('layouts.template')

@section('navbar')
    @extends('layouts.navbarhome')
@endsection

@section('title', 'Consultar mis préstamos')

@section('content')


    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-6">

            <div class="container">
                @foreach ($loans as $loan)
                    <p>{{ $loan->NAME }}</p>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">{{ $loans->links() }}</div>

        </div>
    </div>
@endsection
