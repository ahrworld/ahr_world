<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Permission;
use App\Role_user;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoogleController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->scopes(['profile','email'])->redirect();
    }


    public function handleProviderCallback()
    {
        $socialite_user = Socialite::driver('google')->user();

        // print_r($socialite_user);

        $google_user_id = $socialite_user->getId(); // unique facebook user id
        $googleName = $socialite_user->getName();
        $googleEmail = $socialite_user->getEmail();
        // print_r($google_user_id.$googleEmail.$googleName);
        $socialite_user->getAvatar();

        $user = User::where('google_id', $google_user_id)->first();

        if (!$user) {
            $user = new User;
            $user->google_id = $google_user_id;
            $user->name = $googleName;
            $user->google_email = $googleEmail;
            $user->status = 0;
            $user->save();
            Role_user::create([
                'role_id' => 1,
                'user_id' => $user->id,
            ]);
        }
        Auth::loginUsingId($user->id);
        return redirect('/home');
    }
}
