@extends('layouts.app')

@section('content')
<main>
<div class="container mt-5">
    <div>
        <h1><strong>Edit the project: {{$project->title}}</strong></h1>
    </div>
    <form action="{{route('projects.update', $project)}}" method="POST">
    @csrf
    @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{old('title', $project->title)}}">
        </div>
        <div class="mb-3">
            <label for="type_id" class="form-label">Type</label>
            <select type="text" class="form-control" name="type_id" id="type_id">
            <option value="">Choose the type</option>
            @foreach ($types as $type)
            <option value="{{$type->id}}" {{ $type->id == $project->type_id ? 'selected' : '' }}>{{$type->name}}</option>
            @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" name="description" id="description" value="{{old('description', $project->description)}}">
        </div>
        <div class="mb-3">
            <label for="date_of_creation" class="form-label">Date of creation</label>
            <input type="date" class="form-control" name="date_of_creation" id="date_of_creation" value="{{old('date_of_creation', $project->date_of_creation)}}">
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text" class="form-control" name="link" id="link" value="{{old('link', $project->link)}}">
        </div>
        <div class="mb-3">
            <label for="created_by" class="form-label">Created by</label>
            <input type="text" class="form-control" name="created_by" id="created_by" value="{{old('created_by', $project->created_by)}}">
        </div>

        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
    <div class="mt-3 col-4">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
</main>
@endsection