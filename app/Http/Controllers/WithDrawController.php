<?php

namespace App\Http\Controllers;

use App\Models\Details;
use App\Models\Exchange;
use App\Models\WithDraw;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WithDrawController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:user', 'permission:charity_create'])->only(['create', 'store']);
    }
    public function index(Request $request)
    {
        $withDraws = WithDraw::when($request->search, function ($query) use ($request) {
            return $query->where('details_id', 'like', '%' . $request->search . "%");
        })->get();

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
            'date' => 'required'
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
    public function show(WithDraw $withDraw)
    {
        //
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
    public function destroy(WithDraw $withDraw)
    {
        //
    }
    public function search(Request $request)
    {
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');
        // $query = DB::table('with_draws')->select()
        //     ->where('date', '>=', $fromDate)
        //     ->where('date', '<=', $toDate)
        //     ->get();

        $withDraws = WithDraw::when($request->search3, function ($query) use ($request) {
            return $query->where('details_id', 'like', '%' . $request->search3 . "%");
        })->where('date', '>=', $fromDate)
            ->where('date', '<=', $toDate)
            ->get();
        return view('withdraw.index', compact('withDraws'));
    }
}
