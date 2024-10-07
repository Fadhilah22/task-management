<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    //
    public function register(Request $request){
        $validateData = $request->validate([
            'username' => "required|string|max:255",
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password'=> 'required|string|min:8',
        ]);

        info('================= [Input Log] ================');
        info('[RegisterController][register]', ['username' => $validateData['username']]);
        info('[RegisterController][register]', ['fullname' => $validateData['firstname']. ' ' . $validateData['lastname']]);
        info('[RegisterController][register]', ['email' => $validateData['email']]);
        info('[RegisterController][register]', ['password' => bcrypt($validateData['password'])]);

        $user = User::create([
            'username'=> $validateData['username'],
            'email'=> $validateData['email'],
            'full_name'=> $validateData['firstname']. ' ' . $validateData['lastname'],
            'password_hash'=> bcrypt($validateData['password']),
        ]);
        
        return view('welcome')->with('success','User registered successfully!');
    }
}
