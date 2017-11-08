<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;

class ManageController extends Controller
{
    public function index()
    {
        return redirect()->route("manage.dashboard");
    }

    public function dashboard()
    {
        return view('manage.dashboard')->withClass("dashboard");
    }

    public function permission_role()
    {
        $roles = Role::all();
        $permissions = Permission::paginate(10);
        return view('manage.permission_role.index')
            ->withRoles($roles)
            ->withPermissions($permissions)
            ->withClass('permissions');
    }
}
