<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Type;
use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('projects.create', compact('types', 'technologies'));
    }
    public function store(Request $request)
    {
        $form_data = $request->all();

        $request->validate([
            'title' => 'required|string|max:255|min:4',
            'description' => 'nullable|max:2000',
            'date_of_creation' => 'required|date',
            'link' => 'nullable|url',
            'created_by' => 'required|max:100',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'exists:technologies,id'

        ]);
            
        $form_data['slug'] = Str::slug($form_data['title']);
        
        $new_project = Project::create($form_data);

        $new_project->technologies()->attach($request->technologies);
    
        $new_project->save();
        return to_route('projects.show', $new_project);
    }
    public function edit($id)
    {
        $project = Project::find($id);
        $types = Type::all();
        $technologies = Technology::all();
        return view('projects.edit', compact('project', 'types', 'technologies'));
    }
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255|min:4',
            'description' => 'nullable|max:2000',
            'date_of_creation' => 'required|date',
            'link' => 'nullable|url',
            'created_by' => 'required|max:100',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'exists:technologies,id'
        ]);

        $form_data = $request->all();

        $project->technologies()->sync($request->technologies ?? []);

        $project->update($form_data);

        return to_route('projects.show', $project);
    }
    public function destroy(Project $project)
    {
        $project->delete();

        return to_route('projects.index');
    }
}
