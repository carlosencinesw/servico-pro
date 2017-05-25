@extends('main.main')

@section('content')
    <div class="container">
        <h1><i class="fa fa-edit"></i> <span>Editar Cliente</span></h1>
        <form action="{{route('app.modulos.clientes.update', $cliente->id)}}" class="form-horizontal ajax" method="post">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="">Nome</label>
                        <input type="text" name="nome" value="{{$cliente->nome}}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3">
                        <label>Endereço</label>
                        <input type="text" name="endereco" value="{{$cliente->endereco}}" class="form-control">
                    </div>
                    <div class="col-sm-3">
                        <label>Numero</label>
                        <input type="text" name="numero" value="{{$cliente->numero}}" class="form-control">
                    </div>
                    <div class="col-sm-3">
                        <label>Cidade</label>
                        <input type="text" name="cidade" value="{{$cliente->cidade}}" class="form-control">
                    </div>
                    <div class="col-sm-3">
                        <label>Bairro</label>
                        <input type="text" name="bairro" value="{{$cliente->bairrro}}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">
                        <label>Referência</label>
                        <input type="text" name="referencia" value="{{$cliente->referencia}}" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <label>Telefone 1</label>
                        <input type="text" name="telefone" value="{{$cliente->telefone}}" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <label>Telefone 2</label>
                        <input type="text" name="telefone2" value="{{$cliente->telefone2}}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Cadastrar
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop