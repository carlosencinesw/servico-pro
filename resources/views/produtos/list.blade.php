@extends('main.main')

@section('content')
    <div class="row"><h1><i class="fa fa-shopping-cart"></i> Produtos</h1></div>
    <div class="row">
        <a class="btn btn-success" href="javascript:$('.create-produtos').modal('show')" data-toggle="modal"
           data-target="#produtos"><i class="fa fa-plus"></i> Adicionar Produto</a>
    </div>
    <div class="row">
        @if(session('msg'))
            <div class="alert alert-success delete-success">{{session('msg')}}</div>
        @endif
        @if(session('nome'))
            <div class="alert alert-success delete-success">{{session('nome')}}</div>
        @endif
    </div>
    <div class="row">
        <table class="table table-responsive">
            <thead>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Ações</th>
            </thead>
            <tbody>
            @foreach($produtos as $produto)
                <tr>
                    <td>{{$produto->descricao}}</td>
                    <td>R$ {{number_format($produto->valor, 2, ',', '.')}}</td>
                    <td>
                        <a class="btn btn-warning" href="javascript:$('.editar-produto').modal('show')"
                           data-toggle="modal" data-target=".produto-{{$produto->id}}"><i class="fa fa-edit"></i> <span>Editar</span></a>
                        <a class="btn btn-danger" href="javascript:$('#delete-produto')" data-toggle="modal" data-target=".delete-{{$produto->id}}"><i class="fa fa-trash"></i> <span>Excluir</span></a>

                        {{--Modal para o form de edição--}}
                        <div class="modal modal-warning fade editar-produto produto-{{$produto->id}}"
                             id="#edit-produto">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title"><i class="fa fa-edit"></i> <span>Editar produto</span>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">x</span></button>
                                        </h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-success message"></div>
                                        <div class="alert alert-danger messageError"></div>
                                        @include('produtos.edit')
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--Modal para deletar produto--}}
                        <div class="modal modal-danger fade delete-{{$produto->id}}" id="delete-produto">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title"><i class="fa fa-trash"></i> <span>Excluir</span>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">x</span></button>
                                        </h3>

                                    </div>
                                    <div class="modal-body">
                                        <p>Tem certeza que quer excluir o produto <b>{{$produto->descricao}}</b>?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('app.modulos.produtos.destroy', $produto->id)}}"
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
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{--modal para adicionar produtos--}}
        <div class="modal modal-success fade create-produtos" id="produtos">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title"><i class="fa fa-shopping-cart"></i> <span>Adicionar produto</span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">x</span></button>
                        </h3>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success message"></div>
                        <div class="alert alert-danger messageError"></div>
                        @include('produtos.add')
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{$produtos->links()}}
@stop