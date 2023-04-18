<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Details;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:charity_create', 'role:user'])->only(['create', 'store']);
        $this->middleware(['permission:charity_read'])->only(['index']);
        $this->middleware(['permission:charity_update', 'role:user'])->only(['update', 'edit']);
        $this->middleware(['permission:charity_delete'])->only(['destroy']);
    }
    public function index(Request $request)
    {
        $details = Details::orderBy('id', 'desc')->where("charity_id", auth()->user()->charity_id)->with('category')->paginate(50);

        $categories = Categories::where("charity_id", auth()->user()->charity_id)->get();
        $allDetails = Details::paginate(1);
        return view('users.details.index', compact('details', 'categories', 'allDetails'));
    }

    public function search(Request $request)
    {
        $q = $request->input('search');
        $categories = Categories::where("charity_id", auth()->user()->charity_id)->get();
        $details = Details::when($request->search, function ($query) use ($q) {
            return $query->where('NationalId', 'like', '%' . $q . "%")
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
        })->where("charity_id", auth()->user()->charity_id)->get();
        return view('users.details.index', compact('details', 'categories'));
    }
    public function search2(Request $request)
    {
        $allDetails = Details::when($request->search2, function ($query) use ($request) {
            return $query->where('NationalId', 'like', '%' . $request->search2 . "%")
                ->orWhere('HusbundOrWifeId', 'like', '%' . $request->search . "%")
                ->orWhere('name', 'like', '%' . $request->search . "%")
                ->orWhere('HusbundOrWifeName', 'like', '%' . $request->search . "%")
                ->orWhere('firstPersonName', 'like', '%' . $request->search . "%")
                ->orWhere('secondPersonName', 'like', '%' . $request->search . "%")
                ->orWhere('thirdPersonName', 'like', '%' . $request->search . "%")
                ->orWhere('fourthPersonName', 'like', '%' . $request->search . "%")
                ->orWhere('fifthPersonName', 'like', '%' . $request->search . "%")
                ->orWhere('sixPersonName', 'like', '%' . $request->search . "%")
                ->orWhere('sevenPersonName', 'like', '%' . $request->search . "%")
                ->orWhere('eightPersonName', 'like', '%' . $request->search . "%")
                ->orWhere('ninePersonName', 'like', '%' . $request->search . "%")
                ->orWhere('tenPersonName', 'like', '%' . $request->search . "%")
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

        return view('users.details.index', compact('allDetails'));
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
            'NationalId' => 'required',

        ]);
        $details = new Details;

        if ($request->hasFile('id_image')) {
            $file = $request->file('id_image');

            $url = $file->storeAs('images', $request->name . '-' . $request->NationalId . rand(1, 1000000) . '.' . $file->guessClientExtension());
            $details->id_image = $url;
            // dump(($url));
            // die();
        }

        $details->name = $request->name;
        $details->SearchDate = $request->SearchDate;
        $details->personsNumbers = $request->personsNumbers;
        $details->typestate = $request->typestate;
        $details->notee = $request->notee;
        $details->NationalId = $request->NationalId;
        $details->charity_id = auth()->user()->charity_id;
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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'SearchDate' => 'required',
            'NationalId' => 'required|numeric',

        ]);
        $details = Details::find($id);
        $details->name = $request->name;
        $details->SearchDate = $request->SearchDate;
        $details->personsNumbers = $request->personsNumbers;
        $details->typestate = $request->typestate;
        $details->notee = $request->notee;
        $details->NationalId = $request->NationalId;
        if ($request->hasFile('id_image')) {
            $file = $request->file('id_image');
            $url = $file->storeAs('images', $request->name . '-' . $request->NationalId . rand(1, 1000000) . '.' . $file->guessClientExtension());
            $details->id_image = $url;
            // dump(($url));
            // die();
        }
        $details->charity_id = auth()->user()->charity_id;
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
        return redirect()->route('details.index')->with('success', 'تم تعديل المستفيد بنجاح');
    }
    public function updateCategory(Request $request)
    {

        DB::table('details')
            ->whereIn('id', $request->users)
            ->update(['category_id' => $request->category_id]);
        return redirect()->back()->with('success', 'تم الإضافة الى الفئة بنجاح');

    }
    public function show($id)
    {
        $details = Details::findOrFail($id);
        return view('users.details.show', compact('details'));
    }

    public function edit($id)
    {
        $details = Details::findOrFail($id);
        return view('users.details.edit', compact("details"));
    }

    public function exchange($id)
    {
        $details = Details::find($id);
        return view('users.exchange.index', compact('details'));
    }
    public function destroy($id)
    {
        $details = Details::find($id);
        $details->delete();
        return redirect()->route('details.index')->with('delete', 'تم المسح بنجاح');
    }
}
