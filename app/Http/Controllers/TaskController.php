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

       
        //Here we start building the table heads
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),

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
