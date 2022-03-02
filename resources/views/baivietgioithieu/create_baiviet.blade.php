@extends('admin.trangchu')
@section('title')
   <title>Trang chủ Admin</title>
@endsection

@section('content')

<div class="content-wrapper">
      @include('admin.content_header',['name'=>'Danh mục bài viết','key'=> 'Thêm bài viết'])



    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
               <h3>Thêm bài viết</h3>
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

                <form method="POST" action="{{ route('baivietgioithieu.store') }}" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Tên bài viết</label>
                        <input type="text" class="form-control" name="tenbaiviet" value="{{old('tenbaiviet')}}"  onkeyup="ChangeToSlug();" id="slug" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{old('slug')}}"  id="convert_slug" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputState" >Danh mục</label>
                        <select id="inputState" name="danhmuc" class="form-control">
                            @foreach($danhmucbai as $key => $dm)
                              <option value="{{$dm->id}}">{{$dm->tendanhmuc}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Tóm tắt</label>
                        <textarea name="tomtat" class="form-control" rows="4" style="resize:none;"value="{{ old('tomtat') }}" required> </textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Nội dung</label>
                        <textarea name="noidung" class="form-control" rows="6" style="resize:none;" required></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Hình ảnh</label>
                        <input type="file" class="form-control" name="hinhanh" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Trạng thái</label>
                        <select id="inputState"name="trangthai" class="form-control">
                            <option value="0">Kích hoạt</option>
                            <option value="1">Không kích hoạt</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-bottom: 30px;">Thêm bài viết</button>
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

