@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
    <h1>Produtos</h1>

    <p><a href="{{ route('products.create') }}" class="btn btn-primary">+ Novo produto</a></p>

    @if ($products->isEmpty())
        <div class="card">Nenhum produto cadastrado ainda.</div>
    @else
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Unidade de medida</th>
                    <th>Itens</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->nome }}</td>
                        <td>R$ {{ number_format($product->preco, 2, ',', '.') }}</td>
                        <td>{{ $product->unidade_medida }}</td>
                        <td>
                            @if ($product->itens->isEmpty())
                                <em>Sem itens</em>
                            @else
                                <ul class="itens-list">
                                    @foreach ($product->itens as $item)
                                        <li>
                                            {{ $item->quantidade }}x {{ $item->cor }}
                                            — R$ {{ number_format($item->valor, 2, ',', '.') }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>
                        <td class="actions">
                            <a href="{{ route('products.show', $product) }}" class="btn btn-secondary">Ver</a>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-secondary">Editar</a>
                            <form class="inline" action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Remover este produto e seus itens?');">
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
@endsection
