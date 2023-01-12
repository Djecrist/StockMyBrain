<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\User;
use App\Models\Workspace;

class Tasks extends Controller
{

    public function createtask (Request $request, $workspaceid)
    {

        $request->validate([
            "name"=>"required",
            "description"=>"required",
            "importance"=>"required"
        ]);

        $user_id = Auth::id();
        $usern = Auth::user();
        $u = $usern->name;

        $taskname = $request->input("name");
        $taskdescr = $request->input("description");
        $taskimp = $request->input("importance");

        $task = new Task();

        $task->name = $taskname;
        $task->description = $taskdescr;
        $task->importance = $taskimp;
        $task->creator = $u;

        $task->save();

        $workspace = Workspace::find($user_id);
        $workspace->tasks()->attach($workspaceid, ['task_id' => $task->id, 'user_id' => $user_id]);

        return back();

    }

    public function delete ($id) {

        $task = Task::find($id);

        $task->delete();

        return back();
    }

    public function edit ($id) {

        $task = Task::find($id);

        return view("edit", compact("task"));
    }

    public function editid (Request $request, $id) {


        $task = Task::find($id);
        
        $task->name = $request->input("name");
        $task->description = $request->input("description");
        $task->importance = $request->input("importance");
        $task->save();

        return back();
    }
}
