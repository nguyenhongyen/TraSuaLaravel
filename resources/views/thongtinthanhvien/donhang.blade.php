@extends('thongtinthanhvien.index_thanhvien')
@section('title')
   <title>Thông tin tài khoản</title>
@endsection

@section('content')
<h4 class="text-center">THÔNG TIN ĐƠN HÀNG</h4>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Đơn hàng</th>
        <th scope="col">Ngày đặt</th>
        <th scope="col">Phương thức</th>
        <th scope="col">Tổng tiền</th>
        <th scope="col">Trạng thái</th>

      </tr>
    </thead>
    <tbody>
        @foreach($donhang as $key => $value)
      <tr>
        <td>{{$value->id  }}</td>
        <td>{{ $value->created_at }}</td>
        <td>{{ $value->phuong_thuc }}</td>
        <td>{{ $value->tong_tien }}</td>
        <td>
           @switch($value->trangthai)
               @case("Hủy đơn hàng")
                <span  class="text-danger">Hủy đơn hàng</span>
                   @break
               @case("Xác nhận đơn hàng")
               <span class="text-success">Xác nhận đơn hàng</span>
                   @break
               @default
               <span class="text-warning">Đang chờ xử lý</span>
           @endswitch
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection

