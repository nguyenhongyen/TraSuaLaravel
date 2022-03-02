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
        </div>
           <div class="container">
            <h3 class="text-center p-4">CHÍNH SÁCH VẬN CHUYỂN GIAO NHẬN</h3>
            <p>1. Các phương thức giao hàng hoặc cung ứng dịch vụ:</p>
            <p> - Giao hàng trực tiếp cho khách hàng tại cửa hàng.</p>
            <p> - Giao hàng tại địa chỉ mà khách hàng yêu cầu.</p><br>
            <p>2. Thời hạn ước tính cho việc giao hàng</p>
            <p> - Giao hàng trực tiếp cho khách hàng tại cửa hàng: Trong vòng 10 - 20 phút
            <p> - Giao hàng tại địa chỉ mà khách hàng yêu cầu: Trong vòng 30 - 45 phút</p>


       </div>
         <div class="wrapper">
          @include('TraAnh.footer')
            </div>
    </div>
</body>

</html>
