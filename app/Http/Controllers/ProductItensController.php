<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductItens;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductItensController extends Controller
{
    /**
     * Lista todos os itens de todos os produtos.
     */
    public function index(): View
    {
        $productItens = ProductItens::with('product')->latest()->get();

        return view('productitens.index', compact('productItens'));
    }

    /**
     * Formulário de criação de um novo item de produto.
     */
    public function create(Request $request): View
    {
        $products = Product::orderBy('nome')->get();
        $selectedProductId = $request->query('product_id');

        return view('productitens.create', compact('products', 'selectedProductId'));
    }

    /**
     * Persiste um novo item de produto.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'quantidade' => ['required', 'integer', 'min:1'],
            'cor' => ['required', 'string', 'max:50'],
            'valor' => ['required', 'numeric', 'min:0'],
        ]);

        ProductItens::create($validated);

        return redirect()
            ->route('products.show', $validated['product_id'])
            ->with('status', 'Item adicionado com sucesso.');
    }

    /**
     * Formulário de edição de um item de produto.
     */
    public function edit(ProductItens $productItens): View
    {
        $products = Product::orderBy('nome')->get();

        return view('productitens.edit', [
            'item' => $productItens,
            'products' => $products,
        ]);
    }

    /**
     * Atualiza um item de produto existente.
     */
    public function update(Request $request, ProductItens $productItens): RedirectResponse
    {
        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'quantidade' => ['required', 'integer', 'min:1'],
            'cor' => ['required', 'string', 'max:50'],
            'valor' => ['required', 'numeric', 'min:0'],
        ]);

        $productItens->update($validated);

        return redirect()
            ->route('products.show', $productItens->product_id)
            ->with('status', 'Item atualizado com sucesso.');
    }

    /**
     * Remove um item de produto.
     */
    public function destroy(ProductItens $productItens): RedirectResponse
    {
        $productId = $productItens->product_id;

        $productItens->delete();

        return redirect()
            ->route('products.show', $productId)
            ->with('status', 'Item removido com sucesso.');
    }
}
