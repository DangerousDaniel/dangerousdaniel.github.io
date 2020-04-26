<?php

namespace App\Http\Controllers;

use App\Lists;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListsController extends Controller
{
    //user povit table
    //make have post and user
    //attch and dech

    //to show all list (index)

    public function addPost(Post $post)
    {
        $userID = Auth::id();

        $post->users()->detach($userID);

        $post->users()->attach($userID);
        $post->save();

        return redirect('/')->with('message', 'The Post has been added to fav!');
    }

    public function removePost(Post $post)
    {
        $userID = Auth::id();

        $post->users()->detach($userID);
        $post->save();

        return redirect('/')->with('message', 'The Post has been removed from fav!');
    }



}
