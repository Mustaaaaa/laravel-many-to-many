@extends('layouts.app')

@section('content')
<main>
    <div class="container mt-5">
        <div class="card m-2">
            <div class="card-header">
            Project Details
            </div>
            <div class="card-body text-center">
                <h5 class="card-title">Title:</h5>
                <p class="mb-4 text-center">{{ $project->title }}</p>

                <h5 class="card-title">Description:</h5>
                <p class="card-text">{{ $project->description }}</p>

                <h5 class="card-title">Date of creation:</h5>
                <p class="card-text">{{ $project->date_of_creation }}</p>

                <h5 class="card-title">Link:</h5>
                <p class="card-text"><a href="{{ $project->link }}" target="_blank">{{ $project->link }}</a></p>

                <h5 class="card-title">Created by:</h5>
                <p class="card-text">{{ $project->created_by }}</p>

                <h5 class="card-title">Type:</h5>
                <p class="card-text">{{ $project->type ? $project->type->name : 'Not defined' }}</p>
                <div class="row justify-content-center">
                    @auth
                    <a href="{{ route('projects.edit',$project) }}" class="btn btn-success m-2 col-1">Edit</a>
                    <form action="{{route('projects.destroy', $project)}}" method="POST" class="col-1">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger m-2">Delete</button>
                    </form>
                    @endauth
                    <a href="{{ route('projects.index')}}" class="btn btn-primary m-2 col-1"><---</a>
                </div>

                @if ($project->type)

                <h5 class="card-title mt-3">Related projects:</h5>
                @foreach ($project->type->projects as $related_project)
                <p>
                    <a class="card-text" href="{{route('projects.show', $related_project)}}">{{$related_project->title}}</a>
                </p>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</main>
@endsection