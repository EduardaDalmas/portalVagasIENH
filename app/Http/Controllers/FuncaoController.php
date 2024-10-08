<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Funcao;
use Illuminate\Http\Request;

class FuncaoController extends Controller
{
    public function index()
    {
        // Buscar todas as funções do banco de dados
        $funcoes = Funcao::all();
        
        // Retornar a view com as funções
        return view('funcao.index', ['funcoes' => $funcoes]);
    }

    public function store(Request $request)
    {
        // Validar os dados do request
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'responsabilidades' => 'nullable|string',
        ]);

        // Criar uma nova função com os dados fornecidos
        Funcao::create($request->all());

        // Redirecionar para a lista de funções com uma mensagem de sucesso
        return redirect()->route('funcao.index')->with('status', 'Função criada com sucesso!');
    }

    // funcao create 
    public function create()
    {
        // Retornar a view para criar uma nova função
        return view('funcao.create');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Funcao $funcao
     * @return \Illuminate\View\View
     */
    
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Funcao $funcao
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Funcao $funcao)
    {
        // Validar os dados do request
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'responsabilidades' => 'nullable|string',
        ]);

        // Atualizar a função com os dados fornecidos
        $funcao->update($request->all());

        // Redirecionar para a lista de funções com uma mensagem de sucesso
        return redirect()->route('funcao.index')->with('status', 'Função atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Funcao $funcao
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Funcao $funcao)
    {
        // Excluir a função
        $funcao->delete();

        // Redirecionar para a lista de funções com uma mensagem de sucesso
        return redirect()->route('funcao.index')->with('status', 'Função excluída com sucesso!');
    }

    public function edit(Funcao $funcao)
    {
        // Retornar a view para editar a função
        return view('funcao.edit', compact('funcao'));
    }
}
