@extends('layouts.app')

@section('content')
    <h1>Create a New Theme</h1>

    <form method="post" action="/posts">
        @csrf

        <div class="form-group">
            <label> Title
                <input type="text" class="form-control" name="title" value="{{ old('title') }}"/>
            </label>
        </div>

        <div class="form-group">
            <label> Description
                <textarea class="form-control" name="description">{{ old('description') }}</textarea>
            </label>
        </div>

        <button class="btn-primary" type="submit">Create Post</button>
    </form>
    @include('errors')

@endsection
