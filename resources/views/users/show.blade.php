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
            <table class="table">
                <thead>
                    <tr>

                        <th scope="col">الإسم</th>
                        <th scope="col">الإيميل</th>
                        <th scope="col">الجمعية المسئول عنها</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->charity->name }}</td>

                    </tr>
                </tbody>
            </table>
        </x-slot>
    </x-app-layout>
</body>

</html>
