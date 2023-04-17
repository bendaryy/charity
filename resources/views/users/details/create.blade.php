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


            <form method="POST" action="{{ route('details.store') }}" style="margin: auto">
                @csrf

                <div class="form-group col" style="margin: auto">
                    <label for="name">{{ __('الإسم') }}</label>
                    <input id="name" class="form-control" type="text" name="name" :value="old('name')" required
                        autofocus autocomplete="name" />
                </div>
                <div class="form-group col" style="margin: auto">
                    <label for="typestate">{{ __('حالة المستفيد') }}</label>
                    <input id="typestate" class="form-control" type="text" name="typestate" :value="old('typestate')"
                        autofocus autocomplete="typestate" />
                </div>
                <div class="form-group col" style="margin: auto">
                    <label for="notee">{{ __('ملاحظات') }}</label>
                    <textarea id="notee" class="form-control" type="text" name="notee"
                        autofocus autocomplete="notee" placeholder="الملاحظات"></textarea>
                </div>
                <div class="form-group">
                    <label for="SearchDate">{{ __('تاريخ الإضافة') }}</label>
                    <input id="SearchDate" class="form-control" type="date" name="SearchDate" value="<?php echo date("Y-m-d");?>"
                        required autofocus autocomplete="SearchDate" />
                </div>

                <div class="form-group">
                    <label for="NationalId">{{ __('الرقم القومى') }}</label>
                    <input id="NationalId" class="form-control" type="number" name="NationalId"
                        :value="old('NationalId')" required autofocus autocomplete="NationalId" />
                </div>
                <div class="form-group">
                    <label for="personsNumbers">{{ __('عدد الأبناء') }}</label>
                    <input id="personsNumbers" class="form-control" type="number" name="personsNumbers"
                        :value="old('personsNumbers')"  autofocus autocomplete="personsNumbers" />
                </div>
                <div class="form-group">
                    <label for="phone">{{ __(' التليفون ') }}</label>
                    <input id="phone" class="form-control" type="number" name="phone" :value="old('phone')"
                        autofocus autocomplete="phone" />
                </div>

                <div class="form-group">
                    <label for="AddressId">{{ __('العنوان بالبطاقة') }}</label>
                    <input id="AddressId" class="form-control" type="text" name="AddressId" :value="old('AddressId')"
                         autofocus autocomplete="AddressId" />
                </div>
                <div class="form-group">
                    <label>{{ __('العنوان الحالى') }}</label>
                    <input id="currentAddress" class="form-control" type="text" name="currentAddress"
                        :value="old('currentAddress')"  autofocus autocomplete="currentAddress" />
                </div>
                <div class="form-group">
                    <label for="currentAddress">{{ __('حالة الإقامة') }}</label><br>

                    <input type="radio" name="ResidenceStatus" value="شقة ملك">
                    <label>شقة ملك</label><br>
                    <input type="radio" name="ResidenceStatus" value="شقة إيجار">
                    <label>شقة إيجار</label><br>
                </div>
                <div class="form-group">
                    <label>{{ __(' قيمة الإيجار اذا كان السكن إيجار') }}</label>
                    <input id="valueRent" class="form-control" type="number" name="valueRent" :value="old('valueRent')"
                        autofocus autocomplete="valueRent" />
                </div class="form-group">
                <div>
                    <label for="IncomeMethod">{{ __('طريقة الدخل') }}</label><br>
                    <input type="radio" name="IncomeMethod" value="عمل حر">
                    <label> عمل حر</label><br>
                    <input type="radio" name="IncomeMethod" value="نفقة">
                    <label> نفقة </label><br>
                </div>
                <div class="form-group">
                    <label>{{ __('قيمة الدخل') }}</label>
                    <input id="IncomeValue" class="form-control" type="number" name="IncomeValue"
                        :value="old('IncomeValue')"  autofocus autocomplete="IncomeValue" />
                </div>

                <div class="form-group">
                    <label for="SocialStatus">{{ __('الحالة الإجتماعية') }}</label><br>
                    <input type="radio" name="SocialStatus" value="أعزب">
                    <label>أعزب</label><br>
                    <input type="radio" name="SocialStatus" value="مطلق">
                    <label>مطلق</label><br>
                    <input type="radio" name="SocialStatus" value="منفصل">
                    <label>منفصل</label><br>
                    <input type="radio" name="SocialStatus" value="متزوج">
                    <label>متزوج</label><br>
                    <input type="radio" name="SocialStatus" value="ارمل">
                    <label>ارمل</label><br>
                </div>
                <div class="form-group">
                    <label for="HealthStatus">{{ __('الحالة الصحية') }}</label><br>
                    <input type="radio" name="HealthStatus" value="جيدة">
                    <label>جيدة</label><br>
                    <input type="radio" name="HealthStatus" value="مرض مؤقت">
                    <label>مرض مؤقت</label><br>
                    <input type="radio" name="HealthStatus" value="مرض مزمن">
                    <label>مرض مزمن</label><br>
                </div>
                <div class="form-group">
                    <label>{{ __('تفصيل الحالة المرضية إن وجدت') }}</label>
                    <input id="MedicalCondition" class="form-control" type="text" name="MedicalCondition"
                        :value="old('MedicalCondition')" autofocus autocomplete="MedicalCondition" />
                </div>
                <div class="form-group">
                    <label for="HusbundOrWifeName">{{ __('إسم الزوج أو الزوجة') }}</label>
                    <input id="HusbundOrWifeName" class="form-control" type="text" name="HusbundOrWifeName"
                        :value="old('HusbundOrWifeName')" autofocus autocomplete="HusbundOrWifeName" />
                </div>


                <div class="form-group">
                    <label for="HusbundOrWifeId">{{ __('الرقم القومى') }}</label>
                    <input id="HusbundOrWifeId" class="form-control" type="number" name="HusbundOrWifeId"
                        :value="old('HusbundOrWifeId')" autofocus autocomplete="HusbundOrWifeId" />
                </div>
                <div class="form-group">
                    <label for="HusbundOrWifePhone">{{ __(' التليفون ') }}</label>
                    <input id="HusbundOrWifePhone" class="form-control" type="number" name="HusbundOrWifePhone"
                        :value="old('HusbundOrWifePhone')" autofocus autocomplete="HusbundOrWifePhone" />
                </div>

                <div class="form-group">
                    <label for="HusbundOrWifeAddress">{{ __('العنوان بالبطاقة') }}</label>
                    <input id="HusbundOrWifeAddress" class="form-control" type="text" name="HusbundOrWifeAddress"
                        :value="old('HusbundOrWifeAddress')" autofocus autocomplete="HusbundOrWifeAddress" />
                </div>
                <div class="form-group">
                    <label>{{ __('العنوان الحالى') }}</label>
                    <input id="HusbundOrWifeCurrentAddress" class="form-control" type="text"
                        name="HusbundOrWifeCurrentAddress" :value="old('HusbundOrWifeCurrentAddress')" autofocus
                        autocomplete="HusbundOrWifeCurrentAddress" />
                </div>
                <div class="form-group">
                    <label>{{ __('الوظيفة') }}</label>
                    <input id="HusbundOrWifeJob" class="form-control" type="text" name="HusbundOrWifeJob"
                        :value="old('HusbundOrWifeJob')" autofocus autocomplete="HusbundOrWifeJob" />
                </div>
                <h2>أفراد العائلة</h2>
                <div class="form-group">
                    <h4>{{ __(' إسم الفرد الأول إن وجد') }}</h4>
                    <input id="firstPersonName" class="form-control" type="text" name="firstPersonName"
                        :value="old('firstPersonName')" autofocus autocomplete="firstPersonName" />
                    <div class="form-group">
                        <label>{{ __('نوع الفرد الأول') }}</label><br>
                        <input type="radio" name="firstPersonType" value="زوج">
                        <label>زوج</label><br>
                        <input type="radio" name="firstPersonType" value="زوجة">
                        <label>زوجة</label><br>
                        <input type="radio" name="firstPersonType" value="إبن">
                        <label>إبن</label><br>
                        <input type="radio" name="firstPersonType" value="إبنه">
                        <label>إبنة</label><br>
                    </div>
                    <div class="form-group">
                        <label>{{ __('الرقم القومى للفرد الأول') }}</label>
                        <input id="firstPersonId" class="form-control" type="number" name="firstPersonId"
                            :value="old('firstPersonId')" autofocus autocomplete="firstPersonId" />
                    </div>
                </div>

                <div class="form-group">
                    <h4>{{ __(' إسم الفرد الثانى إن وجد') }}</h4>
                    <input id="secondPersonName" class="form-control" type="text" name="secondPersonName"
                        :value="old('secondPersonName')" autofocus autocomplete="secondPersonName" />
                    <div class="form-group">
                        <label>{{ __('نوع الفرد الثانى ') }}</label><br>
                        <input type="radio" name="secondPersonType" value="زوج">
                        <label>زوج</label><br>
                        <input type="radio" name="secondPersonType" value="زوجة">
                        <label>زوجة</label><br>
                        <input type="radio" name="secondPersonType" value="إبن">
                        <label>إبن</label><br>
                        <input type="radio" name="secondPersonType" value="إبنه">
                        <label>إبنة</label><br>
                    </div>
                    <div class="form-group">
                        <label>{{ __('الرقم القومى للفرد الثانى') }}</label>
                        <input id="secondPersonId" class="form-control" type="number" name="secondPersonId"
                            :value="old('secondPersonId')" autofocus autocomplete="secondPersonId" />
                    </div>
                </div>

                <div class="form-group">
                    <h4>{{ __(' إسم الفرد الثالث إن وجد') }}</h4>
                    <input id="thirdPersonName" class="form-control" type="text" name="thirdPersonName"
                        :value="old('thirdPersonName')" autofocus autocomplete="thirdPersonName" />
                    <div class="form-group">
                        <label>{{ __('نوع الفردالثالث ') }}</label><br>
                        <input type="radio" name="thirdPersonType" value="زوج">
                        <label>زوج</label><br>
                        <input type="radio" name="thirdPersonType" value="زوجة">
                        <label>زوجة</label><br>
                        <input type="radio" name="thirdPersonType" value="إبن">
                        <label>إبن</label><br>
                        <input type="radio" name="thirdPersonType" value="إبنه">
                        <label>إبنة</label><br>
                    </div>
                    <div class="form-group">
                        <label>{{ __('الرقم القومى للفرد الثالث') }}</label>
                        <input id="thirdPersonId" class="form-control" type="number" name="thirdPersonId"
                            :value="old('thirdPersonId')" autofocus autocomplete="thirdPersonId" />
                    </div>
                </div>

                <div class="form-group">
                    <h4>{{ __(' إسم الفرد الرابع إن وجد') }}</h4>
                    <input id="fourthPersonName" class="form-control" type="text" name="fourthPersonName"
                        :value="old('fourthPersonName')" autofocus autocomplete="fourthPersonName" />
                    <div class="form-group">
                        <label>{{ __('نوع الفرد الرابع') }}</label><br>
                        <input type="radio" name="fourthPersonType" value="زوج">
                        <label>زوج</label><br>
                        <input type="radio" name="fourthPersonType" value="زوجة">
                        <label>زوجة</label><br>
                        <input type="radio" name="fourthPersonType" value="إبن">
                        <label>إبن</label><br>
                        <input type="radio" name="fourthPersonType" value="إبنه">
                        <label>إبنة</label><br>
                    </div>
                    <div class="form-group">
                        <label>{{ __('الرقم القومى للفرد الرابع') }}</label>
                        <input id="fourthPersonId" class="form-control" type="number" name="fourthPersonId"
                            :value="old('fourthPersonId')" autofocus autocomplete="fourthPersonId" />
                    </div>
                </div>

                <div class="form-group">
                    <h4>{{ __(' إسم الفرد الخامس إن وجد') }}</h4>
                    <input id="fifthPersonName" class="form-control" type="text" name="fifthPersonName"
                        :value="old('fifthPersonName')" autofocus autocomplete="fifthPersonName" />
                    <div class="form-group">
                        <label>{{ __('نوع الفرد الخامس') }}</label><br>
                        <input type="radio" name="fifthPersonType" value="زوج">
                        <label>زوج</label><br>
                        <input type="radio" name="fifthPersonType" value="زوجة">
                        <label>زوجة</label><br>
                        <input type="radio" name="fifthPersonType" value="إبن">
                        <label>إبن</label><br>
                        <input type="radio" name="fifthPersonType" value="إبنه">
                        <label>إبنة</label><br>
                    </div>
                    <div class="form-group">
                        <label>{{ __('الرقم القومى للفرد الخامس') }}</label>
                        <input id="fifthPersonId" class="form-control" type="number" name="fifthPersonId"
                            :value="old('fifthPersonId')" autofocus autocomplete="fifthPersonId" />
                    </div>
                </div>

                <div class="form-group">
                    <h4>{{ __(' إسم الفرد السادس إن وجد') }}</h4>
                    <input id="sixPersonName" class="form-control" type="text" name="sixPersonName"
                        :value="old('sixPersonName')" autofocus autocomplete="sixPersonName" />
                    <div class="form-group">
                        <label>{{ __('نوع الفرد السادس') }}</label><br>
                        <input type="radio" name="sixPersonType" value="زوج">
                        <label>زوج</label><br>
                        <input type="radio" name="sixPersonType" value="زوجة">
                        <label>زوجة</label><br>
                        <input type="radio" name="sixPersonType" value="إبن">
                        <label>إبن</label><br>
                        <input type="radio" name="sixPersonType" value="إبنه">
                        <label>إبنة</label><br>
                    </div>
                    <div class="form-group">
                        <label>{{ __('الرقم القومى للفرد السادس') }}</label>
                        <input id="sixPersonId" class="form-control" type="number" name="sixPersonId"
                            :value="old('sixPersonId')" autofocus autocomplete="sixPersonId" />
                    </div>
                </div>
                <div class="form-group">
                    <h4>{{ __(' إسم الفرد السابع إن وجد') }}</h4>
                    <input id="sevenPersonName" class="form-control" type="text" name="sevenPersonName"
                        :value="old('sevenPersonName')" autofocus autocomplete="sevenPersonName" />
                    <div class="form-group">
                        <label>{{ __('نوع الفرد السابع') }}</label><br>
                        <input type="radio" name="sevenPersonType" value="زوج">
                        <label>زوج</label><br>
                        <input type="radio" name="sevenPersonType" value="زوجة">
                        <label>زوجة</label><br>
                        <input type="radio" name="sevenPersonType" value="إبن">
                        <label>إبن</label><br>
                        <input type="radio" name="sevenPersonType" value="إبنه">
                        <label>إبنة</label><br>
                    </div>
                    <div class="form-group">
                        <label>{{ __('الرقم القومى للفرد السابع') }}</label>
                        <input id="sevenPersonId" class="form-control" type="number" name="sevenPersonId"
                            :value="old('sevenPersonId')" autofocus autocomplete="sevenPersonId" />
                    </div>
                </div>
                <div class="form-group">
                    <h4>{{ __(' إسم الفرد الثامن إن وجد') }}</h4>
                    <input id="eightPersonName" class="form-control" type="text" name="eightPersonName"
                        :value="old('eightPersonName')" autofocus autocomplete="eightPersonName" />
                    <div class="form-group">
                        <label>{{ __('نوع الفرد الثامن') }}</label><br>
                        <input type="radio" name="eightPersonType" value="زوج">
                        <label>زوج</label><br>
                        <input type="radio" name="eightPersonType" value="زوجة">
                        <label>زوجة</label><br>
                        <input type="radio" name="eightPersonType" value="إبن">
                        <label>إبن</label><br>
                        <input type="radio" name="eightPersonType" value="إبنه">
                        <label>إبنة</label><br>
                    </div>
                    <div class="form-group">
                        <label>{{ __('الرقم القومى للفرد الثامن') }}</label>
                        <input id="eightPersonId" class="form-control" type="number" name="eightPersonId"
                            :value="old('eightPersonId')" autofocus autocomplete="eightPersonId" />
                    </div>
                </div>
                <div class="form-group">
                    <h4>{{ __(' إسم الفرد التاسع إن وجد') }}</h4>
                    <input id="ninePersonName" class="form-control" type="text" name="ninePersonName"
                        :value="old('ninePersonName')" autofocus autocomplete="ninePersonName" />
                    <div class="form-group">
                        <label>{{ __('نوع الفرد التاسع') }}</label><br>
                        <input type="radio" name="ninePersonType" value="زوج">
                        <label>زوج</label><br>
                        <input type="radio" name="ninePersonType" value="زوجة">
                        <label>زوجة</label><br>
                        <input type="radio" name="ninePersonType" value="إبن">
                        <label>إبن</label><br>
                        <input type="radio" name="ninePersonType" value="إبنه">
                        <label>إبنة</label><br>
                    </div>
                    <div class="form-group">
                        <label>{{ __('الرقم القومى للفرد التاسع') }}</label>
                        <input id="ninePersonId" class="form-control" type="number" name="ninePersonId"
                            :value="old('ninePersonId')" autofocus autocomplete="ninePersonId" />
                    </div>
                </div>

                <div class="form-group">
                    <h4>{{ __(' إسم الفرد العاشر إن وجد') }}</h4>
                    <input id="tenPersonName" class="form-control" type="text" name="tenPersonName"
                        :value="old('tenPersonName')" autofocus autocomplete="tenPersonName" />
                    <div class="form-group">
                        <label>{{ __('نوع الفرد العاشر') }}</label><br>
                        <input type="radio" name="tenPersonType" value="زوج">
                        <label>زوج</label><br>
                        <input type="radio" name="tenPersonType" value="زوجة">
                        <label>زوجة</label><br>
                        <input type="radio" name="tenPersonType" value="إبن">
                        <label>إبن</label><br>
                        <input type="radio" name="tenPersonType" value="إبنه">
                        <label>إبنة</label><br>
                    </div>
                    <div class="form-group">
                        <label>{{ __('الرقم القومى للفرد العاشر') }}</label>
                        <input id="tenPersonId" class="form-control" type="number" name="tenPersonId"
                            :value="old('tenPersonId')" autofocus autocomplete="tenPersonId" />
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
                    {{ __('تسجيل') }}
                </button>
        </div>
        </form>
    </div>
    </div>
</x-slot>
</x-app-layout>


</body>

</html>
