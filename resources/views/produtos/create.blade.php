@extends('layouts.app')

@section('title', 'Novo Produto')

@section('content')
<div class="container">
    <h1>Novo Produto</h1>
    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
        <br><br>
        <label for="preco">Preço:</label>
        <input type="number" name="preco" id="preco" step="0.01" required>
        <br><br>
        <button type="submit">Salvar</button>
        <a href="{{ route('produtos.index') }}">Voltar</a>
    </form>
</div>
@endsection