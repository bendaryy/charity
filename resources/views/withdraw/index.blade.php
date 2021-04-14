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
            <div style="text-align: center;margin: 20px 0">
                <a class="btn btn-success" href="{{ route('withdraw.create') }}">إنشاء صرف جديد</a>
            </div>
            <form action="{{ route('withdraw.index') }}" method="GET">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="البحث عن طريق  الكود">
                    <button type="submit" class="btn btn-primary">بحث</button>
                </div>

            </form>
            <table class="table table-dark">
                <thead>
                    <tr>

                        <th scope="col">الكود</th>
                        <th scope="col">الاسم</th>
                        <th scope="col">الرقم القومى</th>
                        <th scope="col">نوع االصرف</th>
                        <th scope="col">قيمة الصرف</th>
                        <th scope="col">الصرف من </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($withDraws as $withDraw )
                    <tr>
                        <td>{{ $withDraw->userDetails->id }}</td>
                        <td>{{ $withDraw->userDetails->name }}</td>
                        <td>{{ $withDraw->userDetails->NationalId }}</td>
                        <td>{{ $withDraw->type }}</td>
                        <td>{{ $withDraw->value }}</td>
                        <td>{{ $withDraw->charity->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


        </x-slot>
    </x-app-layout>
</body>

</html>
