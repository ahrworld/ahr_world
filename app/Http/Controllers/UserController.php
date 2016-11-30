<?php

namespace App\Http\Controllers;
use Gate;
use Auth;
use App\User;
use App\BSinformations;
use App\ModelBranch\Employment;
use App\ModelBranch\Experience;
use App\ModelBranch\Languagelv;
use App\ModelBranch\Bs_blog;
use App\ModelBranch\Bs_image;
use App\ModelBranch\Bs_summary;
use App\ModelBranch\Subject;
use App\ModelBranch\Bs_history;
use App\ModelBranch\Pl_history;
use App\ModelBranch\Pl_blog;
use App\Recruitment;
use App\Recruitments_status;
use App\Personnel;
use App\ModelBranch\Exp_job;
use App\ModelBranch\Mail_box;
use App\ModelBranch\Notice;
use App\ModelBranch\Exp_job_category;
use App\ModelBranch\Pl_portfolio;
use App\PersonnelBranch\skill_category;
use App\PersonnelBranch\skill_name;
use App\PersonnelBranch\skill_title;
use App\PersonnelBranch\Analysis_topic;
use App\PersonnelBranch\Analysis_answer;
use App\ModelBranch\Interview_time;
use App\PersonnelBranch\Experiences_job;
use App\PersonnelBranch\Personnels_skill;
use App\PersonnelBranch\Pl_image;
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
                    'personnels_id' => $a->id
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
        if(Auth::user()->data_status == 0)
        {
            return redirect()->intended('step');
        }
    	$personnel = new Personnel;
    	$personnels = $personnel::where('personnels.user_id', $request->user()->id)
                      ->join('subject', 'personnels.subject_id', '=', 'subject.id')
                      ->get();

        $per_skill = Personnels_skill::where('personnels_skill.user_id', $request->user()->id)
                    ->join('skill_name', 'personnels_skill.personnel_skill', '=', 'skill_name.id')
                    ->join('skill_category', 'skill_name.skill_category_id', '=', 'skill_category.id')
                    ->get();
        // 語言
        $languagelv = $personnel::select('languagelvs.lv','languagelvs.languagelv_name','languagelvs.id')
                      ->where('personnels.user_id', $request->user()->id)
                      ->join('languagelvs', 'personnels.id', '=', 'languagelvs.personnels_id')
                      ->get();

        // 職務經歷
        $exp_job = Experiences_job::where('experiences_job.user_id', $request->user()->id)
                   ->join('exp_job', 'experiences_job.experience', '=', 'exp_job.id')
                   ->get();
        // pl_image
        $pl_image = Pl_image::where('user_id', $request->user()->id)->first();
        // portfolio
        $portfolio = Pl_portfolio::where('user_id', $request->user()->id)->orderBy('created_at','desc')->get();
        
        // skill
        $skill_title = new skill_title;
        $skill_category = new skill_category;
        $skill_name = new skill_name;
        $skill_datas = $skill_name::all();
        $skill_titles = $skill_title::all();
        $skill_categorys = $skill_category::all();
        $subject = Subject::all();
        $exp_job_category = Exp_job_category::all();
        // 分析題目
        $Analysis_topic = Analysis_topic::all();
        // 分析結果
        $Analysis_answer = Analysis_answer::where('user_id',$request->user()->id)->first();
        // blog
        $pl_blog = Pl_blog::join('personnels', 'pl_blog.user_id', '=', 'personnels.user_id')
                            ->where('pl_blog.user_id' ,$request->user()->id)
                            ->orderBy('pl_blog.id','desc')->get();
    	return view('pl_sidebar/profile',[
    		'personnels' => $personnels,
            'per_skill' => $per_skill,
            'languagelv' => $languagelv,
            'exp_job' => $exp_job,
            'pl_image' => $pl_image,
            'portfolio' => $portfolio,
            'skill_titles' => $skill_titles,
            'skill_categorys' => $skill_categorys,
            'skill_datas' => $skill_datas,
            'exp_job_category' => $exp_job_category,
            'subject' => $subject,
            'Analysis_topic' => $Analysis_topic,
            'Analysis_answer' => $Analysis_answer,
            'pl_blog' => $pl_blog,
    	]);
    }
    public function blog(Request $request){
        if(isset($request->p_file)){
            Pl_blog::create([
               'title' => $request->title,
               'sub_title' => $request->sub_title,
               'blog_content' => $request->blog_content,
               'blog_image' => $request->p_file,
               'user_id' => $request->user()->id
            ]);
            return redirect('profile#p3');
       }
       Pl_blog::create([
          'title' => $request->title,
          'sub_title' => $request->sub_title,
          'blog_content' => $request->blog_content,
          'user_id' => $request->user()->id
       ]);
       return redirect('profile#p3');
    }
    public function personnels_update(Request $request)
    {

         $P_id = Personnel::select('id')->where('user_id', $request->user()->id)->first();
         if (isset($request->family_name)) {
            // base
            Personnel::where('user_id', $request->user()->id)
            ->update([
            'family_name' =>  $request->family_name,
            'surname' =>  $request->surname,
            'family_name_en' => $request->family_name_en,
            'surname_en' =>  $request->surname_en,
            'country' => $request->country,
            'birthday' =>  $request->birthday,
            'skype_id' => $request->skype_id,
            'line_id' => $request->line_id,
            'phone' => $request->phone,
            ]);
            return redirect('/profile');

         }elseif (isset($request->school)) {
            // school
            Personnel::where('user_id', $request->user()->id)
            ->update([
            'school' => $request->school,
            'school_country' => $request->school_country,
            'end_year' => $request->end_year,
            ]);

            return redirect('/profile');
         }elseif (isset($request->language)) {
            // skill
            foreach ($request->language as $key => $value) {
               if (isset($request->id[$key])) {
                  Languagelv::where('id', $request->id[$key])
                        ->update([
                                'languagelv_name' => $value,
                                'lv' => $request->languagelv[$key],
                                'personnels_id' => $P_id->id
                        ]);
               }else{
                  Languagelv::create([
                                   'languagelv_name' => $value,
                                   'lv' => $request->languagelv[$key],
                                   'personnels_id' => $P_id->id
                           ]);
               }
              
            }
            //delete
            if (isset($request->delete_language)) {
                foreach ($request->delete_language as $key => $value) {
                      Languagelv::where('id', $value)
                            ->delete();
                }
            }
            return redirect('/profile');
         }

    }
    public function news(Request $request)
    {
        // 圖片
        $bs_image = Bs_image::all();

        //応募default
        $Recruitment = Recruitment::select('recruitments.id as r_id','recruitments.created_at','exp_job.name',
            'bsinformations.company_name','recruitments.user_id','bsinformations.user_id as b_user_id',
            'content','need_skill','annual_income','monthly_income','work_site','languagelvs.languagelv_name')
                        ->whereNotIn('recruitments.id', function($q){
                        $q->select('recruitments_id')
                        ->from('recruitments_status');
                      })->join('bsinformations', 'recruitments.user_id', '=', 'bsinformations.user_id')
                        ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')
                        ->join('languagelvs', 'languagelvs.recruitments_id', '=', 'recruitments.id')
                        ->get();
                   //orWhere作法不好，只有或，沒有和的條件，所以user id一旦錯了就全錯了

        // 応募した
        $Recruitment_ofa = Recruitments_status::select('recruitments.id as r_id','recruitments.created_at','exp_job.name','recruitments.user_id',
            'content','need_skill','annual_income','monthly_income','work_site','bsinformations.company_name','languagelvs.languagelv_name')
                            ->where('recruitments_status.user_id', $request->user()->id)
                            ->where('recruitments_status.status',1)
                            ->join('recruitments', 'recruitments_status.recruitments_id', '=', 'recruitments.id')
                            ->join('bsinformations', 'recruitments.user_id', '=', 'bsinformations.user_id')
                            ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')
                            ->join('languagelvs', 'languagelvs.recruitments_id', '=', 'recruitments.id')
                            ->get();
        // 檢索履歷
        $history = Recruitment::select('recruitments.id as r_id','recruitments.created_at','exp_job.name','recruitments.user_id',
            'content','need_skill','annual_income','monthly_income','work_site','bsinformations.company_name','languagelvs.languagelv_name','pl_history.updated_at')
                            ->join('pl_history', 'recruitments.id', '=', 'pl_history.recruitments_id')
                            ->join('bsinformations', 'recruitments.user_id', '=', 'bsinformations.user_id')
                            ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')
                            ->join('languagelvs', 'languagelvs.recruitments_id', '=', 'recruitments.id')
                            ->orderBy('pl_history.updated_at','desc')
                            ->get();
        $history_ofa =  Recruitments_status::select('recruitments.id as r_id','recruitments.created_at','exp_job.name','recruitments.user_id',
            'content','need_skill','annual_income','monthly_income','work_site','bsinformations.company_name','languagelvs.languagelv_name','pl_history.updated_at')
                            ->where('recruitments_status.user_id', $request->user()->id)
                            ->where('recruitments_status.status',1)
                            ->join('recruitments', 'recruitments_status.recruitments_id', '=', 'recruitments.id')
                            ->join('pl_history', 'recruitments.id', '=', 'pl_history.recruitments_id')
                            ->join('bsinformations', 'recruitments.user_id', '=', 'bsinformations.user_id')
                            ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')
                            ->join('languagelvs', 'languagelvs.recruitments_id', '=', 'recruitments.id')
                            ->orderBy('pl_history.updated_at','desc')
                            ->get();
        $history_like = Recruitments_status::select('recruitments.id as r_id','recruitments.created_at','exp_job.name','recruitments.user_id',
            'content','need_skill','annual_income','monthly_income','work_site','bsinformations.company_name','languagelvs.languagelv_name','pl_history.updated_at')
                            ->where('recruitments_status.user_id', $request->user()->id)
                            ->where('recruitments_status.status',2)
                            ->join('recruitments', 'recruitments_status.recruitments_id', '=', 'recruitments.id')
                            ->join('pl_history', 'recruitments.id', '=', 'pl_history.recruitments_id')
                            ->join('bsinformations', 'recruitments.user_id', '=', 'bsinformations.user_id')
                            ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')
                            ->join('languagelvs', 'languagelvs.recruitments_id', '=', 'recruitments.id')
                            ->orderBy('pl_history.updated_at','desc')
                            ->get();
        // お気に入り
        $Recruitment_like = Recruitments_status::select('recruitments.id as r_id','recruitments.created_at','exp_job.name','recruitments.user_id',
            'content','need_skill','annual_income','monthly_income','work_site','bsinformations.company_name','languagelvs.languagelv_name')
                            ->where('recruitments_status.user_id', $request->user()->id)
                            ->where('recruitments_status.status',2)
                            ->join('recruitments', 'recruitments_status.recruitments_id', '=', 'recruitments.id')
                            ->join('bsinformations', 'recruitments.user_id', '=', 'bsinformations.user_id')
                            ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')
                            ->join('languagelvs', 'languagelvs.recruitments_id', '=', 'recruitments.id')
                            ->get();
        // 面接調整
        $Recruitment_a = Recruitments_status::select('recruitments.id as r_id','recruitments.created_at','exp_job.name',
            'bsinformations.company_name','need_skill','recruitments.user_id','bsinformations.user_id as b_user_id',
            'content','need_skill','annual_income','monthly_income','work_site','languagelvs.languagelv_name')
                            ->where('recruitments_status.user_id', $request->user()->id)
                            ->where('recruitments_status.status',3)
                            ->orWhere('recruitments_status.status',4)
                            ->join('recruitments', 'recruitments_status.recruitments_id', '=', 'recruitments.id')
                            ->join('bsinformations', 'recruitments.user_id', '=', 'bsinformations.user_id')
                            ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')
                            ->join('languagelvs', 'languagelvs.recruitments_id', '=', 'recruitments.id')
                            ->get();
        // 選考進行
        $Recruitment_check = Recruitments_status::select('recruitments.id as r_id','recruitments.created_at','exp_job.name',
            'bsinformations.company_name','need_skill','recruitments.user_id','bsinformations.user_id as b_user_id',
            'content','need_skill','annual_income','monthly_income','work_site','languagelvs.languagelv_name')
                            ->where('recruitments_status.user_id', $request->user()->id)
                            ->where('recruitments_status.status',9)
                            ->join('recruitments', 'recruitments_status.recruitments_id', '=', 'recruitments.id')
                            ->join('bsinformations', 'recruitments.user_id', '=', 'bsinformations.user_id')
                            ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')
                            ->join('languagelvs', 'languagelvs.recruitments_id', '=', 'recruitments.id')
                            ->get();
        // 內定
        $Recruitment_ok = Recruitments_status::select('recruitments.id as r_id','recruitments.created_at','exp_job.name',
            'bsinformations.company_name','need_skill','recruitments.user_id','bsinformations.user_id as b_user_id',
            'content','need_skill','annual_income','monthly_income','work_site','languagelvs.languagelv_name')
                            ->where('recruitments_status.user_id', $request->user()->id)
                            ->where('recruitments_status.status',10)
                            ->join('recruitments', 'recruitments_status.recruitments_id', '=', 'recruitments.id')
                            ->join('bsinformations', 'recruitments.user_id', '=', 'bsinformations.user_id')
                            ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')
                            ->join('languagelvs', 'languagelvs.recruitments_id', '=', 'recruitments.id')
                            ->get();
     

        return view('pl_sidebar/news',[
          'bs_image' => $bs_image,
          'Recruitment' => $Recruitment,
          'history' => $history,
          'history_ofa' => $history_ofa,
          'history_like' => $history_like,
          'Recruitment_ofa' => $Recruitment_ofa,
          'Recruitment_like' => $Recruitment_like,
          'Recruitment_check' => $Recruitment_check,
          'Recruitment_ok' => $Recruitment_ok,
          'Recruitment_a' => $Recruitment_a,
        ]);
    }
    public function ttt(Request $request)
    {
        $Personnel = Personnel::where('user_id',$request->user()->id)->first();
        $ReIf = Recruitments_status::where('recruitments_id',$request->id)->where('user_id',$request->user()->id)->get();

        if ($ReIf->count() == true) {
           Recruitments_status::where('recruitments_status.recruitments_id', $request->id)
                            ->where('recruitments_status.user_id', $request->user()->id)
                            ->update(['status' => 1]);
        }else{
           Recruitments_status::create([
                    'status' => 1,
                    'recruitments_id' => $request->id,
                    'user_id' => $request->user()->id,
          ]);
        }
        $notice = Mail_box::create([
                    'mail_title' => $Personnel->family_name.$Personnel->surname.'さんが新着応募',
                    'mail_content' => $request->content,
                    'status' => 1,
                    'mail_status' => 1,
                    'get_user_id' => $request->b_id,
                    'post_user_id' => $request->user()->id,
        ]);
        return redirect('/news');
    }
    public function message(Request $request)
    {
        $Personnel = Personnel::where('user_id',$request->user()->id)->first();
        $notice = Mail_box::create([
                    'mail_title' => $Personnel->family_name.$Personnel->surname.'さんがリクエスト',
                    'mail_content' => $request->content,
                    'status' => 0,
                    'mail_status' => 0,
                    'get_user_id' => $request->b_id,
                    'post_user_id' => $request->user()->id,
        ]);
        return redirect('/news');
    }
    public function like(Request $request)
    {
        $Personnel = Personnel::where('user_id',$request->user()->id)->first();
        $ReIf = Recruitments_status::where('recruitments_id',$request->id)->where('user_id',$request->user()->id)->get();

        if ($ReIf->count() == true) {
           Recruitments_status::where('recruitments_status.recruitments_id', $request->id)
                            ->where('recruitments_status.user_id', $request->user()->id)
                            ->update(['status' => 2]);
        }else{
           Recruitments_status::create([
                    'status' => 2,
                    'recruitments_id' => $request->id,
                    'user_id' => $request->user()->id,
          ]);
        }
        return response()->json('ok');
    }
    public function search(Request $request)
    {
           $query = Recruitment::join('bsinformations', 'recruitments.user_id', '=', 'bsinformations.user_id')
                        ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')
                        ->join('bs_image', 'bs_image.user_id', '=', 'recruitments.user_id')
                        ->join('languagelvs', 'languagelvs.recruitments_id', '=', 'recruitments.id')
                        ->where('bsinformations.company_name', 'like', '%'.$request->company_name.'%')
                        ->where('exp_job.name', 'like', '%'.$request->job.'%')
                        ->where('languagelvs.languagelv_name', 'like', '%'.$request->language.'%')
                        ->where('recruitments.need_skill', 'like', '%'.$request->skill.'%')
                        ->get();

           return response()->json($query);
    }
    public function show(Request $request , $id)
    {
        $res  = Recruitment::select('recruitments.id as r_id','recruitments.created_at','exp_job.name','recruitments.user_id',
            'content','need_skill','annual_income','monthly_income','work_site','bsinformations.company_name','languagelvs.languagelv_name')
                            ->where('recruitments.id', $id)
                            ->join('bsinformations', 'recruitments.user_id', '=', 'bsinformations.user_id')
                            ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')
                            ->join('languagelvs', 'languagelvs.recruitments_id', '=', 'recruitments.id')
                            ->first();
       
        $r_id = Recruitment::select('recruitments.id as r_id')
                            ->where('recruitments.id', $id)
                            ->first();

        $bs_id = $res->user_id;
        $res_status = Recruitments_status::where('recruitments_id',$id)->first();
        // tab1
        $bs_summary_A = Bs_summary::where('user_id', $bs_id)
        ->join('bs_summary_image', 'bs_summary.id', '=', 'bs_summary_image.bs_summary_id')
        ->get();                 
        $recruitments = Recruitment::where('recruitments.id', $id)
        ->join('subject', 'recruitments.subject_id', '=', 'subject.id')
        ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')
        ->get();   
        $employments = Recruitment::where('recruitments.id', $id)
        ->join('employments', 'recruitments.id', '=', 'employments.recruitments_id')
        ->get();
        $experiences = Recruitment::where('recruitments.id', $id)
        ->join('experiences', 'recruitments.id', '=', 'experiences.recruitments_id')
        ->get();
        // bs_blog
        $bs_blog = Bs_blog::join('bsinformations', 'bs_blog.user_id', '=', 'bsinformations.user_id')
                            ->where('bs_blog.user_id' ,$bs_id)
                            ->orderBy('bs_blog.id','desc')->get();
        $bs_image = Bs_image::where('bs_image.user_id',$res->user_id)->first();
        $history = Pl_history::where('user_id',$request->user()->id)->where('recruitments_id',$id)->first();
        // 足跡
        if (isset($history)) {
            Pl_history::where('user_id',$request->user()->id)
                        ->where('recruitments_id',$id)
                        ->update([]);
        }else{
            Pl_history::create([
               'recruitments_id' => $id,
               'bs_user_id' => $bs_id,
               'user_id' => $request->user()->id
            ]);
        }
        return view('pl_sidebar.show', [
            'res_status' => $res_status,
            'bs_image' => $bs_image,
            'bs_summary_A' =>$bs_summary_A,
            'recruitments' => $recruitments,
            'employments' => $employments,
            'experiences' => $experiences,
            'bs_blog' => $bs_blog,
            'res' => $res,
            'r_id' =>$r_id,
        ]);
    }
    // 秀面接日程
    public function schedule(Request $request , $id)
    {
        $res  = Recruitment::where('recruitments.id', $id)
        ->join('bsinformations', 'recruitments.bsinformations_id', '=', 'bsinformations.id')
        ->first();
        $a = Interview_time::where('bsinformations_id',$res->user_id)->get();
        return view('pl_sidebar.schedule', [
            'res' => $res,
            'a' =>$a,
            'id' => $id,
        ]);
    }
    // analysis
    public function analysis(Request $request)
    {
         // 總和
         foreach ($request->data as $key => $value) {
                $status = $request->data[$key];

                switch ($status['status']) {
                    case "1":
                          $array1[] = $status['value'];
                    break;
                    case "2":
                          $array2[] = $status['value'];
                    break;
                    case "3":
                          $array3[] = $status['value'];
                    break;
                    case "4":
                          $array4[] = $status['value'];
                    break;
                    case "5":
                          $array5[] = $status['value'];
                    break;
                    case "6":
                          $array6[] = $status['value'];
                    break;
                    case "7":
                          $array7[] = $status['value'];
                    break;
                    case "8":
                          $array8[] = $status['value'];
                    break;

                }
            }
        $as_sum1 = array_sum($array1);
        $as_sum2 = array_sum($array2);
        $as_sum3 = array_sum($array3);
        $as_sum4 = array_sum($array4);
        $as_sum5 = array_sum($array5);
        $as_sum6 = array_sum($array6);
        $as_sum7 = array_sum($array7);
        $as_sum8 = array_sum($array8);
        // if has
        $user_as = Analysis_answer::where('user_id', $request->user()->id)->first();
        if (is_null($user_as)) {
            // create
            Analysis_answer::create([
                'user_id' => $request->user()->id,
                'as_value_1' => $as_sum1,
                'as_value_2' => $as_sum2,
                'as_value_3' => $as_sum3,
                'as_value_4' => $as_sum4,
                'as_value_5' => $as_sum5,
                'as_value_6' => $as_sum6,
                'as_value_7' => $as_sum7,
                'as_value_8' => $as_sum8,

            ]);
        }else{
            // update
             Analysis_answer::where('user_id', $request->user()->id)
                                ->update([
                                    'as_value_1' => $as_sum1,
                                    'as_value_2' => $as_sum2,
                                    'as_value_3' => $as_sum3,
                                    'as_value_4' => $as_sum4,
                                    'as_value_5' => $as_sum5,
                                    'as_value_6' => $as_sum6,
                                    'as_value_7' => $as_sum7,
                                    'as_value_8' => $as_sum8,
                                    ]);
        }
        return response()->json('ok');
    }
    public function analysis_view(Request $request)
    {
        $query = Analysis_answer::where('user_id', $request->user()->id)->first();
        return response()->json($query);
    }
    // 確認行程時間
    public function schedule_check(Request $request)
    {
         Interview_time::where('bsinformations_id',$request->bs_id)
                         ->where('time',$request->value)
                         ->update([
                            'personnels_id' => $request->user()->id,
                            'status' => 1
                         ]);

         Recruitments_status::where('recruitments_status.recruitments_id', $request->rs_id)
                            ->where('recruitments_status.user_id', $request->user()->id)
                            ->update(['status' => 8]);
         // 待追加Notice
         $Personnel = Personnel::where('user_id',$request->user()->id)->first();

         Notice::create([
                    'notice_title' => $Personnel->family_name.$Personnel->surname.'応募者様との、面接調整が完了しました。',
                    'notice_content' => $request->value,
                    'status' => 8,
                    'get_user_id' => $request->bs_id,
                    'post_user_id' => $request->user()->id
         ]);
         return redirect('/news');
    }
    public function image_small(Request $request){

        if($request->image_small){
        $where = Pl_image::where('user_id',$request->user()->id)->first();
        $img = $request->image_small;
        $img = str_replace('data:image/png;base64,', '', $img);
           if (is_null($where)) {
                $image = Pl_image::create([
                   'image_small' => $img,
                   'user_id' => $request->user()->id,
                ]);
                $image =  Pl_image::where('user_id',$request->user()->id)->first();
                return response()->json($image);
            }
        Pl_image::where('user_id',$request->user()->id)->update(['image_small' => $img]);
        $update =  Pl_image::where('user_id',$request->user()->id)->first();
        return response()->json($update);
       }

    }
    public function portfolio_add(Request $request){
        $img = $request->p_file;
        if(isset($img)){

        Pl_portfolio::create([
           'p_title' => $request->p_title,
           'p_content' => $request->p_content,
           'p_file' => $img,
           'p_url' => $request->p_url,
           'user_id' => $request->user()->id,
        ]);
        return redirect('profile#p2');
       }

    }
    // setting
    public function setting(Request $request)
    {
        $a = Personnel::where('personnels.user_id', $request->user()->id)->first();
        $notice_count = Mail_box::where('mail_box.mail_status',1)->where('mail_box.get_user_id', $request->user()->id)->count();
        return view('pl_sidebar.setting', [
            'a' =>$a,
            'notice_count' => $notice_count
        ]);
    }
    public function giveup(Request $request)
    {

        Recruitments_status::where('recruitments_status.recruitments_id', $request->rs_id)
                            ->delete();
        return redirect('news#a3');
    }



}
