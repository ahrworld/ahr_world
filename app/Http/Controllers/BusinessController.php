<?php

namespace App\Http\Controllers;
use Gate;
use Auth;
use App\User;
use App\Language;
use App\BSinformations;
use App\ModelBranch\Employment;
use App\ModelBranch\Experience;
use App\ModelBranch\Languagelv;
use App\ModelBranch\Bs_image;
use App\PersonnelBranch\skill_category;
use App\PersonnelBranch\skill_name;
use App\PersonnelBranch\skill_title;
use App\Recruitment;
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
    public function bs_info(Request $request)
    {
        // if (Auth::attempt([
        //     'email' => $request['email'],
        //     'password' => $request['password'],
        //     'status' => 1,
        //     'data_status' =>1,
        //     ])){
        //     return redirect('profile_b2');
        // }
        if(Auth::user()->data_status == 1)
        {
            return redirect()->intended('profile_b2');
        }
        $Languages = Language::all();
        $skill_data = skill_name::all();
        return view('bs_info', ['Languages' => $Languages , 'skill_data' => $skill_data]);

    }
    public function business_a(Request $request)
    {
        $BSinformation = new BSinformations;
        $user_id = $request->user()->id;
        if ($BSinformation::where('user_id',$user_id)->first() == true) {
             return '已經填寫過了';
        }

        $a = $request->user()->BSinformation()->create([
            'company_name' => $request->company_name,
            'name' => $request->name,
            'user_language_id' => $request->user_language_id,
            'web_url' => $request->web_url,
            'address' => $request->address,
            'interview' => $request->interview,
            'test_process1' => $request->test_process1,
            'test_process2' => $request->test_process2,
            'test_process3' => $request->test_process3,
        ]);

        // create employ

        $employ = new Employ;
        foreach ($request->employ as $key) {
            $b = $employ::create([
                    'employ' => $key,
                    'BSinformations_id' => $a->id,
            ]);
        }

        // update BSinformations employ

        // Recruitment tabel
        $c = $request->user()->Recruitment()->create([
            'name' => $request->recruitment_name,
            'content' => $request->content,
            'ideal' => $request->ideal,
            'subject' => $request->subject,
            'need_skill' => $request->need_skill,
            'if_skill' => $request->if_skill,
            'other_skill' => $request->other_skill,
            'site' => $request->site,
            'annual_income' => $request->annual_income,
            'monthly_income' => $request->monthly_income,
            'work_time' => $request->work_time,
            'bonus' => $request->bonus,
            'holiday' => $request->holiday,
            'welfare' => $request->welfare,
            'allowances' => $request->allowances,
            'education' => $request->education,
        ]);

        $employment = new Employment;
        foreach ($request->employment as $key) {
            $d = $employment::create([
                    'employment_name' => $key,
                    'recruitments_id' => $c->id,
            ]);
        }
        $experience = new Experience;
        foreach ($request->experience as $key) {
            $e = $experience::create([
                    'experiences_name' => $key,
                    'recruitments_id' => $c->id,
            ]);
        }
        $Languagelv = new Languagelv;
        foreach ($request->language as $key => $value) {
            $f = $Languagelv::create([
                    'languagelv_name' => $value,
                    'lv' => $request->languagelv[$key],
                    'recruitments_id' => $c->id,
            ]);
        }
        // return $request->language;

        // $Recruitment = new Recruitment;
        // $Recruitment::where('id', $c->id)
        //   ->update(['employment_id' => $d->id,
        //             'experience_id' => $e->id,
        //             'languageLv_id' => $f->id,
        //     ]);

        // return response()->json([
        //     "data" => $request->all(),
        //     'test' => $request->bruce[1]['employ'],
        // ]);
        $user = new User;
        $user::where('id', $request->user()->id)
          ->update(['data_status' =>  1,]);
        return redirect('/profile_b2');
        // return $request->all();

    }

    public function profile(Request $request){
        $BSinformation = new BSinformations;
        $tasks = $BSinformation::where('user_id', $request->user()->id)->get();
        $Recruitment = new Recruitment;
        $recruitments = $Recruitment::where('user_id', $request->user()->id)
                                    ->get();
        $employments = $Recruitment::where('user_id', $request->user()->id)
        ->join('employments', 'recruitments.id', '=', 'employments.recruitments_id')
        ->get();
        $experiences = $Recruitment::where('user_id', $request->user()->id)
        ->join('experiences', 'recruitments.id', '=', 'experiences.recruitments_id')
        ->get();
        $languagelvs = $Recruitment::where('user_id', $request->user()->id)
        ->join('languagelvs', 'recruitments.id', '=', 'languagelvs.recruitments_id')
        ->get();
        $skill_data = skill_name::all();
        return view('bs_sidebar/profile', [
            'tasks' => $tasks,
            'recruitments' => $recruitments,
            'employments' => $employments,
            'experiences' => $experiences,
            'languagelvs' => $languagelvs,
            'skill_data' => $skill_data,
        ]);
    }
    public function image(Request $request){
        $bs_image = New Bs_image;

        if ($request->hasFile('image_big') && $request->hasFile('image_small'))
        {
            // big
            $photo_b = $request->file('image_big')->getClientOriginalExtension();
            $photoname_b = 'big'.$request->user()->id.'.'.$photo_b;
            $photo_upload = $request->file('image_big')->move(public_path().'/ahr/busineses_img',$photoname_b);
            $bs_image->image_big  = $photoname_b;
            // small
            $photo_m = $request->file('image_small')->getClientOriginalExtension();
            $photoname_m = 'small'.$request->user()->id.'.'.$photo_m;
            $photo_upload = $request->file('image_small')->move(public_path().'/ahr/busineses_img',$photoname_m);
            $bs_image->image_small  = $photoname_m;
        }
        //small
        else if($request->hasFile('image_small'))
        {
          $photo_m = $request->file('image_small')->getClientOriginalExtension();
          $photoname_m = 'small'.$request->user()->id.'.'.$photo_m;
          $photo_upload = $request->file('image_small')->move(public_path().'/ahr/busineses_img',$photoname_m);
          $bs_image->image_big  = $photoname_m;
        }
        //big
        else if($request->hasFile('image_big'))
        {
          $photo_b = $request->file('image_big')->getClientOriginalExtension();
          $photoname_b = 'big'.$request->user()->id.'.'.$photo_b;
          $photo_upload = $request->file('image_big')->move(public_path().'/ahr/busineses_img',$photoname_b);
          $bs_image->image_big  = $photoname_b;
        }
        $bs_image->bsinformations_id = $request->user()->id;
        $bs_image->save();
        return redirect('/profile_b2');

    }
    public function update(Request $request){
        $BSinformation = new BSinformations;
        $BSinformation::where('user_id', $request->user()->id)
          ->update([
            'name' =>  $request->name,
            'address' =>  $request->address,
            'web_url' => $request->web_url,
            'set_up' =>  $request->set_up,
            'nationality_members' => $request->nationality_members,
            'member_count' =>  $request->member_count,
            'capital' => $request->capital,
            'amount_of_sales' => $request->amount_of_sales,
            ]);
        return redirect('/profile_b2');

    }
    public function news(Request $request){
        // 新応募
        $Recruitment = Recruitment::where('recruitments.user_id', $request->user()->id)
                                    ->join('recruitments_status', 'recruitments.id', '=', 'recruitments_status.recruitments_id')
                                    ->join('personnels','recruitments_status.user_id', '=', 'personnels.user_id')
                                    ->where('recruitments_status.status', 1)
                                    ->get();
        // お気に入り登錄者
        $Recruitment_like = Recruitment::where('recruitments.user_id', $request->user()->id)
                                    ->join('recruitments_status', 'recruitments.id', '=', 'recruitments_status.recruitments_id')
                                    ->join('personnels','recruitments_status.user_id', '=', 'personnels.user_id')
                                    ->where('recruitments_status.status', 2)
                                    ->get();
        return view('/bs_sidebar/news',[
                'Recruitment' => $Recruitment,
                'Recruitment_like' => $Recruitment_like,
            ]);
    }

}
