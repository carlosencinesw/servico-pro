@extends('main.main')

@section('content')
    <div class="row"><h1><i class="fa fa-sticky-note"></i> <span>Orçamentos</span></h1></div>
    <div class="row">
        <a href="javascript:$('#orcamento').modal('show')" class="btn btn-success" data-toggle="modal"
           data-target=".create-orcamento"><i class="fa fa-plus"></i> <span>Criar Orçamento</span></a>
        <input type="text" class="search form-control" placeholder="Buscar Orçamentos">
    </div>
    <div class="row">
        <div class="col-sm-12">
            @if(session('msg'))
                <div class="alert alert-danger">{{session('msg')}}</div>
            @endif
        </div>

    </div>
    <div class="row">
        <table class="table table-responsive table-hover">
            <thead>
            <th>Código</th>
            <th>Cliente</th>
            <th>Orçamento</th>
            </thead>
            <tbody>
            @foreach ($orcamentos as $orcamento)
                <tr>
                    <td>{{$orcamento->cod_orcamento}}</td>
                    <td>{{$orcamento->cliente}}</td>
                    <td>
                        <a class="btn btn-info" target="_blank" href="{{ route('ver', $orcamento->id) }}"><i
                                    class="fa fa-info"></i> Visualizar</a>
                        <a class="btn btn-danger" href="javascript:$('#delete-orcamento').modal('show')"
                           data-toggle="modal" data-target=".delete-{{$orcamento->id}}"><i class="fa fa-trash"></i>
                            Excluir</a>
                    </td>

                    {{--Modal para deletar orçamento--}}
                    <div class="modal modal-danger fade delete-{{$orcamento->id}}" id="delete-orcamento">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title"><i class="fa fa-trash"></i> <span>Excluir</span>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">x</span></button>
                                    </h3>

                                </div>
                                <div class="modal-body">
                                    <p>Deseja excluir este orçamento?</p>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{route('app.modulos.orcamentos.destroy', $orcamento->id)}}"
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
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$orcamentos->links()}}

        {{--Modal para abrir formulário de criação de novo registro--}}
        <div class="modal modal-success fade create-orcamento" id="orcamento">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title"><i class="fa fa-sticky-note"></i> <span>Criar Orçamento</span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">x</span></button>
                        </h3>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success message"></div>
                        <div class="alert alert-danger messageError"></div>
                        @include('orcamentos.add')
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="logo-pdf"></div>
        </div>
    </div>
@stop