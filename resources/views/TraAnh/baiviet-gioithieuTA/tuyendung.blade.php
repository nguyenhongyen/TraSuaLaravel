<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bài viết</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

</head>

<body>

    <div class="container-fluid">
        <div class="wrapper">
            @include('TraAnh.header')
        </div>
        <div class="container p-3">
            <div class="row">
                <div class="col-md-7">
                    <h3 class="text-center p-4">YẾU TỐ TRỞ THÀNH NHÂN VIÊN TRÀ ANH</h3>
                    <div class="container ml-4">
                        <p><i class="far fa-star text-success"></i> Có kỹ năng giao tiếp ở mức khá – tốt.</p>
                        <p><i class="far fa-star text-success"></i> Khả năng giao tiếp ngoại ngữ là tiếng Anh ở mức cơ bản.</p>
                        <p><i class="far fa-star text-success"></i> Làm việc siêng năng, đi làm đúng giờ và đều đặn.</p>
                        <p><i class="far fa-star text-success"></i> Có sức khỏe tốt và có thể làm việc trong mô trường áp lực.</p>
                    </div>
                </div>
                <div class="col-md-4 pt-4">
                    <img src="{{ asset('Font-endTA/img/banner/b15.jpg') }}" class="w-100">
                </div>
            </div>
        </div>
            <div class="row p-4 ">
                <div class="container-fluid pb-4" style="background-color: rgb(243, 243, 240);">
                    <h2 class="text-center text-success p-4">VỊ TRÍ ĐANG TUYỂN DỤNG</h2>
                    <div class="container">
                    <table class="table table-striped ">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Vị trí</th>
                            <th scope="col">Nơi làm việc</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Ngày đăng</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Nhân viên pha chế</td>
                            <td>Chi nhánh: Nguyễn Văn Cừ</td>
                            <td>Ca 1: 7h30 - 12h</br>Ca 3: 17h30 - 22h30</td>
                            <td>15/08/2021</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Nhân viên phục vụ</td>
                            <td>Chi nhánh: Trần Chiên</td>
                            <td>Full time</td>
                            <td>2/09/2021</td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>Shipper giao hàng</td>
                            <td>Chi nhánh: Trần Chiên</td>
                            <td>Full time</td>
                            <td>2/09/2021</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                </div>

            </div>    

            <div class=" container">
                <div class="text-center">
                        <h3 class="text-center text-success p-4">CÁCH THỨC ỨNG TUYỂN</h3>
                        <div class="container ">
                            <button type="button" class="btn btn-success p-4">NỘP TRỰC TIẾP TẠI CỬA HÀNG</button>
                            <button type="button" class="btn btn-outline-success p-4">ỨNG TUYỂN ONLINE</button>
                        </div>
                </div>
            </div>
        <div class="wrapper">
            @include('TraAnh.footer')
        </div>
    </div>
    </div>
</body>

</html>
