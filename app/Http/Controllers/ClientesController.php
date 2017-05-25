<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

use App\Http\Requests;

/*use DB;
use Illuminate\Support\Facades\Validator;*/

class ClientesController extends Controller
{

    protected $cliente;

    public function __construct(Cliente $cliente )
    {
        $this->cliente = $cliente;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = \App\Cliente::paginate(10);
        return view('clientes.list', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'endereco' => 'required',
            'numero' => 'required',
            'cidade' => 'required',
            'bairro' => 'required',
            'telefone' => 'required',
            'telefone2' => 'numeric'
        ]);

        $this->cliente->nome = $request->input('nome');
        $this->cliente->endereco = $request->input('endereco');
        $this->cliente->numero = $request->input('numero');
        $this->cliente->cidade = $request->input('cidade');
        $this->cliente->bairro = $request->input('bairro');
        $this->cliente->referencia = $request->input('referencia');
        $this->cliente->telefone = $request->input('telefone');
        $this->cliente->telefone2 = $request->input('telefone2');
        $this->cliente->save();

        if($this->validate->fails())
        {
            return $this->validate->errors()->all();
        } else {
            return response(['msg' => 'Registro cadastrado com sucesso', 'status' => 'ok']);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //$cliente = $this->cliente->find($id);
        return view('partials.clientes.edit');
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
        $cliente = $this->cliente->find($id);
        $cliente->nome = $request->input('nome');
        $cliente->endereco = $request->input('endereco');
        $cliente->numero = $request->input('numero');
        $cliente->cidade = $request->input('cidade');
        $cliente->bairro = $request->input('bairro');
        $cliente->referencia = $request->input('referencia');
        $cliente->telefone = $request->input('telefone');
        $cliente->telefone2 = $request->input('telefone2');
        $cliente->save();

        return response(['msg' => 'Atualizado com sucesso', 'status' => 'ok', 'data' => $this->cliente->find($id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = $this->cliente->find($id);
        $cliente->delete();
        return redirect()->back()->with(['msg' => 'Registro excluido com sucesso!', 'status' => 'ok']);
    }
}
