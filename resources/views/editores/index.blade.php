@extends('layouts.app')

@section('title', 'Listagem de Editores')

@section('content')
<div class="container-fluid">
    @if(session('success'))
        <div id="createAlert" class="alert alert-success my-2">
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
            <h5>Listagem de Editores</h5>
        </div>
        <div class="col-2">
            <a class="btn btn-info btn-sm" href="{{ route('editores-create') }}">Novo editor</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if(count($editors))
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($editors as $editor)
                        <tr>
                            <td>{{ $editor->id }}</td>
                            <td>{{ $editor->nome }}</td>
                            <td class="d-flex">
                                <a class="btn btn-warning btn-sm" href="{{ route('editores-edit', ['id'=>$editor->id]) }}">Editar</a>
                                    <form id="deleteFormEditor" action="{{ route('editores-destroy', ['id'=>$editor->id]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btm-sm ms-2" id="deleteButtonEditor">Excluir</button>
                                    </form>
                                    <script>
                                        document.getElementById('deleteButtonEditor').addEventListener('click', function(event) {
                                            if (confirm('Tem certeza que deseja excluir este registro?')) {
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
                Não existem Editores cadastrados nesta tabela
            </div>
            @endif
        </div>
    </div>
</div>
@if(session('danger'))
    <div id="deleteEditor" class="alert alert-danger my-2">
        {{ session('danger') }} 
    </div>
    <script>
        const deleteEditor = document.getElementById('deleteEditor');
        setTimeout(function() {
            deleteEditor.remove();
        }, 2000);
    </script>
@endif
@endsection