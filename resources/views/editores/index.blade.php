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
                                <a class="btn btn-warning btn-sm" href="{{ route('editores-edit', ['id'=>$editor->id]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                    </svg>
                                </a>
                                    <form id="deleteFormEditor" action="{{ route('editores-destroy', ['id'=>$editor->id]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btm-sm ms-2" id="deleteButtonEditor">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                            </svg>
                                        </button>
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