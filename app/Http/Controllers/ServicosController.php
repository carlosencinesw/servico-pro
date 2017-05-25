<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Produto;
use App\Servico;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class ServicosController extends Controller
{

    protected $servico;
    protected $produtos;

    public function __construct(Servico $servico, Produto $produto)
    {
        $this->servico = $servico;
        $this->produtos = $produto;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('servicos.list', ['servicos' => Servico::paginate(10),
            'produtos' => Produto::all(),
            'clientes' => Cliente::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produtos = [];
        //$data = $request->input('produtos');
        //$list = $this->produtos->all();

        // for($i = 0; $i < count($data); $i++)
        // {
        //     $produtos[] = ["produtos" => ["listagem" => $data[$i]]];
        // }

        if ($request->input('produtos') == '') {
            $produtos = ["listagem" => ["listagem" => "nenhum produto cadastrado"]];
        } else {
            $produtos = [
                "produtos" => ["listagem" => $request->input('produtos')]
            ];
        }

        if($request->input('dia_entrega') != "0" && $request->input('turno_entrega') != "0" && $request->input('status_pagamento') != "0" && $request->input('status_entrega') != "0")
        {
            $this->servico->cod_os = date('YmdHis').rand(10,99);
            $this->servico->clientes_id = $request->input('cliente_id');
            $this->servico->produtos = serialize($produtos);
            $this->servico->dia_entrega = $request->input('dia_entrega');
            $this->servico->turno_entrega = $request->input('turno_entrega');
            $this->servico->status_pagamento = $request->input('status_pagamento');
            $this->servico->status_entrega = $request->input('status_entrega');
            $this->servico->observacoes = $request->input('observacoes');
            $this->servico->save();
            return response(['msg' => 'Serviço agendado com sucesso!', 'status' => 'ok']);
        } else {
            return response(['msg' => 'Não foi possivel agendar o serviço', 'status' => 'fail']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servico = $this->servico->find($id);
        $produtos = unserialize($servico->produtos);
        $produtosEdit = $this->produtos->all();
        return view('partials.servicos.show', ['servico' => $servico, 'produtos' => $produtos, 'products' => $produtosEdit]);
        //return response($produtos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $servico = $this->servico->find($id);
        $produtos = ['produtos' => ['listagem' => $request->input('produtos')]];

        $servico->clientes_id = $request->input('cliente_id');
        $servico->produtos = serialize($produtos);
        $servico->dia_entrega = $request->input('dia_entrega');
        $servico->turno_entrega = $request->input('turno_entrega');
        $servico->status_pagamento = $request->input('status_pagamento');
        $servico->status_entrega = $request->input('status_entrega');
        $servico->observacoes = $request->input('observacoes');
        $servico->save();

        return response(['msg' => 'Serviço atualizado com sucesso!', 'status' => 'ok']);
    }

    public function updateStatus(Request $request, $id)
    {
        $servico = $this->servico->find($id);
        $servico->status_entrega = $request->input('status_entrega');
        $servico->status_pagamento = $request->input('status_pagamento');
        $servico->save();
        
        return response(['msg' => 'Status Atualçizado com sucesso', 'status' => 'ok']);       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servico = $this->servico->find($id);
        $servico->delete();
        return redirect()->back()->with(['msg' => 'Registro excluido com sucesso!', 'status' => 'ok']);
    }
}
