@extends('layouts.app')

@section('content')
<main>
<div class="container mt-5">
    <div>
        <h1><strong>Enter the new project details</strong></h1>
    </div>
    <form action="{{route('projects.store')}}" method="POST">
    @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Insert the title of the project">
        </div>
        <div class="mb-3">
            <label for="type_id" class="form-label">Type</label>
            <select type="text" class="form-control" name="type_id" id="type_id">
            <option value="">Choose the type</option>
            @foreach ($types as $type)
            <option value="{{$type->id}}">{{$type->name}}</option>
            @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Insert the description of the project">
        </div>
        <div class="mb-3">
            <label for="date_of_creation" class="form-label">Date of creation</label>
            <input type="date" class="form-control" name="date_of_creation" id="date_of_creation">
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text" class="form-control" name="link" id="link" placeholder="Insert the link of the project">
        </div>
        <div class="mb-3">
            <label for="created_by" class="form-label">Created by</label>
            <input type="text" class="form-control" name="created_by" id="created_by" placeholder="Insert the name of the creator">
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
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