<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    public function index(){
        // $roles =auth()->user()->getRoleNames();
        return Inertia::render('RolePermission/Index',[
            'title' => 'Role & Permission',
            'description' => 'Manage roles and permissions for users in the system.',
            'breadcrumbs' => [
                ['name' => 'Dashboard', 'href' => '/dashboard'],
                ['name' => 'Role & Permission', 'href' => '/role-permission'],
            ],
        
        ]);
    }

    public function create(){
        return Inertia::render('RolePermission/Create', [
            'title' => 'Create Role',
            'description' => 'Create a new role and assign permissions.',
            'breadcrumbs' => [
                ['name' => 'Dashboard', 'href' => '/dashboard'],
                ['name' => 'Role & Permission', 'href' => '/role-permission'],
                ['name' => 'Create Role', 'href' => '/role-permission/create'],
            ],
        ]);
    }


    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $role = Role::create(['name' => $request->title]);

        return redirect()->route('role-permission.index')->with('success', 'Role created successfully!');
    }
}
