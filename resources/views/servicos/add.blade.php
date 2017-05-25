<div>
    <div class="row">
        <form action="{{route('app.modulos.servicos.store')}}" class="form-horizontal ajax" method="post">
            {{csrf_field()}}
           {{-- <input class="hide" type="text" name="cod_os" value="{{date('YmdHis')}}">--}}
            <div class="form-group">
                <div class="col-sm-12">
                    <select class="form-control" name="cliente_id" id="">
                        @foreach($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                @foreach($produtos as $produto)
                    <div class="col-sm-4">
                        <label>
                            <input class="checkbox checkbox-inline checkbox-circle" type="checkbox" name="produtos[]" value="{{$produto->descricao}}">
                            {{$produto->descricao}}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    <label>Dia da entrega</label>
                    <select name="dia_entrega" class="form-control">
                        <option value="Segunda">Segunda</option>
                        <option value="Terça">Terça</option>
                        <option value="Quarta">Quarta</option>
                        <option value="Quinta">Quinta</option>
                        <option value="Sexta">Sexta</option>
                        <option value="Sabado">Sabado</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label>Turno da entrega</label>
                    <select name="turno_entrega" class="form-control">
                        <option value="manhã">manhã</option>
                        <option value="tarde">tarde</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label>Situação do pagamento</label>
                    <select name="status_pagamento" class="form-control">
                        <option value="aguardando">Aguardando</option>
                        <option value="efetuado">Efetuado</option>
                        <option value="nao-pago">Não Efetuado</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label>Situação da entrega</label>
                    <select name="status_entrega" class="form-control">
                        <option value="realizada">Realizada</option>
                        <option value="não-realizada">Não realizada</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <textarea name="observacoes" class="form-control" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div class="form-group">
                <p class="col-sm-12">
                    <button class="btn btn-success btn-block" type="submit"><i class="fa fa-check-circle"></i> <span>Salvar O.S</span>
                    </button>
                </p>
            </div>

            <div class="loader">
                <div class="loader-container text-center color-white">
                    <i class="fa fa-spinner fa-pulse fa-3x"></i>
                    <div>Caregando...</div>
                </div>
            </div>
        </form>
    </div>
</div>