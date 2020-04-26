@extends('layouts.app')

@section('content')
    <h1>Create a New Theme</h1>

    <form method="post" action="/theme">
        @csrf

        <div class="form-group">
            <label> Name
                <input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
            </label>
        </div>


        <div class="form-group">
            <label> CDN Url
                <input type="text" class="form-control" name="cdn_url" value="{{ old('cdn_url') }}"/>
            </label>
        </div>

        <div class="form-group">
            <label> Description
                <textarea class="form-control" name="description">{{ old('description') }}</textarea>
            </label>
        </div>

        <div class="form-check">
            <label> Is Default
                <input type="checkbox" class="" name="is_default" value=""/>
            </label>
        </div>
        <button class="btn-primary" type="submit">Create Theme</button>
    </form>
@include('errors')

@endsection
