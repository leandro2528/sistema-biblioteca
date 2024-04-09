@extends('layouts.app')

@section('title', 'Atualização de Editores')

@section('content')
<div class="container">
    <div class="row my-4">
        <div class="col-10">
            <h5>Atualização de Editores</h5>
        </div>
        <div class="col-2">
            <a class="btn btn-secondary btn-sm" href="{{ route('editores-index') }}">Voltar</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{ route('editores-update', ['id'=>$editors->id]) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group my-3">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" value="{{ $editors->nome }}" name="nome"/>
                </div>
                
                <div class="form-group my-3">
                    <input type="submit" class="btn btn-warning" value="Atualizar"/>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection