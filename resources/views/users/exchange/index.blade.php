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
        tr,
        td {
            text-align: center
        }
    </style>
</head>

<body>


    <x-app-layout>
        <x-slot name="header">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">كود</th>
                        <th scope="col">إسم المستخدم الأساسى</th>
                        <th scope="col">الرقم القومى</th>
                        <th scope="col">الصرف</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td>{{ $details->id }}</td>
                        <td>{{ $details->name }}</td>
                        <td>{{ $details->NationalId }}</td>
                        <td>
                            <a href="" class="btn btn-success">إنشاء صرف جديد</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h1 style="text-align: center;margin:30px 0;font-size: 25px">المصروف سابقاً</h1>

        </x-slot>
    </x-app-layout>


</body>

</html>
