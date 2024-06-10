@auth
@extends('layouts.app')


@section('content')
<main>
    <div class="container mt-5">
        <div>
            <h1><strong>Edit the type: {{$type->name}}</strong></h1>
        </div>
        <form action="{{route('types.update', $type)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Insert the name of the type" value="{{old('title', $type->name)}}">
            </div>
            <div class="mb-3">
                <label for="created_by" class="form-label">Created by</label>
                <input type="text" class="form-control" name="created_by" id="created_by" placeholder="Insert the name of the creator"value=" {{old('title', $type->created_by)}}">
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
@endauth