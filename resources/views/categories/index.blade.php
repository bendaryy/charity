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
            <form action="{{ route('categories.store') }}" method="post">
                @csrf
                @method('post')

                <div class="col-md-4" style="margin: 30px auto">
                    <input type="text" required name="name" class="form-control" placeholder="ادخل اسم الفئة">
                    <button style="position: absolute;
                            top: 0;
                            bottom: 0;
                            right: -7px;
                            background: #2ccd78;
                            color: white;
                            padding: 0 15px;
                            letter-spacing: 1.2px;
                            border: none;
                            cursor: pointer;" type="submit" class="btn btn-primary">إضافة جديد</button>
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

                        <th scope="col">إسم الفــئة</th>
                        {{--  <th scope="col">الإسم</th>
                        <th scope="col">الجمعية</th>
                        <th scope="col"> تاريخ البحث</th>
                        <th scope="col">الرقم القومى</th>
                        <th scope="col" colspan="3"> التحكم </th>  --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>

                        {{--  <td>
                            <form method="get" action="{{ route('details.edit',$detail->id) }}">
                                @method("get")
                                @csrf
                                <button type="submit" class="btn btn-success">تعديل البيانات</button>
                            </form>

                        </td>
                        <td>
                            <form action="{{ route('details.destroy',$detail->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger"
                                    onclick="confirm('هل تريد مسح هذا المستخدم؟')">مسح</button>
                            </form>
                        </td>  --}}
                    </tr>
                    @endforeach

                </tbody>
            </table>
            @endrole

        </x-slot>
    </x-app-layout>






</body>

</html>