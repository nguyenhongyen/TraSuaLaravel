@extends('admin.trangchu')
@section('title')
    <title>Trang chủ Admin</title>
@endsection
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.content_header',['name'=>'Trang chủ','key'=> 'Danh sách đơn hàng'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Danh sách đơn hàng</h3>
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
                                    <th scope="col">Mã đơn hàng</th>
                                    <th scope="col">Tên khách hàng</th>
                                    <th scope="col">Ngày đặt</th>
                                    <th scope="col">Hình thức</th>
                                    <th scope="col">Tổng tiền</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Xem chi tiết</th>
                                    <th scope="col">Quản lý</th>


                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($donhang as $key => $value)
                                    <tr>
                                        <th scope="row">{{ $value->id }}</th>
                                        {{-- <td>{{ $value->thanhvien->name }}</td> --}}
                                        <td>{{ $value->ngay_dat }}</td>
                                        <td>{{ $value->phuong_thuc }}</td>
                                        <td>{{ $value->tong_tien }}</td>

                                        <td>
                                            <select  value="{{ $value->trangthai }}" id="inputState{{ $key }}" name="trangthai" class="form-control">
                                                <option   value="Mới"> Mới </option>
                                                <option value="Xác nhận đơn hàng">Xác nhận đơn hàng</option>
                                                <option value="Hủy đơn hàng">Hủy đơn hàng</option>
                                            </select>
                                        </td>
                                        <td>
                                            <button class="btn btn-light">
                                                <a href="{{ route('quanlydonhang.chitiet_donhang', [$value->id]) }}">Xem
                                                    chi tiết</a>
                                            </button>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('danhmuc.destroy', [$value->id]) }}">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-light"
                                                    onclick="return confirm('Bạn có muốn xóa đơn hàng này không?')">
                                                    <i class="far fa-trash-alt" style="color:rgb(12, 145, 235)"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>


                        </table>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

    <script>

    let value = '';
        @foreach ($donhang as $key => $value)
            @if($value->trangthai == 'Mới')
             document.getElementById('inputState{{ $key }}').getElementsByTagName('option')[0].selected = 'selected'
            @elseif($value->trangthai == 'Xác nhận đơn hàng')
                document.getElementById('inputState{{ $key }}').getElementsByTagName('option')[1].selected = 'selected'
            @elseif($value->trangthai == 'Hủy đơn hàng')
                document.getElementById('inputState{{ $key }}').getElementsByTagName('option')[2].selected = 'selected'
            @endif
        document.getElementById('inputState{{ $key }}').addEventListener( 'change',() =>{
        let status = document.getElementById('inputState{{ $key }}').value;
            $.ajax({
                url: `{{ asset('quanlydonhang/change-status') }}`,
                data: {
                    _token: "{{ csrf_token() }}",
                    id: '{{ $value->id }}',
                    status
                },
                type: "POST",
            }).done(function(response) {
                if(response) {
                    alertify.success('Đã cập nhật thành công');
                    setTimeout(() => {

                        location.reload();
                    }, 1000);

                }
            });
        })
        @endforeach

    </script>
@endsection
