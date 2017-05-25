<div>
	<div class="row">
		<form action="{{ route('app.modulos.servicos.status', $servico->id) }}" class="form-horizontal ajax" method="post">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="PATCH">
			<div class="form-group">
				<div class="col-md-6">
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
				<div class="col-md-6">
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
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<button class="btn btn-success btn-block" type="submit"><i class="fa fa-check"></i> <span>Alterar</span></button>
				</div>
			</div>
		</form>
	</div>
</div>