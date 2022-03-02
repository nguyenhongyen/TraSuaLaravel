<!DOCTYPE html>
<html lang="en">

<head>
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



     <!-- CSS -->
     <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
     <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
     <!-- Default theme -->
     <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
     <!-- Semantic UI theme -->
     <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
     <!-- Bootstrap theme -->
     <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    <link rel="stylesheet" href="{{ asset('Font-endTA/css/chitietsanpham.css') }}">
    <link rel="stylesheet" href="{{ asset('Font-endTA/css/sanpham.css') }}">
    <link rel="stylesheet" href="{{ asset('Font-endTA/css/header-sp.css') }}">
    <link rel="stylesheet" href="{{ asset('Font-endTA/css/trangchu.css') }}">
    <title>Chi tiết sản phẩm</title>
    <style>


    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="wrapper">
        @include('TraAnh.header')
        </div>

    </div>
    <div class="container-fluid chitietsanpham">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('TraAnh') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('TraAnh/Thucuong') }}">Sản phẩm</a></li>
                    <li class="breadcrumb-item"><a
                            href="{{ url('TraAnh/Thucuong') }}">{{ $thucuong->danhmucsp->tendanhmuc }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $thucuong->tensanpham }}</li>
                </ol>
            </nav>
        </div>


        <div class="container">
            <div class="row pb-4">
                <div class="col-md-6 ">
                    <img class="w-75 img-thumbnail rounded mx-auto d-block "
                        src="{{ asset('public/uploads/anh/' . $thucuong->hinhanh) }}">
                </div>
                <div class="col-md-6 product">
                    <h2>{{ $thucuong->tensanpham }}</h2>
                    <p>{{ $thucuong->mota }}</p>
                    @if ($thucuong->giamgia != 0)
                        <span class="proOfPirce"
                            style="font-size:18px;"><del>{{ number_format($thucuong->giaban) }}đ</del></span>
                        <span class="proOfPirceSale" style="color: #21a321;
                                                        font-weight: 30px;
                                                        font-family: revert;
                                                        font-weight: 500;
                                                        font-size:25px;">
                            {{ number_format($thucuong->giamgia) }}đ</span>
                    @else
                        <span class="proOfPirce" style="color: #21a321;
                                                    font-weight: 30px;
                                                    font-family: revert;
                                                    font-weight: 500;
                                                    font-size:25px;">
                            {{ number_format($thucuong->giaban) }}đ</span>
                    @endif
                    <p><a onclick="AddCart({{ $thucuong->id }})" href="javascript:" title="Đặt Hàng"  class="btn btn-outline-success  btn-lg">Đặt hàng</a></p>

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="comment">
            <div class="title pb-3">
               <h4>Đánh giá</h4>
            </div>
            @if(Auth::guard('thanhvien')->check())
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                <form action="{{ url('nhan-xet/'.$thucuong->id) }}" method="POST" >
                    @csrf
                <div class="form-group pt-2">
                    <textarea class="form-control" name="noidung" rows="3" placeholder="Viết bình luận..."></textarea>
                     <button type="submit" class="btn btn-success">Nhận xét</button>
                </div>

            </form>
            @else
             <p>Vui lòng đăng nhập để nhận xét <a class="btn btn-success" href="{{ url('/TraAnh/Dang-nhap-thanh-vien') }}" role="button">Đăng nhập</a></p>
            @endif


        </div>
        <div class="list-commemt">
            <div class="container">
                 <h4>Nhận xét gần đây</h4>
                    @foreach($comment as $key => $value)
                        <div class="media pt-2">
                            <img src="{{ asset('Font-endTA/img/cute.jpg') }}" class="mr-3"alt="Thành viên" width="50" height="40">
                            <div class="media-body">
                            <span class="mt-0" style="font-size:18px;">{{ $value->thanhvien->name }}</span>
                            <span class="pl-2 text-muted" style="font-size:12px;">{{ $value->created_at }}</span>
                            <p>{{ $value->noidung }}</p>
                            </div>
                        </div>
                    @endforeach
            </div>

        </div>
    </div>


    <div class="container">
        <hr>
        <div class="container-fluid noibat thucuongnoibat">
            <div class="title pt-3">
                <h3 class="text-center text-uppercase font-weight-bold">Sản phẩm liên quan</h4>
                    <div class=" icon-title text-center">
                        <img src="{{ asset('Font-endTA/img/banner/latra.PNG') }}" height="50px">
                    </div>
            </div>
            <!-- end tên menu nổi bật -->
            <div class="row p-5 ">
                @foreach ($sanphamnoibat as $key => $value)
                    <div class="col-md-6 col-lg-3 mb-5">
                        <div class="shadow-none p-3 mb-3 bg-light rounded ">
                            <a href="#"><i class="far fa-heart"></i></a>
                            <div class="thumbnail">
                                <a href="{{ url('TraAnh/xem-san-pham/' .$value->id.'/'.$value->slug) }}">
                                    <img class="img-fluid w-100"
                                        src="{{ asset('public/uploads/anh/' . $value->hinhanh) }}">
                                </a>
                                <div class="view-detail-layer">
                                    <a onclick="AddCart({{ $value->id }})" href="javascript:" title="Đặt Hàng">Đặt
                                        hàng</a>
                                </div>
                                <div class="caption text-center">
                                    <div class="prodName">
                                        <h6 class="mt-2">{{ $value->tensanpham }}</h6>
                                    </div>
                                    <div class="proPrice">
                                        @if ($value->giamgia != 0)
                                            <span
                                                class="proOfPirce"><del>{{ number_format($value->giaban) }}đ</del></span>
                                            <span class="proOfPirceSale" style="color: #21a321;
                                                                            font-weight: 30px;
                                                                            font-family: revert;
                                                                            font-weight: 500;">
                                                {{ number_format($value->giamgia) }}đ</span>
                                        @else
                                            <span class="proOfPirce" style="color: #21a321;
                                                                        font-weight: 30px;
                                                                        font-family: revert;
                                                                        font-weight: 500;">
                                                {{ number_format($value->giaban) }}đ</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container-fluid noibat banhnoibat">
            <div class="title pt-3">
                <h3 class="text-center text-uppercase font-weight-bold">Có thể bạn thích</h4>
                    <div class=" icon-title text-center">
                        <img src="{{ asset('Font-endTA/img/banner/latra.PNG') }}" height="50px">
                    </div>
            </div>
            <!-- end tên menu nổi bật -->
            <div class="row p-5 ">
                @foreach ($banhnoibat as $key => $value)
                    <div class="col-md-6 col-lg-3 mb-5">
                        <div class="shadow-none p-3 mb-3 bg-light rounded ">
                            <a href="#"><i class="far fa-heart"></i></a>
                            <div class="thumbnail">
                                <a href="{{ url('TraAnh/xem-banh/' .$value->id."/". $value->slug) }}">
                                    <img class="img-fluid w-100"
                                        src="{{ asset('public/uploads/anh/' . $value->hinhanh) }}">
                                </a>
                                <div class="view-detail-layer">
                                    <a href="#" title="Đặt Hàng">Đặt hàng</a>
                                </div>
                                <div class="caption text-center">
                                    <div class="prodName">
                                        <h6 class="mt-2">{{ $value->tenbanh }}</h6>
                                    </div>
                                    <div class="proPrice">
                                        @if ($value->giamgia != 0)
                                            <span
                                                class="proOfPirce"><del>{{ number_format($value->giaban) }}đ</del></span>
                                            <span class="proOfPirceSale" style="color: #21a321;
                                                                            font-weight: 30px;
                                                                            font-family: revert;
                                                                            font-weight: 500;">
                                                {{ number_format($value->giamgia) }}đ</span>
                                        @else
                                            <span class="proOfPirce" style="color: #21a321;
                                                                        font-weight: 30px;
                                                                        font-family: revert;
                                                                        font-weight: 500;">
                                                {{ number_format($value->giaban) }}đ</span>
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
    @include('TraAnh.footer')
    </div>
</body>
<script>

    function AddCart(id) {
            $.ajax({

                url: 'http://localhost:1337/TrasuaLaravel/public/TraAnh/Add-Cart/' + id,
               // url: 'Add-Cart/' + id,
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

        function favorite(id) {
            $.ajax({

                url: 'yeu-thich/' + id,
                type: "GET",
            }).done(function(response) {
                if (response) {

                    if(response.fail) {
                        alertify.warning(response.fail);
                    }else{
                        alertify.success('Đã thêm yeu thich thanh cong');
                    }

                    // setTimeout(() => {

                    //     location.reload();
                    // }, 1000);
                }

            });
        }
</script>
</html>
