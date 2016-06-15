<?php

namespace App\Http\Controllers;
use Gate;
use Auth;
use App\User;
use App\BSinformations;
use App\ModelBranch\Employment;
use App\ModelBranch\Experience;
use App\ModelBranch\Languagelv;
use App\ModelBranch\Bs_image;
use App\ModelBranch\Subject;
use App\Recruitment;
use App\Recruitments_status;
use App\Personnel;
use App\ModelBranch\Exp_job;
use App\ModelBranch\Exp_job_category;
use App\PersonnelBranch\skill_category;
use App\PersonnelBranch\skill_name;
use App\PersonnelBranch\skill_title;
use App\PersonnelBranch\Experiences_job;
use App\PersonnelBranch\Personnels_skill;
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
        if(Auth::user()->data_status == 1)
        {
            return redirect()->intended('profile');
        }
    	$skill_title = new skill_title;
    	$skill_category = new skill_category;
    	$skill_name = new skill_name;
    	$skill_datas = $skill_name::all();
        $skill_titles = $skill_title::all();
        $skill_categorys = $skill_category::all();
        $subject = Subject::all();
        $exp_job = Exp_job::all();
        $exp_job_category = Exp_job_category::all();
    	return view('step',[
    		'skill_titles' => $skill_titles,
    		'skill_categorys' => $skill_categorys,
    		'skill_datas' => $skill_datas,
            'exp_job' => $exp_job,
            'exp_job_category' => $exp_job_category,
            'subject' => $subject,
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
                    'user_id' => $request->user()->id,
            ]);
        }

        $per_skill = new Personnels_skill;
        foreach ($request->skill_value as $key => $value) {
            if ($value !== 'no') {
                $c = $per_skill::create([
                    'personnel_skill' => $request->per_skill[$key],
                    'year' => $value,
                    'personnels_id' => $a->id,
                    'user_id' => $request->user()->id,
                ]);
            }
        }
        $exp_job = new Experiences_job;
        foreach ($request->experience as $key => $value) {
            $d = $exp_job::create([
                    'experience' => $value,
                    'year' => $request->year[$key],
                    'personnels_id' => $a->id,
                    'user_id' => $request->user()->id,
            ]);
        }
        $user = new User;
        $user::where('id', $request->user()->id)
          ->update(['data_status' =>  1,]);
        return redirect('/profile');

    }
    public function profile(Request $request)
    {
    	$personnel = new Personnel;
    	$personnels = $personnel::where('personnels.user_id', $request->user()->id)
                      ->join('subject', 'personnels.subject_id', '=', 'subject.id')
                      ->get();

        $per_skill = Personnels_skill::where('personnels_skill.user_id', $request->user()->id)
                    ->join('skill_name', 'personnels_skill.personnel_skill', '=', 'skill_name.id')
                    ->join('skill_category', 'skill_name.skill_category_id', '=', 'skill_category.id')
                    ->get();
        // 語言
        $languagelv = $personnel::where('personnels.user_id', $request->user()->id)
                      ->join('languagelvs', 'personnels.id', '=', 'languagelvs.personnels_id')
                      ->get();
        // 職務經歷
        $exp_job = Experiences_job::where('experiences_job.user_id', $request->user()->id)
                   ->join('exp_job', 'experiences_job.experience', '=', 'exp_job.id')
                   ->get();
    	return view('pl_sidebar/profile',[
    		'personnels' => $personnels,
            'per_skill' => $per_skill,
            'languagelv' => $languagelv,
            'exp_job' => $exp_job,

    	]);
    }
    public function news(Request $request)
    {
        // 標題
        $BSinformation = BSinformations::all();
        // 応募default
        $Recruitment = Recruitment::whereNotIn('recruitments.id', function($q){
                        $q->select('recruitments_id')
                        ->from('recruitments_status');
                      })->orWhere('user_id', $request->user()->id)->get();
                   //orWhere作法不好，只有或，沒有和的條件，所以user id一旦錯了就全錯了
        // 応募した
        $Recruitment_ofa = Recruitments_status::where('recruitments_status.user_id', $request->user()->id)
                            ->where('recruitments_status.status',1)
                            ->join('recruitments', 'recruitments_status.recruitments_id', '=', 'recruitments.id')
                            ->get();
        // お気に入り
        $Recruitment_like = Recruitments_status::where('recruitments_status.user_id', $request->user()->id)
                            ->where('recruitments_status.status',2)
                            ->join('recruitments', 'recruitments_status.recruitments_id', '=', 'recruitments.id')
                            ->get();
        return view('pl_sidebar/news',[
          'BSinformation' => $BSinformation,
          'Recruitment' => $Recruitment,
          'Recruitment_ofa' => $Recruitment_ofa,
          'Recruitment_like' => $Recruitment_like,
        ]);
    }
    public function ttt(Request $request)
    {
        $Recruitments_status = Recruitments_status::create([
                    'status' => 1,
                    'recruitments_id' => $request->id,
                    'user_id' => $request->user()->id,
        ]);

        return 'ok';
    }
    public function like(Request $request)
    {
        $Recruitments_status = Recruitments_status::create([
                    'status' => 2,
                    'recruitments_id' => $request->id,
                    'user_id' => $request->user()->id,
        ]);

        return 'ok';
    }

    public function show(Request $request , $id)
    {
        $res  = Recruitment::where('recruitments.id', $id)
        ->join('bsinformations', 'recruitments.bsinformations_id', '=', 'bsinformations.id')
        ->get();
        foreach ($res as $value) {
            $a = $value->user_id;
        }
        $bs_image = Bs_image::where('bs_image.user_id',$a)->get();
        if (is_null($res)) {
            return redirect()->back()->with('message', '找不到該文章');
        }

        return view('pl_sidebar.show', [
            'bs_image' => $bs_image,
            'res' => $res,
        ]);
    }
}
