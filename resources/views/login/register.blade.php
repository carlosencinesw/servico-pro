<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>OrçaMelhor | Login</title>
	{{--CSS--}}
	<link rel="stylesheet" type="text/css" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('bower_components/flat-admin-bootstrap-templates/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bower_components/flat-admin-bootstrap-templates/css/themes/flat-blue.css')}}">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body class="login">
	<div class="container">		
		<div class="col-sm-12">
			<div class="main-login text-center">
				<div>
					<h1 class="title-login">OrçaMlehor | Novo Usuario</h1>
					<form class="form-horizontal" enctype="multipart/form-data" action="{{ route('saveuser') }}" method="post">
						{{csrf_field()}}
						<div class="form-group">
							<input type="text" name="name" class="main-login--input" placeholder="Nome">
						</div>
						<div class="form-group">
							<input type="text" name="email" class="main-login--input" placeholder="E-mail">
						</div>
						<div class="form-group">
							<input type="password" name="password" class="main-login--input" placeholder="Senha">
						</div>
						<div class="form-group">
							<input type="file" name="avatar" class="form-control" placeholder="Imagem de perfil">
						</div>
						<div class="form-group">
							<p class=""><button class="btn btn-success btn-block btn-login" type="submit"><i class="fa fa-check"></i> <span>Cadastrar</span></button></p>						
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<section id="footer">
		<footer>
			<p class="text-center">Desenvolvido por <a href="http://artisansw.com.br" target="_blank">Artisan Soluções Web</a></p>
		</footer>
	</section>	

{{--JAVASCRIPT--}}
<script type="text/javascript" src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
</body>
</html>