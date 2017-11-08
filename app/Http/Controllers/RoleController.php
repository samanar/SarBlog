<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\Role;
use App\Permission;

class RoleController extends Controller
{

    private function rules($id = null)
    {
        if ($id != null) {
            return [
                'display_name' => 'required|max:255',
                'description' => 'sometimes|max:255'
            ];
        } else {
            return [
                'name' => 'required|max:255|alphadash|unique:roles,name',
                'display_name' => 'required|max:255',
                'description' => 'sometimes|max:255'
            ];
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::with("permissions")->get();
        return view('manage.roles.index')
            ->withClass('roles')
            ->withRoles($roles);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('manage.roles.create')
            ->withPermissions($permissions)
            ->withClass('roles');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules());
        $role = new Role();
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();

        if ($role->permissions()->sync($request->permissions)) {
            return redirect()->route('roles.show', $role->id);
        } else {
            Session::flash("error", "couldn't sync the permissions");
            return redirect()->route('roles.show', $role->id);
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
        $role = Role::with("permissions")->where("id", $id)->first();
        return view('manage.roles.show')
            ->withClass("roles")
            ->withRole($role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::with("permissions")->where("id", $id)->first();
        $permissions = Permission::all();
        return view('manage.roles.edit')
            ->withRole($role)
            ->withPermissions($permissions)
            ->withClass('roles');
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
        $this->validate($request, $this->rules($id));
        $role = Role::findOrFail($id);

        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();

        if ($role->permissions()->sync($request->permissions)) {
            return redirect()->route('roles.show', $role->id);
        } else {
            Session::flash("error", "couldn't sync the permissions");
            return redirect()->route('roles.edit', $role->id);
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
        //
    }
}
