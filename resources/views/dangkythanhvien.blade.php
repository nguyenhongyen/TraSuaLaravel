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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=STIX+Two+Text&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('Font-endTA/css/chitietsanpham.css') }}">
    <link rel="stylesheet" href="{{ asset('Font-endTA/css/sanpham.css') }}">
    <link rel="stylesheet" href="{{ asset('Font-endTA/css/header-sp.css') }}">
    <link rel="stylesheet" href="{{ asset('Font-endTA/css/trangchu.css') }}">
    <link rel="stylesheet" href="{{ asset('Font-endTA/css/dangkythanhvien.css') }}">
    <title>Đăng ký thành viên</title>
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
                    <li class="breadcrumb-item active" aria-current="page">Đăng ký thành viên</li>
                </ol>
            </nav>
        </div>


        <div class="container">
            <div class="row">
                <div class="container">
                    <h3 class="text-center">Đăng ký thành viên</h3>

                    <form action="{{ route('postdangky') }}" method="POST" class="mx-auto dangky" enctype="multipart/form-data">
                        @csrf
                        {{-- thông báo thêm dữ liệu không thành công --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- thông báo thêm dữ liệu thành công --}}
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Họ và tên</label>
                            <input type="text" name="name" class="form-control" id="hoten" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mật khẩu</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nhập lại mật khẩu</label>
                            <input type="password" name="re_password" class="form-control" id="re_password" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số điện thoại</label>
                            <input type="text" name="phone" class="form-control" id="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Địa chỉ</label>
                            <input type="text" name="address" class="form-control" id="address" required>
                        </div>
                        <button type="submit" class="btn btn-primary ">Đăng ký</button>
                    </form>

                </div>
            </div>

        </div>
    </div>




    @include('TraAnh.footer')


</body>

</html>
