<?php

namespace App\Http\Controllers;

use App\Post;
use App\Theme;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index()
    {
        $themes = Theme::all();

        $posts = Post::orderBy('id', 'desc')->get();

        return view('posts.index', compact('posts', 'themes'));
    }

    public function ajaxPost()
    {
        $posts = Post::orderBy('id', 'desc')->get();

        return view('posts.ajaxIndex', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validated = request()->validate([
            'title' => ['required', 'min:3', 'max:50'],
            'description' => ['required', 'min:10']
        ]);


        $validated ['created_by'] = Auth::id();

        Post::create($validated);

        return redirect('/');
    }

    public function destroy(Post $post)
    {
        $userID = Auth::id();

        $post->deleted_by = $userID;
            $post->save();

            $post->delete();


        return redirect('/');
    }

}
