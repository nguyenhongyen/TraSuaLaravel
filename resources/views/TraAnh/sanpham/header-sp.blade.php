
<div class="top-bar d-flex flex-column flex-md-row align-items-center p-2 px-md-4 fixed-top border-bottom shadow-sm">
    <nav class="my-0 mr-md-auto font-weight-normal">
        <a class="p-2 text-dark " href="{{ url('TraAnh') }}">
            <img src="{{ asset('Font-endTA/img/banner/logo.jpg') }}" width="90" height="40">
        </a>
    </nav>
    {{-- <form class="form-inline mx-auto" action="{{ url('TraAnh/tim-kiem') }}" method="GET">
        <input class="form-control mr-sm-2" type="search" value="{{ old('tukhoa') }}" name="tukhoa"
            placeholder="Tìm kiếm sản phẩm..." aria-label="Search">
    </form> --}}
    <form class="form-inline search-form mx-auto" action="{{ url('TraAnh/tim-kiem') }}" method="GET">
        <input class="text-search" type="search" value="{{old('tukhoa')}}" name="tukhoa" placeholder="Tìm kiếm..." >
        <a class="search-icon" >
            <i class="fas fa-search"></i>
        </a>
    </form>

    <!-- <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="#"> -->
    <div class="tym mr-3">
        <div class="tym">
            <i class="fas fa-heart"></i>
            <span class="tym-notice">2<span>
        </div>

    </div>

    <div class="header-cart">
        <div class="header-cart-wrap">
            <i class="fas fa-cart-plus"></i>
            <span class="header-cart-notice">{{ Cart::count() }}</span>
            <div class="header-cart-list no-img">
                <!--no-img-->
                <!-- <img src="img/banner/list.png" class="header-cart-img"> -->
                <!-- <span class="list-no-img">Chưa có sản phẩm</span> -->

                <div id="change-item-cart">

                    <ul class="header-cart-info">

                        @foreach (Cart::content() as $key => $item)
                            <li class="header-cart-item">
                                <img src="{{ asset('public/uploads/anh/' . $item->options->image) }}"
                                    class="header-cart-item-img">
                                <div class="header-cart-item-info">
                                    <div class="header-cart-item-head">
                                        <span class="header-cart-item-price">{{ number_format($item->price) }} đ</span>
                                        <span class="header-cart-item-multiply"> x </span>
                                        <span class="header-cart-item-qnt">{{ $item->qty }}</span>
                                        <span   class="header-cart-item-delete"><a onclick="deleteCart('{{ $key }}')" href="javascript:"> <i  style="cursor: pointer" class="fas fa-times"></i> </a></span>
                                    </div>
                                    <div class="header-item-body">
                                        <span class="header-cart-item-name">{{ $item->name }}</span>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                    <hr>
                    <div class="total">
                        <span>Tổng:</span>
                        <h6>{{Cart::subtotal(0)}} đ</h6>
                    </div>
                    <a class="btn btn-success view-list-cart " href="{{ route('/gio-hang') }}" role="button">Xem giỏ
                        hàng</a>
                        {{-- <a class="btn btn-success view-list-cart " href="{{ route('/dat-hang') }}" role="button">Xem giỏ
                            hàng</a> --}}
                </div>


            </div>
        </div>
    </div>
        @if(Auth::guard('thanhvien')->check())
            <a class="p-2 text-dark border-left" href="">{{Auth::guard('thanhvien')->user()->name;}}</a>
            <a class="p-2 text-dark" href="{{ route('dangxuat') }}">Đăng xuất</a>
        @else
            <a class="p-2 text-dark border-left" href="{{ url('/TraAnh/Dang-ky-thanh-vien') }}">Đăng ký </a>
            <a class="p-2 text-dark" href="{{ url('/TraAnh/Dang-nhap-thanh-vien') }}">Đăng nhập</a>
        @endif



</div>
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
