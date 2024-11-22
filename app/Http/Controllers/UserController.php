<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        if($users -> count() == 0){
            return view("users.notfound", compact("users"));
        }
        return view("index", compact("users"));
    }

    public function create()
    {
        return view("users.create");
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string',
            'password_hash'=> 'required|string',
            'full_name' => 'required|string|max:255',
        ]);

        User::create($validatedData);

        return redirect()->route('user.index');
    }

    public function show(User $user){
        return view('user.show', compact('users'));
    }

    public function edit(User $user){
        return view('user.edit', compact('users'));
    }

    public function update(Request $request, User $user){
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string',
            'password_hash'=> 'required|string',
            'full_name' => 'required|string|max:255',
        ]);
    }

    public function getUser(int $id) : User {
        return User::findOrFail($id);
    }
}
