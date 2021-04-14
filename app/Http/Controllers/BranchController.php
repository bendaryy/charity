<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('branch.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            "name"=>'required'
        ]);
        $branch = new Branch;
        $branch->name = $request->name;
        $branch->save();
        return redirect()->route('users.create');
    }


    public function show(Branch $branch)
    {
        //
    }


    public function edit(Branch $branch)
    {
        //
    }


    public function update(Request $request, Branch $branch)
    {
        //
    }


    public function destroy(Branch $branch)
    {
        //
    }
}
