@extends('layouts.app')

@section('title', 'Novo item')

@section('content')
    <h1>Novo item de produto</h1>

    <div class="card">
        <form action="{{ route('product-itens.store') }}" method="POST">
            @csrf

            <label for="product_id">Produto</label>
            <select id="product_id" name="product_id" required>
                <option value="">Selecione...</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" @selected(old('product_id', $selectedProductId) == $product->id)>
                        {{ $product->nome }}
                    </option>
                @endforeach
            </select>
            @error('product_id') <div class="error">{{ $message }}</div> @enderror

            <label for="quantidade">Quantidade</label>
            <input type="number" min="1" id="quantidade" name="quantidade" value="{{ old('quantidade') }}" required>
            @error('quantidade') <div class="error">{{ $message }}</div> @enderror

            <label for="cor">Cor</label>
            <input type="text" id="cor" name="cor" value="{{ old('cor') }}" required>
            @error('cor') <div class="error">{{ $message }}</div> @enderror

            <label for="valor">Valor</label>
            <input type="number" step="0.01" min="0" id="valor" name="valor" value="{{ old('valor') }}" required>
            @error('valor') <div class="error">{{ $message }}</div> @enderror

            <p>
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
            </p>
        </form>
    </div>
@endsection
