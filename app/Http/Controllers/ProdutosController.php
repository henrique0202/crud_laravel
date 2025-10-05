<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{

    public function index()
    {
        $produtos = produtos::all();
        return view("produtos.index",compact("produtos"));
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        Produtos::create([
        'nome' => $request->nome,
        'preco' => $request->preco
    ]);

    return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso!');

    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $produto = Produtos::findOrFail($id);
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, string $id)
    {
        $produto = Produtos::findOrFail($id);
        $produto->update([
                'nome' => $request->nome,
                'preco' => $request->preco
            ]);

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $produto = Produtos::findOrFail($id);
        $produto->delete();

        return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso!');
    }
}
