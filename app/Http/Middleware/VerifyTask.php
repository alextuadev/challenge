<?php

namespace App\Http\Middleware;

use App\Models\Task;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyTask
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if ($request->route()->named('task.show')) {
            //$task = Task::find($request->task->id);
            
            if (Auth::id() !== $request->task->user_id) {
                return redirect()->route('task.index')->with('error', "You don't have access to this task");
            }
        }

        return $next($request);
    }
}
