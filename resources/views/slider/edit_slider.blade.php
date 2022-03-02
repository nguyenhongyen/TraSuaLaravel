@extends('admin.trangchu')
@section('title')
   <title>Trang chủ Admin</title>
@endsection

@section('content')

<div class="content-wrapper">
      @include('admin.content_header',['name'=>'Slider','key'=> 'Cập nhật Slider'])



    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
               <h3>Cập nhật Slider</h3>
               <div class="col-md-4">
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
               </div>

                <form method="POST" action="{{ route('slider.update',[$slider->id]) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Tên Slider</label>
                        <input type="text" class="form-control" name="tenslider" value="{{$slider->tenslider}}" >
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Mô tả</label>
                        <textarea name="mota" class="form-control" rows="5" style="resize:none;">{{ $slider->mota }}</textarea>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Hình ảnh</label>
                        <input type="file" class="form-control" name="hinhanh" aria-describedby="emailHelp">
                        <img src="{{ asset('public/uploads/anh/' .$slider->hinhanh) }}" height="120" weight="100">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Link</label>
                        <input type="text" class="form-control" name="link" value="{{$slider->link}}"  >
                      </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Trạng thái</label>
                        <select id="inputState"name="trangthai" class="form-control">
                            @if($slider->kichhoat==0)
                                <option selected value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            @else
                                <option  value="0">Kích hoạt</option>
                                <option selected value="1">Không kích hoạt</option>
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-bottom:30px;">Cập nhật</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>


@endsection

