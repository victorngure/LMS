<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LMS</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap2.min.css" rel="stylesheet"> 

    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <link href="{{ asset('public/css/sb-admin-2.css') }}" rel="stylesheet">

    <link href="{{ asset('//use.fontawesome.com/releases/v5.7.2/css/all.css') }}" rel="stylesheet" 
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link href="{{ asset('//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <link href="{{ asset('https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css') }}" rel="stylesheet" >

    <link href="{{ asset('https://app.dineandgift.com/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet">    

    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.27/daterangepicker.css') }}" rel="stylesheet">

    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        @include('layouts.partials._navigation')       
        @yield('content')    
    </div>
    @include('layouts.partials._footer')
    @include('layouts.partials._date_filter')
</body>
</html>