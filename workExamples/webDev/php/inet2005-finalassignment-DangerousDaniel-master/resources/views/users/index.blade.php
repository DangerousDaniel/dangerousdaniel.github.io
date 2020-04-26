@extends('layouts.app')

@section('content')
    <h1>User Table</h1>

    <form id="searchUsers" name="searchUsers" method="get" action="/users/">
        <div class="form-group">
            <label>Search:
                <input class="form-control" type="text" name="searchUser" value="{{ old('searchUser') }}" />
            </label>
            <button type="submit" class="btn-primary">Search</button>
        </div>
    </form>

    <table class="table">
        <thead>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>

                    <!--edit user-->
                    <td id="updateUser">
                        <form name="updateUser" action="/users/{{$user->id}}/edit" method="get">
                            <div class="form-group">
                                <button class="btn-primary" type="submit" name="updateButton">Edit</button>
                            </div>
                        </form>
                    </td>

                    <!--delete user-->
                    <td id="deleteUser">
                        <form name="deleteUser" action="/users/{{$user->id}}" method="post">
                            @method('DELETE')
                            @csrf
                            <div class="form-group">
                                <button  class="btn-primary" type="submit" name="deleteButton" onclick="return confirm('Are you sure you want to delete this record');">Delete</button>
                            </div>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection



