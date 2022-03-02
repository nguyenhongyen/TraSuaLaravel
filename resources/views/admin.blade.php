@extends('admin.trangchu')
@section('title')
   <title>Trang chủ Admin</title>
@endsection

 @section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.content_header',['name'=>'Trang chủ','key'=> 'Quản lý'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
         <div class="col-10 mx-auto" style="center">
          <button class="btn btn-primary mx-auto btn-lg " role="button"> Doanh thu hiện tại <br>{{ number_format($doanhthu,4) }}đ</button>
          <button class="btn btn-success mx-auto btn-lg " role="button"> Đơn hàng mới <br>{{ $donhang }}</button>
          <button class="btn btn-warning mx-auto btn-lg" role="button"> Đơn hàng đang xử lý <br>{{ $xacnhan }}</button>
          <button class="btn btn-danger mx-auto btn-lg" role="button"> Đơn hàng đã hủy <br>{{ $huy }}</button>
          
         </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

@endsection

