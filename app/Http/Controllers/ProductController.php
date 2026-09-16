<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Lista todos os produtos juntamente com seus itens.
     */
    public function index(): View
    {
        $products = Product::with('itens')->latest()->get();

        return view('products.index', compact('products'));
    }

    /**
     * Formulário de criação de um novo produto.
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Persiste um novo produto.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'preco' => ['required', 'numeric', 'min:0'],
            'unidade_medida' => ['required', 'string', 'max:20'],
        ]);

        Product::create($validated);

        return redirect()
            ->route('products.index')
            ->with('status', 'Produto criado com sucesso.');
    }

    /**
     * Exibe um produto específico com seus itens.
     */
    public function show(Product $product): View
    {
        $product->load('itens');

        return view('products.show', compact('product'));
    }

    /**
     * Formulário de edição de um produto.
     */
    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Atualiza um produto existente.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'preco' => ['required', 'numeric', 'min:0'],
            'unidade_medida' => ['required', 'string', 'max:20'],
        ]);

        $product->update($validated);

        return redirect()
            ->route('products.index')
            ->with('status', 'Produto atualizado com sucesso.');
    }

    /**
     * Remove um produto (e seus itens, via cascade).
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('status', 'Produto removido com sucesso.');
    }
}
