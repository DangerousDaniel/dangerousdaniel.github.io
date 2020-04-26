@extends('layouts.app')

@section('content')
    <h1 class="title">Edit Project</h1>

    <form method="post" action="/users/{{ $user->id }}">
        @method('PATCH')
        @csrf

        <div class="form-group">
            <label> Name
                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
            </label>
        </div>

        <div class="form-group">
            <label> Email
                <input type="text" class="form-control" name="email" value="{{ $user->email }}">
            </label>
        </div>


            <div class="form-check">
                <label> User Admin
                    <input type="checkbox" class="" name="userAdmin" {{$user->hasRole('User Admin') ? 'checked' : ''}}>
                </label>
            </div>

            <div class="form-check">
                <label> Post Admin
                    <input type="checkbox" class="" name="postAdmin" {{$user->hasRole('Post Admin') ? 'checked' : ''}}>
                </label>
            </div>

            <div class="form-check">
                <label> Theme Admin
                    <input type="checkbox" class="" name="themeAdmin" {{$user->hasRole('Theme Admin') ? 'checked' : ''}}>
                </label>
            </div>

        <button type="submit" class="btn-primary">Update User</button>
    </form>

@include ('errors')

@endsection
