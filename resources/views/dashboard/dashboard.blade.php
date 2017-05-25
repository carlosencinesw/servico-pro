@extends('main.main')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @if(session('msg'))
                <div class="alert alert-success delete-success">{{session('msg')}}</div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel">
                <div class="panel-heading panel-primary">
                    <h4 class="panel-title">Ultimos serviços adicionados</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive table-hover">
                        <thead>
                        <th>Cliente</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach($servicos as $servico)
                            <tr>
                                <td>{{$servico->cliente->nome}}</td>
                                <td><a class="btn btn-info pull-right"
                                       href="{{route('app.modulos.servicos.show', $servico->id)}}"><i
                                                class="fa fa-eye"></i> Visualizar Serviço</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <a class="btn btn-success" href="{{route('app.modulos.servicos.index')}}"><i class="fa fa-list"></i>
                        Ver todas as Ordens de Serviço</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading panel-primary">
                    <h4 class="panel-title">Ultimos orçamentos gerados</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive table-hover">
                        <thead>
                        <th>Cliente</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach($orcamentos as $orcamento)
                            <tr>
                                <td>{{$orcamento->cliente}}</td>
                                <td><a class="btn btn-info pull-right" target="_blank"
                                       href="{{route('ver', $orcamento->id)}}"><i class="fa fa-eye"></i> Visualizar PDF</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <a class="btn btn-success" href="{{route('app.modulos.orcamentos.index')}}"><i
                                class="fa fa-list"></i> <span>Ver todos os orçamentos</span></a>
                </div>
            </div>
        </div>
    </div>
@stop