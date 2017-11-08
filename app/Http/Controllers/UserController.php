<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Session;
use App\User;
use App\Role;

class UserController extends Controller
{

    private function rules($id = null)
    {
        if ($id != null) {
            return [
                'name' => 'required|max:255',
                'email' => 'required|email|',
                'email' => Rule::unique('users')->ignore($id)
            ];
        } else {
            return [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required'
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
        $users = User::orderBy("id", "desc")->paginate(10);
        return view('manage.users.index')
            ->withClass("users")
            ->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function create()
    {
        $roles = Role::all();
        return view("manage.users.create")
            ->withRoles($roles)
            ->withClass("users");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public
    function store(Request $request)
    {
        $this->validate($request, $this->rules());


        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        if ($user->roles()->sync($request->roles)) {
            return redirect()->route("users.show", $user->id);
        } else {
            Session::flash("error", "error occured when editing user info");
            return redirect()->route("users.edit", $user->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        $user = User::with("roles")->where('id', $id)->first();
        return view("manage.users.show")
            ->withUser($user)
            ->withClass("users");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        $user = User::with("roles")->where('id', $id)->first();
        $roles = Role::all();
        return view("manage.users.edit")
            ->withUser($user)
            ->withRoles($roles)
            ->withClass("users");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {
        $this->validate($request, $this->rules($id));
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if (isset($request->password) && !empty($request->password)) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        if ($user->roles()->sync($request->roles)) {
            return redirect()->route("users.show", $id);
        } else {
            Session::flash("error", "error occured when editing user info");
            return redirect()->route("users.edit", $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }
}

