<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{ asset('Font-endTA/css/trangchu.css') }}">
    <link rel="stylesheet" href="{{ asset('Font-endTA/css/sanpham.css') }}">
    <link rel="stylesheet" href="{{ asset('Font-endTA/css/header-sp.css') }}">

    <title>Tìm kiếm theo danh mục</title>

</head>

<body>
    <div class="container-fluid">
        <div class="wrapper">
            @include('TraAnh.header')
        </div>

        <!---end header-->
        <div class="container">
            <div class="row listproduct">
                @include('TraAnh.sanpham.danhmuc')
                <div class="col-md-9">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">

                                <h5 id="trasua">{{ $tendanhmuc->tendanhmuc }}</h5>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group col-md-7 col-lg-7" style="float: right;">

                                    <form action="">
                                        <select name="loc_sp" class="custom-select" onchange="this.form.submit();">
                                            <option {{ request('loc_sp') == 'moi_nhat' ? 'selected' : '' }}
                                                value="moi_nhat">Sản phẩm mới nhất</option>
                                            <option {{ request('loc_sp') == 'gia_thap_cao' ? 'selected' : '' }}
                                                value="gia_thap_cao">Giá từ: thấp đến cao</option>
                                            <option {{ request('loc_sp') == 'gia_cao_thap' ? 'selected' : '' }}
                                                value="gia_cao_thap">Giá từ: cao đến thấp</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row p-2">
                            @foreach ($danhmucthucuong as $value => $ts)
                                <div class="col-md-4 col-lg-4 mb-3"> 
                                    <div class="shadow-none p-3 mb-3 bg-light rounded ">
                                        <a onclick="favorite({{ $ts->id }})" class="add-thucuong-yeuthich" style="color:red"><i
                                                class="{{ $ts->like ? 'fas fa-heart' : 'far fa-heart text-dark' }}"></i></a>
                                        <div class="thumbnail">
                                            <a href="{{ url('TraAnh/xem-san-pham/' . $ts->id . '/' . $ts->slug) }}">
                                                <img class="img-fluid w-100"
                                                    src="{{ asset('public/uploads/anh/' . $ts->hinhanh) }}">
                                            </a>
                                            <div class="view-detail-layer">
                                                <a onclick="AddCart({{ $ts->id }})" href="javascript:"
                                                    title="Đặt Hàng">Đặt hàng</a>
                                            </div>
                                            <div class="caption text-center">
                                                <div class="prodName">
                                                    <h6 class="mt-2">{{ $ts->tensanpham }}</h6>
                                                </div>
                                                <div class="proPrice">
                                                    @if ($ts->giamgia != 0)
                                                        <span
                                                            class="proOfPirce"><del>{{ number_format($ts->giaban) }}đ</del></span>
                                                        <span class="proOfPirceSale" style="color: #21a321;
                                                                                        font-weight: 30px;
                                                                                        font-family: revert;
                                                                                        font-weight: 500;">
                                                            {{ number_format($ts->giamgia) }}đ</span>
                                                    @else
                                                        <span class="proOfPirce" style="color: #21a321;
                                                                                    font-weight: 30px;
                                                                                    font-family: revert;
                                                                                    font-weight: 500;">
                                                            {{ number_format($ts->giaban) }}đ</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                   

                    {{-- thức uống --}} 
                    <div class="container">
                        <div class="row p-2">
                            @foreach ($danhmucbanh as $value => $banh)
                                <div class="col-md-4 col-lg-4 mb-3">
                                    <div class="shadow-none p-3 mb-3 bg-light rounded ">
                                        <a onclick="favoriteCake({{ $banh->id }})" class="add-thucuong-yeuthich" style="color:red"><i
                                            class="{{ $banh->like ? 'fas fa-heart' : 'far fa-heart text-dark' }}"></i></a>
                                        <div class="thumbnail">
                                            <a href="{{ url('TraAnh/xem-banh/' . $banh->id . '/' . $banh->slug) }}">
                                                <img class="img-fluid w-100"
                                                    src="{{ asset('public/uploads/anh/' . $banh->hinhanh) }}">
                                            </a>
                                            <div class="view-detail-layer">
                                                <a onclick="AddCartCake({{ $banh->id }})" href="javascript:"
                                                    title="Đặt Hàng">Đặt hàng</a>
                                            </div>
                                            <div class="caption text-center">
                                                <div class="prodName">
                                                    <h6 class="mt-2">{{ $banh->tenbanh }}</h6>
                                                </div>
                                                <div class="proPrice">
                                                    @if ($banh->giamgia != 0)
                                                        <span
                                                            class="proOfPirce"><del>{{ number_format($banh->giaban) }}đ</del></span>
                                                        <span class="proOfPirceSale" style="color: #21a321;
                                                                                        font-weight: 30px;
                                                                                        font-family: revert;
                                                                                        font-weight: 500;">
                                                            {{ number_format($banh->giamgia) }}đ</span>
                                                    @else
                                                        <span class="proOfPirce" style="color: #21a321;
                                                                                    font-weight: 30px;
                                                                                    font-family: revert;
                                                                                    font-weight: 500;">
                                                            {{ number_format($banh->giaban) }}đ</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="wrapper">
            @include('TraAnh.footer')
        </div>
    </div>
    <button id="myBtn" title="Về đầu trang"><i class="fas fa-arrow-alt-circle-up fa-3x"></i></button>

    </div>
    <script>
        window.onscroll = function() {
            scrollFunction()
        };

        function AddCartCake(id) {

            $.ajax({

                url: `{{ asset('TraAnh/Add-Cart-Cake/${id}') }}`,
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
        function favoriteCake(id) {
            //console.log('ádf'){{ asset('add-cake-favorite/${id}') }}
            $.ajax({
             
                url:    `{{ asset('TraAnh/add-cake-favorite/${id}') }}`,
                type: "GET",
            }).done(function(response) {
                if (response) {

                    if(response.fail) {
                        alertify.warning(response.fail);
                    }else{
                        alertify.success('Đã thêm yêu thích thành công');
                    }
 
                    setTimeout(() => {

                        location.reload();
                    }, 1000);
                }

            });
        }
        function favorite(id) {
            

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
    </script>
</body>

</html>
