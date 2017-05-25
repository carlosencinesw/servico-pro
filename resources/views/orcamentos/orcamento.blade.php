<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Orçamento</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style>
		.logo-pdf {
			width: 230px;
			height: 180px;					
		}		
	</style>
</head>
<body>
	<div class="row">
		<span style="float: right;">Orçamento gerado em: {{date('d/m/Y')}}</span>
	</div>
	<div class="row">
		<img class="logo-pdf text-center" src="{{ public_path().'/img/logo.jpg' }}">		
	</div>
	<div class="row">
		<h1 class="text-left" style="font-weight: 600;">Orçamento</h1>
	</div>
	<div class="row">
		<p class="label label-info"><b>Cliente:</b> {{$data['nome']}}</p> 
	</div>
	<div class="row">
		<p>
			O presente orçamento refere-se aos seguintes items:
		</p>
	</div>
	<div class="row">		
		<table class="table table table-bordered">
			<thead>
				<tr>
					<th>Quantidade</th>
					<th>Descrição</th>
					<th>Preço</th>
				</tr>				
			</thead>
			<tbody>
				@for ($i = 0; $i < count($data['produtos']); $i++)
				<tr>
					<td>{{$data['quantidade'][$i]}}</td>
					<td>{{$data['produtos'][$i]}}</td>
					<td>R$ {{number_format($data['valor'][$i], 2, ',', '.')}}</td>					
				</tr>								
				@endfor				
			</tbody>
		</table>				
	</div>
	<div class="row">
		<label>Observações:</label>
		<p>{{$data['observacoes']}}</p>
	</div>
	<hr>
	<div class="row">
		<div>
			<table style="margin-top: 100px; display: table;">
				<tr>
					<td>
						<span>___________________________________</span>
						<br><span class="text-center">Loja</span>
					</td>
					<td>
						<span>___________________________________</span>
						<br><span class="text-center">Cliente</span>
					</td>
				</tr>
			</table>												
		</div>
	</div>		
</body>
</html>

