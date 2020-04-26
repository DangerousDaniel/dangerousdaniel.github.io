@extends('layouts.app')

@section('content')
    <h1>Theme Table</h1>

    <form name="createTheme" action="/theme/create" method="get">
        <div class="form-group">
            <button class="btn-primary" type="submit" name="addButton">Add</button>
        </div>
    </form>

    <table class="table">
        <thead>
        <th scope="col">Name</th>
        <th scope="col">CDN_Url</th>
        <th scope="col">Is_Default</th>
        <th scope="col">Action</th>
        </thead>
        <tbody>
        @foreach ($themes as $theme)
            <tr>
                <td>{{$theme->name}}</td>
                <td>{{$theme->cdn_url}}</td>
                <td>{{ $theme->is_default == 1 ? 'True' : 'false' }}</td>

                <!--edit theme-->
                <td id="updateTheme">
                    <form name="updateTheme" action="/theme/{{$theme->id}}/edit" method="get">
                        <div class="form-group">
                            <button class="btn-primary" type="submit" name="updateButton">Edit</button>
                        </div>
                    </form>
                </td>

                <!--delete user-->
                <td id="deleteUser">
                    <form name="ThemeUser" action="/theme/{{$theme->id}}" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="form-group">
                            <button class="btn-primary" type="submit" name="deleteButton" onclick="return confirm('Are you sure you want to delete this record');">Delete</button>
                        </div>

                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
