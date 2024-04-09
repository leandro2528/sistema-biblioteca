@extends('layouts.app')

@section('title', 'Cadastro de Generos')

@section('content')
<div class="container">
    <div class="row my-4">
        <div class="col-10">
            <h5>Cadastro de Gêneros</h5>
        </div>
        <div class="col-2">
            <a class="btn btn-secondary btn-sm" href="{{ route('generos-index') }}">Voltar</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{ route('generos-store') }}" method="POST">
                @csrf
                <div class="form-group my-3">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" name="nome">
                </div>
                <div class="form-group my-3">
                    <input type="submit" class="btn btn-info" value="Cadastrar">
                </div>

            </form>
        </div>
    </div>
</div>
@endsection