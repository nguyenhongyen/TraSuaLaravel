
    <div class="list-group">
        @if(Auth::guard('thanhvien')->check())
        <a href="{{ url('/thong-tin-thanh-vien') }}" class="list-group-item list-group-item-action p-3 text-center">
            Thành viên: {{Auth::guard('thanhvien')->user()->name;}}
        </a>

        <a href="{{ url('/cap-nhat-tai-khoan')}}" class="list-group-item list-group-item-action p-3"><i class="fa fa-user"></i> Cập nhật tài khoản</a>
        <a href="{{ url('san-pham-yeu-thich') }}" class="list-group-item list-group-item-action p-3"><i class="fa fa-heart" aria-hidden="true"></i> Sản phẩm yêu thích</a>
        <a href="{{ url('thong-tin-don-hang') }}" class="list-group-item list-group-item-action p-3"><i class="fas fa-cart-plus"></i> Thông tin đơn hàng</a>
       @endif
      </div>
