@extends('layouts.app')

@section('title', 'Cadastro de Livros')

@section('content')
<div class="container-fluid">
    <div class="row my-3">
        <div class="col-10">
            <h5>Cadastro de Livros</h5>
        </div>
        <div class="col-2">
            <a class="btn btn-secondary btn-sm" href="{{ route('livros-index') }}">Voltar</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{ route('livros-store') }}" method="POST">
                @csrf
                <div class="form-box d-flex justify-content-between">
                    
                    <div class="form-group my-3 w-100">
                        <label for="">Tutulo</label>
                        <input type="text" class="form-control" name="titulo">
                    </div>
                    
                    <div class="form-group my-3 w-100 mx-3">
                        <label for="">Subtitulo</label>
                        <input type="text" class="form-control" name="subtitulo">
                    </div>

                    <div class="form-group my-3 w-100">
                        <label for="">Autor</label>
                        <input type="text" class="form-control" name="autor">
                    </div>

                </div>

                <div class="form-box d-flex justify-content-between">
                    
                    <div class="form-group my-3 w-100">
                        <label for="">Editor</label>
                        <select class="form-select" name="editor_id" id="editor_id">
                            <option value="select">-- Selecione um Editor --</option>
                            @foreach($editors as $editor)
                                <option value="{{ $editor->id }}">{{ $editor->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group my-3 w-100 mx-3">
                        <label for="">Edição</label>
                        <input type="number" class="form-control" name="edicao">
                    </div>

                    <div class="form-group my-3 w-100">
                        <label for="">Páginas</label>
                        <input type="number" class="form-control" name="paginas">
                    </div>

                </div>

                <div class="form-box d-flex justify-content-between">
                    
                    <div class="form-group my-3 w-100">
                        <label for="">Ano de Publicação</label>
                        <input type="date" class="form-control" name="ano_publicado">
                    </div>
                    
                    <div class="form-group my-3 w-100 mx-3">
                        <label for="">Gênero</label>
                        <select class="form-select" name="genero_id" id="genero_id">
                            <option value="select">-- Selecione um Gênero --</option>
                            @foreach($generos as $genero)
                                <option value="{{ $genero->id }}">{{ $genero->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group my-3 w-100">
                        <label for="">Código</label>
                        <input type="number" class="form-control" name="codigo">
                    </div>

                </div>

                <div class="form-box d-flex justify-content-between">
                    
                    <div class="form-group my-3 w-100">
                        <label for="">Estoque</label>
                        <input type="number" class="form-control" name="estoque">
                    </div>
                    
                    <div class="form-group my-3 w-100 mx-3">
                        <label for="">Disponível</label>
                        <input type="text" class="form-control" name="disponivel">
                    </div>

                    <div class="form-group my-3 w-100">
                        <label for="">Observação</label>
                        <input type="text" class="form-control" name="observacao">
                    </div>

                </div>

                <div class="form-box d-flex justify-content-between">
                    
                    <div class="form-group my-3">
                        <input type="submit" class="btn btn-info btn-sm" value="Cadastrar">
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>
@endsection