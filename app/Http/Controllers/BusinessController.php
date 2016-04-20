<?php

namespace App\Http\Controllers;
use Gate;
use App\User;
use App\Language;
use App\BSinformations;
use App\PluralAdd\Employ;
use App\Http\Requests;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role.business');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function bs_info()
    {
        //定義資料庫
        $Languages = Language::all();
    
        return view('bs_info', ['Languages' => $Languages]);
     
    }
    
    public function business_a(Request $request)
    {
        
        // $a = $request->user()->BSinformation()->create([
        //         'company_name' => $request->company_name,
        //         'name' => $request->name,

        // ]);

        // $employ = new Employ;
        // $b = $employ::create([
        //         'employ' => $request->company_name,
        //         'BSinformations_id' => $a->id,
        // ]);

        // $BSinformations = new BSinformations;
        // $BSinformations::where('id', $a->id)
        //   ->update(['employ_id' => $b->id]);
     
        return response()->json([
            "data" => $request->all(),
        ]);
       
        // return $request->all();

    }
    
}
