@extends('admin.trangchu')
@section('title')
   <title>Trang chủ Admin</title>
@endsection

@section('content')

<div class="content-wrapper">
      @include('admin.content_header',['name'=>'Danh mục','key'=> 'Thêm danh mục'])



    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
               <h3>Cập nhật Danh mục</h3>
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
                    <form method="POST" action="{{ route('danhmuc.update',[$danhmuc->id]) }}">
                    @method('PUT')
                    @csrf
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Tên danh mục</label>
                        <input type="text" class="form-control" name="tendanhmuc" value="{{$danhmuc->tendanhmuc}}"  onkeyup="ChangeToSlug();" id="slug">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{$danhmuc->slug}}"  id="convert_slug" >
                      </div>
                    <div class="form-group col-md-6">
                        <label for="inputState" >Danh mục cha</label>
                        <select id="inputState" name="dm_id" class="form-control">
                            @if($danhmuc->dm_id==0)
                                <option selected value="0">Thức uống</option>
                                <option value="1">Bánh ngọt</option>
                            @else
                                <option  value="0">Thức uống</option>
                                <option selected value="1">Bánh ngọt</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Kích hoạt</label>
                        <select id="inputState"name="kichhoat" class="form-control">
                            @if($danhmuc->kichhoat==0)
                                <option selected value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            @else
                                <option  value="0">Kích hoạt</option>
                                <option selected value="1">Không kích hoạt</option>
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
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

