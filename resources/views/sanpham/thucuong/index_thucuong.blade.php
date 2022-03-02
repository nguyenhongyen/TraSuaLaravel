@extends('admin.trangchu')
@section('title')
   <title>Trang chủ Admin</title>
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.content_header',['name'=>'Danh mục sản phẩm','key'=> 'Sản phẩm/Thức uống'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <a href="{{ route('thucuong.create') }}" class="btn btn-success float-right m-2">Add</a>
            </div>
         <div class="col-md-12">
             <h3>Danh sách Thức uống</h3>
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

            <table class="table">
                <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Tên sản phẩm</th>
                      <th scope="col">Slug</th>
                      <th scope="col">Hình ảnh</th>
                      <th scope="col">Danh mục</th>
                      <th scope="col">Giá bán</th>
                      <th scope="col">Giảm giá</th>
                      <th scope="col">Mô tả</th>
                      <th scope="col">Trạng thái</th>
                      <th scope="col">Quản lí</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($sanpham as $key => $value)
                    <tr>
                      <th scope="row">{{ $value->id }}</th>
                      <td>{{ $value->tensanpham }}</td>
                      <td>{{ $value->slug }}</td>
                      <td><img src="{{ asset('public/uploads/anh/'.$value->hinhanh) }}" height="120" weight="100"></td>
                      {{-- <td>{{ $value->danhmucsp->tendanhmuc }}</td> --}}
                       {{-- danhmucsp la function  lien ket 2 bảng --}}
                      <td>
                          @switch($value->danhmuc)
                            @case(1)
                                <span class="text-info">Trà sữa</span>
                                @break
                            @case(2)
                                <span class="text-primary">Trà tươi</span>
                                @break
                            @case(3)
                                <span class="text-warning">Trà kem</span>
                                @break
                             @case(4)
                                <span class="text-success">Thức uống dầm</span>
                                @break
                            @case(5)
                                <span class="text-muted">Topping</span>
                                @break
                            @case(6)
                                <span class="text-info">Tiramisu</span>
                                @break
                            @case(7)
                                <span class="text-info">Bánh mì</span>
                                @break
                              @default
                              <span class="text-info">Món mới</span>
                          @endswitch
                      </td>
                      <td>{{ $value->giaban }}</td>
                      <td>{{ $value->giamgia }}</td>
                      <td>{{ $value->mota }}</td>
                      <td>
                        @if($value->trangthai==0)
                            <span class="text text-success">Kích hoạt</span>
                        @else
                            <span class="text-danger">Không kích hoạt</span>
                        @endif
                    </td>
                      <td>
                          <div class="row">
                              <div class="col-md-3">
                                  <button class="btn btn-light" style="margin-right:50px;">
                                      <a href="{{  route('thucuong.edit',[$value->id])  }}">
                                    <i class="fas fa-edit"></i>
                                  </a>
                                  </button>
                              </div>
                              <div class="col-md-2">
                                <form method="POST" action="{{ route('thucuong.destroy',[$value ->id]) }}">
                                   @method('DELETE')
                                   @csrf
                                  <button class="btn btn-light" onclick="return confirm('Bạn có muốn xóa sản phẩm này không?')">
                                    <i class="far fa-trash-alt" style="color:rgb(12, 145, 235)"></i>
                                  </button>
                                </form>
                              </div>
                          </div>
                      </td>
                    </tr>
                    @endforeach
                   </tbody>
            </table>
            <nav aria-label="Page navigation ">
                {!! $sanpham->links() !!}
            </nav>

         </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

@endsection

