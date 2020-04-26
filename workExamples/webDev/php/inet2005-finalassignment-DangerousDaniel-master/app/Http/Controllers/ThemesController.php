<?php

namespace App\Http\Controllers;

use App\Theme;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class ThemesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $themes = Theme::all();

        return view('themes.index', compact('themes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Theme $theme
     * @return Response
     */
    public function create()
    {
        return view('themes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validated = request()->validate([
            'name' => ['required', 'min:3', 'max:50'],
            'cdn_url' => ['required', 'min:3', 'url'],
            'description' => ['required', 'min:3']
        ]);

        $validated ['created_by'] = Auth::id();

        $is_default = \request('is_default');

        if ($is_default == "on")
        {
            $validated ['is_default'] = 1;
        }
        else
        {
            $validated ['is_default'] = 0;

        }

        Theme::create($validated);

        return redirect('/theme');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Theme  $theme
     * @return Response
     */
    public function show(Theme $theme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Theme  $theme
     * @return Response
     */
    public function edit(Theme $theme)
    {
        return view('themes.edit', compact('theme', '$str_is_default'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Theme $theme
     * @return void
     */
    public function update(Theme $theme)
    {
        $validated = request()->validate([
            'name' => ['required', 'min:3', 'max:50'],
            'cdn_url' => ['required', 'min:3', 'url'],
            'description' => ['required', 'min:3']
        ]);

        $validated ['created_by'] = Auth::id();
        $validated ['last_modified_by'] = Auth::id();

        //check to see if it is the default theme
        $is_default = $theme->is_default;

        $latestDefaultTheme = Theme::where('is_default', true)->first();
        $is_defaultFalse ['is_default'] = false;
        $latestDefaultTheme->update($is_defaultFalse);


        if ($is_default == 0)
        {
            $is_default = \request('is_default');

            if ($is_default == "on")
            {
                $validated ['is_default'] = 1;
            }
            else
            {
                $validated ['is_default'] = 0;

            }
        }

        $theme->update($validated);

        return redirect('/theme');
    }

    public function switch(Theme $theme)
    {
        return redirect('/')->withCookie(cookie()->forever('theme', $theme->cdn_url));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Theme $theme
     * @return Response
     * @throws \Exception
     */
    public function destroy(Theme $theme)
    {
        $is_default = $theme->is_default;

        if ($is_default == 0) {
            $userID = Auth::id();

            $theme->deleted_by = $userID;
            $theme->save();

            $theme->delete();
        }

        return redirect('/theme');
    }
}
