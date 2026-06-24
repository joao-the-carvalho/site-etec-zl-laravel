<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::orderBy('data')->paginate(9);
        return view('eventos.index', compact('eventos'));
    }

    public function create()
    {
        return view('eventos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome'      => 'required|string|max:255',
            'descricao' => 'required|string',
            'data'      => 'required|date',
            'turno'     => 'required|in:Manhã,Tarde,Noite',
            'vagas'     => 'nullable|integer|min:1',
            'local'     => 'required|string|max:255',
            'imagem'    => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            $validated['imagem'] = $request->file('imagem')->store('eventos', 'public');
        }

        Evento::create($validated);
        return redirect()->route('eventos.index')->with('success', 'Evento criado com sucesso!');
    }

    public function show(Evento $evento)
    {
        return view('eventos.show', compact('evento'));
    }

    public function edit(Evento $evento)
    {
        return view('eventos.edit', compact('evento'));
    }

    public function update(Request $request, Evento $evento)
    {
        $validated = $request->validate([
            'nome'      => 'required|string|max:255',
            'descricao' => 'required|string',
            'data'      => 'required|date',
            'turno'     => 'required|in:Manhã,Tarde,Noite',
            'vagas'     => 'nullable|integer|min:1',
            'local'     => 'required|string|max:255',
            'imagem'    => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            if ($evento->imagem) Storage::disk('public')->delete($evento->imagem);
            $validated['imagem'] = $request->file('imagem')->store('eventos', 'public');
        }

        $evento->update($validated);
        return redirect()->route('eventos.index')->with('success', 'Evento atualizado!');
    }

    public function destroy(Evento $evento)
    {
        if ($evento->imagem) Storage::disk('public')->delete($evento->imagem);
        $evento->delete();
        return redirect()->route('eventos.index')->with('success', 'Evento removido.');
    }
}
