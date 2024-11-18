<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public readonly Cargo $cargo;

    public function __construct()
    {
        $this->cargo = new Cargo();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cargos = $this->cargo->all();
        return view('tabela_cargo.cargo', ['cargos' => $cargos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tabela_cargo.cargo_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this->cargo->create([
            'nome' => $request->input('nome')
        ]);

        if ($created) {
            return redirect()->route('cargos.index')->with('message', 'Criado com Sucesso!');
        }

        return redirect()->back()->with('message', 'Erro ao Criar!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cargo $cargo)
    {
        return view('tabela_cargo.cargo_show', ['cargo' => $cargo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cargo $cargo)
    {
        return view('tabela_cargo.cargo_edit', ['cargo' => $cargo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->cargo->where('id', $id)->update($request->except(['_token', '_method']));

        if ($updated) {
            return redirect()->route('cargos.index')->with('message', 'Atualizado com Sucesso!');
        }

        return redirect()->back()->with('message', 'Erro ao atualizar!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->cargo->where('id', $id)->delete();

        return redirect()->route('cargos.index')->with('message', 'Excluido com Sucesso!');
    }
}
