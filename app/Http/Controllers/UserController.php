<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    private function rules($id = null)
    {
        if ($id != null) {
            return [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users,email,' . $id,
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
        return view("manage.users.create")->withClass("users");
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
        if ($user->save()) {
            return redirect()->route("users.show", $user->id);
        } else {
            Session::flash("error", "error occured while adding new user ");
            return redirect()->route("users.index");
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
        $user = User::find($id);
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
        $user = User::find($id);
        return view("manage.users.edit")
            ->withUser($user)
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
        if ($user->save()) {
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
