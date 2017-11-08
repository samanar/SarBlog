<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use App\Role;
use Session;
use Illuminate\Validation\Rule;

class PermissionController extends Controller
{

    private function basic_rules($id = null)
    {
        if ($id != null)
            return [
                'display_name' => 'required|max:255',
                'name' => 'required|max:255|alphadash',
                'name' => Rule::unique('permissions', 'name')->ignore($id),
                'description' => 'sometimes|max:255'
            ];
        else
            return [
                'display_name' => 'required|max:255',
                'name' => 'required|max:255|alphadash|unique:permissions,name',
                'description' => 'sometimes|max:255'
            ];
    }

    private function crud_rules($id = null)
    {
        if ($id != null)
            return [
                'resource' => 'required|min:3|max:100|alpha'
            ];
        else
            return [
                'resource' => 'required|min:3|max:100|alpha'
            ];
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::paginate(10);
        return view("permission_role")
            ->withClass("permissions")
            ->withPermissions($permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("manage.permissions.create")
            ->withClass("permissions");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->permission_type == 'basic') {
            $this->validate($request, $this->basic_rules());
            $permission = new Permission();
            $permission->name = $request->name;
            $permission->display_name = $request->display_name;
            $permission->description = $request->description;
            $permission->save();


            Session::flash('success', 'Permission has been successfully added');
            return redirect()->route('permission_role');
        } else if ($request->permission_type == 'crud') {
            $this->validate($request, $this->crud_rules());
            $crud = $request->crud;
            if (count($crud) > 0) {
                foreach ($crud as $x) {
                    $slug = strtolower($x) . '-' . strtolower($request->resource);
                    $display_name = ucwords($x . " " . $request->resource);
                    $description = "Allows a user to " . strtoupper($x) . ' a ' . ucwords($request->resource);

                    $permission = new Permission();
                    $permission->name = $slug;
                    $permission->display_name = $display_name;
                    $permission->description = $description;
                    $permission->save();
                }
                Session::flash('success', 'Permissions were all successfully added');
                return redirect()->route('permission_role');
            }
        } else {
            return redirect()->route('permissions.create')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::findOrFail($id);
        return view("manage.permissions.show")
            ->withClass("permissions")
            ->withPermission($permission);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view("manage.permissions.edit")
            ->withClass("permissions")
            ->withPermission($permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->basic_rules($id));
        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;

        if ($permission->save()) {
            return redirect()->route('permissions.show', $id);
        } else {
            Session::flash('error', 'error while editing permission');
            return redirect()->route('permissions.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::delete($id);
    }
}
