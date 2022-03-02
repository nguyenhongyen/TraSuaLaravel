@extends('admin.trangchu')
@section('title')
   <title>Trang chủ Admin</title>
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.content_header',['name'=>'Quản lý thành viên','key'=> 'Thành viên'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            {{-- <div class="col-md-12">
              <a href="{{ route('danhmuctintuc.create') }}" class="btn btn-success float-right m-2">Add</a>
            </div> --}}
         <div class="col-md-12">
             <h3>Danh sách các thành viên</h3>
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
                      <th scope="col">Tên tài khoản</th>
                      <th scope="col">Email</th>
                      <th scope="col">Số điện thoại</th>
                      <th scope="col">Địa chỉ</th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($thanhvien as $key => $value)
                    <tr>
                      <th scope="row">{{ $value->id }}</th>
                      <td>{{ $value ->name }}</td>
                      <td>{{ $value ->email}}</td>
                      <td>{{ $value->phone }}</td>
                      <td>{{ $value->address }}</td>
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

@endsection

