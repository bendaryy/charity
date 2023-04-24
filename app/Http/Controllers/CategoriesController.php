<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Details;
use App\Models\Exchange;
use App\Models\WithDraw;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('categories.index', compact('categories'));
    }
    public function store(Request $request)
    {
        $category = new Categories();
        $category->name = $request->name;
        $category->charity_id = auth()->user()->charity_id;
        $category->save();
        return redirect()->route('categories.index')->with('success', 'تم إضافة الفئة بنجاح');
    }

    public function showCategory($id, Request $request)
    {
        $q = $request->input('search');

        $query = Details::where(function ($query) use ($q) {
            $query->where('NationalId', 'like', '%' . $q . "%")
                ->orWhere('HusbundOrWifeId', 'like', '%' . $q . "%")
                ->orWhere('name', 'like', '%' . $q . "%")
                ->orWhere('HusbundOrWifeName', 'like', '%' . $q . "%")
                ->orWhere('firstPersonName', 'like', '%' . $q . "%")
                ->orWhere('secondPersonName', 'like', '%' . $q . "%")
                ->orWhere('thirdPersonName', 'like', '%' . $q . "%")
                ->orWhere('fourthPersonName', 'like', '%' . $q . "%")
                ->orWhere('fifthPersonName', 'like', '%' . $q . "%")
                ->orWhere('sixPersonName', 'like', '%' . $q . "%")
                ->orWhere('sevenPersonName', 'like', '%' . $q . "%")
                ->orWhere('eightPersonName', 'like', '%' . $q . "%")
                ->orWhere('ninePersonName', 'like', '%' . $q . "%")
                ->orWhere('tenPersonName', 'like', '%' . $q . "%")
                ->orWhere('firstPersonId', 'like', '%' . $q . "%")
                ->orWhere('secondPersonId', 'like', '%' . $q . "%")
                ->orWhere('thirdPersonId', 'like', '%' . $q . "%")
                ->orWhere('fourthPersonId', 'like', '%' . $q . "%")
                ->orWhere('fifthPersonId', 'like', '%' . $q . "%")
                ->orWhere('sixPersonId', 'like', '%' . $q . "%")
                ->orWhere('sevenPersonId', 'like', '%' . $q . "%")
                ->orWhere('eightPersonId', 'like', '%' . $q . "%")
                ->orWhere('ninePersonId', 'like', '%' . $q . "%")
                ->orWhere('tenPersonId', 'like', '%' . $q . "%");
        })->where('category_id', $id)->where('charity_id', auth()->user()->charity_id);
        $results = $query->paginate(50);
        $results->appends(['search' => $q]);
        $categoryName = Categories::find($id);
        return view('categories.showCategory', ['results' => $results, "categoryName" => $categoryName]);
    }
    public function create($id)
    {
        $exchanges = Exchange::all();
        $details = Details::find($id);
        $withDraw = WithDraw::where('details_id', $id)->latest()->first();
        return view('categories.createWithdraw', compact('exchanges', 'details', 'withDraw'));
    }

    public function storeWithdraw(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'value' => 'required',
            'details_id' => 'required',
            'date' => 'required',
        ]);
        $withDraw = new WithDraw;
        $withDraw->type = $request->type;
        $withDraw->value = $request->value;
        $withDraw->date = $request->date;
        $withDraw->details_id = $request->details_id;
        $withDraw->charity_id = auth()->user()->charity_id;
        $withDraw->details = $request->details;
        $withDraw->save();
        return redirect()->route('showCategory', $withDraw->userDetails->category_id)->with('success', 'تم الصرف بنجاح');
    }
}
