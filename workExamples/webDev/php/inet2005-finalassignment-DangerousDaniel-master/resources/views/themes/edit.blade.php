@extends('layouts.app')

@section('content')
    <form method="post" action="/theme/{{ $theme->id }}">
        @method('PATCH')
        @csrf

        <div class="form-group">
            <label> Name
                <input type="text" class="form-control" name="name" value="{{ $theme->name }}">
            </label>
        </div>

        <div class="form-group">
            <label> CDN Url
                <input type="text" class="form-control" name="cdn_url" value="{{ $theme->cdn_url }}">
            </label>
        </div>

        <div class="form-group">
            <label> Description
                <textarea class="form-control" name="description">{{ $theme->description }}</textarea>
            </label>
        </div>

        <div class="form-check">
            <label> Is Default
                <input type="checkbox" class="" name="is_default" {{ $theme->is_default ? 'checked disabled' : ''}}>
            </label>
        </div>
        <button  class="btn-primary" type="submit">Update Theme</button>
    </form>

@include ('errors')

@endsection
