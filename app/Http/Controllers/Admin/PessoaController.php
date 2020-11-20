<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PessoaRequest;
use App\Http\Requests\PessoaFornecedorRequest;
use App\Models\Pessoa;
use App\Models\Categoria;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas = Pessoa::All();

        $data = json_encode(['data'=>Pessoa::All()]);

        // dd($data);

        return view('admin.pessoa.index', compact('pessoas', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::All();
       
        return view('admin.pessoa.create', compact('categorias'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PessoaRequest $request)
    {
        Pessoa::updateOrCreate(
            ['id' => $request['id']], 
            $request->all()
        );

        return response()->json(['success' => true]);
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
        $pessoa = Pessoa::find($id);
        $categorias = Categoria::All();
       
        return view('admin.pessoa.edit', compact('pessoa', 'categorias'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pessoa::find($id)->delete();
        return response()->json(['success' => true]);
    }

    
    public function lista()
    {
        $pessoas = Pessoa::All();
        return response()->json(['success' => true, 'data'=>$pessoas]);
    }
}
