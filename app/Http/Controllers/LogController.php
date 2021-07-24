<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        return Log::all();
    }

    public function create(Request $request)
    {
        $task_id = $request->task;
        return view("logs.create", compact(['task_id']));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            "comment" => "required|string|min:3|max:512",
            "task_id" => "required",
        ]);

        $task_id = $request->task_id;
        try {
            Log::create($request->only(["comment", "task_id"]));
            return redirect(route("task.show", ["task" => $task_id]))->with('status', 'Task created successfully');;
        } catch (\Exception $e) {
            return redirect(route("task.show", ["id" => $task_id]))->with('status', $e);;
        }
    }

    public function show(Log $log)
    {
        return $log;
    }

    public function edit(Log $log)
    {
        return $log;
    }

    public function update(Request $request, Log $log)
    {
        $this->validate($request, ["comment" => "required|string|min:3|max:256"]);
        $log->fill($request->all());
        return $log;
    }

    public function destroy(Log $log)
    {
        return $log->delete();
    }
}
