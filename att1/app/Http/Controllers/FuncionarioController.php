<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Departamento;
use App\Models\Cargo;
use App\Models\Turno;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{

    public function index()
    {
        $funcionarios = Funcionario::with(['departamento', 'cargo', 'turno'])->get();

        return view('tabela_funcionario.funcionario', compact('funcionarios'));
    }


    public function create()
    {
        $departamentos = Departamento::all();
        $cargos = Cargo::all();
        $turnos = Turno::all();

        return view('tabela_funcionario.funcionario_create', compact('departamentos', 'cargos', 'turnos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:funcionarios',
            'telefone' => 'nullable|string|max:15',
            'departamento_id' => 'nullable|exists:departamentos,id',
            'cargo_id' => 'required|exists:cargos,id',
            'turno_id' => 'nullable|exists:turnos,id',
        ]);

        Funcionario::create($validated);

        return redirect()->route('funcionarios.index')->with('message', 'Funcionário cadastrado com sucesso!');
    }

    public function show(Funcionario $funcionario)
    {
        $funcionario->load(['departamento', 'cargo', 'turno']);

        return view('tabela_funcionario.funcionario_show', compact('funcionario'));
    }


    public function edit(Funcionario $funcionario)
    {
        $departamentos = Departamento::all();
        $cargos = Cargo::all();
        $turnos = Turno::all();

        return view('tabela_funcionario.funcionario_edit', compact('funcionario', 'departamentos', 'cargos', 'turnos'));
    }

    public function update(Request $request, Funcionario $funcionario)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:funcionarios,email,' . $funcionario->id,
            'telefone' => 'nullable|string|max:15',
            'departamento_id' => 'nullable|exists:departamentos,id',
            'cargo_id' => 'required|exists:cargos,id',
            'turno_id' => 'nullable|exists:turnos,id',
        ]);

        $funcionario->update($validated);

        return redirect()->route('funcionarios.index')->with('message', 'Funcionário atualizado com sucesso!');
    }

    
    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();

        return redirect()->route('funcionarios.index')->with('message', 'Funcionário removido com sucesso!');
    }
}
