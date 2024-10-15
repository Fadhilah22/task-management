<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        info('[Login Function Called]');
        $validateData = $request->validate([
            "email_username"=> "required|string|max:255",
            "password"=> "required|string|min:8",
        ]);

        // user use email or username
        if($this->isUsername($validateData['email_username']) == true){
            // process username
            $user = $this->verifyUserUsername($validateData['email_username']);
        } else {
            // process email
            $user = $this->verifyUserEmail($validateData['email_username']);
        }

        if ($user) {
            //validate password
            $password_is_correct = $this->verifyUserPassword($validateData['password'], $user);
            info($password_is_correct);

            if($password_is_correct){
                info('[password verification] : password is correct');
                $user_id = $user->id;// Get the user ID 
                $request->session()->put('user_id', $user_id);
                $current_session = $request->session()->get('user_id');
            
                if($current_session){
                    info('[Session Creation]');
              
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
                info('[password verification] password is incorrect');
            }
        } else {
            info('User with email ' . $validateData['email_username'] . ' doesnt exist');
        }
        return redirect('/')->with('success','User Logged in successfully!');
    }

    public function isUsername(string $input) : bool {
        if(strpos($input, '@') == false){
            //means its username
            return true;
        } 
        
        return false;
    }

    public function verifyUserUsername(string $username) : User {
        return User::where('username', $username)->first();
    }

    public function verifyUserEmail(string $email) : User {
        return User::where('email', $email)->first();
    }

    public function verifyUserPassword(String $user_password, $user) : bool {
        // we must get the encrypted password value owned by that id  

        // $user = User::where('id', $user_id)->first();
        return Hash::check($user_password, $user->password_hash);
    }

    private function debugUserExistAndSessionDatabase($request, $user_id){
        if($this->isExist($request, 'user_id')){
             // return bad
             info("[Login Class][login]: User exist in session");
             redirect('/')->with('success','User Logged in successfully!');
         } else{
             // create session
             info("[Login Class][login]: User not exist in session");
             session([
                 "user_id"=> $user_id,
                 "payload" => "Payload Loadpay",
                 "last_activity" => 1,
             ]);
             info("[Login Class][login]: session stored");
             return redirect("/")->with("success","");
         }
    }

    private function debugLogUserInput($validateData) : void {

        if($this->isUsername($validateData['email_username']) == true){
            // log based on user username
            info('[Login info]'
            .'User email : '
            .$validateData['email_username']
            .'User password_hash : '
            .bcrypt($validateData['password']));
        } else {
            // log based on user email
            info('[Login info]'
            .'User email : '
            .$validateData['email_username']
            .'User password_hash : '
            .bcrypt($validateData['password']));
        }
    }
}


