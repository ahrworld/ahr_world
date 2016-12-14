<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
   public function index(){

        if(Session::has('locale'))
        {
            Session::put('locale',Input::get('locale'));
        }else{
            Session::get('locale', Input::get('locale'));
        }
        return Redirect::back();
   }
}
