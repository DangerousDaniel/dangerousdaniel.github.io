<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        if (!empty(request('searchUser')))
        {
            $find = request('searchUser');

            $users = User::where('name','LIKE',"%{$find}%")->orWhere('email', 'LIKE', "%{$find}%")->get();
        }
        else
        {
            $users= User::all();
        }

        return view('users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(User $user)
    {
        $user->update($this->validateUser($user));

        return redirect('/users');
    }

    public function destroy(User $user)
    {
        $userID = Auth::id();
        $user->deleted_by = $userID;
        $user->save();

        $user->delete();

        return redirect('/users');
    }

    private function validateUser(User $user)
    {
        //auto select for checkboxes


        $validated = request()->validate([
            'name' => ['required', 'min:3', 'max:50'],
            'email' => ['required', 'min:3', 'unique:users,email,' .$user->id]
        ]);

        $validated['last_modified_by'] = Auth::id();

        $userAdmin = \request('userAdmin');
        $postAdmin = \request('postAdmin');
        $themeAdmin = \request('themeAdmin');

        $this->addRoleToUser($userAdmin, 1, $user);
        $this->addRoleToUser($postAdmin, 2, $user);
        $this->addRoleToUser($themeAdmin, 3, $user);

//        ////        //where to put
//        Mail::to('danielcox996@gmail.com')->send( new AccountReq());

        return $validated;
    }

    private function addRoleToUser($roleName, $roleNum, User $user)
    {

        $user->roles()->detach($roleNum);

        if ($roleName == "on")
        {
            $user->roles()->attach($roleNum);
        }
        else if (is_null($roleName))
        {
            $user->roles()->detach($roleNum);
        }
    }
}
