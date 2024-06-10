@auth
@extends('layouts.app')

@section('content')
<main>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Types List</h1>
        @auth
        <a href="{{route('types.create')}}" class="btn btn-primary m-2">Add a new type</a>
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
                @foreach ($types as $type)
                <tr>
                    <td>{{ $type->id }}</td>
                    <td><a href="{{route('types.show', $type)}}">{{ $type->name }}</a></td>
                    <td>{{ $type->slug }}</td>
                    <td>{{ $type->created_at }}</td>
                    <td>{{ $type->created_by }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</main>
@endsection
@endauth