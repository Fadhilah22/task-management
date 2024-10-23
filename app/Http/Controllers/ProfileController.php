<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class ProfileController extends Controller
{ 
  // show profile based on id
  public function show ($user_id) {

    if(session()->has('user_id')) {
      if (is_int(session('user_id'))) {
        if(User::find(session('user_id')) != null) {
            return view('profile', ['user_id' => $user_id]); 
        }
      } 
    }

    return response()->view('handler.exception.error.404', [$user_id] , 404);
  }
}
