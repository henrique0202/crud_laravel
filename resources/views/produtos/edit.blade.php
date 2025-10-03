<form action="{{ route('produtos.update', $produto->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" value="{{ $produto->nome }}" required>
    <br>
    <label for="preco">Preço:</label>
    <input type="number" name="preco" id="preco" step="0.01" value="{{ $produto->preco }}" required>
    <br>
    <button type="submit">Atualizar</button>
</form>