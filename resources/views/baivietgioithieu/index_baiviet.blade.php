@extends('admin.trangchu')
@section('title')
   <title>Trang chủ Admin</title>
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.content_header',['name'=>'Danh mục bài viết','key'=> 'Bài viết'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <a href="{{ route('baivietgioithieu.create') }}" class="btn btn-success float-right m-2">Add</a>
            </div>
         <div class="col-md-12">
             <h3>Danh sách Bài viết</h3>
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
                      <th scope="col">Tên bài viết</th>
                      <th scope="col">Slug</th>
                      <th scope="col">Hình ảnh</th>
                      <th scope="col">Danh mục</th>
                      <th scope="col">Tóm tắt</th>
                      <th scope="col">Nội dung</th>
                      <th scope="col">Trạng thái</th>
                      <th scope="col">Quản lí</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($baiviet as $key => $value)
                    <tr>
                      <th scope="row">{{ $value->id }}</th>
                      <td>{{ $value->tenbaiviet }}</td>
                      <td>{{ $value->slug }}</td>
                      <td><img src="{{ asset('public/uploads/anh/'.$value->hinhanh) }}" height="120" weight="100"></td>
                       <td>{{ $value->danhmuctin->tendanhmuc }}</td>
                       {{-- danhmucsp la function  lien ket 2 bảng--}}
                      <td>{{ $value->tomtat }}</td>
                      <td>{{ $value->noidung }}</td>
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
                                  <button class="btn btn-light" style="margin-right:60px;">
                                      <a href="{{  route('baivietgioithieu.edit',[$value->id])  }}">
                                    <i class="fas fa-edit"></i>
                                  </a>
                                  </button>
                              </div>
                              <div class="col-md-2">
                                <form method="POST" action="{{ route('baivietgioithieu.destroy',[$value ->id]) }}">
                                   @method('DELETE')
                                   @csrf
                                  <button class="btn btn-light" onclick="return confirm('Bạn có muốn xóa Bài viết này không?')">
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
                {!! $baiviet->links() !!}
            </nav>
         </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

@endsection

