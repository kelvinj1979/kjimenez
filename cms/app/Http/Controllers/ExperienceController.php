<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experience;


class ExperienceController extends Controller
{
   
    public function index()
    {
        $experience = Experience::all();
        return view('pages.experience', ['experience' => $experience]);
    }

    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'experience' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'exp_detail' => 'nullable|string',
        ]);

        // Guardar en la base de datos
        Experience::create($validated);

        // Redirigir con mensaje de éxito
        return redirect()->route('experience.index')->with('success', 'Experience added successfully!');
    }

    public function edit($id)
    {
        $experience = Experience::findOrFail($id);
        // Si usas un modal y AJAX, puedes retornar JSON:
        return response()->json($experience);

        // Si usas una vista tradicional:
        // return view('pages.experience_edit', compact('experience'));
    }

     public function update(Request $request, $id)
    {
        // Validar los datos
        $validated = $request->validate([
            'experience' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'exp_detail' => 'nullable|string',
        ]);

        // Buscar el registro y actualizarlo
        $experience = Experience::findOrFail($id);
        $experience->update($validated);

        // Redirigir con mensaje de éxito
        return redirect()->route('experience.index')->with('success', 'Experience updated successfully!');
    }

    public function destroy($id)
    {
        $experience = Experience::findOrFail($id);
        $experience->delete();

        return redirect()->route('experience.index')->with('success', 'Experience deleted successfully!');
    }

    public function show($id)
    {
        // Puedes redirigir o retornar 404 si no lo usas
        return redirect()->route('experience.index');
    }
}
