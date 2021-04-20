<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin'])->only('index');
        $this->middleware(['permission:users_create'])->only(['create', 'store']);
        $this->middleware(['permission:users_update', "role:admin"])->only(['edit', 'update']);
        $this->middleware(['permission:users_delete', "role:admin"])->only('destroy');
    }

    public function index(Request $request)
    {
        $users = User::whereRoleIs('user')->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Branches = Branch::all();
        return view('users.create', compact('Branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            "password" => 'required|confirmed',
            "charity_id" => 'required'
        ]);
        $request_data = $request->except(['password', 'password_confirmation', 'permissions']);
        $request_data['password'] = bcrypt($request->password);
        $user = User::create($request_data);
        $user->attachRole('user');
        $user->syncPermissions($request->permissions);
        return redirect()->route('users.index')->with('success', 'user added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::whereRoleIs('user')->findOrFail($id);

        return view('users.show', compact('user'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $Branches = Branch::all();
        $permission = Permission::all();
        return view('users.edit', compact('user', 'Branches', 'permission'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            "charity_id" => 'required'
        ]);
        $request_data = $request->except(['permissions']);
        $user->update($request_data);
        $request->permissions ? $user->syncPermissions($request->permissions) : false;
        return redirect()->route('users.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('danger', 'تم مسح المستخدم بنجاح');
    }
}
