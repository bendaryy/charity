<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        form {
            text-align: center
        }
    </style>
</head>

<body>
    <x-app-layout>

        <x-slot name="header">
            <h1 style="text-align: center;font-size: 30px">بيانات المستفيد من الصرف</h1>
            <div>

                <table class="table table-bordered table-dark text-center" style="width: 70%;margin: auto">
                    <thead>
                        <tr>
                            <th scope="col">{{ $details->name }}</th>
                            <th scope="col">الإسم</th>
                        </tr>
                        @if($withDraw)

                        <tr>
                            <th scope="col">{{ $withDraw->date }}</th>
                            <th scope="col">اخر تاريخ صرف</th>
                        </tr>
                        <tr>
                            <th scope="col">{{ $withDraw->type }}</th>
                            <th scope="col">نوع الصرف</th>
                        </tr>
                        <tr>
                            <th scope="col">{{ $withDraw->value }}</th>
                            <th scope="col">الكمية</th>
                        </tr>
                        @else
                        <tr>
                            <th scope="col" style="color: red">لم يتم الصرف له من قبل</th>
                            <th scope="col">اخر تاريخ صرف</th>
                        </tr>
                        @endif
                        <tr>
                            <th scope="col">{{ $details->category->name }}</th>
                            <th scope="col">الفئة</th>
                        </tr>
                    </thead>

                </table>
            </div>

            <hr style="border: 2px solid black">
            <form action="{{ route('storeWithdraw') }}" method="POST">
                @method("POST")
                @csrf
                <h4 for="type" style="font-size: 20px;font-weight: bold;margin:10px">نوع الصرف</h4>
                <div class="form-check" style="margin-bottom: 10px">
                    @foreach ($exchanges as $ex)
                    <input class="form-check-input" type="radio" required value="{{ $ex->name }}" name="type">
                    <label class="form-check-label">
                        {{$ex->name}}
                    </label><br>

                    @endforeach
                    <a href="{{ route('exchange.create') }}" class="btn btn-primary">إضافة نوع صرف جديد</a>
                </div>
                <h4 style="font-size: 20px;font-weight: bold;margin:10px"> العدد / قيمة الصرف</h4>
                <input type="text" required name="value">
                <input type="hidden" name="details_id" value="{{ $details->id }}">





                <h4 for="type" style="font-size: 20px;font-weight: bold;margin:10px">تاريخ الصرف</h4>
                <input type="date" required name="date" value="<?php echo date(" Y-m-d");?>">
                <h4 style="font-size: 20px;font-weight: bold;margin:10px"> التفاصيل</h4>
                <textarea name="details" id="" cols="30" rows="10"></textarea>
                {{-- <div style="background: black;color:white;margin:20px;pading:20px">
                    <h2 id="hamada" style="padding:20px"></h2>
                </div> --}}


                <div>

                    <button class="btn btn-success">إضافة</button>
                </div>
            </form>
        </x-slot>
    </x-app-layout>


</body>

</html>