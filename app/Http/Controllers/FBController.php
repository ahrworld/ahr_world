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

class FBController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }


    public function handleProviderCallback()
    {
        $socialite_user = Socialite::driver('facebook')->user();
        // print_r($socialite_user['friends']['summary']['total_count']);
        
        $facebook_user_id = $socialite_user->getId(); // unique facebook user id
        $fbname = $socialite_user['last_name'].$socialite_user['first_name'];
        $fbemail = $socialite_user->getEmail();

        $socialite_user->getAvatar();

        $user = User::where('facebook_id', $facebook_user_id)->first();

        if (!$user) {
            $user = new User;
            $user->facebook_id = $facebook_user_id;
            $user->name = $fbname;
            $user->email = $fbemail;
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
