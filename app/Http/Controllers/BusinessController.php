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

    public function profile(Request $request){
        $BSinformation = new BSinformations;
        $tasks = $BSinformation::where('user_id', $request->user()->id)->get();
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
        $bs_blog = Bs_blog::where('user_id' ,$request->user()->id)->get();

        return view('bs_sidebar/profile', [
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
        ]);
    }
    // upload image
    public function image(Request $request){
        $bs_image = New Bs_image;
        $date = date('ymdhis');

        $where = $bs_image::where('user_id',$request->user()->id)->first();
        if (is_null($where)) {
            //small
            if($request->hasFile('image_small'))
            {
              $photoname_m = $date.'big'.$request->user()->id.'.'.'png';
              $photo_upload = $request->file('image_small')->move(public_path().'/ahr/busineses_img',$photoname_m);
              Bs_image::create([
                     'image_small' => $photoname_m,
                     'user_id' => $request->user()->id,
              ]);
            }
            //big
            else if($request->hasFile('image_big'))
            {
              $photoname_b = $date.'small'.$request->user()->id.'.'.'png';
              $photo_upload = $request->file('image_big')->move(public_path().'/ahr/busineses_img',$photoname_b);
              Bs_image::create([
                     'image_big' => $photoname_b,
                     'user_id' => $request->user()->id,
              ]);
            }
            return redirect('/profile_b2');
        }
        //small
        if($request->hasFile('image_small'))
        {
          $photoname_m = $date.$request->user()->id.'.'.'png';
          $photo_upload = $request->file('image_small')->move(public_path().'/ahr/busineses_img',$photoname_m);
          $bs_image::where('user_id',$request->user()->id)->update(['image_small' => $photoname_m]);
        }
        //big
        else if($request->hasFile('image_big'))
        {
          $photoname_b = $date.$request->user()->id.'.'.'png';
          $photo_upload = $request->file('image_big')->move(public_path().'/ahr/busineses_img',$photoname_b);
          $bs_image::where('user_id',$request->user()->id)->update(['image_big' => $photoname_b]);
        }
        return redirect('/profile_b2');



    }
    public function image_test(Request $request){

        $png_url = time().$request->user()->id.".png";
        $path = public_path()."/ahr/busineses_img/".$png_url;
        $img = $request->image_data;
        $img = substr($img, strpos($img, ",")+1);
        $data = base64_decode($img);
        $success = file_put_contents($path, $data);

        return response()->json(
           'ok'
        );
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
    public function mail_box(Request $request)
    {
        // mail_box
        $mail_box  = Mail_box::select('mail_box.id as mail_id','mail_title','bsinformations.company_name')
                 ->where('mail_box.get_user_id', $request->user()->id)
                 ->join('bsinformations', 'mail_box.get_user_id', '=', 'bsinformations.user_id')
        ->paginate(5);
        $mail_count = Mail_box::where('mail_box.get_user_id', $request->user()->id)->count();
        // notice
        $nt = Notice::where('notice.get_user_id', $request->user()->id);
        $notice = $nt->join('bsinformations', 'notice.get_user_id', '=', 'bsinformations.user_id')
        ->paginate(5);
        $notice_count = $nt->count();

        return view('bs_sidebar.mail_box', [
            'mail_box' => $mail_box,
            'mail_count' => $mail_count,
            'notice' => $notice,
            'notice_count' => $notice_count,
        ]);
    }
    public function mail_view(Request $request , $id)
    {

        $mail_view  = Mail_box::where('mail_box.id', $id)->join('bsinformations', 'mail_box.get_user_id', '=', 'bsinformations.user_id')->first();


        return view('bs_sidebar.mail_view', [
            'mail_view' => $mail_view

        ]);
    }

}
