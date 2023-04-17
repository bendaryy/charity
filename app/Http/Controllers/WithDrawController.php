<?php

namespace App\Http\Controllers;

use App\Models\Details;
use App\Models\Exchange;
use App\Models\WithDraw;
use Illuminate\Http\Request;

class WithDrawController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:user', 'permission:charity_create'])->only(['create', 'store']);
    }
    public function index(Request $request)
    {
        $withDraws = WithDraw::orderBy('id', 'desc')->paginate(20);

        return view('withdraw.index', compact('withDraws'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exchanges = Exchange::all();
        $details = Details::all();
        return view('withdraw.create', compact('exchanges', 'details'));
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
        return redirect()->route('withdraw.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WithDraw  $withDraw
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $withDraw = WithDraw::where('details_id', $id)->latest()->first();
        return $withDraw;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WithDraw  $withDraw
     * @return \Illuminate\Http\Response
     */
    public function edit(WithDraw $withDraw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WithDraw  $withDraw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WithDraw $withDraw)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WithDraw  $withDraw
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $withDraw = WithDraw::find($id);
        $withDraw->delete();
        return redirect()->route('withdraw.index');

    }
    public function search(Request $request)
    {
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');
        $q = $request->text;

        // $withDraws = WithDraw::when($request->search3, function ($query) use ($request) {
        //     return $query->where('details_id', 'like', '%' . $request->search3 . "%");
        // })->where('date', '>=', $fromDate)
        //     ->where('date', '<=', $toDate)
        //     ->get();

        // $withDraws = WithDraw::where('type','LIKE',"%".$q."%")->whereHas("userDetails.NationalId",function(Builder $query))

        $withDraws = WithDraw::whereHas('userDetails', function ($query) use ($q) {
            $query->where('NationalId', "LIKE", "%" . $q . "%")->orWhere('HusbundOrWifeId', 'like', '%' . $q . "%")
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
        })->with(['userDetails' => function ($query) use ($q) {
            $query->where('NationalId', 'like', '%' . $q . '%')->orWhere('name', 'like', '%' . $q . "%")
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
        }])->where('date', '>=', $fromDate)->where('date', '<=', $toDate)->paginate(20);
        $withDraws->appends(["fromDate" => $fromDate, "toDate" => $toDate, "text" => $q]);

        return view('withdraw.index', compact('withDraws'));
    }
}
