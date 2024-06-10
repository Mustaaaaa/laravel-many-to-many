@auth
@extends('layouts.app')


@section('content')
<main>
    <div class="container mt-5">
        <div class="card m-2">
            <div class="card-header">
                Type Details
            </div>
            <div class="card-body text-center">
                <h5 class="card-title">ID:</h5>
                <p class="mb-4 text-center">{{ $type->id }}</p>

                <h5 class="card-title">Name:</h5>
                <p class="card-text">{{ $type->name }}</p>

                <h5 class="card-title">Slug:</h5>
                <p class="card-text">{{ $type->slug }}</p>

                <h5 class="card-title">Date of creation:</h5>
                <p class="card-text">{{ $type->created_at }}</p>

                <h5 class="card-title">Created by:</h5>
                <p class="card-text">{{ $type->created_by}}</p>

                <div class="row justify-content-center">
                    <a href="{{ route('types.edit',$type) }}" class="btn btn-success m-2 col-1">Edit</a>
                    <form action="{{route('types.destroy', $type)}}" method="POST" class="col-1">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger m-2">Delete</button>
                    </form>
                    <a href="{{ route('types.index')}}" class="btn btn-primary m-2 col-1"><--- </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@endauth