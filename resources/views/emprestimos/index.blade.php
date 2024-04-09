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
                                <button type="button" class="btn btn-success btn-sm me-2" title="Ver informações de emprestimos" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                    </svg>
                                </button>
                                <a class="btn btn-warning btn-sm" title="Editar emprestimo"  href="{{ route('emprestimos-edit', ['id'=>$emprestimo->id]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                    </svg>
                                </a>
                                <form action="{{ route('emprestimos-destroy', ['id'=>$emprestimo->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm ms-2" title="Excluir emprestimo">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                        </svg>
                                    </button>
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
    <!-- Fim Modal ver emprestimos de livros -->

@endsection