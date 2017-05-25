<form action="{{route('app.modulos.produtos.update', $produto->id)}}" class="form-horizontal ajax" method="post">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
        <div class="col-sm-6">
            <label>Descrição:</label>
            <input class="form-control" type="text" name="descricao" value="{{$produto->descricao}}">
        </div>
        <div class="col-sm-6">
            <label>Valor:</label>
            <input class="form-control" type="text" name="valor" value="{{number_format($produto->valor, 2, ',', '.')}}">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <button class="btn btn-success" type="submit"><i class="fa fa-check-circle"></i> <span>Salvar</span></button>
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fa fa-sign-out"></i>Sair</span></button>
        </div>
    </div>

    <div class="loader">
        <div class="loader-container text-center color-white">
            <i class="fa fa-spinner fa-pulse fa-3x"></i>
            <div>Caregando...</div>
        </div>
    </div>
</form>