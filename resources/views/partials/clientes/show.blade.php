<div>
    <div class="row">
        <div class="col-sm-12">
            <label>Nome:</label>
            {{$cliente->nome}}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label>Endereço:</label>
            {{$cliente->endereco}}
        </div>
        <div class="col-sm-3">
            <label>Número:</label>
            {{$cliente->numero}}
        </div>
        <div class="col-sm-3">
            <label>Cidade:</label>
            {{$cliente->cidade}}
        </div>
        <div class="col-sm-3">
            <label>Bairro:</label>
            {{$cliente->bairro}}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <label>Referência:</label>
            {{$cliente->referencia}}
        </div>
        <div class="col-sm-4">
            <label>Telefone 1:</label>
            {{$cliente->telefone}}
        </div>
        <div class="col-sm-4">
            <label>Telefone 2:</label>
            {{$cliente->telefone2}}
        </div>
    </div>
</div>