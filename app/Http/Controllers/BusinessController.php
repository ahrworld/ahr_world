<?php

namespace App\Http\Controllers;
use Gate;
use App\User;
use App\Language;
use App\BSinformations;
use App\ModelBranch\Employment;
use App\ModelBranch\Experience;
use App\ModelBranch\Languagelv;
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
    public function bs_info()
    {
        //定義資料庫
        $Languages = Language::all();

        return view('bs_info', ['Languages' => $Languages]);

    }
    public function business_a(Request $request)
    {
        $BSinformation = new BSinformations;
        // $user_id = $request->user()->id;
        // if ($BSinformation::where('user_id',$user_id)->first() == true) {
        //      return '已經填寫過了';
        // }

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
        $BSinformation::where('id', $a->id)
          ->update(['employ_id' => $b->id]);


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

        $Recruitment = new Recruitment;
        $Recruitment::where('id', $c->id)
          ->update(['employment_id' => $d->id,
                    'experience_id' => $e->id,
                    'languageLv_id' => $f->id,
            ]);

        // return response()->json([
        //     "data" => $request->all(),
        //     'test' => $request->bruce[1]['employ'],
        // ]);
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
        return view('bs_sidebar/profile', [
            'tasks' => $tasks,
            'recruitments' => $recruitments,
            'employments' => $employments,
            'experiences' => $experiences,
            'languagelvs' => $languagelvs,
        ]);
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


}
