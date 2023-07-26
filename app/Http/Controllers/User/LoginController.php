<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;

class LoginController
{
    public function login(){
        session()->flash('log','login');
        return view("UserLogin.login");
    }
    public function doLogin(){

      $user = request()->only(['username','password']);

      if(auth()->guard('user')->attempt($user)){
        session()->flash('log','logout');

          return redirect('/user/dashboard')->withCookie(cookie('user','loggedIn',600));
      }else{
        session()->flash('log','login');
        return back();
      }
    }

    public function logOut()
    {
        Auth::logout();
        return redirect('/user/login')->cookie('user',null,0);
    }
}
