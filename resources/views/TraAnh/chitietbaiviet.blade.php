<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bài viết</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('Font-endTA/css/trangchu.css') }}">
    <link rel="stylesheet" href="{{ asset('Font-endTA/css/sanpham.css') }}">
    <link rel="stylesheet" href="{{ asset('Font-endTA/css/header-sp.css') }}">

</head>

<body>

    <div class="container-fluid">
        <div class="wrapper">
          @include('TraAnh.header')
          @yield('baiviet')
          @yield('chitietbaiviet')
          @include('TraAnh.footer')
       </div>
    </div>
</body>

</html>
