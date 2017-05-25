@extends('main.main')

@section('content')
<div class="row">
    <h1><i class="fa fa-tasks"></i> <span>O.S n° {{$servico->cod_os}} - {{$servico->cliente->nome}}</span></h1>
</div>
<div class="row">
    <a class="btn btn-warning" href="javascript:$('#servico-edit').modal('show')" data-toggle="modal" data-target=".servico-{{$servico->id}}"><i class="fa fa-edit"></i> <span>Editar</span></a>
    <a class="btn btn-primary" href="{{route('app.modulos.servicos.index')}}"><i class="fa fa-chevron-circle-left"></i> <span>Voltar</span></a>
    <a class="btn btn-default" href="{{url('app/dashboard')}}"><i class="fa fa-home"></i> <span>Voltar para a dashboard</span></a>
</div>
<div class="row">
    <div class="col-sm-12 h3">
        <label for="endereco">Endereço de entrega:</label>
        {{$servico->cliente->endereco}}
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <label for="lista">Serviços solicitados:</label>
        <ul class="listagem-produtos list-group">
            @for($i = 0; $i < count($produtos["produtos"]["listagem"]); $i++)
            <li class="list-group-item">{{$produtos["produtos"]["listagem"][$i]}}</li>
            @endfor
        </ul>            
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <label for="">Dia da entrrega:</label>
        <p class="alert">{{$servico->dia_entrega}}</p>

    </div>
    <div class="col-sm-3">
        <label for="">Turno de entrega:</label>
        <p class="alert">{{$servico->turno_entrega}}</p>

    </div>
    <div class="col-sm-3">
        <label for="">Status da entrega:</label>
        @if($servico->status_entrega == "realizada")
        <p class="alert status_ok">{{ucwords($servico->status_entrega)}}</p>
        @elseif($servico->status_entrega == "não-realizada")
        <p class="alert status_not_ok">{{ucwords($servico->status_entrega)}}</p>
        @endif
    </div>
    <div class="col-sm-3">
        <label for="">Pagamento:</label>
        @if($servico->status_pagamento == "efetuado")
        <p class="alert status_ok">{{ucwords($servico->status_pagamento)}}</p>
        @elseif($servico->status_pagamento == "aguardando")
        <p class="alert status_pending">{{ucwords($servico->status_pagamento)}}</p>
        @else
        <p class="alert status_not_ok">{{ucwords($servico->status_pagamento)}}</p>
        @endif
    </div>

    {{--Editar O.S--}}
    <div class="modal modal-warning fade servico-{{$servico->id}}" tabindex="-1" id="servico-edit"
       role="dialog">
       <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fa fa-edit"></i> <span>Editar Serviço</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span></button>
                    </h3>
                </div>
                <div class="modal-body">                    
                    <div class="alert alert-danger messageError"></div>
                    <div class="alert alert-success message"></div>
                    <p class="row">
                        @include('servicos.edit')
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>
@stop
