@extends('layouts.app')

@section('Atualizar Leitores')

@section('content')
<div class="container">
    <div class="row my-4">
        <div class="col-10">
            <h5>Atualizar Leitores</h5>
        </div>
        <div class="col-2">
            <a class="btn btn-secondary btn-sm" href="{{ route('leitores-index') }}">Lista de Leitores</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="{{ route('leitores-update', ['id'=>$leitors->id]) }}" method="POST">
                @csrf
                @method('put')

                <div class="form-box">
                    <div class="form-group my-3">
                        <label for="">Nome:</label>
                        <input type="text" class="form-control" value="{{ $leitors->nome }}" name="nome">
                    </div>
                    <div class="form-group my-3">
                        <label for="">Matricula:</label>
                        <input type="text" class="form-control" value="{{ $leitors->matricula }}" name="matricula">
                    </div>
                </div>

                <div class="form-box">
                    <div class="form-group my-3">
                        <label for="">RG:</label>
                        <input type="text" class="form-control" value="{{ $leitors->rg }}" name="rg">
                    </div>
                    <div class="form-group my-3">
                        <label for="">Data do Nascimento:</label>
                        <input type="date" class="form-control" value="{{ $leitors->data_nascimento }}" name="data_nascimento">
                    </div>
                </div>

                <div class="form-box">
                    <div class="form-group my-3">
                        <label for="">Telefone:</label>
                        <input type="text" class="form-control" value="{{ $leitors->telefone }}" name="telefone">
                    </div>
                    <div class="form-group my-3">
                        <label for="">Email:</label>
                        <input type="text" class="form-control" value="{{ $leitors->email }}" name="email">
                    </div>
                </div>

                <div class="form-box">
                    <div class="form-group my-3">
                        <input type="submit" class="btn btn-warning btn-sm" value="Atualizar Editor">
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>
@endsection