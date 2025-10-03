@extends('layouts.app')

@section('title', 'Listagem de Produtos')

@section('content')
<div class="container">
    <h1>Listagem de produtos</h1>
    <a href="{{ route('produtos.create') }}">Novo Produto</a>
    <table>
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
                <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline;" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn-delete" data-id="{{ $produto->id }}">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

<!-- Modal de confirmação -->
<div id="modal-confirm" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.4); align-items:center; justify-content:center;">
    <div style="background:#fff; padding:30px; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.2); text-align:center; min-width:300px;">
        <h2>Confirmar exclusão</h2>
        <p>Tem certeza que deseja excluir este produto?</p>
        <button id="btn-confirm" style="background:#e74c3c;">Sim, excluir</button>
        <button id="btn-cancel" style="background:#3498db;">Cancelar</button>
    </div>
</div>

<script>
let formToSubmit = null;

document.querySelectorAll('.btn-delete').forEach(btn => {
    btn.addEventListener('click', function(e) {
        formToSubmit = btn.closest('form');
        document.getElementById('modal-confirm').style.display = 'flex';
    });
});

document.getElementById('btn-cancel').onclick = function() {
    document.getElementById('modal-confirm').style.display = 'none';
    formToSubmit = null;
};

document.getElementById('btn-confirm').onclick = function() {
    if(formToSubmit) formToSubmit.submit();
};
</script>
@endsection