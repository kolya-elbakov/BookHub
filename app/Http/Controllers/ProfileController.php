<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getMyBook()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userBooks = $user->books;
            return view('my-profile', ['userBooks'=>$userBooks], ['user'=>$user]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function getUserProfile()
    {
        return view('userProfile');
    }
}
