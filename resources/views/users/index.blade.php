<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">


                <h2 style="text-align: center">عدد الأعضاء ({{ count($users) }})</h2>


                <table class="table table-striped">
                    <thead>
                        <tr>

                            <th scope="col">الإسم</th>
                            <th scope="col">البريد الإلكترونى</th>
                            <th colspan="3">تصرف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>

                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            @permission('users_read')
                            <td>عرض</td>
                            @endpermission
                            @permission('users_delete')
                            <td>مسح</td>
                            @endpermission
                            @permission('users_update')
                            <td>تعديل</td>
                            @endpermission

                        </tr>
                        @endforeach
                    </tbody>
                </table>

        </x-slot>
    </x-app-layout>


</body>

</html>
