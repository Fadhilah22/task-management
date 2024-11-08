<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\User;

class ProfileController extends Controller
{
  // show profile based on id
  public function show ($user_id) {

      if(session()->has('user_id')) {
        try{
            if(User::find($user_id) != null) {
                info("user_id: " . $user_id);
                return view('profile.profile', ['user_id' => $user_id]);
            }
        } catch (QueryException $dbexception) {
            info('ProfileController::show() => ' . $dbexception);
            return response()->view('handler.exception.error.404', ['User id invalid'] , 404);
        }
    }

    return response()->view('handler.exception.error.404', [$user_id] , 404);
  }

  public function showEdit(){
      return view('profile.edit');
  }
}
