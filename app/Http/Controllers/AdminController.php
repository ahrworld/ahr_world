<?php

namespace App\Http\Controllers;
use Gate;
use Auth;
use App\User;
use App\Contact;
use App\Language;
use App\Personnel;
use App\Abroad_exp;
use App\BSinformations;
use App\ModelBranch\Employment;
use App\ModelBranch\Experience;
use App\ModelBranch\Languagelv;
use App\ModelBranch\Bs_image;
use App\ModelBranch\Bs_summary;
use App\ModelBranch\Bs_summary_image;
use App\ModelBranch\Bs_blog;
use App\ModelBranch\Pl_blog;
use App\ModelBranch\Mail_box;
use App\ModelBranch\Notice;
use App\ModelBranch\Exp_job;
use App\ModelBranch\Exp_job_category;
use App\ModelBranch\Subject;
use App\ModelBranch\Interview_time;
use App\ModelBranch\Bs_history;
use App\ModelBranch\Pl_history;
use App\ModelBranch\Pl_portfolio;
use App\PersonnelBranch\Experiences_job;
use App\PersonnelBranch\Pl_image;
use App\PersonnelBranch\Personnels_skill;
use App\PersonnelBranch\Analysis_answer;
use App\PersonnelBranch\skill_category;
use App\PersonnelBranch\skill_name;
use App\PersonnelBranch\skill_title;
use App\Recruitment;
use App\Recruitments_status;
use App\PluralAdd\Employ;
use App\Http\Requests;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
        $this->middleware('role.admin');
    }
    public function index()
    {
    	return view('backend/index');
    }
    public function signin()
    {
    	return view('backend/signin');
    }
    public function exp_job_category()
    {
        $exp_job_category = Exp_job_category::all();
        return response()->json($exp_job_category);
    }
    public function exp_job()
    {
        $exp_job = Exp_job_category::join('exp_job','exp_job.exp_job_category_id','=','exp_job_category.id')->get();
        return response()->json($exp_job);
    }
    public function subject()
    {
        $subject = Subject::all();
        return response()->json($subject);
    }

    public function personnels()
    {
        $personnels = User::join('personnels','personnels.user_id','=','users.id')->get();
        return response()->json($personnels);
    }
    public function business()
    {
        $business = User::join('bsinformations','bsinformations.user_id','=','users.id')->get();
        return response()->json($business);
    }
    public function contact()
    {
        $contact = Contact::all();
        return response()->json($contact);
    }
    public function contact_delete(Request $request)
    {
        return $request->all();
        return response()->json('ok');
        $contact = Contact::all();
        return response()->json($contact);
    }
    public function personnels_block(Request $request)
    {
        $per = Personnel::where('id',$request->id)->first();
        Personnel::where('id',$request->id)->update([
                    'status' =>  2,
                ]);
        User::where('id',$per->user_id)->update([
                    'data_status' =>  2,
                ]);
        return response()->json('ok');
    }
    public function personnels_unblock(Request $request)
    {
        $per = Personnel::where('id',$request->id)->first();
        Personnel::where('id',$request->id)->update([
                    'status' =>  1,
                ]);
        User::where('id',$per->user_id)->update([
                    'data_status' =>  1,
                ]);
        return response()->json('ok');
    }
    public function personnels_delete(Request $request)
    {
        $per = Personnel::where('id',$request->id)->first();
        Personnel::where('id',$request->id)->delete();
        User::where('id',$per->user_id)->delete();
        return response()->json('ok');
    }
    public function business_block(Request $request)
    {
        $per = BSinformations::where('id',$request->id)->first();
        BSinformations::where('id',$request->id)->update([
                    'status' =>  2,
                ]);
        User::where('id',$per->user_id)->update([
                    'data_status' =>  2,
                ]);
        return response()->json('ok');
    }
    public function business_unblock(Request $request)
    {
        $per = BSinformations::where('id',$request->id)->first();
        BSinformations::where('id',$request->id)->update([
                    'status' =>  1,
                ]);
        User::where('id',$per->user_id)->update([
                    'data_status' =>  1,
                ]);
        return response()->json('ok');
    }
    public function business_delete(Request $request)
    {
        $per = BSinformations::where('id',$request->id)->first();
        BSinformations::where('id',$request->id)->delete();
        User::where('id',$per->user_id)->delete();
        return response()->json('ok');
    }
    public function exp_job_delete(Request $request)
    {
        Exp_job::where('id',$request->id)->delete();
        return response()->json('ok');
    }
    public function exp_category_delete(Request $request)
    {
        Exp_job_category::where('id',$request->id)->delete();
        return response()->json('ok');
    }
    public function subject_delete(Request $request)
    {
        Subject::where('id',$request->id)->delete();
        return response()->json('ok');
    }
}
