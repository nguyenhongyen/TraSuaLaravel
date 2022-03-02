@extends('thongtinthanhvien.index_thanhvien')
@section('title')
   <title>Thông tin tài khoản</title>
@endsection

@section('content')
<h4 class="text-center pb-2">THÔNG TIN TÀI KHOẢN</h4>
@if(Auth::guard('thanhvien')->check())
<p>Email: {{Auth::guard('thanhvien')->user()->email;}}</p>
<p>Tên tài khoản: {{Auth::guard('thanhvien')->user()->name;}}</p>
<p>Số điện thoại: {{Auth::guard('thanhvien')->user()->phone;}}</p>
<p>Địa chỉ: {{Auth::guard('thanhvien')->user()->address;}}</p>
@endif
@endsection
