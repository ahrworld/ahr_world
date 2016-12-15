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
   public function index(Request $request){
        if($request->locale)
        {
            Session::put('locale',$request->locale);
        }else{
            Session::get('locale',$request->locale);
        }
        return Redirect::back();
   }
}
