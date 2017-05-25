<div>
    <div class="row">
        <form action="{{route('app.modulos.servicos.update', $servico->id)}}" class="form-horizontal ajax" method="post">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH">
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="">Cliente:</label>
                    <input type="hidden" name="cliente_id" value="{{$servico->clientes_id}}">
                    <span>{{$servico->cliente->nome}}</span>
                </div>
            </div>
            <div class="form-group">
                @foreach($products as $product)
                @for($i = 0; $i < count($product); $i++)
                <div class="col-sm-4">
                    <label>
                        <input type="checkbox" name="produtos[]" {{(in_array($product->descricao, $produtos["produtos"]["listagem"])) ? 'checked' : ''}}
                        value="{{$product->descricao}}">
                        {{$product->descricao}}
                    </label>
                </div>
                @endfor
                @endforeach
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    <label>Dia da entrega</label>                    
                    <select name="dia_entrega" class="form-control">
                        <optgroup label="Dia agendado para entrega">
                            <option value="{{$servico->dia_entrega}}" selected>{{$servico->dia_entrega}}</option>
                        </optgroup>
                        <optgroup label="Selecione outro dia">
                            <option value="Segunda">Segunda</option>
                            <option value="Terça">Terça</option>
                            <option value="Quarta">Quarta</option>
                            <option value="Quinta">Quinta</option>
                            <option value="Sexta">Sexta</option>
                            <option value="Sabado">Sabado</option>
                        </optgroup>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label>Turno da entrega</label>                    
                    <select name="turno_entrega" class="form-control">
                        <optgroup label="Turno agendado para entrega entraga">
                            <option value="{{$servico->turno_entrega}}" selected>{{$servico->turno_entrega}}</option>    
                        </optgroup>
                        <optgroup label="Selecione outro turno de entrega">
                            <option value="manhã">manhã</option>
                            <option value="tarde">tarde</option>    
                        </optgroup>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label>Situação do pagamento</label>                    
                    <select name="status_pagamento" class="form-control">
                        <optgroup label="Situação atual do pgamento">
                            <option value="{{$servico->status_pagamento}}" selected>{{$servico->status_pagamento}}</option>    
                        </optgroup>
                        <optgroup label="Alterar situação do pagamento">
                            <option value="aguardando">Aguardando</option>
                            <option value="efetuado">Efetuado</option>
                            <option value="nao-pago">Não Efetuado</option>    
                        </optgroup>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label>Situação da entrega</label>                    
                    <select name="status_entrega" class="form-control">
                        <optgroup label="Situação atual da entrega">
                            <option value="{{$servico->status_entrega}}" selected>{{$servico->status_entrega}}</option>    
                        </optgroup>
                        <optgroup label="Atualizar situação da entrega">
                            <option value="realizada">Realizada</option>
                            <option value="não-realizada">Não realizada</option>    
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <textarea name="observacoes" class="form-control" cols="30"
                    rows="10">{{$servico->observacoes}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <p class="col-sm-12">
                    <button class="btn btn-success btn-block" type="submit"><i class="fa fa-check-circle"></i> <span>Atualizar O.S</span>
                    </button>
                </p>
            </div>
        </form>
    </div>
</div>
