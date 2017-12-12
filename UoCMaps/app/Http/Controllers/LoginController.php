<?php

namespace UoCMaps\Http\Controllers;
use Auth;
use UoCMaps\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
      // dd($request->all());

      if(Auth::attempt([
        'email' => $request->email,
        'password' => $request->password
      ])){

            $user = User::where('email', $request->email)->first();
            if($user->is_admin()){
               return redirect()->route('dashboard');
            }

            else if ($user->is_approve()) {
              return redirect()->route('approvedashboard');
            }

            else {
              return redirect()->route('home');
            }

      }

      return redirect()->back();
    }
}
