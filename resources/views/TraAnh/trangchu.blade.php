<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trà Anh</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{ asset('Font-endTA/css/trangchu.css') }}">
    <link rel="stylesheet" href="{{ asset('Font-endTA/css/sanpham.css') }}">
    <link rel="stylesheet" href="{{ asset('Font-endTA/css/header-sp.css') }}">

    <!-- CSS -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

</head>

<body>

    <div class="container-fluid">
        <div class="wrapper">
            @include('TraAnh.header')

            @include('TraAnh.slider')
            @include('TraAnh.baiviet')
            @include('TraAnh.thucuongnoibat')
            @include('TraAnh.jumbo')
            @include('TraAnh.banhnoibat')
            @include('TraAnh.tintucsukien')
            @include('TraAnh.footer')
        </div>
        <button id="myBtn" title="Về đầu trang"><i class="fas fa-arrow-alt-circle-up fa-3x"></i></button>
    </div>
</body>
<script>
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {

        if (document.body.scrollTop > 600 || document.documentElement.scrollTop > 600) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

    document.getElementById('myBtn').addEventListener("click", function() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    });


    function AddCart(id) {
        $.ajax({

            url: `{{ asset('TraAnh/Add-Cart/${id}') }}`,
            type: "GET",
        }).done(function(response) {
            if (response) {
                alertify.success('Đã thêm giỏ hàng');
                setTimeout(() => {

                    location.reload();
                }, 1000);
            }

        });
    }

    function AddCartCake(id) {

        $.ajax({
            url: 'http://localhost:1337/TrasuaLaravel/public/TraAnh/Add-Cart-Cake/' + id,
            type: "GET",
        }).done(function(response) {
            if (response) {
                alertify.success('Đã thêm giỏ hàng');
                setTimeout(() => {

                    location.reload();
                }, 1000);
            }
        });
    }
    //cham hoi
    function favorite(id) {
        console.log(id)
        $.ajax({

            url: `{{ asset('TraAnh/yeu-thich/${id}') }}`,
            type: "GET",
        }).done(function(response) {
            if (response) {

                if (response.fail) {
                    alertify.warning(response.fail);
                } else {
                    alertify.success('Đã thêm yêu thích thành công');
                }

                setTimeout(() => {

                    location.reload();
                }, 1000);
            }

        });
    }
</script>

</html>
