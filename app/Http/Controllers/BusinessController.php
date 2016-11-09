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
use App\ModelBranch\Bs_summary;
use App\ModelBranch\Bs_summary_image;
use App\ModelBranch\Bs_blog;
use App\ModelBranch\Mail_box;
use App\ModelBranch\Notice;
use App\ModelBranch\Exp_job;
use App\ModelBranch\Exp_job_category;
use App\ModelBranch\Subject;
use App\ModelBranch\Interview_time;
use App\ModelBranch\Bs_history;
use App\ModelBranch\Pl_history;
use App\PersonnelBranch\skill_category;
use App\PersonnelBranch\skill_name;
use App\PersonnelBranch\skill_title;
use App\Recruitment;
use App\Recruitments_status;
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
        $this->middleware('auth.bs');
        $this->middleware('role.business');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function bs_info(Request $request)
    {
        if(Auth::user()->data_status == 1)
        {
            return redirect()->intended('profile_b2');
        }
        $subject = Subject::all();
        $exp_job = Exp_job::all();
        $exp_job_category = Exp_job_category::all();
        $Languages = Language::all();
        $skill_data = skill_name::all();
        return view('bs_info', [
            'Languages' => $Languages ,
            'skill_data' => $skill_data,
            'exp_job' => $exp_job,
            'exp_job_category' => $exp_job_category,
            'subject' => $subject,
            ]);

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
            'job_id' => $request->recruitment_name,
            'content' => $request->content,
            'ideal' => $request->ideal,
            'subject_id' => $request->subject,
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
            'bsinformations_id' => $a->id,
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
    public function setting(Request $request)
    {
        $notice_count = Mail_box::where('mail_box.get_user_id', $request->user()->id)->count();
        return view('bs_sidebar.bs_setting', [
            'notice_count' => $notice_count
        ]);
    }
    public function profile(Request $request){
        $notice_count = Mail_box::where('mail_box.get_user_id', $request->user()->id)->count();
        if(Auth::user()->data_status == 0)
        {
            return redirect()->intended('bs_info');
        }
        $tasks = BSinformations::where('user_id', $request->user()->id)->get();
        $Recruitment = new Recruitment;
        $subject = Subject::all();
        $exp_job = Exp_job::all();
        $exp_job_category = Exp_job_category::all();
        $recruitments = $Recruitment::where('recruitments.user_id', $request->user()->id)
        ->join('subject', 'recruitments.subject_id', '=', 'subject.id')
        ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')
        ->get();
        $employments = $Recruitment::where('recruitments.user_id', $request->user()->id)
        ->join('employments', 'recruitments.id', '=', 'employments.recruitments_id')
        ->get();
        $experiences = $Recruitment::where('recruitments.user_id', $request->user()->id)
        ->join('experiences', 'recruitments.id', '=', 'experiences.recruitments_id')
        ->get();
        $languagelvs = $Recruitment::where('recruitments.user_id', $request->user()->id)
        ->join('languagelvs', 'recruitments.id', '=', 'languagelvs.recruitments_id')
        ->get();
        $skill_data = skill_name::all();

        $bs_summary_A = Bs_summary::where('user_id', $request->user()->id)
        ->join('bs_summary_image', 'bs_summary.id', '=', 'bs_summary_image.bs_summary_id')
        ->get();

        // bs_image
        $bs_image = Bs_image::where('user_id', $request->user()->id)->get();
        // bs_blog
        $bs_blog = Bs_blog::where('user_id' ,$request->user()->id)->orderBy('id','desc')->get();
        // 面接
        $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
        $prev_date = date('Y-m-d', strtotime($date .' -1 week'));
        $next_date = date('Y-m-d', strtotime($date .' +1 week'));
        return view('bs_sidebar/profile', [
            'notice_count' => $notice_count,
            'tasks' => $tasks,
            'recruitments' => $recruitments,
            'employments' => $employments,
            'experiences' => $experiences,
            'languagelvs' => $languagelvs,
            'skill_data' => $skill_data,
            'bs_summary_A' => $bs_summary_A,
            'exp_job' => $exp_job,
            'exp_job_category' => $exp_job_category,
            'subject' => $subject,
            'bs_image' => $bs_image,
            'bs_blog' => $bs_blog,
            'date' => $date,
            'prev_date' => $prev_date,
            'next_date' => $next_date,
        ]);
    }
    public function image_big(Request $request){
        if($request->image_big){
        $where = Bs_image::where('user_id',$request->user()->id)->first();
        // $png_url = time().$request->user()->id.".png";
        // $path = public_path()."/ahr/busineses_img/".$png_url;
        $img = $request->image_big;
        $img = str_replace('data:image/png;base64,', '', $img);
        // $img = substr($img, strpos($img, ",")+1);
        // $data = base64_decode($img);
        // $success = file_put_contents($path, $data);
            if (is_null($where)) {
                Bs_image::create([
                   'image_big' => $img,
                   'user_id' => $request->user()->id,
                ]);
                return response()->json('new ok');
            }
        Bs_image::where('user_id',$request->user()->id)->update(['image_big' => $img]);
        return response()->json('update ok');
       }
    }
    public function image_small(Request $request){

        if($request->image_small){
        $where = Bs_image::where('user_id',$request->user()->id)->first();
        $img = $request->image_small;
        $img = str_replace('data:image/png;base64,', '', $img);
           if (is_null($where)) {
                Bs_image::create([
                   'image_small' => $img,
                   'user_id' => $request->user()->id,
                ]);
                return response()->json('new ok');
            }
        Bs_image::where('user_id',$request->user()->id)->update(['image_small' => $img]);
        return response()->json('update ok');
       }
    }
    public function summary(Request $request){
       // summary create
       $bs_summary = New Bs_summary;
       $bs_summary_image = New Bs_summary_image;
       $a = $bs_summary::create([
                    'user_id' => $request->user()->id,
                    'summary_title' => $request->summary_title,
                    'summary' => $request->summary,
       ]);

       // if image
       if ($request->hasFile('summary_image'))
       {
           $photoname_b = date("ymdhis").$request->user()->id.'.'.'png';
           $photo_upload = $request->file('summary_image')->move(public_path().'/ahr/busineses_img',$photoname_b);
           $bs_summary_image->image = $photoname_b;
           $bs_summary_image->bs_summary_id = $a->id;
           $bs_summary_image->save();
       }
       return redirect('/profile_b2');
    }
    //Recruitment
    public function recruitments_add(Request $request){
        $a = BSinformations::where('user_id',$request->user()->id)->first();
        // Recruitment tabel
        $c = $request->user()->Recruitment()->create([
            'job_id' => $request->recruitment_name,
            'content' => $request->content,
            'ideal' => $request->ideal,
            'subject_id' => $request->subject,
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
            'bsinformations_id' => $a->id,

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
            'school' => $request->school,
            ]);
        return redirect('/profile_b2');

    }
    public function blog(Request $request){
       $date = date('ymdhis');
       if($request->hasFile('image'))
       {
         $photoname_m = $date.$request->user()->id.'.'.'png';
         $photo_upload = $request->file('image')->move(public_path().'/ahr/business_blog',$photoname_m);
         Bs_blog::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'blog_content' => $request->blog_content,
            'blog_image' => $photoname_m,
            'user_id' => $request->user()->id,
         ]);
       }

       return redirect('/profile_b2');
    }
    public function preview(Request $request){
       $date = date('ymdhis');


       return $request->hasFile('image');
    }
    public function news(Request $request){
        $notice_count = Mail_box::where('mail_box.get_user_id', $request->user()->id)->count();
        $Recruitment_img = Recruitments_status::select('pl_image.image_small','pl_image.user_id as u_id')
                                    ->join('recruitments', 'recruitments_status.recruitments_id', '=', 'recruitments.id')
                                    ->join('pl_image', 'recruitments_status.user_id', '=', 'pl_image.user_id')
                                    ->where('recruitments.user_id', $request->user()->id)
                                    ->get();
        $Re = Recruitments_status::select('recruitments_status.id as rs_id','personnels.surname','personnels.country',
                                    'exp_job.name as job_name','personnels.family_name','personnels.school','personnels.sex','personnels.school_country','personnels.language_lv','personnels.birthday','recruitments_status.user_id')
                                    ->join('recruitments', 'recruitments_status.recruitments_id', '=', 'recruitments.id')
                                    ->join('personnels','recruitments_status.user_id', '=', 'personnels.user_id')
                                    ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')
                                    ->where('recruitments.user_id', $request->user()->id);
        // 新応募
        $Recruitment = Recruitments_status::select('recruitments_status.id as rs_id','personnels.surname','personnels.country',
                                    'exp_job.name as job_name','personnels.family_name','personnels.school','personnels.sex','personnels.school_country','personnels.language_lv','personnels.birthday','recruitments_status.user_id')
                                    ->join('recruitments', 'recruitments_status.recruitments_id', '=', 'recruitments.id')
                                    ->join('personnels','recruitments_status.user_id', '=', 'personnels.user_id')
                                    ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')
                                    ->where('recruitments_status.status', 1)
                                    ->where('recruitments.user_id', $request->user()->id)
                                    ->get();
        // お気に入り登錄者
        $Recruitment_like = Recruitments_status::select('recruitments_status.id as rs_id','personnels.surname','personnels.country',
                                    'exp_job.name as job_name','personnels.family_name','personnels.school','personnels.sex','personnels.school_country','personnels.language_lv','personnels.birthday','recruitments_status.user_id')
                                    ->join('recruitments', 'recruitments_status.recruitments_id', '=', 'recruitments.id')
                                    ->join('personnels','recruitments_status.user_id', '=', 'personnels.user_id')
                                    ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')
                                    ->where('recruitments.user_id', $request->user()->id)
                                    ->where('recruitments_status.status', 2)
                                    ->get();
        // 面接調整中
        $Recruitment_a = Recruitments_status::select('recruitments_status.id as rs_id','personnels.surname','personnels.country',
                                    'exp_job.name as job_name','personnels.family_name','personnels.school','personnels.sex','personnels.school_country','personnels.language_lv','personnels.birthday','recruitments_status.user_id')
                                    ->join('recruitments', 'recruitments_status.recruitments_id', '=', 'recruitments.id')
                                    ->join('personnels','recruitments_status.user_id', '=', 'personnels.user_id')
                                    ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')
                                    ->where('recruitments.user_id', $request->user()->id)
                                    ->where('recruitments_status.status', 3)
                                    ->get();
        $Recruitment_b = Recruitments_status::select('recruitments_status.id as rs_id','personnels.surname','personnels.country',
                                    'exp_job.name as job_name','personnels.family_name','personnels.school','personnels.sex','personnels.school_country','personnels.language_lv','personnels.birthday','recruitments_status.user_id')
                                    ->join('recruitments', 'recruitments_status.recruitments_id', '=', 'recruitments.id')
                                    ->join('personnels','recruitments_status.user_id', '=', 'personnels.user_id')
                                    ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')
                                    ->where('recruitments.user_id', $request->user()->id)
                                    ->where('recruitments_status.status', 4)
                                    ->get();
        $Recruitment_c = Recruitments_status::select('recruitments_status.id as rs_id','personnels.surname','personnels.country',
                                    'exp_job.name as job_name','personnels.family_name','personnels.school','personnels.sex','personnels.school_country','personnels.language_lv','personnels.birthday','recruitments_status.user_id')
                                    ->join('recruitments', 'recruitments_status.recruitments_id', '=', 'recruitments.id')
                                    ->join('personnels','recruitments_status.user_id', '=', 'personnels.user_id')
                                    ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')
                                    ->where('recruitments.user_id', $request->user()->id)
                                    ->where('recruitments_status.status', 5)
                                    ->get();
        $Recruitment_d = Recruitments_status::select('recruitments_status.id as rs_id','personnels.surname','personnels.country',
                                    'exp_job.name as job_name','personnels.family_name','personnels.school','personnels.sex','personnels.school_country','personnels.language_lv','personnels.birthday','recruitments_status.user_id')
                                    ->join('recruitments', 'recruitments_status.recruitments_id', '=', 'recruitments.id')
                                    ->join('personnels','recruitments_status.user_id', '=', 'personnels.user_id')
                                    ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')
                                    ->where('recruitments.user_id', $request->user()->id)
                                    ->where('recruitments_status.status', 6)
                                    ->get();
        // 面接調整中完了
        $Recruitment_f = Recruitments_status::select('recruitments_status.id as rs_id','personnels.surname','personnels.country',
                                    'exp_job.name as job_name','personnels.family_name','personnels.school','personnels.sex','personnels.school_country','personnels.language_lv','personnels.birthday','recruitments_status.user_id')
                                    ->join('recruitments', 'recruitments_status.recruitments_id', '=', 'recruitments.id')
                                    ->join('personnels','recruitments_status.user_id', '=', 'personnels.user_id')
                                    ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')
                                    ->where('recruitments.user_id', $request->user()->id)
                                    ->where('recruitments_status.status', 8)
                                    ->get();
        $Recruitment_h = Recruitments_status::select('recruitments_status.id as rs_id','personnels.surname','personnels.country',
                                    'exp_job.name as job_name','personnels.family_name','personnels.school','personnels.sex','personnels.school_country','personnels.language_lv','personnels.birthday','recruitments_status.user_id')
                                    ->join('recruitments', 'recruitments_status.recruitments_id', '=', 'recruitments.id')
                                    ->join('personnels','recruitments_status.user_id', '=', 'personnels.user_id')
                                    ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')
                                    ->where('recruitments.user_id', $request->user()->id)
                                    ->where('recruitments_status.status', 9)
                                    ->get();
        $Recruitment_i = Recruitments_status::select('recruitments_status.id as rs_id','personnels.surname','personnels.country',
                                    'exp_job.name as job_name','personnels.family_name','personnels.school','personnels.sex','personnels.school_country','personnels.language_lv','personnels.birthday','recruitments_status.user_id')
                                    ->join('recruitments', 'recruitments_status.recruitments_id', '=', 'recruitments.id')
                                    ->join('personnels','recruitments_status.user_id', '=', 'personnels.user_id')
                                    ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')
                                    ->where('recruitments.user_id', $request->user()->id)
                                    ->where('recruitments_status.status', 10)
                                    ->get();
        $history = Pl_history::select('personnels.surname','personnels.country',
                                    'personnels.family_name','personnels.school','personnels.sex','personnels.school_country','personnels.language_lv','pl_history.updated_at','pl_history.user_id')
                               ->join('personnels','pl_history.user_id', '=', 'personnels.user_id')
                               ->where('pl_history.bs_user_id', $request->user()->id)
                               ->orderBy('pl_history.updated_at','desc')
                               ->groupBy('pl_history.user_id')
                               ->get();
        return view('/bs_sidebar/news',[
                'history' => $history,
                'notice_count' => $notice_count,
                'Recruitment_img' => $Recruitment_img,
                'Recruitment' => $Recruitment,
                'Recruitment_like' => $Recruitment_like,
                'Recruitment_a' => $Recruitment_a,
                'Recruitment_b' => $Recruitment_b,
                'Recruitment_c' => $Recruitment_c,
                'Recruitment_d' => $Recruitment_d,
                'Recruitment_f' => $Recruitment_f,
                'Recruitment_h' => $Recruitment_h,
                'Recruitment_i' => $Recruitment_i,
            ]);
    }
    public function bs_e(Request $request)
    {
        $notice_count = Mail_box::where('mail_box.get_user_id', $request->user()->id)->count();
        $Recruitment_e = Recruitments_status::select('recruitments_status.id as rs_id','personnels.surname','personnels.country',
                                    'exp_job.name as job_name','personnels.family_name','personnels.school','personnels.language_lv')
                                    ->join('recruitments', 'recruitments_status.recruitments_id', '=', 'recruitments.id')
                                    ->join('personnels','recruitments_status.user_id', '=', 'personnels.user_id')
                                    ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')
                                    ->where('recruitments.user_id', $request->user()->id)
                                    ->where('recruitments_status.status', 7)
                                    ->get();
        return view('/bs_sidebar/bs_e',[
                'Recruitment_e' => $Recruitment_e,
                'notice_count' => $notice_count
            ]);
    }

    public function interview(Request $request)
    {
        $a = Interview_time::where('bsinformations_id',$request->user()->id)->get();
        $notice_count = Mail_box::where('mail_box.get_user_id', $request->user()->id)->count();
        return view('bs_sidebar.interview_time', [
            'a' => $a,
            'notice_count' => $notice_count
        ]);
    }
    public function interview_submit(Request $request)
    {

        // $data = $request->bruce;
        // foreach ($data as $value) {
        //    return $value['time'];
        // }
        // return $data;
        // $unames = json_encode($data);
        // $uname = json_decode($unames);
        // return $uname['data'];
        // foreach ($uname['bruce']['time'] as $key => $value) {
        //    return $value;
        // }
        // return false;
        //create
        foreach ($request->time as $key => $value) {
            if (Interview_time::where('time',$value)->first() == true) {

            }else{
                $a = Interview_time::create([
                'time' => $value,
                'bsinformations_id' => $request->user()->id
                ]);
                 // foreach ($request->time_status as $key => $dsa) {

                 //         Interview_time::where('id',$a->id)->update(['time_status' => $dsa]);
                 // }
            }
        }

        //delect
        foreach ($request->delect_time as $key => $value) {
            if (Interview_time::where('time',$value)->first() == true) {
                 Interview_time::where('time',$value)->where('bsinformations_id',$request->user()->id)->delete();
            }
        }
        return response()->json('ok');
    }
}
