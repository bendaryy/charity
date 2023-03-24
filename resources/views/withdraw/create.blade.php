<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        form {
            text-align: center
        }
    </style>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <form action="{{ route('withdraw.store') }}" method="POST">
                @method("POST")
                @csrf
                <h4 for="type" style="font-size: 20px;font-weight: bold;margin:10px">نوع الصرف</h4>
                <div class="form-check" style="margin-bottom: 10px">
                    @foreach ($exchanges as $ex)
                    <input class="form-check-input" type="radio" required value="{{ $ex->name }}" name="type">
                    <label class="form-check-label">
                        {{$ex->name}}
                    </label><br>

                    @endforeach
                    <a href="{{ route('exchange.create') }}" class="btn btn-primary">إضافة نوع صرف جديد</a>
                </div>
                <h4 style="font-size: 20px;font-weight: bold;margin:10px"> العدد / قيمة الصرف</h4>
                <input type="text" required name="value">



                <h2>اختر المستفيد من الصرف</h2>
                <select required name="details_id" id="details_id" class="select2 form-control" style="width: 30%">
                    <option value="" disabled selected="true">اختر المستفيد</option>
                    @foreach($details as $detail)
                    <option value="{{ $detail->id }}">
                        <h2>الإسم :{{ $detail->name }}</h2>
                        <h2> الرقم القومى : {{ $detail->NationalId }}</h2>
                        <h2> عدد الإبناء : {{ $detail->personsNumbers }}</h2>
                    </option>
                    @endforeach
                </select>

                <h4 for="type" style="font-size: 20px;font-weight: bold;margin:10px">تاريخ الصرف</h4>
                <input type="date" name="date" value="<?php echo date("Y-m-d");?>">
                <h4 style="font-size: 20px;font-weight: bold;margin:10px"> التفاصيل</h4>
                <textarea name="details" id="" cols="30" rows="10"></textarea>
                <div style="background: black;color:white;margin:20px;pading:20px">
                    <h2 id="hamada" style="padding:20px"></h2>
                </div>
                <div>

                    <button class="btn btn-success">إضافة</button>
                </div>
            </form>
        </x-slot>
    </x-app-layout>
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
$('.select2').select2();
});


$('#details_id').change(function() {
    var selectPerson = $(this).val();
   // $("#hamada").html("test");
    $.ajax({
      url: selectPerson,
      method: 'GET',
      success: function(response) {
        // Display the response in the div element with the ID 'my-div'
        $('#hamada').html("اخر تاريخ صرف بتاريخ : " + response['date']  + "<br>" + " العدد المصروف :  " + (response['value']) + "<br>" +  " نوع الصرف : " + response['type']);
        console.log(response);
        if( typeof response['date'] !== 'undefined'){
            alert("اخر تاريخ صرف بتاريخ : " + response['date']  + '\n' + " العدد المصروف :  " + (response['value']) + '\n' +  " نوع الصرف : " + response['type'] )
            
        }else{
            alert('لم يتم الصرف له من قبل')
            $('#hamada').html("لم يتم الصرف له من قبل");
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        // Handle the error case
      }
    });
  });


    </script>
</body>

</html>