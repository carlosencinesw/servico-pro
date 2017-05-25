@extends('main.main')

@section('content')
    <div class="row"><h1><i class="fa fa-users"></i> <span>Clientes</span></h1></div>
    <div class="row">
        <a class="btn btn-success" href="javascript:$('#create').modal('show')"
           data-toggle="modal" data-target=".create-cliente"><i class="fa fa-plus"></i> Adicionar</a>
    </div>
    <div class="row">
        @if(session('msg'))
            <div class="alert alert-success delete-success">{{session('msg')}}</div>
        @endif
    </div>
    <div class="row">
        <table class="table table-responsive">
            <thead>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>Ações</th>
            </thead>
            <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{$cliente->nome}}</td>
                    <td>{{$cliente->endereco}}</td>
                    <td>{{$cliente->telefone}}</td>
                    <td>
                        <a class="btn btn-info" href="javascript:$('#info-cliente').modal('show')"
                           data-toggle="modal" data-target=".info-{{$cliente->id}}"><i class="fa fa-info"></i> Ver detalhes</a>

                        <a class="btn btn-warning" href="javascript:$('#cliente-edit').modal('show')"
                           data-toggle="modal" data-target=".cliente-{{$cliente->id}}"><i class="fa fa-edit"></i>
                            Editar</a>

                        <a class="btn btn-danger" href="javascript:$('#deletar-cliente').modal('show')"
                           data-toggle="modal" data-target=".delete-{{$cliente->id}}"><i class="fa fa-trash"></i>
                            Excluir</a>

                        {{--Modal para edição de clientes--}}
                        <div class="modal modal-warning fade cliente-{{$cliente->id}}" tabindex="-1" id="cliente-edit"
                             role="dialog">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title"><i class="fa fa-edit"></i> <span>Editar Cliente</span>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">x</span></button>
                                        </h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-success message"></div>
                                        <p class="row">
                                            @include('partials.clientes.edit')
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{--Modal para deletar clientes--}}
                        <div class="modal modal-danger fade delete-{{$cliente->id}}" id="delete-cliente">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title"><i class="fa fa-trash"></i> <span>Excluir</span>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">x</span></button>
                                        </h3>
                                    </div>
                                    <div class="modal-body">
                                        <p>Tem certeza que quer excluir o cliente <b>{{$cliente->nome}}</b>?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('app.modulos.clientes.destroy', $cliente->id)}}"
                                              method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i>
                                                <span>Sim</span></button>
                                            <a href="" data-dismiss="modal" class="btn btn-default"><i
                                                        class="fa fa-times"></i> <span>Não</span></a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--Modal para exibir informações sobre os clientes--}}
                        <div class="modal modal-info fade info-{{$cliente->id}}" id="info-cliente">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title"><i class="fa fa-info"></i> <span>Detalhes</span>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">x</span></button>
                                        </h3>
                                    </div>
                                    <div class="modal-body">
                                        @include('partials.clientes.show')
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="fa fa-sign-out"></i>Sair</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>

            {{--Modal para abrir formulário de criação de novo registro--}}
            <div class="modal modal-success fade create-cliente" id="create">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title"><i class="fa fa-user"></i> <span>Adicionar cliente</span>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">x</span></button>
                            </h3>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-success message"></div>
                            <div class="alert alert-danger messageError"></div>
                            @include('clientes.add')
                        </div>
                    </div>
                </div>
            </div>

        </table>
        {{$clientes->links()}}
    </div>
@stop