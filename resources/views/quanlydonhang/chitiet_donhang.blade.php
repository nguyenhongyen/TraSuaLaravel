@extends('admin.trangchu')
@section('title')
   <title>Trang chủ Admin</title>
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.content_header',['name'=>'Trang chủ / Danh sách đơn hàng','key'=> 'Chi tiết đơn hàng'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
         <div class="col-md-12">
             <h3 class="pb-4">Chi tiết đơn hàng: {{ $donhang->id }} </h3>
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
                      <th scope="col">STT</th>
                      <th scope="col">Tên sản phẩm</th>
                      <th scope="col">Số lượng</th>
                      <th scope="col">Giá</th>

                    </tr>
                  </thead>
                  <tbody>
                        @foreach($chitiet as $key => $value)

                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $value->id_sanpham }}</td>
                            <td>{{ $value->so_luong }}</td>
                            <td>{{ number_format($value->gia) }}</td>

                        </tr>
                        @endforeach
                          <p>- Khách hàng: 
                          <p>- Số điện thoại: {{ $value->donhang->sodienthoai }}</p>
                          <p>- Địa chỉ: {{ $value->donhang->diachi }}</p>
                          <b>Note: </b> {{ $value->donhang->note }}</p>

                  </tbody>


            </table>
         </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

@endsection

