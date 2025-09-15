<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task as ModelsTask;
use Illuminate\Console\View\Components\Task as ComponentsTask;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::latest()->with('user')->get();
        return Inertia::render('Task/Index',[
            'tasks' => $tasks,
        ]);
    }

    public function create(){
        $user = User::get();
        // dd($user);
        return Inertia::render('Task/Create',[
            'users' =>$user
        ]);
    }

    public function store(){
        request()->validate([
            'title'       => 'required',
            'description' => 'required',
            'assigned_to' => 'required',
            'status'      => 'required',
        ]);

        Task::create([
            'title'       => request('title'),
            'description' => request('description'),
            'user_id'     => request('assigned_to'),
            'due_date'    => request('due_date'),
            'priority'    => request('priority'),
            'status'      => request('status'),
        ]);

        return redirect()->route('task.index')->with('success','Task Created Successfully');
    }
}
