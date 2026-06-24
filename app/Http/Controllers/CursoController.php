<?php
namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::latest()->paginate(9);
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        return view('cursos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome'      => 'required|string|max:255',
            'descricao' => 'required|string',
            'turno'     => 'required|in:Manhã,Tarde,Noite',
            'vagas'     => 'required|integer|min:1',
            'periodo'   => 'required|string|max:100',
            'imagem'    => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            $validated['imagem'] = $request->file('imagem')->store('cursos', 'public');
        }

        Curso::create($validated);
        return redirect()->route('cursos.index')->with('success', 'Curso criado com sucesso!');
    }

    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso'));
    }

    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }

    public function update(Request $request, Curso $curso)
    {
        $validated = $request->validate([
            'nome'      => 'required|string|max:255',
            'descricao' => 'required|string',
            'turno'     => 'required|in:Manhã,Tarde,Noite',
            'vagas'     => 'required|integer|min:1',
            'periodo'   => 'required|string|max:100',
            'imagem'    => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            if ($curso->imagem) Storage::disk('public')->delete($curso->imagem);
            $validated['imagem'] = $request->file('imagem')->store('cursos', 'public');
        }

        $curso->update($validated);
        return redirect()->route('cursos.index')->with('success', 'Curso atualizado!');
    }

    public function destroy(Curso $curso)
    {
        if ($curso->imagem) Storage::disk('public')->delete($curso->imagem);
        $curso->delete();
        return redirect()->route('cursos.index')->with('success', 'Curso removido.');
    }
}