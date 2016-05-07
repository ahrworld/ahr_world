<?php

namespace App\Http\Controllers;
use Gate;
use App\User;
use App\ModelBranch\Languagelv;
use App\Personnel;
use App\PersonnelBranch\skill_category;
use App\PersonnelBranch\skill_name;
use App\PersonnelBranch\skill_title;
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
    	$skill_title = new skill_title;
    	$skill_category = new skill_category;
    	$skill_name = new skill_name;
    	$skill_datas = $skill_name::all();
        $skill_titles = $skill_title::all();
        $skill_categorys = $skill_category::all();
    	return view('step',[
    		'skill_titles' => $skill_titles,
    		'skill_categorys' => $skill_categorys,
    		'skill_datas' => $skill_datas,
    	]);
    }
    public function personnel_in(Request $request)
    {

    	$personnel = new Personnel;
    	$a = $request->user()->Personnel()->create([
            'surname' => $request->surname,
            'family_name' => $request->family_name,
            'surname_en' => $request->surname_en,
            'family_name_en' => $request->family_name_en,
            'birthday' => $request->birthdayPicker_birthDay,
            'post' => $request->post,
            'city' => $request->city,
            'address' => $request->address,
            'phone' => $request->phone,
            'line_id' => $request->line_id,
            'country' => $request->country,
            'want_country' => $request->want_country,
            'sex' => $request->sex,
            'military' => $request->military,
            'military_end_year' => $request->military_end_year,
            'military_end_month' => $request->military_end_month,
            'character' => $request->character,
            'educational_status' => $request->educational_status,

            'educational' => $request->educational,
            'educational' => $request->educationals,

            'school' => $request->school,
            'school_country' => $request->school_country,
            'subject_id' => $request->subject,
            'start_year' => $request->start_year,
            'start_month' => $request->start_month,
            'end_year' => $request->end_year,
            'end_month' => $request->end_month,
        ]);
		$languagelv = new Languagelv;
        foreach ($request->language as $key => $value) {
            $b = $languagelv::create([
                    'languagelv_name' => $value,
                    'lv' => $request->languagelv[$key],
                    'personnels_id' => $a->id,
            ]);
        }
      
        return redirect('/news_b2');
    	
    }
    public function profile(Request $request)
    {	
    	$personnel = new Personnel;
    	$personnels = $personnel::where('user_id', $request->user()->id)
                                    ->get();
    	return view('pl_sidebar/profile',[
    		'personnels' => $personnels,
    	]);
    }

}
