<div class="top-bar d-flex flex-column flex-md-row align-items-center p-2 px-md-4  border-bottom shadow-sm ">
    <nav class="my-0 mr-md-auto font-weight-normal">
        <a class="p-2 text-white border-right" href="#" title="Call">Call us +84 867 333 222</a>
        <a class="p-2 text-white  border-right " href="#" title="Email">TraAnh-cskh@gmail.com</a>
        <a class="p-2 text-white" href="https://www.facebook.com/traanhcantho" target="_blank"><i class="fab fa-facebook-square" title="Facebook"></i></a>
        <a class="p-2 text-white" href="https://www.instagram.com/tiemtraanh_cantho/" target="_blank"><i class="fab fa-instagram" title="Instagram"></i></a>
        <a class="p-2 text-white" href="https://www.instagram.com/tiemtraanh_cantho/" target="_blank"><i class="fab fa-twitter" title="Twitter"></i></a>
        <a class="p-2 text-white" href="https://www.youtube.com/watch?v=Dyo8Q8bjXWg" target="_blank"><i class="fab fa-youtube" title="Youtube"></i></a>
    </nav>
    <nav class="my-2 my-md-0 mr-md-3">
        @if(Auth::guard('thanhvien')->check())
            <a class="p-2 text-white " href="{{ url('/thong-tin-thanh-vien') }}">{{Auth::guard('thanhvien')->user()->name;}}</a>
            <a class="p-2 text-white border-left" href="{{ route('dangxuat') }}">Đăng xuất</a>
        @else
            <a class="p-2 text-white " href="{{ url('/TraAnh/Dang-ky-thanh-vien') }}">Đăng ký </a>
            <a class="p-2 text-white border-left" href="{{ url('/TraAnh/Dang-nhap-thanh-vien') }}">Đăng nhập</a>
        @endif
    </nav>
</div>
<!----end top-bar-- ----->
<div class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/TraAnh') }}">
            <img src="{{ asset('Font-endTA/img/banner/logo.jpg') }}" width="90" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <nav class="navbar-nav my-0 mr-md-auto ">
                <!-- <li class="nav-item active">
                <a class="nav-link" href="#"><span class="sr-only">(current)</span></a>
            </li> -->
            </nav>
            <nav class="navbar-nav my-2 my-md-0 mr-md-3">
                <li class="nav-item ">
                    <a class="nav-link p-4 text-dark" href="{{ url('TraAnh/Trangchu') }}">Trang chủ</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link p-4 text-dark" href="{{ url('TraAnh/Sanpham') }}">Sản phẩm</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle p-4 text-dark" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tin tức
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('tintuc') }}">Tin tức và sự kiện</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('khuyenmai') }}">Khuyến mãi</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-4 text-dark" href="{{ url('/tuyendung')}}">Tuyển dụng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-4 text-dark" href="{{ route('baiviet') }}">Về chúng tôi</a>
                </li>
                 <form class="form-inline  search-box" action="{{ url('TraAnh/tim-kiem') }}" method="GET">
                    <input class="search-text" type="search" value="{{ old('tukhoa') }}" name="tukhoa"
                        placeholder="Tìm kiếm...">
                    <a class="search-btn">
                        <i class="fas fa-search"></i>
                    </a>
                </form>
                <li class="nav-item tym">
                    <a class="nav-link p-4 text-dark border-left">
                        <i class="fas fa-heart"></i><span class="tym-notice">{{ $count_favorites }}<span>
                    </a>
                </li>

                <li class="nav-item">
                        <div class="header-cart pt-4">
                            <div class="header-cart-wrap">
                                <i class="fas fa-cart-plus"></i>
                                <span class="header-cart-notice">{{ Cart::count() }}</span>
                                <div class="header-cart-list no-img">
                                    <div id="change-item-cart">

                                        <ul class="header-cart-info">

                                            @foreach (Cart::content() as $key => $item)
                                                <li class="header-cart-item">
                                                    <img src="{{ asset('public/uploads/anh/' . $item->options->image) }}"
                                                        class="header-cart-item-img">
                                                    <div class="header-cart-item-info">
                                                        <div class="header-cart-item-head">
                                                            <span
                                                                class="header-cart-item-price">{{ number_format($item->price) }}
                                                                đ</span>
                                                            <span class="header-cart-item-multiply"> x </span>
                                                            <span
                                                                class="header-cart-item-qnt">{{ $item->qty }}</span>
                                                            <span class="header-cart-item-delete"><a
                                                                    onclick="deleteCart('{{ $key }}')"
                                                                    href="javascript:"> <i style="cursor: pointer"
                                                                        class="fas fa-times"></i> </a></span>
                                                        </div>
                                                        <div class="header-item-body">
                                                            <span
                                                                class="header-cart-item-name">{{ $item->name }}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach

                                        </ul>
                                        <hr>
                                        <div class="total">
                                            <span>Tổng:</span>
                                            <h6>{{ Cart::subtotal(0) }} đ</h6>
                                        </div>
                                        <a class="btn btn-success view-list-cart " href="{{ route('/gio-hang') }}"
                                            role="button">Xem giỏ
                                            hàng</a>

                                    </div>


                                </div>
                            </div>
                        </div>

                </li>



            </nav>
        </div>
    </nav>
</div>
<script>
    function deleteCart(id) {
        $.ajax({

            url: `{{ asset('TraAnh/Delete-Cart/${id}') }}`,
            type: "GET",
        }).done(function(response) {
            console.log(response);
            if (response) {
                alertify.success('Đã xóa thành công');
                setTimeout(() => {

                    location.reload();
                }, 1000);

            }
        });

    }
</script>

