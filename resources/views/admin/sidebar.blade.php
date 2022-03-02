<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/admin') }}" class="brand-link">
      <img src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     @if(Auth::check())
      <span class="brand-text font-weight-light">{{ Auth::user()->name; }} </span>
        
      @endif
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                @if(Auth::check())
              <a href="{{ route('get.dangxuat') }}" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
                 <p>Đăng xuất</p>
              </a>
              @endif
            </li>

          <li class="nav-item">
            <a href="{{ route('danhmuc.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p> Danh mục sản phẩm</p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{ route('sanpham.index') }}" class="nav-link">
                <i class="fas fa-coffee"></i>
              <p> Sản phẩm</p>
            </a>
          </li> --}}
          <li class="nav-item menu-open">
            <a href="{{ route('thucuong.index') }}" class="nav-link ">
                <i class="fas fa-hamburger"></i>
              <p>
                Sản phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('thucuong.index') }}" class="nav-link">
                  <i class="fas fa-cocktail"></i>
                  <p>Thức uống</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('banhngot.index') }}" class="nav-link">
                  <i class="fas fa-pizza-slice"></i>
                  <p>Bánh</p>
                </a>
              </li>
            </ul>
          </li>
        {{-- end --}}
          <li class="nav-item">
            <a href="{{ route('slider.index') }}" class="nav-link">
                <i class="fas fa-backward"></i>
              <p> Slider</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('danhmuctintuc.index') }}" class="nav-link">
                <i class="fas fa-clipboard-list"></i>
              <p> Danh mục tin tức</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('baivietgioithieu.index') }}" class="nav-link">
                <i class="fas fa-newspaper"></i>
              <p> Bài viết giới thiệu</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="" class="nav-link ">
                <i class="fas fa-hamburger"></i>
              <p>
               Quản lý bình luận
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/quan-ly-binh-luan') }}" class="nav-link">
                  <i class="fas fa-cocktail"></i>
                  <p>Thức uống</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/quan-ly-binh-luan-banh') }}" class="nav-link">
                  <i class="fas fa-pizza-slice"></i>
                  <p>Bánh</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ url('thuc-uong-yeu-thich') }}" class="nav-link ">
                <i class="fas fa-heart"></i>
              <p>Quản lý yêu thích</p>
            </a>
           </li>
          <li class="nav-item">
            <a href="{{ route('quanlythanhvien') }}" class="nav-link">
                <i class="fas fa-users"></i>
              <p> Quản lý thành viên</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('quanlydonhang.index') }}" class="nav-link">
                <i class="fas fa-file-alt"></i>
              <p> Quản lý đơn hàng</p>
            </a>
          </li>

          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
