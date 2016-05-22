<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\User;
use App\Role;
use App\Permission;
use App\Role_user;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $loginPath = '/bs_end';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function authenticate(Request $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password'], 'status' => 0])) {
            // 認證通過...
            return redirect()->intended('home');
        }
        else
        {
            return $this->sendFailedLoginResponse($request);
        }
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            //視需要增加
            // 'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    // 求職者
    protected function create(array $data)
    {

        $users = User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'status' => 0,
            'data_status' => 0,
        ]);
        Role_user::create([
            'role_id' => 1,
            'user_id' => $users->id,
        ]);
        return $users;

    }
 


}
