<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Orcamento;
use App\Produto;

use PDF;
use URL;
use File;

class OrcamentoController extends Controller
{
    private $orcamentos;
    private $produtos;
    private $pdf;

    public function __construct(Orcamento $orcamento, Produto $produto)
    {
        $this->orcamentos = $orcamento;
        $this->produtos = $produto;        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orcamentos.list', ['orcamentos' => Orcamento::paginate(10), 'produtos' => Produto::all()]); 
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
        $data = $request->all();
        if(!is_dir(storage_path()."/orcamentos"))
        {
            File::makeDirectory(storage_path()."/orcamentos");
        }
        $path = storage_path()."/orcamentos/";
        $file = "Orcamnto-".$request->input('nome').".pdf";
        $fullpath = $path.$file;
        if(!file_exists($file))
        {                
            $view = 'orcamentos.orcamento';                      
            $pdf = PDF::loadView($view, ['data' => $data])->save($fullpath);

            $this->orcamentos->cod_orcamento = date('YmdHis').rand(10,99);
            $this->orcamentos->cliente = $request->input('nome');
            $this->orcamentos->orcamento = $fullpath;
            $this->orcamentos->save();
            //return response(['msg' => 'Registro salvo com sucesso!', 'satus' => 'oK']);
            return response(['msg' => 'Orçamento crtiado com sucesso!', 'status' => 'ok']);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orcamento = $this->orcamentos->find($id);
        $path = storage_path()."/orcamentos/";
        $file = "Orcamnto-".$orcamento->cliente.".pdf";
        $fullpath = $path.$file;
        if(file_exists($fullpath))
        {
            File::delete($fullpath);
            $orcamento->delete();
            return redirect('app/modulos/orcamentos');
        } 
    }    

    public function verOrcamento($id)
    {
        $orcamento = $this->orcamentos->find($id);
        $path = storage_path()."/orcamentos/";
        $file = "Orcamnto-".$orcamento->cliente.".pdf";
        $fullpath = $path.$file;

        if(file_exists($fullpath))
        {
            return response(file_get_contents($fullpath), '200', [
                'content-type' => 'application/pdf',
                'content-disposition' => 'inline; filename="' . $file . '"'
            ]);
        } else {
            $orcamento->delete();
            return redirect('app/modulos/orcamentos')->with(['msg' => 'O arquivo solicitado não existe. Favor gerar um novo orçamento!']);
        }

    }
}
