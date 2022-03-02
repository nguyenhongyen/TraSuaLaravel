@extends('admin.trangchu')
@section('title')
   <title>Trang chủ Admin</title>
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.content_header',['name'=>'Danh mục','key'=> 'Danh mục sản phẩm'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <a href="{{ route('danhmuc.create') }}" class="btn btn-success float-right m-2">Add</a>
            </div>
         <div class="col-md-12">
             <h3>Danh mục sản phẩm</h3>
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
                      <th scope="col">Tên danh mục</th>
                      <th scope="col">Slug</th>
                      <th scope="col">Thuộc loại</th>
                      <th scope="col">Kích hoạt</th>
                      <th scope="col">Quản lý</th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($danhmuc as $key => $value)
                    <tr>
                      <th scope="row">{{ ++$key }}</th>
                      <td>{{ $value ->tendanhmuc }}</td>
                      <td>{{ $value ->slug}}</td>
                      <td>
                          @if($value->dm_id==0)
                              <span class="text-info">Thức uống</span>
                          @else
                              <span class="text-warning">Bánh ngọt</span>
                          @endif
                      </td>
                      <td>
                        @if($value->kichhoat==0)
                            <span class="text text-success">Kích hoạt</span>
                        @else
                            <span class="text-danger">Không kích hoạt</span>
                        @endif
                    </td>
                      <td>
                          <div class="row">
                              <div class="col-md-3">
                                  <button class="btn btn-light">
                                      <a href="{{  route('danhmuc.edit',[$value->id])  }}">
                                    <i class="fas fa-edit"></i>
                                  </a>
                                  </button>


                              </div>
                              <div class="col-md-2">
                                <form method="POST" action="{{ route('danhmuc.destroy',[$value ->id]) }}">
                                   @method('DELETE')
                                   @csrf
                                  <button class="btn btn-light" onclick="return confirm('Bạn có muốn xóa danh mục này không?')">
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
         </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

@endsection

