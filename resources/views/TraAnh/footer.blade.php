 <!-- Footer -->
 <div class="container-fluid">
    <!-- Footer -->
    <footer class="page-footer font-small unique-color-dark ">
        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left mt-5 pt-4 pb-0">

        <!-- Grid row -->
        <div class="row mt-3">

            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

            <!-- Content -->
            <h6 class="text-uppercase font-weight-bold"></h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <div>
                <a href="https://www.facebook.com/traanhcantho" target="_blank">
                <img src="{{ asset('Font-endTA/img/banner/C0.PNG') }}" class="w-75">
                </a>
            </div>
            </div>
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

            <!-- Links -->
            <h6 class="text-uppercase font-weight-bold text-success">Liên hệ</h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>
                <i class="fas fa-home mr-3"></i>số 13, đường Nguyễn Văn Cừ, phường An Khánh, Quân Ninh Kiều, TP Cần Thơ</p>
            <p>
                <i class="fas fa-envelope mr-3"></i> TraAnh-cskh@gamil.com</p>
            <p>
                <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
            <p>
                <i class="fas fa-print mr-3"></i> + 01 234 567 89</p>

            </div>
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

            <!-- Links -->
                <h6 class="text-uppercase font-weight-bold text-success">Về chúng tôi</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <a href="{{ route('baiviet') }}" class="text-dark">Giới thiệu về Trà Anh</a>
                </p>
                <p>
                    <a href="{{ url('/cua-hang') }}" class="text-dark">Cửa hàng</a>
                </p>
            </div>
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

            <!-- Links -->
            <h6 class="text-uppercase font-weight-bold text-success">Chính sách</h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>
                <a href="{{ url('/Hinh-thuc-thanh-toan') }}" class="text-dark">Hình thức thanh toán</a>
            </p>
            <p>
                <a href="{{ url('/Van-chuyen-giao-nhan') }}" class="text-dark">Vận chuyển giao nhận</a>
            </p>
            <p>
                <a href="#!"class="text-body">Đổi trả và hoàn tiền</a>
            </p>

            </div>


        </div>
        <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3 border-top border-success" style="color:white;background-color: rgb(38 114 42);">© 2020 Copyright:
        <a href="https://www.facebook.com/traanhcantho"target="_blank" style="color:white;">by TraAnh </a>
        </div>
        <!-- Copyright -->

    </footer>
</div>
<!-- Footer -->
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

    function favorite(id) {
    
        $.ajax({

            url: `{{ asset('/TraAnh/yeu-thich/${id}') }}`
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
