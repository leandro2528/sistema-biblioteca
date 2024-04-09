@extends('layouts.app')

@section('title', 'Listagem de Livros')

@section('content')
<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row my-3">
        <div class="col-10">
            <h5>Listagem de Livros</h5>
        </div>
        <div class="col-2">
            <a class="btn btn-info btn-sm" href="{{ route('livros-create') }}">Novo Livro</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if(count($livros))
            <table class="table table-hover table-striped table-bordered">
                <thead style="font-size: 12px;">
                    <tr>
                        <th>#</th>
                        <th>Titulo</th>
                        <th>Autor</th>
                        <th>Editor</th>
                        <th>Genero</th>
                        <th>Disponível</th>
                        <th>Observação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody style="font-size: 10px;">
                    @foreach($livros as $livro)
                    <tr>
                        <td>{{ $livro->id }}</td>
                        <td>{{ $livro->titulo }}</td>
                        <td>{{ $livro->autor }}</td>
                        <td>{{ $livro->editor->nome }}</td>
                        <td>{{ $livro->genero->nome }}</td>
                        <td>{{ $livro->disponivel }}</td>
                        <td>{{ $livro->observacao }}</td>
                        <td class="d-flex">
                            <a class="btn btn-warning btn-sm" href="{{ route('livros-edit', ['id'=>$livro->id]) }}">Editar</a>
                            <form action="{{ route('livros-destroy', ['id'=>$livro->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm ms-2" id="deleteButtonLivro">Excluir</button>
                            </form>
                            <script>
                                document.getElementById('deleteButtonLivro').addEventListener('click', function(event) {
                                    if(confirm("Tem certeza que deseja excluir esse livro:")) {
                                        return true;
                                    } else {
                                        event.preventDefault();
                                        return false;
                                    }
                                });
                            </script>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-info">
                Não existem Livros nesta tabela
            </div>
            @endif
        </div>
    </div>
</div>
@endsection