<?php

namespace App\Http\Controllers\MailBox;

use Illuminate\Http\Request;
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
use App\PersonnelBranch\skill_category;
use App\PersonnelBranch\skill_name;
use App\PersonnelBranch\skill_title;
use App\Recruitment;
use App\Recruitments_status;
use App\PluralAdd\Employ;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BusinessController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth.bs');
        $this->middleware('role.business');
    }

    public function assess(Request $request)
    {
        Recruitments_status::where('recruitments_status.id', $request->rs_id)
                            ->update(['status' => $request->rs_status]);
        
        
        return redirect('news_b2');
    }
   
    public function h(Request $request)
    {
        Recruitments_status::where('recruitments_status.id', $request->rs_id)
                            ->update(['status' => 9]);
        return redirect('news_b2');
    }
    public function i(Request $request)
    {
        Recruitments_status::where('recruitments_status.id', $request->rs_id)
                            ->update(['status' => 10]);
        return redirect('news_b2');
    }
    // maill box
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
        $notice = $nt->select('notice.id as n_id','notice_title','notice_content','create_time')->join('bsinformations', 'notice.get_user_id', '=', 'bsinformations.user_id')
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
        $notice  = Notice::where('notice.id', $id)->join('bsinformations', 'notice.get_user_id', '=', 'bsinformations.user_id')->first();

        return view('bs_sidebar.notice', [
            'notice' => $notice

        ]);
    }
    // notice
    public function notice_view(Request $request , $id)
    {
        $notice = Notice::where('notice.id', $id)->join('bsinformations', 'notice.get_user_id', '=', 'bsinformations.user_id')->first();

        return view('bs_sidebar.notice', [
            'notice' => $notice

        ]);
    }
    public function notice_delete(Request $request)
    {
        //delect
        foreach ($request->delete as $key => $value) {
            if (Notice::where('notice.id',$value)->first() == true) {
                 Notice::where('notice.id',$value)->delete();
                 return response()->json('ok');
            }
        }
    }

}
