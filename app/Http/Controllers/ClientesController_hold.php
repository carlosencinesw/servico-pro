<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

use App\Http\Requests;


class ClientesController extends Controller
{

    private $cliente;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index()
    {
        return view('clientes.list', ['clientes' => $this->cliente->all()]);
    }

    public function create()
    {
        return view('clientes.add');
    }

    public function show($id)
    {

    }

    public function store(Request $request)
    {
        $this->cliente->nome = $request->input('nome');
        $this->cliente->endereco = $request->input('endereco');
        $this->cliente->numero = $request->input('numero');
        $this->cliente->cidade = $request->input('cidade');
        $this->cliente->bairro = $request->input('bairro');
        $this->cliente->referencia = $request->input('referencia');
        $this->cliente->telefone = $request->input('telefone');
        $this->cliente->telefone2 = $request->input('telefone2');
        $this->cliente->save();
        return response(['msg' => 'Inserido com sucesso', 'status' => 'ok']);
    }

    public function edit($id)
    {
        $cliente = $this->cliente->find($id);
        return view('clientes.edit', ['cliente' => $cliente]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->cliente->find($id);
        $this->cliente->update($data);
        /*$this->cliente->nome = $request->input('nome');
        $this->cliente->endereco = $request->input('endereco');
        $this->cliente->numero = $request->input('numero');
        $this->cliente->cidade = $request->input('cidade');
        $this->cliente->bairro = $request->input('bairro');
        $this->cliente->referencia = $request->input('referencia');
        $this->cliente->telefone = $request->input('telefone');
        $this->cliente->telefone2 = $request->input('telefone2');
        $this->cliente->save();*/

        return response(['msg' => 'Atualizado com sucesso', 'status' => 'ok', 'data' => $this->cliente->find($id)]);
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return response(['msg' => 'Excluido com sucesso!', 'status' => 'ok']);
    }
}
