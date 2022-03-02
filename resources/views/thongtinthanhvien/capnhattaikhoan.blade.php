@extends('thongtinthanhvien.index_thanhvien')
@section('title')
   <title>Thông tin tài khoản</title>
@endsection

@section('content')
<h4 class="text-center">CẬP NHẬT THÔNG TIN</h4>

<form action="{{ route('capnhattaikhoan',Auth::guard('thanhvien')->user()->id) }}" method="POST"  enctype="multipart/form-data" >
    @method('POST')
    @csrf
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

  <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" name="email" value="{{Auth::guard('thanhvien')->user()->email;}}" class="form-control" id="email" disabled>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Họ và tên</label>
        <input type="text" name="name" value="{{Auth::guard('thanhvien')->user()->name;  }}"  class="form-control" id="hoten" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Số điện thoại</label>
        <input type="text" name="phone" value="{{Auth::guard('thanhvien')->user()->phone;  }}" class="form-control" id="phone" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Địa chỉ</label>
        <input type="text" name="address" value="{{Auth::guard('thanhvien')->user()->address;  }}" class="form-control" id="address" required>
    </div>
    <button type="submit" class="btn btn-primary ">Cập nhật</button>
</form>
@endsection
