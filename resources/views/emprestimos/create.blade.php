@extends('layouts.app')

@section('title', 'Cadastro de emprestimos')

@section('content')
<div class="container-fluid">
    <div class="row my-4">
        <div class="col-10">
            <h5>Cadastro de Emprestimos</h5>
        </div>
        <div class="col-2">
            <a class="btn btn-secondary btn-sm" href="{{ route('emprestimos-index') }}">Voltar</a>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <form action="{{ route('emprestimos-store') }}" method="POST">
                @csrf
                <div class="form-box">
                    <div class="form-group my-3">
                        <label for="">Titulo do Livro</label>
                        <select class="form-select" name="livro_id" id="livro_id">
                            <option value="select">-- Selecione um livro --</option>
                            @foreach($livros as $livro)                                
                            <option value="{{ $livro->id }}">Titulo do livro: ({{ $livro->titulo }}) - (Autor: {{ $livro->autor }}) - (Estoque: {{ $livro->estoque }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group my-3">
                        <label for="">Leitor</label>
                        <select class="form-select" name="leitor_id" id="leitor_id">
                            <option value="select">-- Selecione um leitor --</option>
                            @foreach($leitors as $leitor)
                                <option value="{{ $leitor->id }}">Leitor: ({{ $leitor->nome }}) - RG do Leitor: ({{ $leitor->rg }}) - Matrícula do Leitor: ({{ $leitor->matricula }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group my-3">
                        <label for="">Data do Emprestimo</label>
                        <input type="date" class="form-control" name="data_emprestimo">
                    </div>
                    <div class="form-group my-3">
                        <label for="">Data da Devolução</label>
                        <input type="date" class="form-control" name="data_devolucao">
                    </div>
                    <div class="form-group my-3">
                        <label for="">Quantidade Emprestada</label>
                        <input type="number" class="form-control" name="quantidade_emprestada">
                    </div>
                    <div class="form-group my-3">
                        <input type="submit" class="btn btn-info btn-sm" value="Cadastrar">
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection