<div class="row">
    <form action="{{route('app.modulos.clientes.store')}}" class="form-horizontal ajax" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="">Nome</label>
                    <input type="text" name="nome" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    <label>Endereço</label>
                    <input type="text" name="endereco" class="form-control">
                </div>
                <div class="col-sm-3">
                    <label>Numero</label>
                    <input type="text" name="numero" class="form-control">
                </div>
                <div class="col-sm-3">
                    <label>Cidade</label>
                    <input type="text" name="cidade" class="form-control">
                </div>
                <div class="col-sm-3">
                    <label>Bairro</label>
                    <input type="text" name="bairro" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                    <label>Referência</label>
                    <input type="text" name="referencia" class="form-control">
                </div>
                <div class="col-sm-4">
                    <label>Telefone 1</label>
                    <input type="text" name="telefone" class="form-control" data-mask="(00) 00000-0000">
                </div>
                <div class="col-sm-4">
                    <label>Telefone 2</label>
                    <input type="text" name="telefone2" class="form-control" data-mask="(00) 00000-0000">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Cadastrar
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-sign-out"></i>Sair</span></button>
                </div>
            </div>
        </div>

        <div class="loader">
            <div class="loader-container text-center color-white">
                <i class="fa fa-spinner fa-pulse fa-3x"></i>
                <div>Caregando...</div>
            </div>
        </div>
    </form>
</div>


