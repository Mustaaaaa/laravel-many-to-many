<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::all();
        return view('technologies.index', compact('technologies'));
    }
    public function show(Technology $technology)
    {
        return view('technologies.show', compact('technology'));
    }
    public function create()
    {
        $technologies = Technology::all();
        return view('technologies.create', compact('technologies'));
    }
    public function store(Request $request)
    {
        $form_data = $request->all();

        $request->validate([
            'name' => 'required|string|max:255|min:4',
            'created_by' => 'nullable|max:2000',
        ]);

        $form_data['slug'] = Str::slug($form_data['name']);

        $new_technology = Technology::create($form_data);
        
        $new_technology->save();
        return to_route('technologies.show', $new_technology);
    }
    public function edit(Technology $technology)
    {
        $technologies = Technology::find($technology);
        return view('technologies.edit', compact('technology'));
    }
    public function update(Request $request, Technology $technology)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:4',
            'created_by' => 'nullable|max:2000',
        ]);

        $form_data = $request->all();

        $technology->update($form_data);

        return to_route('technologies.show', $technology);
    }
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return to_route('ttechnologies.index');
    }
}
