<?php

namespace App\Http\Controllers;
use Gate;
use Auth;
use App\User;
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
        $this->middleware('auth');
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
}
