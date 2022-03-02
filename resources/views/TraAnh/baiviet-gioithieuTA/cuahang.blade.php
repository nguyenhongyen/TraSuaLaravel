<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cửa hàng | Trà Anh</title>
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
        <div class="container-fluid">
            <img src="{{ asset('Font-endTA/img/banner/Capt.PNG') }}" class="mx-auto d-block">
        </div>
        <div class="container">
            <h2 class="text-center p-4">CỬA HÀNG</h2>
                <p>Hệ thống cửa hàng Trà Anh hiện nay đã có mặt khắp thành phố CẦn Thơ,
                    trong tương lai Trà Anh hứa hẹn sẽ đến gần hơn với địa chỉ nhà bạn
                    cũng như gần hơn với mong đợi về một thức uống hoàn hảo của bạn, cùng Chin điểm qua một số địa điểm tiêu biểu nhé:</p>
                    <p><i class="fas fa-map-marker-alt"style="color:green;"></i> Chi nhánh 1: 117 đường Nguyễn Văn Cừ Nối Dài, quận Ninh Kiều, TP Cần Thơ</p>
                    <p><i class="fas fa-map-marker-alt" style="color:green;"></i> Chi nhánh 2: 190 đường 3/2,quận Ninh Kiều, TP Cần Thơ</p>
                    <p><i class="fas fa-map-marker-alt"style="color:green;"></i> Chi nhánh 3: 164A đường Phạm Hùng, quận Cái Răng, TP Cần Thơ</p>
                    <p><i class="fas fa-map-marker-alt pb-4"style="color:green;"></i> Chi nhánh 4: 158 đường Trần Quang Diệu, quận Ninh Kiều, TP Cần Thơ</p>

                    <h4><i class="fas fa-home  p-2"></i> Mở cửa từ: 7h30 - 22h30</h4>
                    <h4><i class="fas fa-phone "></i> HỖ TRỢ KHÁCH HÀNG: 01 234 567 88 </h4>
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.619078598144!2d105.76802921461584!3d10.048258292818078!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a089df0e1c2243%3A0x1fbd4b982f84ffd4!2zVHLDoCBBbmggLSDEkOG6rW0gdHLDoCAmIFRo4bqhY2ggdHXGoWkgLSBOZ3V54buFbiBWxINuIEPhu6s!5e0!3m2!1svi!2s!4v1636123198228!5m2!1svi!2s" width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

        </div>
        <div class="wrapper">
            @include('TraAnh.footer')
        </div>
    </div>
</body>

</html>
