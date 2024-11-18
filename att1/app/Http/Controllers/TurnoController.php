<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    public readonly Turno $turno;

    public function __construct()
    {
        $this->turno = new Turno();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $turnos = $this->turno->all();
        return view('tabela_turno.turno', ['turnos' => $turnos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tabela_turno.turno_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this->turno->create([
            'nome' => $request->input('nome')
        ]);

        if ($created) {
            return redirect()->route('turnos.index')->with('message', 'Criado com Sucesso!');
        }

        return redirect()->back()->with('message', 'Erro ao Criar!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Turno $turno)
    {
        return view('tabela_turno.turno_show', ['turno' => $turno]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Turno $turno)
    {
        return view('tabela_turno.turno_edit', ['turno' => $turno]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->turno->where('id', $id)->update($request->except(['_token', '_method']));

        if ($updated) {
            return redirect()->route('turnos.index')->with('message', 'Atualizado com Sucesso!');
        }

        return redirect()->back()->with('message', 'Erro ao atualizar!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->turno->where('id', $id)->delete();

        return redirect()->route('turnos.index')->with('message', 'Excluido com Sucesso!');
    }
}
