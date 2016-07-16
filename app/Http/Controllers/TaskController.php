<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;
use App\Repositories\TaskRepository;
class TaskController extends Controller
{
	protected $tasks;

    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }

    public function index(Request $request)
    {

       $monthNames = Array("January", "February", "March", "April", "May", "June", "July",
       "August", "September", "October", "November", "December");

       if (!isset($_REQUEST["month"])) $_REQUEST["month"] = date("n");
       if (!isset($_REQUEST["year"])) $_REQUEST["year"] = date("Y");

       $cMonth = $_REQUEST["month"];
       $cYear = $_REQUEST["year"];

       $prev_year = $cYear;
       $next_year = $cYear;
       $prev_month = $cMonth-1;
       $next_month = $cMonth+1;

       if ($prev_month == 0 ) {
           $prev_month = 12;
           $prev_year = $cYear - 1;
       }
       if ($next_month == 13 ) {
           $next_month = 1;
           $next_year = $cYear + 1;
       }


        $date =time () ;
        //This puts the day, month, and year in seperate variables
        $day = date('d', $date) ;
        $month = date('m', $date) ;
        $year = date('Y', $date) ;
        //Here we generate the first day of the month
        $first_day = mktime(0,0,0,$cMonth, 1, $cYear) ;
        //This gets us the month name
        $title = date('m', $first_day) ;
        //Here we find out what day of the week the first day of the month falls on
        $day_of_week = date('D', $first_day) ;
        //Once we know what day of the week it falls on, we know how many blank days occure before it. If the first day of the week is a Sunday then it would be zero
        switch($day_of_week){
        case "Mon": $blank = 0; break;
        case "Tue": $blank = 1; break;
        case "Wed": $blank = 2; break;
        case "Thu": $blank = 3; break;
        case "Fri": $blank = 4; break;
        case "Sat": $blank = 5; break;
        case "Sun": $blank = 6; break;
        }
        //We then determine how many days are in the current month
        $days_in_month = cal_days_in_month(0, $month, $year) ;
        //Here we start building the table heads
        $day_count = 1;
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
            'title' => $title,
            'year'  => $year,
            'month' => $month,
            'blank' => $blank,
            'cYear' => $cYear,
            'days_in_month' => $days_in_month,
            'prev_year' => $prev_year,
            'prev_month' => $prev_month,
            'next_year' => $next_year,
            'next_month' => $next_month,
            'day_count' => $day_count,

        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $request->user()->tasks()->create([
               'name' => $request->name,
        ]);

        // $request->user()->tasks()->create([
        //         'name' => $request->body,
        // ]);
        // $json = $request->body;
        return redirect('/tasks');
    }

    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);

        $task->delete();

        return redirect('/tasks');
    }
    public function testdate(Request $request)
    {

        for($i=0;$i<=5;++$i){
            $d=strtotime("$i day");
            $date = date("Y-m-d", $d);
            echo $date;
            echo '<br>';
        }


    }
}
