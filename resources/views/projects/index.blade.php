@extends('layouts.app')

@section('content')
<main>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Projects List</h1>
        @auth
        <a href="{{route('projects.create')}}" class="btn btn-primary m-2">Add a new project</a>
        @endauth
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date of Creation</th>
                    <th scope="col">Link</th>
                    <th scope="col">Created By</th>
                    <th scope="col">Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td><a href="{{route('projects.show', $project)}}">{{ $project->title }}</a></td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->date_of_creation }}</td>
                    <td><a href="{{ $project->link }}">{{ $project->link }}</a></td>
                    <td>{{ $project->created_by }}</td>
                    <td>{{ $project->type ? $project->type->name : 'Not defined' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</main>
@endsection