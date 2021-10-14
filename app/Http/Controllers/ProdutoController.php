<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'nome'                 =>       'required|max:45',
            'descricao'            =>       'required|max:45',
            'preco_custo'          =>       'required|max:45',
            'preco_venda'          =>       'required|max:45'
        ]);

        $produto = Produto::create($validateData);

        return redirect('/produtos')->with('success', 'Dados adicionados com sucesso');
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
        $produto = Produto::findOrFail($id);
        return view('produtos.show', compact('produto'));
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
        $produto = Produto::findOrFail($id);
        // retornando a tela de edição com o
        // objeto recuperado
        return view('produtos.edit', compact('produto'));
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
        $validateData = $request->validate([
            'nome'                 =>       'required|max:45',
            'descricao'            =>       'required|max:45',
            'preco_custo'          =>       'required|max:45',
            'preco_venda'          =>       'required|max:45'
        ]);

        Produto::whereId($id)->update(validateData);
        return redirect('/produtos')->with('success', 'Dados alterados com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $produto = Produto::findOrFail($id);
        $consulta->delete();
        return redirect('/produtos')->with('success', 'Dados removidos com sucesso');
    }
}
