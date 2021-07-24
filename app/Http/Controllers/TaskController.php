<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::with('user')->get();

        return view("tasks.index", compact(["tasks"]));
    }

    public function create()
    {
        $users = User::select(["id", "name"])->get();

        return view("tasks.create", compact(["users"]));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            "description" => "required|string|min:3|max:128",
            "due_date" => "required|date|after:today",
            "user_id" => "required|numeric"
        ]);

        $data = $request->all();
        $data["created_by"] = Auth::id();

        $task = new Task();
        $task->fill($data);

        if ($task->save()) {
            return redirect(route("task.index", ["id" => $task->id]))->with('status', 'Task created successfully');;
        }
    }

    public function show(Task $task)
    {
        $users = User::select(["id", "name"])->get();
        $logs = Log::where('task_id', $task->id)->get();
        return view("tasks.show", compact("task", "users", "logs"));
    }

    public function edit(Task $task)
    {
        return view("tasks.create", compact("task"));
    }

    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
            "description" => "required|string|min:3|max:128",
            "due_date" => "required|date|after:today",
            "user_id" => "required|numeric"
        ]);

        $task->fill($request->all());

        if ($task->save()) {
            return redirect(route("tasks.show", ["id" => $task->id]))
                ->with(["msg" => "Succesfully updated"]);
        }
    }

    public function destroy(Task $task)
    {
        if ($task->delete()) {
            return redirect(route("tasks.index"))->with(["msg" => "Succesfully updated"]);
        }
    }
}
