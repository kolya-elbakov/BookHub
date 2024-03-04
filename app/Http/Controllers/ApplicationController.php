<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function getApplicationForm()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userBooks = $user->books;
            return view('application', ['userBooks'=>$userBooks], ['user'=>$user]);
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }


//    public function createApplication()
//    {
//    }

}
