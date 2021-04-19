<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>
<style>
    table,
    tr,
    th,
    td {
        text-align: center;
    }
</style>

<body>
    <x-app-layout>
        <x-slot name="header">

            @if(session()->has('success'))
            <div class="alert alert-success" style="text-align: center">
                {{ session()->get('success') }}
            </div>
            @endif
            <h2 style="text-align: center">عدد الأعضاء ({{ count($users) }})</h2>


            <table class="table table-striped">
                <thead>
                    <tr>

                        <th scope="col">الإسم</th>
                        <th scope="col">البريد الإلكترونى</th>
                        <th scope="col">الفرع المسئول عنه </th>
                        <th colspan="3">تصرف</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>

                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->charity->name }}</td>
                        @permission('users_read')
                        <td>
                            <a class="btn btn-primary" href="{{ route('users.show',$user->id) }}">عرض</a>
                        </td>
                        @endpermission
                        @permission('users_delete')
                        <td>
                            <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                @method("DELETE")
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('هل انت متأكد من انك تريد مسح هذا الشخص؟!')">مسح</button>
                            </form>
                        </td>
                        @endpermission
                        @permission('users_update')
                        <td>
                            <a href="{{ route('users.edit',$user->id) }}" class="btn btn-success">تعديل</a>
                        </td>
                        @endpermission

                    </tr>
                    @endforeach
                </tbody>
            </table>

        </x-slot>
    </x-app-layout>


</body>

</html>
