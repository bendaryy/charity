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
            <form action="{{ route("exchange.store") }}" method="POST">
                @csrf
                <input type="text" name="name">
                <button type="submit" class="btn btn-success">إضافة </button>
            </form>
        </x-slot>
    </x-app-layout>
</body>

</html>
