@auth
@extends('layouts.app')


@section('content')
<main>
    <div class="container mt-5">
        <div>
            <h1><strong>Enter the new type details</strong></h1>
        </div>
        <form action="{{route('types.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Insert the name of the type">
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
@endauth