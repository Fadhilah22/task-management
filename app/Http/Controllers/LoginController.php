<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        info('[Login Function Called]');
        $validateData = $request->validate([
            "email_username"=> "required|string|max:255",
            "password"=> "required|string|min:8",
        ]);

        info('[Login info]'
        .'User email : '
        .$validateData['email_username']
        .'User password_hash : '
        .bcrypt($validateData['password']));

        // // get user id based on email
        // $user = \App\Models\User::where('email', $validateData['email'])->first(); // Fetch user by email

        // if ($user) {
        //      $user_id = $user->id; // Get the user ID
        // }

        // if($this->isExist($request, 'user_id')){
        //     // return bad
        //     info("[Login Class][login]: User exist in session");
        //     redirect('/')->with('success','User Logged in successfully!');
        // } else{
        //     // create session
        //     info("[Login Class][login]: User not exist in session");
        //     session([
        //         "user_id"=> $user_id,
        //         "payload" => "Payload Loadpay",
        //         "last_activity" => 1,
        //     ]);
        //     info("[Login Class][login]: session stored");
        //     return redirect("/")->with("success","");
        // }

        return redirect('/')->with('success','User Logged in successfully!');
    }

    // public function isExist(Request $request, String $key){
    //     if($request->session()->has($key)){
    //         return true;
    //     }
    //     return false;
    // }
}
