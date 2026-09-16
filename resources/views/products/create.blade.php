@extends('layouts.app')

@section('title', 'Novo produto')

@section('content')
    <h1>Novo produto</h1>

    <div class="card">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required>
            @error('nome') <div class="error">{{ $message }}</div> @enderror

            <label for="preco">Preço</label>
            <input type="number" step="0.01" min="0" id="preco" name="preco" value="{{ old('preco') }}" required>
            @error('preco') <div class="error">{{ $message }}</div> @enderror

            <label for="unidade_medida">Unidade de medida</label>
            <input type="text" id="unidade_medida" name="unidade_medida" value="{{ old('unidade_medida') }}" placeholder="ex: un, kg, cx" required>
            @error('unidade_medida') <div class="error">{{ $message }}</div> @enderror

            <p>
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
            </p>
        </form>
    </div>
@endsection
