@auth
@extends('layouts.app')


@section('content')
<main>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Technologies List</h1>
        @auth
        <a href="{{route('technologies.create')}}" class="btn btn-primary m-2">Add a new technology</a>
        @endauth
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">slug</th>
                    <th scope="col">Date of Creation</th>
                    <th scope="col">Created By</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($technologies as $technology)
                <tr>
                    <td>{{ $technology->id }}</td>
                    <td><a href="{{route('technologies.show', $technology)}}">{{ $technology->name }}</a></td>
                    <td>{{ $technology->slug }}</td>
                    <td>{{ $technology->created_at }}</td>
                    <td>{{ $technology->created_by }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</main>
@endsection
@endauth