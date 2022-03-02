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
                <div class="row justify-content-md-center">
                    <div class="col-md-5 border p-5">
                        <table class="table">
                            <h5 class="text-center p-2">Thông tin đơn hàng</h5>
                            <thead>
                                <tr>
                                    <th>SẢN PHẨM</th>
                                    <th>TỔNG CỘNG</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $key => $item)
                                    <tr>
                                        <td>{{ $item->name }} x {{ $item->qty }}</td>
                                        <td>{{ number_format($item->price * $item->qty) }} đ</td>

                                    </tr>

                                @endforeach
                                <tr>
                                    <th>Tổng cộng</th>
                                    <td>{{ Cart::subtotal(0) }} đ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col"></div>

                    <div class="col-md-6 border p-5">

                        <h4 class="text-center">Địa chỉ giao hàng</h4>

                        <form action="{{ route('dathang') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Tên của bạn:</label>
                                    <input type="name" name="full_name" class="form-control w3-input" id="name" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="phone">Số điện thoại:</label>
                                    <input type="phone" class="form-control" id="phone" name="phone" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <div class="form-group">
                                <label for="note">Ghi chú</label>
                                <textarea class="form-control" id="note" rows="3" name="note"></textarea>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="thanhtoan" id="chuyenkhoan" value="COD">
                                <label class="form-check-label" for="chuyenkhoan">Chuyển khoản ngân hàng</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="thanhtoan" id="tienmat" value="ATM" checked="checked">
                                <label class="form-check-label" for="tienmat"> Thanh toán bằng tiền mặt</label>
                            </div>

                            <button type="submit" class="btn btn-primary ">ĐẶT HÀNG</button>
                        </form>

                    </div>
                </div>
            </div>


        </div>
</body>

</html>
