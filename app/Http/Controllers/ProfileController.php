<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getUserProfile(int $id)
    {
        $user = User::find($id);
        $userBooks = $user->books;
        return view('userProfile', ['userBooks'=>$userBooks], ['user'=>$user]);
    }

    public function switchingProfileStatus(int $id)
    {
        $user = User::findOrFail($id);
        $user->is_profile_open = !$user->is_profile_open;
        $user->save();

        return redirect()->route('my-profile');
    }
}
