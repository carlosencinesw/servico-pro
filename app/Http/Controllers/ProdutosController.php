<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

use App\Http\Requests;
use Input;

class ProdutosController extends Controller
{

    protected $produtos;

    public function __construct(Produto $produto)
    {
        $this->produtos = $produto;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = \App\Produto::paginate(10);
        return view('produtos.list', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$this->validate($request, [
        //    'descricao' => 'required',
        //    'valor' => 'required|numeric'
        //]);

        /*$this->produtos->descricao = $request->input('descricao');
        $this->produtos->valor = $request->input('valor');*/
        $dados = $request->all();
        Produto::create($dados);
        $this->produtos->save();
        $nome = Input::get();
        return redirect()->route('app.modulos.produtos.index')->with(['nome' => $nome['descricao']]);

        //return response(['msg' => 'Produto cadastrado com sucesso!', 'status' => 'ok']);
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
        $data = $request->all();
        $produto = $this->produtos->find($id);
        $produto->update($data);

        return response(['msg' => 'Registro atualizado com sucesso!', 'status' => 'ok']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = $this->produtos->find($id);
        $produto->delete();

        return redirect()->back()->with(['msg' => 'Registro excluido com sucesso', 'status' => 'ok']);
    }
}
