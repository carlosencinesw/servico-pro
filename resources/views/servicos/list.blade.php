@extends('main.main')

@section('content')
<div class="row"><h1><i class="fa fa-tasks"></i> Serviços</h1></div>
<div class="row">
    @if(session('msg'))
    <div class="alert alert-success delete-success">{{session('msg')}}</div>
    @endif
</div>
<div class="row">
    <a class="btn btn-success" href="javascript:$('#create')" data-toggle="modal" data-target=".create-servico"><i
        class="fa fa-clock-o"></i> Agendar Serviço</a>
        <input class="search form-control" type="text" placeholder="Buscar Serviços">
    </div>
    <div class="row">
        <table class="table table-responsive table-hover">
            <thead>                
                <th>Código</th>
                <th>Cliente</th>
                <th>Entraga</th>
                <th>Status da entrega</th>
                <th>Status do pagamento</th>
                <th>Ações</th>
            </thead>
            <tbody>
                @foreach($servicos as $servico)
                <tr>                            
                    <td><a class="btn btn-link show-servico" href="{{route('app.modulos.servicos.show', $servico->id)}}">{{$servico->cod_os}}</a></td>
                    <td>{{$servico->cliente->nome}}</td>
                    <td>{{$servico->dia_entrega}} - {{$servico->turno_entrega}}</td>
                    @if($servico->status_entrega == 'realizada')
                    <td class="alert">                        
                        <i class="fa fa-check fa-2x text-success"></i>                               
                    </td>
                    @elseif($servico->status_pagamento == 'aguardando')
                    <td class="alert">
                    <i class="fa fa-exclamation-triangle fa-2x text-warning"></i>
                    </td>
                    @else
                    <td class="alert">
                    <i class="fa fa-ban fa-2x text-danger"></i>
                    </td>
                    @endif
                    @if($servico->status_pagamento == 'efetuado')
                    <td>
                        <i class="fa fa-check fa-2x text-success"></i>
                    </td>
                    @elseif($servico->status_pagamento == 'aguardando')
                    <td class="alert">
                        <i class="fa fa-exclamation-triangle fa-2x text-warning"></i>
                    </td>
                    @else
                    <td class="alert">
                        <i class="fa fa-ban fa-2x text-danger"></i>
                    </td>
                    @endif                    

                    <td>
                        <a class="btn btn-info" href="javascript:$('#update_status').modal('show')" data-toggle="modal" data-target=".servico-status-{{$servico->id}}"><i class="fa fa-refresh"></i> <span>Atualizar Status</span></a>                        
                        <a class="btn btn-danger" href="javascript:$('#delete-servico').modal('show')"><i class="fa fa-trash"></i> <span>Excluir</span></a>

                        {{--Modal para atualizar os status do serviço--}}
                        <div class="modal modal-warning fade servico-status-{{$servico->id}}" id="update_status">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title"><i class="fa fa-tasks"></i> <span>Atualizar Status do Serviço</span>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">x</span></button>
                                            </h3>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-success message"></div>
                                            <div class="alert alert-danger messageError"></div>
                                            @include('servicos.status')
                                        </div>
                                    </div>
                                </div>
                            </div>                            

                            {{--Modal para deletar serviços--}}
                            <div class="modal modal-danger fade delete-{{$servico->id}}" id="delete-servico">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title"><i class="fa fa-trash"></i> <span>Excluir</span>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">x</span></button>
                                                </h3>

                                            </div>
                                            <div class="modal-body">
                                                <p>Excluir O.S n° <b>{{$servico->cod_os}}</b>?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('app.modulos.servicos.destroy', $servico->id)}}"
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
                    {{$servicos->links()}}
                </div>

                {{--Modal para exibir formulario de cadastro de nova O.S--}}
                <div class="modal modal-success fade create-servico" id="create">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title"><i class="fa fa-tasks"></i> <span>Gerar Nova O.S</span>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">x</span></button>
                                    </h3>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-success message"></div>
                                    <div class="alert alert-danger messageError"></div>
                                    @include('servicos.add')
                                </div>
                            </div>
                        </div>
                    </div>
                    @stop