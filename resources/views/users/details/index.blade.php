<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        table,tr,th,td{
            text-align: center
        }
    </style>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">



                    <form action="{{ route('details.index') }}" method="GET">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control" placeholder="البحث عن طرق الرقم القومى">
                            <button type="submit" class="btn btn-primary">بحث</button>
                        </div>

                    </form>
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>

                                <th scope="col">كود العميل</th>
                                <th scope="col">الإسم</th>
                                <th scope="col"> تاريخ البحث</th>
                                <th scope="col">الرقم القومى</th>
                                <th scope="col"> العمل </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($details as $detail)
                            <tr>
                                <td>{{ $detail->id }}</td>
                                <td>{{ $detail->name }}</td>
                                <td>{{ $detail->SearchDate }}</td>
                                <td>{{ $detail->NationalId }}</td>
                                <td>
                                    <a href="{{ route('details.show',$detail->id) }}" class="btn btn-primary">عرض البيانات</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

        </x-slot>
    </x-app-layout>






</body>

</html>
