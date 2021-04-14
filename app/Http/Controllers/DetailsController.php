<?php

namespace App\Http\Controllers;

use App\Models\Details;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:charity_create'])->only(['create', 'store']);
        $this->middleware(['permission:charity_read'])->only(['index']);
        $this->middleware(['permission:charity_update'])->only(['update']);
        $this->middleware(['permission:charity_delete'])->only(['destroy']);
    }
    public function index(Request $request)
    {
        $details = Details::when($request->search, function ($query) use ($request) {
            return $query->where('NationalId', 'like', '%' . $request->search . "%")
                ->orWhere('HusbundOrWifeId', 'like', '%' . $request->search . "%")
                ->orWhere('firstPersonId', 'like', '%' . $request->search . "%")
                ->orWhere('secondPersonId', 'like', '%' . $request->search . "%")
                ->orWhere('thirdPersonId', 'like', '%' . $request->search . "%")
                ->orWhere('fourthPersonId', 'like', '%' . $request->search . "%")
                ->orWhere('fifthPersonId', 'like', '%' . $request->search . "%")
                ->orWhere('sixPersonId', 'like', '%' . $request->search . "%")
                ->orWhere('sevenPersonId', 'like', '%' . $request->search . "%")
                ->orWhere('eightPersonId', 'like', '%' . $request->search . "%")
                ->orWhere('ninePersonId', 'like', '%' . $request->search . "%")
                ->orWhere('tenPersonId', 'like', '%' . $request->search . "%");
        })->get();
        return view('users.details.index', compact('details'));
    }
    public function create()
    {
        return view('users.details.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'SearchDate' => 'required',
            'NationalId' => 'required|numeric',
            'phone' => 'required|numeric',
            'AddressId' => 'required',
            'currentAddress' => 'required',
            'ResidenceStatus' => 'required',
            'IncomeMethod' => 'required',
            'IncomeValue' => 'required|numeric',
            'SocialStatus' => 'required',
            'charity_id' => 'required'
        ]);
        $details = new Details;
        $details->name = $request->name;
        $details->SearchDate = $request->SearchDate;
        $details->NationalId = $request->NationalId;
        $details->charity_id = $request->charity_id;
        $details->phone = $request->phone;
        $details->AddressId = $request->AddressId;
        $details->currentAddress = $request->currentAddress;
        $details->ResidenceStatus = $request->ResidenceStatus;
        $details->valueRent = $request->valueRent;
        $details->IncomeMethod = $request->IncomeMethod;
        $details->IncomeValue = $request->IncomeValue;
        $details->SocialStatus = $request->SocialStatus;
        $details->HealthStatus = $request->HealthStatus;
        $details->MedicalCondition = $request->MedicalCondition;
        $details->IncomeValue = $request->IncomeValue;
        $details->HusbundOrWifeName = $request->HusbundOrWifeName;
        $details->HusbundOrWifeId = $request->HusbundOrWifeId;
        $details->HusbundOrWifePhone = $request->HusbundOrWifePhone;
        $details->HusbundOrWifeAddress = $request->HusbundOrWifeAddress;
        $details->HusbundOrWifeCurrentAddress = $request->HusbundOrWifeCurrentAddress;
        $details->HusbundOrWifeJob = $request->HusbundOrWifeJob;
        $details->firstPersonName = $request->firstPersonName;
        $details->firstPersonType = $request->firstPersonType;
        $details->firstPersonId = $request->firstPersonId;
        $details->HusbundOrWifeJob = $request->HusbundOrWifeJob;
        $details->firstPersonName = $request->firstPersonName;
        $details->firstPersonType = $request->firstPersonType;
        $details->firstPersonId = $request->firstPersonId;
        $details->HusbundOrWifeJob = $request->HusbundOrWifeJob;
        $details->firstPersonName = $request->firstPersonName;
        $details->firstPersonType = $request->firstPersonType;
        $details->firstPersonId = $request->firstPersonId;
        $details->HusbundOrWifeJob = $request->HusbundOrWifeJob;
        $details->firstPersonName = $request->firstPersonName;
        $details->firstPersonType = $request->firstPersonType;
        $details->firstPersonId = $request->firstPersonId;
        $details->secondPersonName = $request->secondPersonName;
        $details->secondPersonType = $request->secondPersonType;
        $details->secondPersonId = $request->secondPersonId;
        $details->thirdPersonName = $request->thirdPersonName;
        $details->thirdPersonType = $request->thirdPersonType;
        $details->thirdPersonId = $request->thirdPersonId;
        $details->fourthPersonName = $request->fourthPersonName;
        $details->fourthPersonType = $request->fourthPersonType;
        $details->fourthPersonId = $request->fourthPersonId;
        $details->fifthPersonName = $request->fifthPersonName;
        $details->fifthPersonType = $request->fifthPersonType;
        $details->fifthPersonId = $request->fifthPersonId;
        $details->sixPersonName = $request->sixPersonName;
        $details->sixPersonType = $request->sixPersonType;
        $details->sixPersonId = $request->sixPersonId;
        $details->sevenPersonName = $request->sevenPersonName;
        $details->sevenPersonType = $request->sevenPersonType;
        $details->sevenPersonId = $request->sevenPersonId;
        $details->eightPersonName = $request->eightPersonName;
        $details->eightPersonType = $request->eightPersonType;
        $details->eightPersonId = $request->eightPersonId;
        $details->ninePersonName = $request->ninePersonName;
        $details->ninePersonType = $request->ninePersonType;
        $details->ninePersonId = $request->ninePersonId;
        $details->tenPersonName = $request->tenPersonName;
        $details->tenPersonType = $request->tenPersonType;
        $details->tenPersonId = $request->tenPersonId;
        $details->save();
        return redirect()->route('details.index');
    }
    public function show($id)
    {
        $details = Details::find($id);
        return view('users.details.show', compact('details'));
    }
    public function exchange($id)
    {
        $details = Details::find($id);
        return view('users.exchange.index', compact('details'));
    }



}
