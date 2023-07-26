<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class DashboardController
{
    public function dashboard(){
        $article = Article::get();
         dd($article);
        return view('User.dashboard')->with('data',$article);
        // return view('User.dashboard');
    }

}
