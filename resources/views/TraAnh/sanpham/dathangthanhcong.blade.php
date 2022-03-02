<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('Font-endTA/css/shopping-cart.css') }}">
    <link rel="stylesheet" href="{{ asset('Font-endTA/css/sanpham.css') }}">
    <link rel="stylesheet" href="{{ asset('Font-endTA/css/header-sp.css') }}">

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <title>Thanh toán</title>
    <style>
        .breadcrumb li a {
            color: rgb(32, 146, 32);
        }

    </style>
</head>

<body>
    <div class="container-fluid">
        @include('TraAnh.sanpham.header-sp')
    </div>
    <div class="container">
        <nav aria-label="breadcrumb " style="padding-top:82px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/TraAnh') }}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/TraAnh/Sanpham') }}">Sản phẩm</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/TraAnh/list-cart') }}">Giỏ hàng</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
            </ol>
        </nav>
        <div class="row pt-2">
            <div class="container">
                <h4 class="text-center">ĐẶT HÀNG THÀNH CÔNG</h4>
                <div class="text-center">
                    <img src="{{ asset('Font-endTA/img/icontraanh.jpg') }}" class="rounded" alt="dathangthanhcong" width="30%">
                 </div>
                 <p class="text-center">Vui lòng chờ Admin xét duyệt đơn hàng của bạn.</p>
            </div>
            <div class="container text-center">
                <a  class="btn btn-outline-success" href="{{ url('TraAnh/Sanpham') }}"><i class="fas fa-arrow-left"></i> TIẾP TỤC MUA HÀNG</a>
                <a  class="btn btn-outline-success" href="#"><i class="fas fa-arrow-right"></i> KIỂM TRA ĐƠN HÀNG</a>
            </div>


        </div>
</body>

</html>
