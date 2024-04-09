@extends('layouts.app')

@section('Listagem de Leitores')

@section('content')
<div class="container-fluid">
    @if(session('success'))
        <div id="createAlert" class="alert alert-info my-3">
            {{ session('success') }}
        </div>

        <script>
            const createAlert = document.getElementById('createAlert');
            setTimeout(function() {
                createAlert.remove();
            }, 2000);
        </script>
    @endif
    <div class="row my-4">
        <div class="col-10">
            <h5>Lista de Leitores Cadastrados</h5>
        </div>
        <div class="col-2">
            <a class="btn btn-info btn-sm" href="{{ route('leitores-create') }}">Novo Leitor</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @if(count($leitors))
            <table class="table table-striped table-bordered table-hover">
                <thead style="font-size: 12px;">
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Matricula</th>
                        <th>RG</th>
                        <th>Data de Nascimento</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody style="font-size: 10px;">
                    @foreach($leitors as $leitor)
                        <tr>
                            <td>{{ $leitor->id }}</td>
                            <td>{{ $leitor->nome }}</td>
                            <td>{{ $leitor->matricula }}</td>
                            <td>{{ $leitor->rg }}</td>
                            <td>{{ $leitor->data_nascimento }}</td>
                            <td>{{ $leitor->telefone }}</td>
                            <td>{{ $leitor->email }}</td>
                            <td class="d-flex">
                                <a class="btn btn-warning btn-sm" href="{{ route('leitores-edit', ['id'=>$leitor->id]) }}">Editar</a>
                                <form id="deleteFormLeitor" action="{{ route('leitores-destroy', ['id'=>$leitor->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm ms-3" id="deleteButtonLeitor">Excluir</button>
                                </form>
                                <script>
                                    document.getElementById('deleteButtonLeitor').addEventListener('click', function(event) {
                                        if(confirm('Tem certeza que deseja exluir esse(a) leitor(a)')) {
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
                Não existem Leitores cadastrados nesta tabela
            </div>
            @endif
        </div>
    </div>
</div>
@endsection