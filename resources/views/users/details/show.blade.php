<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        table,
        th,
        td,
        tr {
            text-align: center
        }
    </style>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
    <div class="container">
        <h3 style="text-align: center;padding: 30px">البيانات الشخصية للشخص الأساسى</h3>
        <table class="table">
            <thead>
                <tr>

                    <th scope="col">الإسم</th>
                    <th scope="col">تاريخ البحث</th>
                    <th scope="col">الرقم القومى</th>
                    <th scope="col">عدد الأبناء</th>
                    <th scope="col">التليفون</th>
                    <th scope="col">العنوان</th>
                    <th scope="col">العنوان الحالى</th>
                    <th scope="col">موقف السكن</th>
                    <th scope="col">إسم الجمعية</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $details->name }}</td>
                    <td>{{ $details->SearchDate }}</td>
                    <td>{{ $details->NationalId }}</td>
                    <td>{{ $details->personsNumbers }}</td>
                    <td>{{ $details->phone }}</td>
                    <td>{{ $details->AddressId }}</td>
                    <td>{{ $details->currentAddress }}</td>
                    <td>{{ $details->ResidenceStatus }}</td>
                    <td>{{ $details->branch->name }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="container">
        <h3 style="text-align: center;padding: 30px">بيانات الزوج أو الزوجة</h3>
        <table class="table">
            <thead>
                @if($details->HusbundOrWifeName != NULL)
                <tr>

                    <th scope="col">إسم الزوج / الزوجة</th>
                    <th scope="col">الرقم القومى</th>
                    <th scope="col">التليفون</th>
                    <th scope="col">العنوان</th>
                    <th scope="col">العنوان الحالى</th>
                    <th scope="col">الوظيفة</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>{{ $details->HusbundOrWifeName }}</td>
                    <td>{{ $details->HusbundOrWifeId }}</td>
                    <td>{{ $details->HusbundOrWifePhone }}</td>
                    <td>{{ $details->HusbundOrWifeAddress }}</td>
                    <td>{{ $details->HusbundOrWifeCurrentAddress }}</td>
                    <td>{{ $details->HusbundOrWifeJob }}</td>
                </tr>
            </tbody>
            @else
            <h3 style="text-align: center">لايوجد زوج / زوجة</h3>
            @endif
        </table>
    </div>
    <div class="container">
        <h3 style="text-align: center;padding: 30px">بيانات الأفراد</h3>
        <table class="table">
            <thead>
                @if($details->firstPersonName != NULL)
                <tr>

                    <th scope="col">#</th>
                    <th scope="col">اسم الفرد</th>
                    <th scope="col">نوع الفرد</th>
                    <th scope="col">الرقم القومى للفرد</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>الفرد الأول</td>
                    <td>{{ $details->firstPersonName }}</td>
                    <td>{{ $details->firstPersonType }}</td>
                    <td>{{ $details->firstPersonId }}</td>

                </tr>
                @else
                <h3 style="text-align: center">لا يوجد أفراد</h3>
                @endif
                @if($details->secondPersonName != NULL)
                <tr>
                    <td>الفرد الثانى</td>
                    <td>{{ $details->secondPersonName }}</td>
                    <td>{{ $details->secondPersonType }}</td>
                    <td>{{ $details->secondPersonId }}</td>

                </tr>
                @endif
                @if($details->thirdPersonName != NULL)
                <tr>
                    <td>الفرد الثالث</td>
                    <td>{{ $details->thirdPersonName }}</td>
                    <td>{{ $details->thirdPersonType }}</td>
                    <td>{{ $details->thirdPersonId }}</td>

                </tr>
                @endif
                @if($details->fourthPersonName != NULL)
                <tr>
                    <td>الفرد الرابع</td>
                    <td>{{ $details->fourthPersonName }}</td>
                    <td>{{ $details->fourthPersonType }}</td>
                    <td>{{ $details->fourthPersonId }}</td>

                </tr>
                @endif
                @if($details->fifthPersonName != NULL)
                <tr>
                    <td>الفرد الخامس</td>
                    <td>{{ $details->fifthPersonName }}</td>
                    <td>{{ $details->fifthPersonType }}</td>
                    <td>{{ $details->fifthPersonId }}</td>

                </tr>
                @endif
                @if($details->sixPersonName != NULL)
                <tr>
                    <td>الفرد السادس</td>
                    <td>{{ $details->sixPersonName }}</td>
                    <td>{{ $details->sixPersonType }}</td>
                    <td>{{ $details->sixPersonId }}</td>

                </tr>
                @endif
                @if($details->sevenPersonName != NULL)
                <tr>
                    <td>الفرد السابع</td>
                    <td>{{ $details->sevenPersonName }}</td>
                    <td>{{ $details->sevenPersonType }}</td>
                    <td>{{ $details->sevenPersonId }}</td>

                </tr>
                @endif
                @if($details->eightPersonName != NULL)
                <tr>
                    <td>الفرد الثامن</td>
                    <td>{{ $details->eightPersonName }}</td>
                    <td>{{ $details->eightPersonType }}</td>
                    <td>{{ $details->eightPersonId }}</td>

                </tr>
                @endif
                @if($details->ninePersonName != NULL)
                <tr>
                    <td>الفرد التاسع</td>
                    <td>{{ $details->ninePersonName }}</td>
                    <td>{{ $details->ninePersonType }}</td>
                    <td>{{ $details->ninePersonId }}</td>

                </tr>
                @endif
                @if($details->tenPersonName != NULL)
                <tr>
                    <td>الفرد العاشر</td>
                    <td>{{ $details->tenPersonName }}</td>
                    <td>{{ $details->tenPersonType }}</td>
                    <td>{{ $details->tenPersonId }}</td>

                </tr>
                @endif
            </tbody>
        </table>
        <form action="{{ route('details.destroy',$details->id) }}" method="post">
            @method('delete')
            @csrf
        <button type="submit" class="btn btn-danger">مسح</button>
        </form>
    </div>
</x-slot>
</x-app-layout>



</body>

</html>
