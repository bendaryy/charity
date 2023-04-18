<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <x-app-layout>
        <x-slot name="header">
            <div class="container" style="text-align: center;margin: auto">
                <div class="row" style="text-align: center;margin: auto">


                    <form method="POST" action="{{ route('details.update',$details->id) }}" enctype="multipart/form-data" style="margin: auto">
                        @csrf
                        @method("PUT")
                        <div class="form-group col" style="margin: auto">
                            <label for="name">{{ __('الإسم') }}</label>
                            <input id="name" class="form-control" type="text" name="name" value="{{ $details->name }}"
                                required autofocus autocomplete="name" />
                        </div>
                        <div class="form-group col" style="margin: auto">
                            <label for="typestate">{{ __('حالة المستفيد') }}</label>
                            <input id="typestate" class="form-control" type="text" name="typestate"
                                value="{{ $details->typestate }}" autofocus autocomplete="typestate" />
                        </div>
                        <div class="form-group col" style="margin: auto">
                            <label for="notee">{{ __('ملاحظات') }}</label>
                            <textarea id="notee" class="form-control" type="text" name="notee" autofocus
                                autocomplete="notee" placeholder="{{ $details->notee }}"
                                value="{{ $details->notee }}"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="SearchDate">{{ __('تاريخ البحث') }}</label>
                            <input id="SearchDate" class="form-control" type="date" name="SearchDate"
                                value="{{ $details->SearchDate }}" required autofocus autocomplete="SearchDate" />
                        </div>

                        <div class="form-group">
                            <label for="NationalId">{{ __('الرقم القومى') }}</label>
                            <input id="NationalId" class="form-control" type="number" name="NationalId"
                                value="{{ $details->NationalId }}" required autofocus autocomplete="NationalId" />
                        </div>

                        <div class="form-group col" style="margin: auto">
                            @if($details->id_image != NULL)
                            <label for="id_image">{{ __('تغيير صورة البطاقة الشخصية') }}</label>
                            @else
                            <label for="id_image">{{ __('إضافة صورة بطاقة شخصية') }}</label>
                            @endif
                            <input id="id_image" class="form-control" type="file" name="id_image"
                                :value="old('id_image')" autofocus />
                        </div>

                        @if($details->id_image != NULL)
                        <a class="btn btn-success" href="{{ env('APP_URL').'/public/storage/'.$details->id_image }}"
                            target="_blank">عرض الصورة الحالية</a>
                        <br />
                        <br />
                        @endif

                        <div class="form-group">
                            <label for="personsNumbers">{{ __('عدد الأبناء') }}</label>
                            <input id="personsNumbers" class="form-control" type="number" name="personsNumbers"
                                value="{{ $details->personsNumbers }}" autofocus autocomplete="personsNumbers" />
                        </div>
                        <div class="form-group">
                            <label for="phone">{{ __(' التليفون ') }}</label>
                            <input id="phone" class="form-control" type="number" name="phone"
                                value="{{ $details->phone }}" autofocus autocomplete="phone" />
                        </div>

                        <div class="form-group">
                            <label for="AddressId">{{ __('العنوان بالبطاقة') }}</label>
                            <input id="AddressId" class="form-control" type="text" name="AddressId"
                                value="{{ $details->AddressId }}" autofocus autocomplete="AddressId" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('العنوان الحالى') }}</label>
                            <input id="currentAddress" class="form-control" type="text" name="currentAddress"
                                value="{{ $details->currentAddress }}" autofocus autocomplete="currentAddress" />
                        </div>
                        <div class="form-group">
                            <label for="currentAddress">{{ __('حالة الإقامة') }}</label><br>

                            <input type="radio" name="ResidenceStatus" value="شقة ملك" {{ $details->ResidenceStatus ==
                            "شقة ملك"?"checked":"" }}>
                            <label>شقة ملك</label><br>
                            <input type="radio" name="ResidenceStatus" value="شقة إيجار" {{
                                $details->ResidenceStatus=="شقة إيجار"?"checked":"" }}>
                            <label>شقة إيجار</label><br>
                        </div>
                        <div class="form-group">
                            <label>{{ __(' قيمة الإيجار اذا كان السكن إيجار') }}</label>
                            <input id="valueRent" class="form-control" type="number" name="valueRent"
                                value="{{ $details->valueRent }}" autofocus autocomplete="valueRent" />
                        </div class="form-group">
                        <div>
                            <label for="IncomeMethod">{{ __('طريقة الدخل') }}</label><br>
                            <input type="radio" name="IncomeMethod" value="عمل حر" {{ $details->IncomeMethod == "عمل
                            حر"?"checked":"" }}>
                            <label> عمل حر</label><br>
                            <input type="radio" name="IncomeMethod" value="نفقة" {{ $details->IncomeMethod ==
                            "نفقة"?"checked":"" }}>
                            <label> نفقة </label><br>
                        </div>
                        <div class="form-group">
                            <label>{{ __('قيمة الدخل') }}</label>
                            <input id="IncomeValue" class="form-control" type="number" name="IncomeValue"
                                value="{{ $details->IncomeValue }}" autofocus autocomplete="IncomeValue" />
                        </div>

                        <div class="form-group">
                            <label for="SocialStatus">{{ __('الحالة الإجتماعية') }}</label><br>
                            <input type="radio" name="SocialStatus" value="أعزب" {{ $details->SocialStatus ==
                            "أعزب"?'checked':'' }}>
                            <label>أعزب</label><br>
                            <input type="radio" name="SocialStatus" value="مطلق" {{ $details->SocialStatus ==
                            "مطلق"?'checked':'' }}>
                            <label>مطلق</label><br>
                            <input type="radio" name="SocialStatus" value="منفصل" {{ $details->SocialStatus ==
                            "منفصل"?'checked':'' }}>
                            <label>منفصل</label><br>
                            <input type="radio" name="SocialStatus" value="متزوج" {{ $details->SocialStatus ==
                            "متزوج"?'checked':'' }}>
                            <label>متزوج</label><br>
                            <input type="radio" name="SocialStatus" value="ارمل" {{ $details->SocialStatus ==
                            "ارمل"?'checked':'' }}>
                            <label>ارمل</label><br>
                        </div>
                        <div class="form-group">
                            <label for="HealthStatus">{{ __('الحالة الصحية') }}</label><br>
                            <input type="radio" name="HealthStatus" value="جيدة" {{ $details->HealthStatus ==
                            "جيدة"?'checked':'' }}>
                            <label>جيدة</label><br>
                            <input type="radio" name="HealthStatus" value="مرض مؤقت" {{ $details->HealthStatus == "مرض
                            مؤقت"?'checked':'' }}>
                            <label>مرض مؤقت</label><br>
                            <input type="radio" name="HealthStatus" value="مرض مزمن" {{ $details->HealthStatus == "مرض
                            مزمن"?'checked':'' }}>
                            <label>مرض مزمن</label><br>
                        </div>
                        <div class="form-group">
                            <label>{{ __('تفصيل الحالة المرضية إن وجدت') }}</label>
                            <input id="MedicalCondition" class="form-control" type="text" name="MedicalCondition"
                                value="{{ $details->MedicalCondition }}" autofocus autocomplete="MedicalCondition" />
                        </div>
                        <div class="form-group">
                            <label for="HusbundOrWifeName">{{ __('إسم الزوج أو الزوجة') }}</label>
                            <input id="HusbundOrWifeName" class="form-control" type="text" name="HusbundOrWifeName"
                                value="{{ $details->HusbundOrWifeName }}" autofocus autocomplete="HusbundOrWifeName" />
                        </div>


                        <div class="form-group">
                            <label for="HusbundOrWifeId">{{ __('الرقم القومى') }}</label>
                            <input id="HusbundOrWifeId" class="form-control" type="number" name="HusbundOrWifeId"
                                value="{{ $details->HusbundOrWifeId }}" autofocus autocomplete="HusbundOrWifeId" />
                        </div>
                        <div class="form-group">
                            <label for="HusbundOrWifePhone">{{ __(' التليفون ') }}</label>
                            <input id="HusbundOrWifePhone" class="form-control" type="number" name="HusbundOrWifePhone"
                                value="{{ $details->HusbundOrWifePhone }}" autofocus
                                autocomplete="HusbundOrWifePhone" />
                        </div>

                        <div class="form-group">
                            <label for="HusbundOrWifeAddress">{{ __('العنوان بالبطاقة') }}</label>
                            <input id="HusbundOrWifeAddress" class="form-control" type="text"
                                name="HusbundOrWifeAddress" value="{{ $details->HusbundOrWifeAddress }}" autofocus
                                autocomplete="HusbundOrWifeAddress" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('العنوان الحالى') }}</label>
                            <input id="HusbundOrWifeCurrentAddress" class="form-control" type="text"
                                name="HusbundOrWifeCurrentAddress" value="{{ $details->HusbundOrWifeCurrentAddress }}"
                                autofocus autocomplete="HusbundOrWifeCurrentAddress" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('الوظيفة') }}</label>
                            <input id="HusbundOrWifeJob" class="form-control" type="text" name="HusbundOrWifeJob"
                                value="{{ $details->HusbundOrWifeJob }}" autofocus autocomplete="HusbundOrWifeJob" />
                        </div>
                        <h2>أفراد العائلة</h2>
                        <div class="form-group">
                            <h4>{{ __(' إسم الفرد الأول إن وجد') }}</h4>
                            <input id="firstPersonName" class="form-control" type="text" name="firstPersonName"
                                value="{{ $details->firstPersonName }}" autofocus autocomplete="firstPersonName" />
                            <div class="form-group">
                                <label>{{ __('نوع الفرد الأول') }}</label><br>
                                <input type="radio" name="firstPersonType" value="زوج" {{ $details->firstPersonType ==
                                "زوج"?'checked':"" }}>
                                <label>زوج</label><br>
                                <input type="radio" name="firstPersonType" value="زوجة" {{ $details->firstPersonType ==
                                "زوجة"?'checked':"" }}>
                                <label>زوجة</label><br>
                                <input type="radio" name="firstPersonType" value="إبن" {{ $details->firstPersonType ==
                                "إبن"?'checked':"" }}>
                                <label>إبن</label><br>
                                <input type="radio" name="firstPersonType" value="إبنه" {{ $details->firstPersonType ==
                                "إبنه"?'checked':"" }}>
                                <label>إبنة</label><br>
                            </div>
                            <div class="form-group">
                                <label>{{ __('الرقم القومى للفرد الأول') }}</label>
                                <input id="firstPersonId" class="form-control" type="number" name="firstPersonId"
                                    value="{{ $details->firstPersonId }}" autofocus autocomplete="firstPersonId" />
                            </div>
                        </div>

                        <div class="form-group">
                            <h4>{{ __(' إسم الفرد الثانى إن وجد') }}</h4>
                            <input id="secondPersonName" class="form-control" type="text" name="secondPersonName"
                                value="{{ $details->secondPersonName }}" autofocus autocomplete="secondPersonName" />
                            <div class="form-group">
                                <label>{{ __('نوع الفرد الثانى ') }}</label><br>
                                <input type="radio" name="secondPersonType" value="زوج" {{ $details->secondPersonType ==
                                "زوج"?'checked':"" }}>
                                <label>زوج</label><br>
                                <input type="radio" name="secondPersonType" value="زوجة" {{ $details->secondPersonType
                                == "زوجة"?'checked':"" }}>
                                <label>زوجة</label><br>
                                <input type="radio" name="secondPersonType" value="إبن" {{ $details->secondPersonType ==
                                "إبن"?'checked':"" }}>
                                <label>إبن</label><br>
                                <input type="radio" name="secondPersonType" value="إبنه" {{ $details->secondPersonType
                                == "إبنه"?'checked':"" }}>
                                <label>إبنة</label><br>
                            </div>
                            <div class="form-group">
                                <label>{{ __('الرقم القومى للفرد الثانى') }}</label>
                                <input id="secondPersonId" class="form-control" type="number" name="secondPersonId"
                                    value="{{ $details->secondPersonId }}" autofocus autocomplete="secondPersonId" />
                            </div>
                        </div>

                        <div class="form-group">
                            <h4>{{ __(' إسم الفرد الثالث إن وجد') }}</h4>
                            <input id="thirdPersonName" class="form-control" type="text" name="thirdPersonName"
                                value="{{ $details->thirdPersonName }}" autofocus autocomplete="thirdPersonName" />
                            <div class="form-group">
                                <label>{{ __('نوع الفردالثالث ') }}</label><br>
                                <input type="radio" name="thirdPersonType" value="زوج" {{ $details->thirdPersonType ==
                                "زوج"?'checked':"" }}>
                                <label>زوج</label><br>
                                <input type="radio" name="thirdPersonType" value="زوجة" {{ $details->thirdPersonType ==
                                "زوجة"?'checked':"" }}>
                                <label>زوجة</label><br>
                                <input type="radio" name="thirdPersonType" value="إبن" {{ $details->thirdPersonType ==
                                "إبن"?'checked':"" }}>
                                <label>إبن</label><br>
                                <input type="radio" name="thirdPersonType" value="إبنه" {{ $details->thirdPersonType ==
                                "إبنه"?'checked':"" }}>
                                <label>إبنة</label><br>
                            </div>
                            <div class="form-group">
                                <label>{{ __('الرقم القومى للفرد الثالث') }}</label>
                                <input id="thirdPersonId" class="form-control" type="number" name="thirdPersonId"
                                    value="{{ $details->thirdPersonId }}" autofocus autocomplete="thirdPersonId" />
                            </div>
                        </div>

                        <div class="form-group">
                            <h4>{{ __(' إسم الفرد الرابع إن وجد') }}</h4>
                            <input id="fourthPersonName" class="form-control" type="text" name="fourthPersonName"
                                value="{{ $details->fourthPersonName }}" autofocus autocomplete="fourthPersonName" />
                            <div class="form-group">
                                <label>{{ __('نوع الفرد الرابع') }}</label><br>
                                <input type="radio" name="fourthPersonType" value="زوج" {{ $details->fourthPersonType ==
                                "زوج"?'checked':"" }}>
                                <label>زوج</label><br>
                                <input type="radio" name="fourthPersonType" value="زوجة" {{ $details->fourthPersonType
                                == "زوجة"?'checked':"" }}>
                                <label>زوجة</label><br>
                                <input type="radio" name="fourthPersonType" value="إبن" {{ $details->fourthPersonType ==
                                "إبن"?'checked':"" }}>
                                <label>إبن</label><br>
                                <input type="radio" name="fourthPersonType" value="إبنه" {{ $details->fourthPersonType
                                == "إبنه"?'checked':"" }}>
                                <label>إبنة</label><br>
                            </div>
                            <div class="form-group">
                                <label>{{ __('الرقم القومى للفرد الرابع') }}</label>
                                <input id="fourthPersonId" class="form-control" type="number" name="fourthPersonId"
                                    value="{{ $details->fourthPersonId }}" autofocus autocomplete="fourthPersonId" />
                            </div>
                        </div>

                        <div class="form-group">
                            <h4>{{ __(' إسم الفرد الخامس إن وجد') }}</h4>
                            <input id="fifthPersonName" class="form-control" type="text" name="fifthPersonName"
                                value="{{ $details->fifthPersonName }}" autofocus autocomplete="fifthPersonName" />
                            <div class="form-group">
                                <label>{{ __('نوع الفرد الخامس') }}</label><br>
                                <input type="radio" name="fifthPersonType" value="زوج" {{ $details->fifthPersonType ==
                                "زوج"?'checked':"" }}>
                                <label>زوج</label><br>
                                <input type="radio" name="fifthPersonType" value="زوجة" {{ $details->fifthPersonType ==
                                "زوجة"?'checked':"" }}>
                                <label>زوجة</label><br>
                                <input type="radio" name="fifthPersonType" value="إبن" {{ $details->fifthPersonType ==
                                "إبن"?'checked':"" }}>
                                <label>إبن</label><br>
                                <input type="radio" name="fifthPersonType" value="إبنه" {{ $details->fifthPersonType ==
                                "إبنه"?'checked':"" }}>
                                <label>إبنة</label><br>
                            </div>
                            <div class="form-group">
                                <label>{{ __('الرقم القومى للفرد الخامس') }}</label>
                                <input id="fifthPersonId" class="form-control" type="number" name="fifthPersonId"
                                    value="{{ $details->fifthPersonId }}" autofocus autocomplete="fifthPersonId" />
                            </div>
                        </div>

                        <div class="form-group">
                            <h4>{{ __(' إسم الفرد السادس إن وجد') }}</h4>
                            <input id="sixPersonName" class="form-control" type="text" name="sixPersonName"
                                value="{{ $details->sixPersonName }}" autofocus autocomplete="sixPersonName" />
                            <div class="form-group">
                                <label>{{ __('نوع الفرد السادس') }}</label><br>
                                <input type="radio" name="sixPersonType" value="زوج" {{ $details->sixPersonType ==
                                "زوج"?'checked':"" }}>
                                <label>زوج</label><br>
                                <input type="radio" name="sixPersonType" value="زوجة" {{ $details->sixPersonType ==
                                "زوجة"?'checked':"" }}>
                                <label>زوجة</label><br>
                                <input type="radio" name="sixPersonType" value="إبن" {{ $details->sixPersonType ==
                                "إبن"?'checked':"" }}>
                                <label>إبن</label><br>
                                <input type="radio" name="sixPersonType" value="إبنه" {{ $details->sixPersonType ==
                                "إبنه"?'checked':"" }}>
                                <label>إبنة</label><br>
                            </div>
                            <div class="form-group">
                                <label>{{ __('الرقم القومى للفرد السادس') }}</label>
                                <input id="sixPersonId" class="form-control" type="number" name="sixPersonId"
                                    value="{{ $details->sixPersonId }}" autofocus autocomplete="sixPersonId" />
                            </div>
                        </div>
                        <div class="form-group">
                            <h4>{{ __(' إسم الفرد السابع إن وجد') }}</h4>
                            <input id="sevenPersonName" class="form-control" type="text" name="sevenPersonName"
                                value="{{ $details->sevenPersonName }}" autofocus autocomplete="sevenPersonName" />
                            <div class="form-group">
                                <label>{{ __('نوع الفرد السابع') }}</label><br>
                                <input type="radio" name="sevenPersonType" value="زوج" {{ $details->sevenPersonType ==
                                "زوج"?'checked':"" }}>
                                <label>زوج</label><br>
                                <input type="radio" name="sevenPersonType" value="زوجة" {{ $details->sevenPersonType ==
                                "زوجة"?'checked':"" }}>
                                <label>زوجة</label><br>
                                <input type="radio" name="sevenPersonType" value="إبن" {{ $details->sevenPersonType ==
                                "إبن"?'checked':"" }}>
                                <label>إبن</label><br>
                                <input type="radio" name="sevenPersonType" value="إبنه" {{ $details->sevenPersonType ==
                                "إبنه"?'checked':"" }}>
                                <label>إبنة</label><br>
                            </div>
                            <div class="form-group">
                                <label>{{ __('الرقم القومى للفرد السابع') }}</label>
                                <input id="sevenPersonId" class="form-control" type="number" name="sevenPersonId"
                                    value="{{ $details->sevenPersonId }}" autofocus autocomplete="sevenPersonId" />
                            </div>
                        </div>
                        <div class="form-group">
                            <h4>{{ __(' إسم الفرد الثامن إن وجد') }}</h4>
                            <input id="eightPersonName" class="form-control" type="text" name="eightPersonName"
                                value="{{ $details->eightPersonName }}" autofocus autocomplete="eightPersonName" />
                            <div class="form-group">
                                <label>{{ __('نوع الفرد الثامن') }}</label><br>
                                <input type="radio" name="eightPersonType" value="زوج" {{ $details->eightPersonType ==
                                "زوج"?'checked':"" }}>
                                <label>زوج</label><br>
                                <input type="radio" name="eightPersonType" value="زوجة" {{ $details->eightPersonType ==
                                "زوجة"?'checked':"" }}>
                                <label>زوجة</label><br>
                                <input type="radio" name="eightPersonType" value="إبن" {{ $details->eightPersonType ==
                                "إبن"?'checked':"" }}>
                                <label>إبن</label><br>
                                <input type="radio" name="eightPersonType" value="إبنه" {{ $details->eightPersonType ==
                                "إبنه"?'checked':"" }}>
                                <label>إبنة</label><br>
                            </div>
                            <div class="form-group">
                                <label>{{ __('الرقم القومى للفرد الثامن') }}</label>
                                <input id="eightPersonId" class="form-control" type="number" name="eightPersonId"
                                    value="{{ $details->eightPersonId }}" autofocus autocomplete="eightPersonId" />
                            </div>
                        </div>
                        <div class="form-group">
                            <h4>{{ __(' إسم الفرد التاسع إن وجد') }}</h4>
                            <input id="ninePersonName" class="form-control" type="text" name="ninePersonName"
                                value="{{ $details->ninePersonName }}" autofocus autocomplete="ninePersonName" />
                            <div class="form-group">
                                <label>{{ __('نوع الفرد التاسع') }}</label><br>
                                <input type="radio" name="ninePersonType" value="زوج" {{ $details->ninePersonType ==
                                "زوج"?'checked':"" }}>
                                <label>زوج</label><br>
                                <input type="radio" name="ninePersonType" value="زوجة" {{ $details->ninePersonType ==
                                "زوجة"?'checked':"" }}>
                                <label>زوجة</label><br>
                                <input type="radio" name="ninePersonType" value="إبن" {{ $details->ninePersonType ==
                                "إبن"?'checked':"" }}>
                                <label>إبن</label><br>
                                <input type="radio" name="ninePersonType" value="إبنه" {{ $details->ninePersonType ==
                                "إبنه"?'checked':"" }}>
                                <label>إبنة</label><br>
                            </div>
                            <div class="form-group">
                                <label>{{ __('الرقم القومى للفرد التاسع') }}</label>
                                <input id="ninePersonId" class="form-control" type="number" name="ninePersonId"
                                    value="{{ $details->ninePersonId }}" autofocus autocomplete="ninePersonId" />
                            </div>
                        </div>

                        <div class="form-group">
                            <h4>{{ __(' إسم الفرد العاشر إن وجد') }}</h4>
                            <input id="tenPersonName" class="form-control" type="text" name="tenPersonName"
                                value="{{ $details->tenPersonName }}" autofocus autocomplete="tenPersonName" />
                            <div class="form-group">
                                <label>{{ __('نوع الفرد العاشر') }}</label><br>
                                <input type="radio" name="tenPersonType" value="زوج" {{ $details->tenPersonType ==
                                "زوج"?'checked':"" }}>
                                <label>زوج</label><br>
                                <input type="radio" name="tenPersonType" value="زوجة" {{ $details->tenPersonType ==
                                "زوجة"?'checked':"" }}>
                                <label>زوجة</label><br>
                                <input type="radio" name="tenPersonType" value="إبن" {{ $details->tenPersonType ==
                                "إبن"?'checked':"" }}>
                                <label>إبن</label><br>
                                <input type="radio" name="tenPersonType" value="إبنه" {{ $details->tenPersonType ==
                                "إبنه"?'checked':"" }}>
                                <label>إبنة</label><br>
                            </div>
                            <div class="form-group">
                                <label>{{ __('الرقم القومى للفرد العاشر') }}</label>
                                <input id="tenPersonId" class="form-control" type="number" name="tenPersonId"
                                    value="{{ $details->tenPersonId }}" autofocus autocomplete="tenPersonId" />
                            </div>
                        </div>



                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <label for="terms">
                                <div class="flex items-center">
                                    <checkbox name="terms" id="terms" />

                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                            class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of
                                            Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                            class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy
                                            Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </label>
                        </div>
                        @endif
                        <button type="submit" class="ml-4 btn btn-success">
                            {{ __('تعديل') }}
                        </button>
                </div>
                </form>
            </div>
            </div>
        </x-slot>
    </x-app-layout>


</body>

</html>