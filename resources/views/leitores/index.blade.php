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
                                <a class="btn btn-warning btn-sm" href="{{ route('leitores-edit', ['id'=>$leitor->id]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                    </svg>
                                </a>
                                <form id="deleteFormLeitor" action="{{ route('leitores-destroy', ['id'=>$leitor->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm ms-3" id="deleteButtonLeitor">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                        </svg>
                                    </button>
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