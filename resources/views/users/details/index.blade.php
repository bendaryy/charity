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
        tr,
        th,
        td {
            text-align: center
        }

        input[type="text"] {
            border: 1px solid black;
            width: 400px;
            height: 40px;
            padding: 0 15px
        }
    </style>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">

            @role('user')
            <form action="{{ route('details.search') }}" method="POST">
                @csrf
                @method("POST")
                <div class="col-md-4" style="margin: 30px auto">
                    <input type="text" name="search" class="form-control" placeholder="البحث عن طرق الرقم القومى">
                    <button style="position: absolute;
                            top: 0;
                            bottom: 0;
                            right: -7px;
                            background: #2ccd78;
                            color: white;
                            padding: 0 15px;
                            letter-spacing: 1.2px;
                            border: none;
                            cursor: pointer;" type="submit" class="btn btn-primary">بحث</button>
                </div>

            </form>
            @if(session()->has('success'))
            <div class="alert alert-success" style="text-align: center">
                {{ session()->get('success') }}
            </div>
            @endif
            @if(session()->has('delete'))
            <div class="alert alert-danger" style="text-align: center">
                {{ session()->get('delete') }}
            </div>
            @endif
            <table class="table table-striped table-dark">
                <thead>
                    <tr>

                        <th scope="col">كود العميل</th>
                        <th scope="col">الإسم</th>
                        <th scope="col">الجمعية</th>
                        <th scope="col"> تاريخ البحث</th>
                        <th scope="col">الرقم القومى</th>
                        <th scope="col" colspan="3"> التحكم </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                    <tr>
                        <td>{{ $detail->id }}</td>
                        <td>{{ $detail->name }}</td>
                        <td>{{ $detail->branch->name }}</td>
                        <td>{{ $detail->SearchDate }}</td>
                        <td>{{ $detail->NationalId }}</td>
                        <td>
                            <a href="{{ route('details.show',$detail->id) }}" class="btn btn-primary">عرض البيانات</a>
                        </td>
                        <td>
                            <form method="post" action="{{ route('details.edit',$detail->id) }}" >
                                @method("POST")
                                @csrf
                                <button type="submit" class="btn btn-success">تعديل البيانات</button>
                            </form>

                        </td>
                        <td>
                            <form action="{{ route('details.destroy',$detail->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="confirm('هل تريد مسح هذا المستخدم؟')">مسح</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            @endrole

            @role('admin')
            <form action="{{ route('details.search2') }}" method="POST">
                @csrf
                @method("POST")
                <div class="col-md-4" style="margin: 30px auto">
                    <input type="text" name="search2" class="form-control" placeholder="البحث عن طرق الرقم القومى">
                    <button style="position: absolute;
                            top: 0;
                            bottom: 0;
                            right: -7px;
                            background: #2ccd78;
                            color: white;
                            padding: 0 15px;
                            letter-spacing: 1.2px;
                            border: none;
                            cursor: pointer;" type="submit" class="btn btn-primary">بحث</button>
                </div>
                @if(session()->has('success'))
                <div class="alert alert-success" style="text-align: center">
                    {{ session()->get('success') }}
                </div>
                @endif

            </form>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>

                        <th scope="col">كود العميل</th>
                        <th scope="col">الإسم</th>
                        <th scope="col">الجمعية</th>
                        <th scope="col"> تاريخ البحث</th>
                        <th scope="col">الرقم القومى</th>
                        <th scope="col" colspan="2"> التحكم </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allDetails as $detail)
                    <tr>
                        <td>{{ $detail->id }}</td>
                        <td>{{ $detail->name }}</td>
                        <td>{{ $detail->branch->name }}</td>
                        <td>{{ $detail->SearchDate }}</td>
                        <td>{{ $detail->NationalId }}</td>
                        <td>
                            <a href="{{ route('details.show',$detail->id) }}" class="btn btn-primary">عرض البيانات</a>
                        </td>

                        {{-- <td>
                            <form method="post" action="{{ route('details.edit',$detail->id) }}" >
                                @method("POST")
                                @csrf
                                <button type="submit" class="btn btn-success">تعديل البيانات</button>
                            </form>

                        </td> --}}

                    </tr>
                    @endforeach

                </tbody>
            </table>

            @endrole
        </x-slot>
    </x-app-layout>






</body>

</html>
