@extends('layouts.app')

@section('title', 'lListagem de emprestimos')

@section('content')
<div class="container-fluid">
    @if(session('success'))
        <div id="createAlert" class="alert alert-success my-3">
            {{ session('success') }}
        </div>
        <script>
            const createAlert = document.getElementById('createAlert');

            setTimeout(() => {
                createAlert.remove();
            }, 2000);
        </script>
    @endif

    @if(session('danger'))
        <div id="deleteAlert" class="alert alert-danger my-3">
            {{ session('danger') }}
        </div>
        <script>
            const deleteAlert = document.getElementById('deleteAlert');

            setTimeout(() => {
                deleteAlert.remove();
            }, 2000);
        </script>
    @endsession
    <div class="row my-4">
        <div class="col-10">
            <h5>Listagem de Emprestimos</h5>
        </div>
        <div class="col-2">
            <a class="btn btn-info btn-sm" href="{{ route('emprestimos-create') }}">Novo Emprestimo</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if(count($emprestimos))
            <table class="table table-hover table-striped table-bordered">
                <thead style="font-size: 14px;">
                    <tr>
                        <th>Titulo do Livro</th>
                        <th>Autor</th>
                        <th>Matricula</th>
                        <th>Quantidade Emprestado</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody style="font-size: 12px;">
                    @foreach($emprestimos as $emprestimo)
                        <tr>
                            <td>{{ $emprestimo->livro->titulo }}</td>    
                            <td>{{ $emprestimo->livro->autor }}</td>
                            <td>{{ $emprestimo->leitor->matricula }}</td>
                            <td>{{ $emprestimo->quantidade_emprestada }}</td>
                            <td class="d-flex">
                                <button type="button" class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Ver detalhes
                                </button>
                                <a class="btn btn-warning btn-sm" href="{{ route('emprestimos-edit', ['id'=>$emprestimo->id]) }}">Editar</a>
                                <form action="{{ route('emprestimos-destroy', ['id'=>$emprestimo->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm ms-2">Excluir</button>
                                </form>
                                <a class="btn btn-secondary btn-sm ms-2" href="{{ route('emprestimos-pdf') }}">Gerar PDF</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-info">
                Não existem emprestimo cadastrados nesta tabela.
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal ver emprestimos de livros -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Detalhes do Emprestimo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @foreach($emprestimos as $emprestimo)
                <div class="modal-body">
                    <div class="detalhes_emprestimo d-flex p-2">
                        <span style="font-weight: bold;">Livro empresatado: </span>
                        <span>{{ $emprestimo->livro->titulo }}</span>
                    </div>    
                                
                    <div class="detalhes_emprestimo d-flex p-2">
                        <span style="font-weight: bold;">Livro Empresatado: </span>
                        <span>{{ $emprestimo->livro->titulo }}</span>
                    </div>
                    <div class="detalhes_emprestimo d-flex p-2">
                        <span style="font-weight: bold;">Autor do Livro: </span>
                        <span>{{ $emprestimo->livro->autor }}</span>
                    </div>
                    <div class="detalhes_emprestimo d-flex p-2">
                        <span style="font-weight: bold;">quantidade Empresatada: </span>
                        <span>{{ $emprestimo->quantidade_emprestada }}</span>
                    </div>
                    <div class="detalhes_emprestimo d-flex p-2">
                        <span style="font-weight: bold;">Leitor: </span>
                        <span>{{ $emprestimo->leitor->nome }}</span>
                    </div>
                    <div class="detalhes_emprestimo d-flex p-2">
                        <span style="font-weight: bold;">RG: </span>
                        <span>{{ $emprestimo->leitor->rg }}</span>
                    </div>
                    <div class="detalhes_emprestimo d-flex p-2">
                        <span style="font-weight: bold;">Matricula: </span>
                        <span>{{ $emprestimo->livro->matricula }}</span>
                    </div>
                    <div class="detalhes_emprestimo d-flex p-2">
                        <span style="font-weight: bold;">Data do Emprestimo: </span>
                        <span>{{ \Illuminate\Support\Carbon::parse($emprestimo->data_emprestimo)->format('d/m/y') }}</span>
                    </div>
                    <div class="detalhes_emprestimo d-flex p-2">
                        <span style="font-weight: bold;">Data da Devolução: </span>
                        <span>{{ \Illuminate\Support\Carbon::parse($emprestimo->data_devolucao)->format('d/m/y') }}</span>
                    </div>    
                </div>
            @endforeach

        </div>
    </div>
</div>

@endsection