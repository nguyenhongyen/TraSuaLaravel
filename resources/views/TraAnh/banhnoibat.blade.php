  <!----bánh ngọt-->

  <div class="products p-5">
    <div class="container-fluid">
        <div class="title ">
            <h4 class="text-center ">Trà Anh Menu</h5>
            <h3 class="text-center text-uppercase font-weight-bold">bánh ngọt</h4>
            <div class=" icon-title text-center">
                <img src="{{ asset('Font-endTA/img/banner/latra.PNG') }}" height="50px">
            </div>
        </div>
        <!-- end tên menu nổi bật -->
        <div class="row p-5">
            @foreach($banh as $key => $value)
            <div class="col-md-6 col-lg-3 mb-5">
                <div class="shadow-none p-3 mb-3 bg-light rounded ">
                     <a  href="#"><i class="far fa-heart"></i></a>
                    <div class="thumbnail">
                        <a href="{{ url('TraAnh/xem-banh/'.$value->id.'/'.$value->slug) }}" >
                           <img class="img-fluid w-100" src="{{ asset('public/uploads/anh/'.$value->hinhanh) }}">
                        </a>
                       <div class="view-detail-layer">
                            <a onclick="AddCartCake({{ $value->id }})" href="javascript:" title="Đặt Hàng">Đặt hàng</a>
                        </div>
                        <div class="caption text-center">
                            <div class="prodName">
                            <h6 class="mt-2">{{ $value->tenbanh }}</h6>
                            </div>
                            <div class="proPrice">
                                @if($value->giamgia != 0)
                                <span class="proOfPirce"><del>{{number_format($value->giaban)}}đ</del></span>
                                <span class="proOfPirceSale" style="color: #21a321;
                                                                    font-weight: 30px;
                                                                    font-family: revert;
                                                                    font-weight: 500;">
                                {{ number_format($value->giamgia) }}đ</span>
                            @else
                                <span class="proOfPirce" style="color: #21a321;
                                                                font-weight: 30px;
                                                                font-family: revert;
                                                                font-weight: 500;">
                                {{number_format($value->giaban)}}đ</span>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <a class="btn btn-outline-success mx-auto btn-lg" href="{{url('TraAnh/Banh') }}" role="button">Xem thêm</a>
        </div>
    </div>

    <!----end bánh ngọt-->
</div>
<!-- end bánh ngọt -->
