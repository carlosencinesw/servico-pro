<?php

    namespace App\Http\Controllers;

    use App\Orcamento;
    use App\Servico;
    use Illuminate\Http\Request;

    use App\Http\Requests;
    use Illuminate\Support\Facades\DB;

    class dashboardController extends Controller
    {
        public function Index()
        {
            $latestServicos = Servico::orderby('created_at','desc')->limit(5)->get();
            $latestOrcamentos = Orcamento::orderby('created_at', 'desc')->limit(5)->get();
            return view('dashboard.dashboard',['servicos' => $latestServicos, 'orcamentos' => $latestOrcamentos]);
        }
    }
