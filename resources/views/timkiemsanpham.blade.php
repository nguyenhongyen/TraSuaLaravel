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
                    <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
                </ol>
            </nav>
        </div>


        <div class="container">
            <h4>Kết quả tìm kiếm cho từ khóa: "{{ $tukhoa }}"</h4>
            <div class="row pt-4">
                {{-- @php
                    $count = count($thucuong)
                @endphp
                @if($count==0)
                <p>Không tìm thấy kết quả phù hợp</p>
                @else --}}
                @foreach($thucuong as $key =>$value)
                <div class="col-md-6 col-lg-3 mb-5">

                    <div class="shadow-none p-3 mb-3 bg-light rounded ">
                         <a  href="#"><i class="far fa-heart text-dark"></i></a>
                        <div class="thumbnail">
                            <a href="{{ url('TraAnh/xem-san-pham/'.$value->id."/".$value->slug) }}">
                               <img class="img-fluid w-100"
                                src="{{ asset('public/uploads/anh/'.$value->hinhanh) }}">
                            </a>
                           <div class="view-detail-layer">
                                <a  href="javascript:">Đặt hàng</a>
                            </div>
                            <div class="caption text-center">
                                <div class="prodName">
                                <h6 class="mt-2">{{$value->tensanpham  }}  </h6>
                                </div>
                                <div class="proPrice">
                                    @if($value->giamgia != 0)
                                    <span class="proOfPirce"><del>{{number_format($value->giaban)}}đ</del></span>
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
                                    {{number_format($value->giaban)}}đ</span>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            {{-- </div>
            <div class="row pt-4"> --}}
                {{-- @php
                    $count = count($thucuong)
                @endphp
                @if($count==0)
                <p>Không tìm thấy kết quả phù hợp</p>
                @else --}}
                @foreach($banh as $key =>$value)
                <div class="col-md-6 col-lg-3 mb-5">

                    <div class="shadow-none p-3 mb-3 bg-light rounded ">
                         <a  href="#"><i class="far fa-heart text-dark"></i></a>
                        <div class="thumbnail">
                            <a href="{{ url('TraAnh/xem-banh/'.$value->id."/". $value->slug) }}">
                               <img class="img-fluid w-100"
                                src="{{ asset('public/uploads/anh/'.$value->hinhanh) }}">
                            </a>
                           <div class="view-detail-layer">
                                <a  href="javascript:">Đặt hàng</a>
                            </div>
                            <div class="caption text-center">
                                <div class="prodName">
                                <h6 class="mt-2">{{$value->tenbanh  }}  </h6>
                                </div>
                                <div class="proPrice">
                                    @if($value->giamgia != 0)
                                    <span class="proOfPirce"><del>{{number_format($value->giaban)}}đ</del></span>
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
                                    {{number_format($value->giaban)}}đ</span>
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


</body>

</html>
