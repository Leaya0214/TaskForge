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
        $tasks = Task::latest()->get();
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
}
