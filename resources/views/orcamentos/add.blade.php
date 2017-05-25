<div>
	<div class="row">
		<form action="{{ route('app.modulos.orcamentos.store') }}" class="form-horizontal ajax" method="post">
			{{csrf_field()}}
			<div class="form-group">
				<div class="col-sm-12">
					<label>Nome do cliente:</label>
					<input type="text" name="nome" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-12">
					<label>Produtos:</label>
				</div>				
			</div>
			<div class="form-group">
				<div class="col-sm-12">
					<table class="table table-responsive table-hover table-bordered">
					<thead>
						<th></th>
						<th>Produto</th>
						<th>Quantidade</th>
						<th>Valor</th>
					</thead>
					<tbody>
						@foreach ($produtos as $produto)
							<tr>
								<td>
									<input type="checkbox" name="produtos[]" value="{{$produto->descricao}}">
								</td>
								<td>{{$produto->descricao}}</td>
								<td><input type="text" name="quantidade[]" class="form-control"></td>
								<td>R$ {{number_format($produto->valor, 2, ',', '.')}}</td>
								<input type="hidden" name="valor[]" value="{{$produto->valor}}">
							</tr>
						@endforeach
					</tbody>
				</table>
				</div>				
			</div>
			<div class="form-group">
				<div class="col-sm-12">
					<textarea name="observacoes" class="form-control" cols="30" rows="10"></textarea>
				</div>				
			</div>
			<div class="form-group">
				<div class="col-sm-12">
					<button type="submit" class="btn btn-success btn-block"><i class="fa fa-check-circle-o"></i> <span>Gerar Orçamento</span></button>
				</div>
			</div>
		</form>
	</div>
</div>