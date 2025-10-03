<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listagem de produtos</h1>
    <a href="{{ route('produtos.create') }}">Novo Produto</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
        @foreach($produtos as $produto)
        <tr>
            <td>{{ $produto->id }}</td>
            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->preco }}</td>
            <td>
            <a href="{{ route('produtos.edit', $produto->id) }}">Editar</a>
            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
            </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>