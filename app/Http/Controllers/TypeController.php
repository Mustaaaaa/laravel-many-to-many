<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TypeController extends Controller
{
    public function index()
    {

        $types = Type::all();
        return view('types.index', compact('types'));
    }
    public function show(Type $type)
    {
        return view('types.show', compact('type'));
    }
    public function create()
    {
        $types = Type::all();
        return view('types.create', compact('types'));
    }
    public function store(Request $request)
    {
        $form_data = $request->all();

        $request->validate([
            'name' => 'required|string|max:255|min:4',
            'created_by' => 'nullable|max:2000',
        ]);

        $form_data['slug'] = Str::slug($form_data['name']);

        $new_type = Type::create($form_data);
        
        $new_type->save();
        return to_route('types.show', $new_type);
    }
    public function edit(Type $type)
    {
        $types = Type::find($type);
        return view('types.edit', compact('type'));
    }
    public function update(Request $request, Type $type)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:4',
            'created_by' => 'nullable|max:2000',
        ]);

        $form_data = $request->all();

        $type->update($form_data);

        return to_route('types.show', $type);
    }
    public function destroy(Type $type)
    {
        $type->delete();

        return to_route('types.index');
    }
}
