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
use App\ModelBranch\Mail_box;
use App\ModelBranch\Notice;
use App\ModelBranch\Exp_job_category;
use App\PersonnelBranch\skill_category;
use App\PersonnelBranch\skill_name;
use App\PersonnelBranch\skill_title;
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
                    'personnels_id' => $a->id,
                    'languagelvs.user_id' => $request->user()->id,
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
        $languagelv = $personnel::where('personnels.user_id', $request->user()->id)
                      ->join('languagelvs', 'personnels.id', '=', 'languagelvs.personnels_id')
                      ->get();
        // 職務經歷
        $exp_job = Experiences_job::where('experiences_job.user_id', $request->user()->id)
                   ->join('exp_job', 'experiences_job.experience', '=', 'exp_job.id')
                   ->get();
        // pl_image
        $pl_image = Pl_image::where('user_id', $request->user()->id)->get();
    	return view('pl_sidebar/profile',[
    		'personnels' => $personnels,
            'per_skill' => $per_skill,
            'languagelv' => $languagelv,
            'exp_job' => $exp_job,
            'pl_image' => $pl_image,

    	]);
    }
    public function news(Request $request)
    {
        // 圖片
        $bs_image = Bs_image::all();

        // 応募default
        $Recruitment = Recruitment::select('recruitments.id as r_id','exp_job.name',
            'bsinformations.company_name','recruitments.user_id','bsinformations.user_id as b_user_id',
            'content','need_skill','annual_income','monthly_income','work_site')
                        ->whereNotIn('recruitments.id', function($q){
                        $q->select('recruitments_id')
                        ->from('recruitments_status');
                      })->orWhere('recruitments.user_id', $request->user()->id)
                        ->join('bsinformations', 'recruitments.user_id', '=', 'bsinformations.user_id')
                        ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')
                        ->get();
                   //orWhere作法不好，只有或，沒有和的條件，所以user id一旦錯了就全錯了
        // 応募した
        $Recruitment_ofa = Recruitments_status::select('recruitments.id as r_id','exp_job.name','recruitments.user_id',
            'content','need_skill','annual_income','monthly_income','work_site','bsinformations.company_name')
                            ->where('recruitments_status.user_id', $request->user()->id)
                            ->where('recruitments_status.status',1)
                            ->join('recruitments', 'recruitments_status.recruitments_id', '=', 'recruitments.id')
                            ->join('bsinformations', 'recruitments.user_id', '=', 'bsinformations.user_id')
                            ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')
                            ->get();

        // お気に入り
        $Recruitment_like = Recruitments_status::where('recruitments_status.user_id', $request->user()->id)
                            ->where('recruitments_status.status',2)
                            ->join('recruitments', 'recruitments_status.recruitments_id', '=', 'recruitments.id')
                            ->get();
        return view('pl_sidebar/news',[
          'bs_image' => $bs_image,
          'Recruitment' => $Recruitment,
          'Recruitment_ofa' => $Recruitment_ofa,
          'Recruitment_like' => $Recruitment_like,
        ]);
    }
    public function ttt(Request $request)
    {
        $Personnel = Personnel::where('user_id',$request->user()->id)->first();
        $Recruitments_status = Recruitments_status::create([
                    'status' => 1,
                    'recruitments_id' => $request->id,
                    'user_id' => $request->user()->id,
        ]);
        $notice = Notice::create([
                    'notice_title' => $Personnel->family_name.$Personnel->surname.'さんが新着応募',
                    'notice_content' => $request->content,
                    'status' => 0,
                    'get_user_id' => $request->b_id,
                    'post_user_id' => $request->user()->id,
        ]);
        return redirect('/news');
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
    public function search(Request $request)
    {
        // $Recruitment = Recruitment::whereNotIn('recruitments.id', function($q){
        //                 $q->select('recruitments_id')
        //                 ->from('recruitments_status');
        //               })->orWhere('user_id', $request->user()->id)
        //                 ->paginate(3);
        if ($request->job == true){
           $query = Recruitment::whereNotIn('recruitments.id', function($q){
                        $q->select('recruitments_id')
                        ->from('recruitments_status');
                      })->orWhere('user_id', $request->user()->id)
                         ->where('name', 'like', '%'.$request->job.'%')
                         ->join('exp_job', 'recruitments.job_id', '=', 'exp_job.id')->paginate(5);
           return response()->json($query);
        }
        return response()->json('not data');
    }
    public function show(Request $request , $id)
    {
        $res  = Recruitment::where('recruitments.id', $id)
        ->join('bsinformations', 'recruitments.bsinformations_id', '=', 'bsinformations.id')
        ->get();
        $r_id = Recruitment::select('recruitments.id as r_id')
                ->where('recruitments.id', $id)
                ->first();
        foreach ($res as $value) {
            $a = $value->user_id;
        }
        $bs_image = Bs_image::where('bs_image.user_id',$a)->first();
        if (is_null($res)) {
            return redirect()->back()->with('message', '找不到該文章');
        }

        return view('pl_sidebar.show', [
            'bs_image' => $bs_image,
            'res' => $res,
            'r_id' =>$r_id,
        ]);
    }
    public function image_small(Request $request){

        if($request->image_small){
        $where = Pl_image::where('user_id',$request->user()->id)->first();
        $img = $request->image_small;
        $img = str_replace('data:image/png;base64,', '', $img);
           if (is_null($where)) {
                Pl_image::create([
                   'image_small' => $img,
                   'user_id' => $request->user()->id,
                ]);
                return response()->json('new ok');
            }
        Pl_image::where('user_id',$request->user()->id)->update(['image_small' => $img]);
        return response()->json('update ok');
       }

    }
    public function mail_box(Request $request)
    {
        // mail_box
        $mail_box  = Mail_box::select('mail_box.id as mail_id','mail_title','bsinformations.company_name')
                 ->where('mail_box.get_user_id', $request->user()->id)
                 ->join('bsinformations', 'mail_box.get_user_id', '=', 'bsinformations.user_id')
        ->paginate(5);
        $mail_count = Mail_box::where('mail_box.post_user_id', $request->user()->id)->count();
        // notice
        $nt = Notice::where('notice.get_user_id', $request->user()->id);
        $notice = $nt->join('bsinformations', 'notice.get_user_id', '=', 'bsinformations.user_id')
        ->paginate(5);
        $notice_count = $nt->count();

        return view('pl_sidebar.mail_box', [
            'mail_box' => $mail_box,
            'mail_count' => $mail_count,
            'notice' => $notice,
            'notice_count' => $notice_count,
        ]);
    }
    public function mail_view(Request $request , $id)
    {

        $mail_view  = Mail_box::where('mail_box.id', $id)->join('bsinformations', 'mail_box.get_user_id', '=', 'bsinformations.user_id')->first();


        return view('pl_sidebar.mail_view', [
            'mail_view' => $mail_view

        ]);
    }


}
