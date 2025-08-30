<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;

class EducationController extends Controller
{
    public function index()
    {
        $education = Education::all();
        return view('pages.education', ['education' => $education]);
    }

    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'education' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'edu_detail' => 'nullable|string',
        ]);

        // Guardar en la base de datos
        Education::create($validated);

        // Redirigir con mensaje de éxito
        return redirect()->route('education.index')->with('success', 'Education added successfully!');
    }

    public function edit($id)
    {
        $education = Education::findOrFail($id);
        // Si usas un modal y AJAX, puedes retornar JSON:
         return response()->json($education);

        // Si usas una vista tradicional:
        // return view('pages.education_edit', compact('education'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos
        $validated = $request->validate([
            'education' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'edu_detail' => 'nullable|string',
        ]);

        // Buscar el registro y actualizarlo
        $education = Education::findOrFail($id);
        $education->update($validated);

        // Redirigir con mensaje de éxito
        return redirect()->route('education.index')->with('success', 'Education updated successfully!');
    }
    public function destroy($id)
    {
        $education = Education::findOrFail($id);
        $education->delete();

        return redirect()->route('education.index')->with('success', 'Education deleted successfully!');
    }
}
