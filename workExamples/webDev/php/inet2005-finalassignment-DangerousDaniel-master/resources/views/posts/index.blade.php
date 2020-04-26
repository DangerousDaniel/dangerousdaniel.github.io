@extends('layouts.app')



@section('content')

    <div id="posts"></div>
{{--   re-build this html (later if time)--}}
    <div class="d-flex w-100">
    <div class="row justify-content-end w-25">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">SideBar</div>
                <div class="card-body">

                    @if(Auth::user())
                    <form id="createPost" name="createPost" method="get" action="/posts/create">
                        <div class="form-group">
                            <button  class="btn-primary" type="submit">Add A New Post</button>
                        </div>
                    </form>
                    @endif

                    <label>Choice A Theme.</label>

                    @foreach ($themes as $theme)
                    <form id="themeOptionForm" name="themeOptionForm" method="post" action="/theme/switch/{{$theme->id}}">
                        @csrf
                            <li name="ThemeOptions">
                                    @if (!Request()->cookie('theme'))
                                    <label>{{$theme->name}}
                                    <input type="checkbox"  onchange="this.form.submit()" {{$theme->is_default ? 'checked' : ''}}>
                                    </label>

                                    @else
                                    <label>{{$theme->name}}
                                    <input type="checkbox" value="{{$theme->name}}}" onchange="this.form.submit()" {{Request()->cookie('theme') == $theme->cdn_url ? 'checked': ''}} >
                                    </label>
                                    @endif
                            </li>
                    </form>
                    @endforeach
                    <p>It will show this theme on all page and it will be saved as cookie in your web browser.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-start w-75">
        <div class="col-md-12">
            @foreach ($posts as $post)
                <div class="card">
                    <div class="card-header">{{$post->title}}</div>

                    <div class="card-body">
                        <p>{{$post->description}}</p>

                        <p>{{$post->created_by}}</p>


                        @if(Auth::user())
                            <form id="favButtonForm"name="favButtonForm" action="/users/fav/{{$post->id}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <button class="btn-primary" type="submit" name="favButton">Add To Fav</button>
                                </div>
                            </form>

                            <form id="favButtonForm"name="favButtonForm" action="/users/fav/r/{{$post->id}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <button class="btn-primary" type="submit" name="favButton">Remove from Fav</button>
                                </div>
                            </form>

                            @if (session('message'))
                                <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                            @endif

                        @endif

                    @auth
                        @if(!empty(Auth::user()->hasRole('Post Admin')))
                        <form id="deletePost" name="deletePost" method="post" action="/posts/{{$post->id}}">
                            @method('DELETE')
                            @csrf
                            <div class="form-group">
                                <button  class="btn-primary" type="submit" onclick="return confirm('Are you sure you want to delete this record');">Delete Post</button>
                            </div>
                        </form>
                        @endif
                    @endauth
                </div>
            @endforeach
        </div>
    </div>
    </div>
    </div>
@endsection
