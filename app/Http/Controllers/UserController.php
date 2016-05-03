<?php

namespace App\Http\Controllers;
use Gate;
use App\User;
use App\Language;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role.user');
    }
    public function step()
    {
    	return view('step');
    }

}
