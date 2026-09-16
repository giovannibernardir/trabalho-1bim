@extends('layouts.app')

@section('title', 'Editar item')

@section('content')
    <h1>Editar item</h1>

    <div class="card">
        <form action="{{ route('product-itens.update', $item) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="product_id">Produto</label>
            <select id="product_id" name="product_id" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" @selected(old('product_id', $item->product_id) == $product->id)>
                        {{ $product->nome }}
                    </option>
                @endforeach
            </select>
            @error('product_id') <div class="error">{{ $message }}</div> @enderror

            <label for="quantidade">Quantidade</label>
            <input type="number" min="1" id="quantidade" name="quantidade" value="{{ old('quantidade', $item->quantidade) }}" required>
            @error('quantidade') <div class="error">{{ $message }}</div> @enderror

            <label for="cor">Cor</label>
            <input type="text" id="cor" name="cor" value="{{ old('cor', $item->cor) }}" required>
            @error('cor') <div class="error">{{ $message }}</div> @enderror

            <label for="valor">Valor</label>
            <input type="number" step="0.01" min="0" id="valor" name="valor" value="{{ old('valor', $item->valor) }}" required>
            @error('valor') <div class="error">{{ $message }}</div> @enderror

            <p>
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="{{ route('products.show', $item->product_id) }}" class="btn btn-secondary">Cancelar</a>
            </p>
        </form>
    </div>
@endsection
