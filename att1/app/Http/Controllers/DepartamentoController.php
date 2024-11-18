<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public readonly Departamento $departamento;

    public function __construct()
    {
        $this->departamento = new Departamento();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departamentos = $this->departamento->all();
        return view('tabela_departamento.departamento', ['departamentos' => $departamentos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tabela_departamento.departamento_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this->departamento->create([
            'nome' => $request->input('nome')
        ]);

        if ($created) {
            return redirect()->route('departamentos.index')->with('message', 'Criado com Sucesso!');
        }

        return redirect()->back()->with('message', 'Erro ao Criar!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Departamento $departamento)
    {
        return view('tabela_departamento.departamento_show', ['departamento' => $departamento]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departamento $departamento)
    {
        return view('tabela_departamento.departamento_edit', ['departamento' => $departamento]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->departamento->where('id', $id)->update($request->except(['_token', '_method']));

        if ($updated) {
            return redirect()->route('departamentos.index')->with('message', 'Atualizado com Sucesso!');
        }

        return redirect()->back()->with('message', 'Erro ao atualizar!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->departamento->where('id', $id)->delete();

        return redirect()->route('departamentos.index')->with('message', 'Excluido com Sucesso!');
    }
}
