@extends('layouts.app')

@section('title', 'Listagem de Generos')

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
            <h5>Listagem de Gêneros</h5>
        </div>
        <div class="col-2">
            <a class="btn btn-info btn-sm" href="{{ route('generos-create') }}">Novo Gênero</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if(count($generos))
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($generos as $genero)
                        <tr>
                            <td>{{ $genero->id }}</td>
                            <td>{{ $genero->nome }}</td>
                            <td class="d-flex">
                                <a class="btn btn-warning btn-sm" href="{{ route('generos-edit', ['id'=>$genero->id]) }}">Editar</a>
                                <form action="{{ route('generos-destroy', ['id'=>$genero->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm ms-2">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-info">
                Não existem Gêneros cadastrad nesta tabela
            </div>
            @endif
        </div>
    </div>
</div>
@if(session('danger'))
    <div id="deleteGenero" class="alert alert-danger p-4 m-4">
        {{ session('danger') }}
    </div>
    <script>
        const deleteGenero = document.getElementById('deleteGenero');
        setTimeout(function() {
            deleteGenero.remove();
        }, 2000);
    </script>
@endif
@endsection