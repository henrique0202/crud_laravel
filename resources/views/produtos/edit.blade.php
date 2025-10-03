@extends('layouts.app')

@section('title', 'Editar Produto')

@section('content')
<div class="container">
    <h1>Editar Produto</h1>
    <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="{{ $produto->nome }}" required>
        <br><br>
        <label for="preco">Preço:</label>
        <input type="number" name="preco" id="preco" step="0.01" value="{{ $produto->preco }}" required>
        <br><br>
        <button type="submit">Atualizar</button>
        <a href="{{ route('produtos.index') }}">Voltar</a>
    </form>
</div>
@endsection