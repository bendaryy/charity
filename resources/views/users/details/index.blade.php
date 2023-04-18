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
            text-align: center;
            white-space: nowrap;
        }

        ul.pagination li.active a {
            background-color: red;
            /* Change the color to your preferred color */
            color: #fff;
            /* Change the color to your preferred color */
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

            @if(Route::is('details.index'))
            <div style="float: right;padding:10px" class="text-light bg-dark">
                عدد المستفيدين : {{ $details->total() }}
            </div>
            @endif
            <p style="width: 50%;margin:auto;text-align: center">

                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    إضافة الى فئة
                </button>
            </p>
            <div class="collapse" id="collapseExample" style="width: 50%;margin:auto;text-align: center">
                <div class="card card-body">

                    <select required name="category_id" id="CategoryId">
                        <option value="">... اختر الفئة</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <button type="button" style="display: none" class="btn btn-primary"
                        id="submitButton">إضــــافة</button>
                </div>
            </div>






            <form action="{{ route('details.search') }}" method="post">
                @csrf
                @method('post')

                <div class="col-md-4" style="margin: 30px auto">
                    <input type="text" name="search" class="form-control" placeholder="بحث">
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
                        <th scope="col">#</th>
                        <th scope="col">كود العميل</th>
                        <th scope="col">الإسم</th>
                        <th scope="col">الجمعية</th>
                        <th scope="col">الفئة</th>
                        <th scope="col"> تاريخ الإضافة</th>
                        <th scope="col">الرقم القومى</th>
                        <th scope="col">صورة الرقم القومى القومى</th>
                        <th scope="col" colspan="2"> التحكم </th>
                    </tr>
                </thead>
                <form id="MyFormNew" method="get" action="{{ route('updateCategory') }}">
                    {{-- @csrf
                    @method('post') --}}
                    <tbody>
                        @foreach ($details as $detail)
                        <tr>
                            <td><input type="checkbox" name="users[]" value="{{ $detail->id }}"></td>

                            <td>{{ $detail->id }}</td>
                            <td>{{ $detail->name }}</td>
                            <td>{{ $detail->branch->name }}</td>
                            @if(isset($detail->category->name))
                            <td>{{ $detail->category->name }}</td>
                            @else
                            <td style="color:red">لا ينتمى الى اى فئة</td>
                            @endif
                            <td>{{ $detail->SearchDate }}</td>
                            <td>{{ $detail->NationalId }}</td>
                            @if($detail->id_image != NUlL)
                            <td><a class="btn btn-secondary" href="{{ env('APP_URL').'/public/storage/'.$detail->id_image }}" target="_blank">عرض الصورة</a> </td>
                            @else
                            <td><p class="btn btn-danger">لا يوجد صورة بطاقة</p></td>
                            @endif
                            <td>
                                <a href="{{ route('details.show',$detail->id) }}" class="btn btn-primary">عرض
                                    البيانات</a>
                            </td>
                            <td>
                                {{-- <form method="get" action="{{ route('details.edit',$detail->id) }}">
                                    @method("get")
                                    @csrf
                                    <button type="submit" class="btn btn-success">تعديل البيانات</button>
                                </form> --}}
                                <a href="{{ route('details.edit',$detail->id) }}" class="btn btn-success">تعديل
                                    البيانات</a>

                            </td>
                            {{-- <td>
                                <form action="{{ route('details.destroy',$detail->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"
                                        onclick="confirm('هل تريد مسح هذا المستخدم؟')">مسح</button>
                                </form>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </form>
            </table>
            @if(Route::is('details.index'))
            <div style="direction: rtl">

                {{ $details->links() }}
            </div>
            @endif
            @endrole

            @role('admin')
            @if(Route::is('details.index'))
            <div style="float: right;padding:10px" class="text-light bg-dark">

                عدد المستفيدين : {{ $allDetails->total() }}
            </div>
            @endif
            <form action="{{ route('details.search2') }}" method="post">
                @csrf
                @method("post")
                <div class="col-md-4" style="margin: 30px auto">
                    <input type="text" name="search2" class="form-control" placeholder="بحـــث">
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

                        <td>
                            <form method="post" action="{{ route('details.edit',$detail->id) }}">
                                @method("POST")
                                @csrf
                                <button type="submit" class="btn btn-success">تعديل البيانات</button>
                            </form>

                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
            @if(Route::is('details.index'))
            {{ $allDetails->links() }}
            @endif
            @endrole
        </x-slot>
    </x-app-layout>



    {{-- <script>
        function submitForm() {
            document.getElementById('MyForm').submit();
        }
    </script> --}}





    {{-- <script>
        $(function() {
            $('form').submit(function() {
                $('#email').attr('name', 'email');
                $('form').append($('#email'));
            });
        });
        
    </script> --}}


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#submitButton').click(function() {
                $('#CategoryId').appendTo('#MyFormNew');
                $('#MyFormNew').submit();
            });
        });

        $(document).ready(function() {
            $('#CategoryId').change(function() {
              if ($(this).val() === '') {
                $('#submitButton').hide();
              } else {
                $('#submitButton').show();
              }
            });
          });

       
    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>



</body>

</html>