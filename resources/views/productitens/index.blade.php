@extends('layouts.app')

@section('title', 'Itens de produtos')

@section('content')
    <h1>Itens de produtos</h1>

    @if ($productItens->isEmpty())
        <div class="card">Nenhum item cadastrado ainda.</div>
    @else
        <table>
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Cor</th>
                    <th>Valor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productItens as $item)
                    <tr>
                        <td><a href="{{ route('products.show', $item->product) }}">{{ $item->product->nome }}</a></td>
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
@endsection
