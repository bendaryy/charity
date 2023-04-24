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
            <div style="float: right;padding:10px" class="text-light bg-dark">
                عدد الصرف : {{ $withDraws->total() }}
            </div>
            @if(session()->has('success'))
            <div class="alert alert-success" style="text-align: center">
                {{ session()->get('success') }}
            </div>
            @endif
            @role('user')
            @permission('charity_create')
            <div style="text-align: center;margin: 20px 0">
                <a class="btn btn-success" href="{{ route('withdraw.create') }}">إنشاء صرف جديد</a>
            </div>
            @endpermission
            @endrole
            {{-- <form action="{{ route('withdraw.index') }}" method="GET">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="البحث عن طريق  الكود">
                    <button type="submit" class="btn btn-primary">بحث</button>
                </div>

            </form> --}}

            <form action="{{ route('search') }}" method="get">
                {{--  @csrf  --}}
                {{--  @method('get')  --}}
                <br>
                <div class="container">
                    <div class="row">
                        <div class="container-fluid">
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <input type="date" value="{{request()->has('toDate')?request('toDate'):''}}" name="toDate" id="from" required>
                                </div>
                                <label for="date" class="col-form-label col-sm-2">التاريخ إلى</label>
                                <div class="col-sm-2">
                                    <input type="date" value="{{request()->has('fromDate')?request('fromDate'):''}}" name="fromDate" id="fromDate" required>
                                </div>
                                <label for="date" class="col-form-label col-sm-2">التاريخ من</label>
                                <div class="col-sm-2">
                                    <input type="text" name="text" value="{{request()->has('text')?request('text'):''}}" placeholder="بحث">
                                </div>
                                <label class="col-form-label col-sm-1" style="margin-left: 30px">إختيارى</label>
                                <div class="col-sm-6" style="margin: auto;text-align: center;margin-top:20px">
                                    <button type="submit" class="btn btn-primary">بحث</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
            <table class="table table-dark" style="text-align: center">
                <thead>
                    <tr>

                        <th scope="col">الكود</th>
                        <th scope="col">الاسم</th>
                        <th scope="col">الرقم القومى</th>
                        <th scope="col">نوع الصرف</th>
                        <th scope="col">تاريخ الصرف</th>
                        <th scope="col">قيمة الصرف</th>
                        <th scope="col">الصرف من </th>
                        <th scope="col">بيانات المستفيد</th>
                        <th scope="col"> مسح</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($withDraws as $withDraw )
                    <tr>
                        <td>{{ $withDraw->userDetails->id }}</td>
                        <td>{{ $withDraw->userDetails->name }}</td>
                        <td>{{ $withDraw->userDetails->NationalId }}</td>
                        <td>{{ $withDraw->type }}</td>
                        <td>{{ $withDraw->date }}</td>
                        <td>{{ $withDraw->value }}</td>
                        <td>{{ $withDraw->charity->name }}</td>
                        <td>
                            <a href="{{ route('details.show',$withDraw->userDetails->id) }}" class="btn btn-info">عرض
                                بيانات المستفيد</a>
                        </td>
                        <form action="{{ route('withdraw.destroy',$withDraw->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <td>
                                <button class="btn btn-danger" type="submit"
                                    onclick="confirm('هل تريد مسحها؟')">مسح</button>
                            </td>
                        </form>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="direction: rtl">

                {{ $withDraws->links() }}
            </div>
        </x-slot>
    </x-app-layout>
</body>

</html>