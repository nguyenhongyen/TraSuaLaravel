@extends('admin.trangchu')
@section('title')
   <title>Trang chủ Admin</title>
@endsection

@section('content')

<div class="content-wrapper">
      @include('admin.content_header',['name'=>'Danh mục sản phẩm','key'=> 'Cập nhật sản phẩm - Bánh'])



    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
               <h3>Cập nhật sản phẩm</h3>
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

                <form method="POST" action="{{ route('banhngot.update',[$sanpham->id])}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Tên bánh</label>
                        <input type="text" class="form-control" name="tenbanh" value="{{$sanpham->tenbanh}}"  onkeyup="ChangeToSlug();" id="slug">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{$sanpham->slug}}"  id="convert_slug" >
                      </div> 
                      <div class="form-group col-md-6">
                        <label for="inputState" >Danh mục</label>
                        <select id="inputState" name="danhmuc" class="form-control">
                            @foreach($danhmuc as $key => $muc)
                            <option {{ $muc->id==$sanpham->danhmuc ? 'selected' : ''}} value="{{ $muc->id }}">{{ $muc->tendanhmuc }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputPassword4">Giá bán</label>
                            <input type="text" class="form-control" name="giaban" value="{{$sanpham->giaban}}"   >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4">Giảm giá</label>
                            <input type="text" class="form-control" name="giamgia" value="{{$sanpham->giamgia}}"  >
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Mô tả</label>
                        <textarea name="mota" class="form-control" rows="5" style="resize:none;">{{ $sanpham->mota }}</textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Hình ảnh </label>
                        <input type="file" class="form-control" name="hinhanh" aria-describedby="emailHelp">
                        <img src="{{ asset('public/uploads/anh/' .$sanpham->hinhanh) }}" height="120" weight="100">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Trạng thái</label>
                        <select id="inputState"name="trangthai" class="form-control">
                            @if($sanpham->kichhoat==0)
                                <option selected value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            @else
                                <option  value="0">Kích hoạt</option>
                                <option selected value="1">Không kích hoạt</option>
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-bottom: 30px;">Cập nhật sản phẩm</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <script type="text/javascript">
    function ChangeToSlug()
    {
        var slug;

        //Lấy text từ thẻ input title
        slug = document.getElementById("slug").value;
        slug = slug.toLowerCase();
        //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
        document.getElementById('convert_slug').value = slug;
    }

</script>

@endsection

