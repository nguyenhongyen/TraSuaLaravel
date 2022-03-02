  @foreach($gioithieutra as $key => $value)
<div class="jumbotron">

    <h4 >{{ $value->tenbaiviet }}</h1>
    <p class="lead">
        <div class="col-md-6">{{ $value->tomtat }}</div></p>
    <hr class="my-4">
    <p class="secondary">TRÀ ANH - ĐẬM TRÀ - THẠCH TƯƠI</p>
    <a class="btn btn-outline-success" href="{{ url('TraAnh/bai-viet/'.$value->id.'/'.$value->slug)}}" role="button">Xem thêm</a>

</div>
   @endforeach
