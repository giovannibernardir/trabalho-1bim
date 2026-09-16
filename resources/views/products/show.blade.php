@extends('layouts.app')

@section('title', $product->nome)

@section('content')
    <p><a href="{{ route('products.index') }}">&larr; Voltar para produtos</a></p>

    <div class="card">
        <h1>{{ $product->nome }}</h1>
        <p>
            <strong>Preço:</strong> R$ {{ number_format($product->preco, 2, ',', '.') }}<br>
            <strong>Unidade de medida:</strong> {{ $product->unidade_medida }}
        </p>
        <a href="{{ route('products.edit', $product) }}" class="btn btn-secondary">Editar produto</a>
    </div>

    <h2>Itens do produto</h2>

    @if ($product->itens->isEmpty())
        <div class="card">Nenhum item cadastrado para este produto ainda.</div>
    @else
        <table>
            <thead>
                <tr>
                    <th>Quantidade</th>
                    <th>Cor</th>
                    <th>Valor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product->itens as $item)
                    <tr>
                        <td>{{ $item->quantidade }}</td>
                        <td>{{ $item->cor }}</td>
                        <td>R$ {{ number_format($item->valor, 2, ',', '.') }}</td>
                        <td class="actions">
                            <a href="{{ route('product-itens.edit', $item) }}" class="btn btn-secondary">Editar</a>
                            <form class="inline" action="{{ route('product-itens.destroy', $item) }}" method="POST" onsubmit="return confirm('Remover este item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="card">
        <h3>Adicionar item</h3>
        <form action="{{ route('product-itens.store') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">

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
                <button type="submit" class="btn btn-primary">Adicionar item</button>
            </p>
        </form>
    </div>
@endsection
