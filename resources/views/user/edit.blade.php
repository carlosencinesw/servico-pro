@extends('main.main')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1><i class="fa fa-user"></i> <span>Editar Usuário</span></h1>
        </div>
    </div>
    <div class="container pull-left">
        <div class="row">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{route('usuario.update', $user->id)}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <div class="col-sm-8">
                        <label>Nome:</label>
                        <input class="form-control" type="text" name="name" value="{{$user->name}}">
                    </div>
                    <div class="col-sm-4">
                        <label>E-mail:</label>
                        <input class="form-control" type="text" name="email" value="{{$user->email}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <label>Alterar Senha:</label>
                        <input class="form-control" type="password" name="password">
                    </div>
                    <div class="col-sm-6">
                        <label>Confirmar senha:</label>
                        <input class="form-control" type="password" name="confirm_password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3">
                        <input type="file" name="avatar" class="form-control" placeholder="Selecione a imagem de perfil">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success btn-block" type="submit"><i class="fa fa-check"></i> <span>Atualizar perfil</span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop