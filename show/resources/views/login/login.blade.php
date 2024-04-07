<!-- resources/views/login.blade.php -->

@extends('master')

@section('content')
@endsection

<h2 class="text-center mt-4">Faça seu login Aqui!</h2>
<div class="container mt-5">
    
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center">Login</h2>
                </div>

                <div class="card-body">
                    <form action="{{ route('login.store') }}" method="post">
                        @csrf <!-- Adicione o token CSRF para proteger seu formulário -->

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control" value="joao@example.com">
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" name="password" id="password" class="form-control" value="senha123">
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        @error('error')
                        <span class="text-danger" style="padding-left: 50px;">{{ $message }}</span><br>
                        @enderror
                        <br><button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-3 text-center">
    <p>Não tem uma conta? <a href="{{ route('cadastro.index') }}">Cadastre-se aqui</a></p>
</div>

