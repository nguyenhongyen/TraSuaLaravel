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
            <h3 class="text-center p-4">QUY ĐỊNH VÀ HÌNH THỨC THANH TOÁN</h3>
            <p>Chúng tôi hỗ trợ các phương thức thanh toán linh hoạt và an toàn cho tất cả các Khách hàng mua sắm tại Trang Web bằng các hình thức sau:</p></br>
            <p>1. Thanh toán bằng tiền mặt khi nhận hàng(COD)</p>
            <p>2. Thanh toán trực tuyến bằng thẻ ngân hàng(Visa, ATM,...)</p>
            <p>3. Thanh toán trực tuyến bằng ví điện tử</p>
            <br>
            <p>Thanh toán trực tuyến : Khách hàng thanh toán tiền mua hàng qua tài khoản sau:
            </p><br>
            <p>- Số tài khoản: 21600000114746</p>
            <p>- Chủ tài khoản: Trà Anh Cần Thơ</p>
            <p>- Tại ngân hàng: Ngân hàng Sacombank - Chi nhánh Cần Thơ</p>
            <br>
            <p>Quý khách sẽ phải trả đủ số tiền mua hàng tại thời điểm đặt hàng bằng cách điền đầy đủ thông tin thẻ tín dụng hoặc thẻ ghi nợ được phát hành bởi ngân hàng được chúng tôi chấp nhận.</p>
        </br>
        <p>Quý Khách phải là người có đầy đủ quyền sử dụng thẻ hoặc tài khoản thanh toán được sử dụng để thanh toán các Đơn hàng đặt trên Web.</p>
        <br>
        <p>Quý Khách có trách nhiệm đảm bảo rằng thẻ ngân hàng dùng để thực hiện thanh toán trực tuyến cho chúng tôi vẫn còn thời hạn sử dụng ngay tại thời điểm quý khách đặt hàng.</p>

       </div>
         <div class="wrapper">
          @include('TraAnh.footer')
            </div>
    </div>
</body>

</html>
