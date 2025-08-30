<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Projects::all();
        return view('pages.projects', compact('projects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_name' => 'required|string|max:255',
            'project_img' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'view_code' => 'nullable|url',
            'live_demo' => 'nullable|url',
            'description' => 'nullable|string',
            'overview' => 'nullable|string',
            'technologies' => 'nullable|string',
            'tags' => 'nullable|string',
            'key_features' => 'nullable|string',
            'challenges_solutions' => 'nullable|string',
        ]);

        // Manejo de la imagen
        if ($request->hasFile('project_img')) {
            $randerFile = mt_rand(1000,9999);
            $fileName = $randerFile . '_' . time() . '.' . $request->file('project_img')->getClientOriginalExtension();
            $request->file('project_img')->move(public_path('img/projects'), $fileName);
            $imgPath = 'img/projects/' . $fileName;
        } else {
            $imgPath = null;
        }

        // Convertir los campos a array JSON
        $technologies = $request->input('technologies')
            ? json_encode(array_map('trim', explode(',', $request->input('technologies'))))
            : json_encode([]);
        $tags = $request->input('tags')
            ? json_encode(array_map('trim', explode(',', $request->input('tags'))))
            : json_encode([]);
        $key_features = $request->input('key_features')
            ? json_encode(array_map('trim', explode(',', $request->input('key_features'))))
            : json_encode([]);

        $projectInfo = [
            [
                'completedDate' => $request->input('completedDate'),
                'teamSize' => $request->input('teamSize'),
                'status' => $request->input('status'),
            ]
        ];

        $data = $request->except([
            'project_img', 'completedDate', 'teamSize', 'status', 'technologies', 'tags', 'key_features'
        ]);
        $data['project_info'] = json_encode($projectInfo);
        $data['technologies'] = $technologies;
        $data['tags'] = $tags;
        $data['key_features'] = $key_features;

        if ($imgPath) {
            $data['project_img'] = $imgPath;
        }

        Projects::create($data);
        return redirect()->route('projects.index')->with('success', 'Project added!');
    }

    public function edit($id)
    {
        $project = Projects::findOrFail($id);
        return response()->json($project);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'project_name' => 'required|string|max:255',
            // ...igual que en store
        ]);
        $project = Projects::findOrFail($id);
        $project->update($validated);
        return redirect()->route('projects.index')->with('success', 'Project updated!');
    }

    public function destroy($id)
    {
        $project = Projects::findOrFail($id);
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted!');
    }
}
