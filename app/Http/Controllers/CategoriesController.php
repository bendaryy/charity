<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Categories::all();
        return view('categories.index',compact('categories'));
    }
    public function store(Request $request){
        $category = new Categories();
        $category->name = $request->name;
        $category->charity_id = auth()->user()->charity_id;
        $category->save();
        return redirect()->route('categories.index')->with('success', 'تم إضافة الفئة بنجاح');
    }
}
