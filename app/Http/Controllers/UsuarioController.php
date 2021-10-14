<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Obtendo os dados de todos os Usuarios
        $usuarios = Usuario::all();
        //Chamando a tela e passando a variavel $usuarios como parametro
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //chamando a tela para o cadastro de usuarios
        return view ('convenios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Criando regras para validação: 'nome_usr','cpf_cnpj_usr','fone_usr','email_usr','senha_usr','categoria_usr'
        $validateData = $request->validate([
            'nome_usr'          =>      'required|max:100',
            'cpf_cnpj_usr'      =>      'required|max:100',
            'fone_usr'          =>      'required|max:100',
            'email_usr'         =>      'required|max:100',
            'senha_usr'         =>      'required|max:100',
            'categoria_usr'     =>      'required|max:100'   
        ]);
        //Executando o método para a gravação dos registros
        $usuarios = Usuario::create($validateData);
        //redirecionando para a tela principal do modulo de usuarios
        return redirect('/usuarios')->with('success','Dados adicionados com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //criando um objeto para receber o resultado da busca de registro/objeto especifico
        $usuario = Usuario::findOrFail($id);
        //retornando a tela de visualização com o objeto recuperado
        return view('usuarios.show',compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // criando um objeto para receber o resultado
        // da busca de registro/objeto específico
        $usuarios = Usuario::findOrFail($id);
        // retornando a tela de edição com o
        // objeto recuperado
        return view('usuarios.edit', compact('usuario'));
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
        // criando um objeto para testar/aplicar 
        // validações nos dados da requisição
        $validateData = $request->validate([
            'nome_usr'          =>      'required|max:100',
            'cpf_cnpj_usr'      =>      'required|max:100',
            'fone_usr'          =>      'required|max:100',
            'email_usr'         =>      'required|max:100',
            'senha_usr'         =>      'required|max:100',
            'categoria_usr'     =>      'required|max:100'   
        ]);
        // criando um objeto para receber o resultado
        // da persistência (atualização) dos dados validados 
        Convenio::whereId($id)->update($validateData);
        // redirecionando para o diretório raiz (index)
        return redirect('/usuarios')->with('success', 
        'Dados atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // localizando o objeto que será excluído
        $usuario = Usuario::findOrFail($id);
        // realizando a exclusão
        $usuario->delete();
        // redirecionando para o diretório raiz (index)
        return redirect('/usuarios')->with('success', 
        'Dados removidos com sucesso!');
    }
}
