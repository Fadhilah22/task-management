<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    // txt yang mau di copy
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
        $user = $this->verifyUserEmail($validateData['email_username']);

        if ($user) {
            $user_id = $user->id;// Get the user ID
            $request->session()->put('user_id', $user_id)
            $current_session = $request->session()->get('user_id');
            if($current_session)public function login(Request $request){
              info('[Login Function Called]');
              
              $validateData = $request->validate([
              "email_username"=> "required|string|max:255",
              "password"=> "required|string|min:8",
              ]);
              info('Session created');
            
            } else {
              info('session not created');
            }
            info('User with email ' . $validateData['email_username'] . ' exist with id ' . $user_id);
        } else {
            info('User with email ' . $validateData['email_username'] . ' doesnt exist');
        }

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

    public function verifyUserEmail(string $email) {
        return User::where('email', $email)->first();
    }
}
