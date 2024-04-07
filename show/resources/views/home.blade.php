<!-- resources/views/welcome.blade.php -->

@extends('master')
@include('menu')


@section('content')

@if(auth()->check())

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Bem-vindo à minha aplicação, {{ auth()->user()->name }}</h2>
                    </div>
                    <div class="card-body">
                        <p>Esta é a página inicial da minha aplicação.</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('login.destroy') }}" class="btn btn-danger">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@endsection
