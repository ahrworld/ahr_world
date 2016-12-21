<?php

namespace App\Http\Controllers;
use App\Contact;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $email = $request->user();
        return view('/',$email);
    }
    public function contact(Request $request)
    {
        Contact::create([
               'name' => $request->name,
               'email' => $request->email,
               'phone' => $request->phone,
               'contact' => $request->contact,
        ]);
        return redirect('business');
    }

}
