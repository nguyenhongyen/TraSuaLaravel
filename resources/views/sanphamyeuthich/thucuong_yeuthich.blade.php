@extends('admin.trangchu')
@section('title')
    <title>Trang chủ Admin</title>
@endsection

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.content_header',['name'=>'Danh mục sản phẩm','key'=> 'Sản phẩm yêu thích'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('thucuong.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <h3>Sản phẩm yêu thích</h3>
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
                                    <th scope="col">ID Thành viên</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Giá bán</th>
                                    <th scope="col">Giảm giá</th>
                                    <th scope="col">Quản lí</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_drink as $key => $value)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <th>{{ $value->id_thanhvien }}</th>
                                        @if ($value->id_thucuong)
                                            <td> {{ $value->thucuong->tensanpham }}</td>
                                        @else
                                            <td>{{ $value->banhngot->tenbanh }}</td>
                                        @endif

                                        @if ($value->id_thucuong)
                                            <td> {{ $value->thucuong->slug }}</td>
                                        @else
                                            <td>{{ $value->banhngot->slug }}</td>
                                        @endif

                                        @if ($value->id_thucuong)
                                            <td><img src="{{ asset('public/uploads/anh/' . $value->thucuong->hinhanh) }}"
                                                    height="120" weight="100"></td>
                                        @else
                                            <td><img src="{{ asset('public/uploads/anh/' . $value->banhngot->hinhanh) }}"
                                                    height="120" weight="100"></td>
                                        @endif

                                        @if ($value->id_thucuong)
                                            <td>{{ $value->thucuong->giaban }}</td>
                                        @else
                                            <td>{{ $value->banhngot->giaban }}</td>
                                        @endif

                                        @if ($value->id_thucuong)
                                            <td>{{ $value->thucuong->giamgia }}</td>
                                        @else
                                            <td>{{ $value->banhngot->giamgia }}</td>
                                        @endif

                                        <td>
                                            <div class="row">
                                                {{-- <div class="col-md-3">
                                                    <button class="btn btn-light" style="margin-right:50px;">
                                                        <i class="fas fa-edit"></i>
                                                        </a>
                                                    </button>
                                                </div> --}}
                                                <div class="col-md-2">
                                                    <form method="POST"
                                                        action="{{ route('thucuong.destroy', [$value->id]) }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-light"
                                                            onclick="return confirm('Bạn có muốn xóa sản phẩm này không?')">
                                                            <i class="far fa-trash-alt" style="color:rgb(12, 145, 235)"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>

                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation ">
                            {!! $list_drink->links() !!}
                        </nav>

                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

@endsection
