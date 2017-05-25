<!DOCTYPE html>
<html>

<head>
    <title>Serviço Pro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <!-- CSS Libs -->
    <link rel="stylesheet" type="text/css" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bower_components/animate.css/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bower_components/checkbox3/dist/checkbox3.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bower_components/DataTables/media/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bower_components/datatables/media/css/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">
    <!-- CSS App -->
    <link rel="stylesheet" type="text/css" href="{{asset('bower_components/flat-admin-bootstrap-templates/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bower_components/flat-admin-bootstrap-templates/css/themes/flat-blue.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
</head>

<body class="flat-blue">
<div class="app-container">
    <div class="row content-container">
        <nav class="navbar navbar-inverse navbar-fixed-top navbar-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <ol class="breadcrumb navbar-breadcrumb" style="padding-left: 5px">
                        <li class="active">OrçaMelhor</li>
                        <li><a class="btn btn-link" href="{{route('feedback')}}"><i class="fa fa-comment-o"></i> Enviar Feedback</a></li>
                    </ol>
                    <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                        <i class="fa fa-th icon"></i>
                    </button>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                        <i class="fa fa-times icon"></i>
                    </button>
                   {{-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-comments-o"></i></a>
                        <ul class="dropdown-menu animated fadeInDown">
                            <li class="title">
                                Notification <span class="badge pull-right">0</span>
                            </li>
                            <li class="message">
                                No new notification
                            </li>
                        </ul>
                    </li>--}}
                    {{--<li class="dropdown danger">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-star-half-o"></i> 4</a>
                        <ul class="dropdown-menu danger  animated fadeInDown">
                            <li class="title">
                                Notification <span class="badge pull-right">4</span>
                            </li>
                            <li>
                                <ul class="list-group notifications">
                                    <a href="#">
                                        <li class="list-group-item">
                                            <span class="badge">1</span> <i class="fa fa-exclamation-circle icon"></i> new registration
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li class="list-group-item">
                                            <span class="badge success">1</span> <i class="fa fa-check icon"></i> new orders
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li class="list-group-item">
                                            <span class="badge danger">2</span> <i class="fa fa-comments icon"></i> customers messages
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li class="list-group-item message">
                                            view all
                                        </li>
                                    </a>
                                </ul>
                            </li>
                        </ul>
                    </li>--}}
                    <li class="dropdown profile">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{Auth::user()->name}} <span class="caret"></span></a>
                        <ul class="dropdown-menu animated fadeInDown">
                            <li class="profile-img">
                                <img src="{{asset(Auth::user()->avatar)}}" class="profile-img">
                            </li>
                            <li>
                                <div class="profile-info">
                                    <h4 class="username">{{Auth::user()->name}}</h4>
                                    <p>{{Auth::user()->email}}}</p>
                                    <div class="btn-group margin-bottom-2x" role="group">
                                        <a class="btn btn-warning" href="{{route('usuario.edit', Auth::user()->id)}}"><i class="fa fa-edit"></i> Editar Usuário</a>
                                        <a class="btn btn-danger" href="{{ route('exit') }}"><i class="fa fa-sign-out"></i> Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="side-menu sidebar-inverse">
            <nav class="navbar navbar-default" role="navigation">
                <div class="side-menu-container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">
                            <div class="icon fa fa-paper-plane"></div>
                            <div class="title">OrçaMelhor</div>
                        </a>
                        <button type="button" class="navbar-expand-toggle pull-right visible-xs">
                            <i class="fa fa-times icon"></i>
                        </button>
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="/app/dashboard">
                                <span class="icon fa fa-tachometer"></span><span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li class="panel panel-default dropdown">
                            <a href="{{route('app.modulos.clientes.index')}}">
                                <span class="icon fa fa-users"></span><span class="title">Clientes</span>
                            </a>
                        </li>
                        <li class="panel panel-default dropdown">
                            <a href="{{route('app.modulos.produtos.index')}}">
                                <span class="icon fa fa-shopping-cart"></span><span class="title">Produtos</span>
                            </a>
                        </li>
                        <li class="panel panel-default dropdown">
                            <a href="{{route('app.modulos.servicos.index')}}">
                                <span class="icon fa fa-tasks"></span><span class="title">Serviços</span>
                            </a>
                        </li>
                        <li class="panel panel-default dropdown">
                            <a href="{{ route('app.modulos.orcamentos.index') }}">
                                <span class="icon fa fa-sticky-note-o"></span><span class="title">Orçamentos</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
        </div>
        <!-- Main Content -->
        <div class="container-fluid">
            <div class="side-body padding-top">
                @yield('content')
            </div>
        </div>
    </div>
    <footer class="app-footer">
        <div class="wrapper">
            <span class="pull-right">2.1 <a href="#"><i class="fa fa-long-arrow-up"></i></a></span> © 2015 Copyright.
        </div>
    </footer>
    <div>
        <!-- Javascript Libs -->
        <script type="text/javascript" src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        {{--<script type="text/javascript" src="{{asset('bower_components/Chart.js/src/Chart.min.js')}}"></script>--}}
        <script type="text/javascript" src="{{asset('bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('bower_components/matchHeight/jquery.matchHeight-min.js')}}"></script>
        <script type="text/javascript" src="{{asset('bower_components/DataTables/media/js/jquery.dataTables.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('bower_components/DataTables/media/js/dataTables.bootstrap.min.js')}}"></script>
        {{--<script type="text/javascript" src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>--}}
        <script type="text/javascript" src="{{asset('bower_components/ace-builds/src/ace.js')}}"></script>
        <script type="text/javascript" src="{{asset('bower_components/ace-builds/src/mode-html.js')}}"></script>
        <script type="text/javascript" src="{{asset('bower_components/ace-builds/src/theme-github.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/quicksearch/jquery.quicksearch.js')}}"></script>        
        <!--<script type="text/javascript" src="{{asset('js/main.js')}}"></script>-->
        <!-- Javascript -->
        <script type="text/javascript" src="{{asset('bower_components/flat-admin-bootstrap-templates/dist/js/app.js')}}"></script>
        {{--<script type="text/javascript" src="{{asset('bower_components/flat-admin-bootstrap-templates/js/index.js')}}"></script>--}}
</body>

</html>
