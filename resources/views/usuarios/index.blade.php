@extends('layouts.app')

@section('title', 'Listagem de ususários')

@section('content')
<div class="container-fluid">
    <div class="row my-4">
        <div class="col-10">
            <h5>Listagem de Usuários</h5>
        </div>
        <div class="col-2">
            <a class="btn btn-info btn-sm" href="{{ route('usuarios-create') }}">Novo Usuário</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @if(count($users))
            <table class="table table-hover tabel-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="d-flex">
                                <a class="btn btn-warning btn-sm" href="{{ route('usuarios-edit', ['id'=>$user->id]) }}">Editar</a>
                                <form id="deleteFormUser" action="{{ route('usuarios-destroy', ['id'=>$user->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm ms-2" id="deleteButtonUser">Excluir</button>
                                </form>
                                <script>
                                    document.getElementById('deleteButtonUser').addEventListener('click', function(event) {
                                        if (confirm('Tem certeza que deseja excluir esse usuário?')) {
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
                Não existem Usuários cadastrados nesta tabela
            </div>
            @endif
        </div>
    </div>
</div>
@endsection