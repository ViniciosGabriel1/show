<!-- resources/views/products/create.blade.php -->

@extends('master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Cadastro de Produto</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('produtos.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nome do Produto</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">Preço</label>
                            <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ old('price') }}">
                            @error('price')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantidade</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', 0) }}">
                            @error('quantity')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Cadastrar Produto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
