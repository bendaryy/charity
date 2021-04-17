<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin'])->only('index');
        $this->middleware(['permission:users_create'])->only(['create', 'store']);
        $this->middleware(['permission:users_update'])->only('update');
        $this->middleware(['permission:users_delete'])->only('destroy');
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
        $user = User::with('charity')->find($id);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
