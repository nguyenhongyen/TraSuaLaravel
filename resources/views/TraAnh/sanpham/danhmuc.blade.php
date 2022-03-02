<div class="col-md-3 col-lg-3  ">
    <h5 class="text-center pb-2" style="color:rgb(7, 68, 7); font-weight:bold;">DANH MỤC SẢN PHẨM</h5>
    <ul class="list-group danhmuc dmthucuong">
        <li class="list-group-item ">
            <a href="{{ url('/TraAnh/Thucuong') }}">
                <h6>THỨC UỐNG</h6>
            </a>
        </li>
        @foreach ($thucuong as $key => $value)
            <li class="list-group-item d-flex justify-content-between align-items-center ">
                <a href="{{ url('TraAnh/Danh-muc-thucuong/' . $value->id) }}">{{ $value->tendanhmuc }}</a>
                <span class="badge badge-success badge-pill">
                    8
                </span>
            </li>
        @endforeach
    </ul>

    <ul class="list-group danhmuc dmbanh mt-3">
        <li class="list-group-item ">
            <a href="{{ url('/TraAnh/Banh') }}">
                <h6>BÁNH</h6>
            </a>
        </li>
        @foreach ($banh as $key => $value)
            <li class="list-group-item d-flex justify-content-between align-items-center ">
                <a href="{{ url('TraAnh/Danh-muc-banh/' . $value->id) }}">{{ $value->tendanhmuc }}</a>
                <span class="badge badge-success badge-pill">
                    4
                </span>
            </li>
        @endforeach 
    </ul>

    <ul class="list-group danhmuc dmbanh mt-3">
        <li class="list-group-item ">
            <a href="{{ url('/TraAnh/Banh') }}">
                <h6>SẢN PHẨM YÊU THÍCH</h6>
            </a>
        </li>
        @foreach ($thucuong_yeuthich as $key => $value)
            <li class="list-group-item d-flex justify-content-between align-items-center ">
                <div class="card mb-2" style="max-width: 570px;">
                    <div class="row g-0">
                      <div class="col-md-5">
                        {{-- <img src="..." class="img-fluid rounded-start" alt="..."> --}}
                                @if ($value->id_thucuong)
                                <td><img src="{{ asset('public/uploads/anh/' . $value->thucuong->hinhanh) }}"
                                    height="100" weight="100" class=""></td>
                            @else
                                <td><img src="{{ asset('public/uploads/anh/' . $value->banhngot->hinhanh) }}"
                                   height="100" weight="90"></td>
                            @endif
                      </div>
                      <div class="col-md-7 ">
                        <div class="card-body">
                          <h6 class="card-title "> 
                              @if ($value->id_thucuong)
                                <td> {{ $value->thucuong->tensanpham }}</td>
                              @else
                                 <td>{{ $value->banhngot->tenbanh }}</td>
                              @endif
                             </h6>
                             <p class="card-text ">
                                @if ($value->id_thucuong)
                                <td style="color:rgb(65, 161, 65)">{{ number_format( $value->thucuong->giaban) }}đ</td>
                                 @else
                                <td style="color:rgb(65, 161, 65)">{{number_format($value->banhngot->giaban)  }}đ</td>
                                 @endif
                             </p>
                        </div>
                      </div>
                    </div>
                  </div>
                
            </li>
        @endforeach 
    </ul>
   
</div>

<script>
    window.onscroll = function() {
        scrollFunction()
    };

    function AddCartCake(id) {

        $.ajax({

            url: `{{ asset('TraAnh/Add-Cart-Cake/${id}') }}`,
            type: "GET",
        }).done(function(response) {
            if (response) {
                alertify.success('Đã thêm giỏ hàng');
                setTimeout(() => {

                    location.reload();
                }, 1000);
            }
        });
    }

    function AddCart(id) {
        $.ajax({
            url: `{{ asset('TraAnh/Add-Cart/${id}') }}`,
            type: "GET",
        }).done(function(response) {
            if (response) {
                alertify.success('Đã thêm giỏ hàng');
                setTimeout(() => {

                    location.reload();
                }, 1000);
            }
        });
    }

    function favorite(id) {
       
        $.ajax({

            url: `{{ asset('/TraAnh/yeu-thich/${id}') }}`
            type: "GET",
        }).done(function(response) {
            if (response) {

                if(response.fail) {
                    alertify.warning(response.fail);
                }else{
                    alertify.success('Đã thêm yêu thích thành công');
                }

                setTimeout(() => {

                    location.reload();
                }, 1000);
            }

        });
    }
    function scrollFunction() {

        if (document.body.scrollTop > 600 || document.documentElement.scrollTop > 600) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

    document.getElementById('myBtn').addEventListener("click", function() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    });
</script>
