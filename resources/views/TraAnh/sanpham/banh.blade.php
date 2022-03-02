<div class="col-md-9">
    <div class="container">
        <div class="form-group col-md-4 col-lg-4 pt-2" style="float:right">
            <form action="">
                <select name="loc_sp" class="custom-select" onchange="this.form.submit();">
                    <option {{ request('loc_sp') == 'moi_nhat' ? 'selected' : '' }} value="moi_nhat">Sản phẩm mới
                        nhât</option>
                    <option {{ request('loc_sp') == 'gia_thap_cao' ? 'selected' : '' }} value="gia_thap_cao">Thứ tự
                        theo giá: thấp đến cao</option>
                    <option {{ request('loc_sp') == 'gia_cao_thap' ? 'selected' : '' }} value="gia_cao_thap">Thứ tự
                        theo giá: cao đến thấp</option>
                </select>
            </form>
        </div>


     

        <h5 id="monmoi">Món mới</h5>
        <div class="row ">
            @foreach ($monmoi as $value => $mm)
                <div class="col-md-4 col-lg-4 mb-3">
                    <div class="shadow-none p-3 mb-3 bg-light rounded ">
                        <a onclick="favorite({{ $mm->id }})" href="#" style="color:red"><i
                                class="{{ $mm->like ? 'fas fa-heart' : 'far fa-heart text-dark' }} "></i></a>
                        <div class="thumbnail">
                            <a href="{{ url('TraAnh/xem-banh/' . $mm->id . '/' . $mm->slug) }}">
                                <img class="img-fluid w-100" src="{{ asset('public/uploads/anh/' . $mm->hinhanh) }}">
                            </a>
                            <div class="view-detail-layer">
                                <a onclick="AddCartCake({{ $mm->id }})" href="javascript:" title="Đặt Hàng">Đặt
                                    hàng</a>
                            </div>
                            <div class="caption text-center">
                                <div class="prodName">
                                    <h6 class="mt-2">{{ $mm->tenbanh }}</h6>
                                </div>
                                <div class="proPrice">
                                    @if ($mm->giamgia != 0)
                                        <span class="proOfPirce"><del>{{ number_format($mm->giaban) }}đ</del></span>
                                        <span class="proOfPirceSale" style="color: #21a321;
                                                                        font-weight: 30px;
                                                                        font-family: revert;
                                                                        font-weight: 500;">
                                            {{ number_format($mm->giamgia) }}đ</span>
                                    @else
                                        <span class="proOfPirce" style="color: #21a321;
                                                                    font-weight: 30px;
                                                                    font-family: revert;
                                                                    font-weight: 500;">
                                            {{ number_format($mm->giaban) }}đ</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <h5 id="tiramisu">Tiramisu</h5>
        <div class="row ">
            @foreach ($tiramisu as $key => $tira)
                <div class="col-md-4 col-lg-4 mb-3">
                    <div class="shadow-none p-3 mb-3 bg-light rounded ">
                        <a onclick="favorite({{ $tira->id }})" href="#" style="color:red"><i
                            class="{{ $tira->like ? 'fas fa-heart' : 'far fa-heart text-dark' }} "></i></a>
                        <div class="thumbnail">
                            
                            <a href="{{ url('TraAnh/xem-banh/' . $tira->id . '/' . $tira->slug) }}">
                                <img class="img-fluid w-100" src="{{ asset('public/uploads/anh/' . $tira->hinhanh) }}">
                            </a>
                           
                            <div class="view-detail-layer">
                                <a onclick="AddCartCake({{ $tira->id }})" href="javascript:" title="Đặt Hàng">Đặt
                                    hàng</a>
                            </div>
                            <div class="caption text-center">
                                <div class="prodName">
                                    <h6 class="mt-2">{{ $tira->tenbanh }}</h6>
                                </div>
                                <div class="proPrice">
                                    @if ($tira->giamgia != 0)
                                        <span
                                            class="proOfPirce"><del>{{ number_format($tira->giaban) }}đ</del></span>
                                        <span class="proOfPirceSale" style="color: #21a321;
                                                                        font-weight: 30px;
                                                                        font-family: revert;
                                                                        font-weight: 500;">
                                            {{ number_format($tira->giamgia) }}đ</span>
                                    @else
                                        <span class="proOfPirce" style="color: #21a321;
                                                                    font-weight: 30px;
                                                                    font-family: revert;
                                                                    font-weight: 500;">
                                            {{ number_format($tira->giaban) }}đ</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <h5 id="banhmi">Bánh mì</h5>
        <div class="row ">
            @foreach ($banhmi as $key => $bm)
                <div class="col-md-4 col-lg-4 mb-3">
                    <div class="shadow-none p-3 mb-3 bg-light rounded ">
                        <a onclick="favorite({{ $bm->id }})" href="#" style="color:red"><i
                            class="{{ $bm->like ? 'fas fa-heart' : 'far fa-heart text-dark' }} "></i></a>
                        <div class="thumbnail">
                            <a href="{{ url('TraAnh/xem-banh/' . $bm->id . '/' . $bm->slug) }}">
                                <img class="img-fluid w-100" src="{{ asset('public/uploads/anh/' . $bm->hinhanh) }}">
                            </a>
                            <div class="view-detail-layer">
                                <a onclick="AddCartCake({{ $bm->id }})" href="javascript:" title="Đặt Hàng">Đặt
                                    hàng</a>
                            </div>
                            <div class="caption text-center">
                                <div class="prodName">
                                    <h6 class="mt-2">{{ $bm->tenbanh }}</h6>
                                </div>
                                <div class="proPrice">
                                    @if ($bm->giamgia != 0)
                                        <span
                                            class="proOfPirce"><del>{{ number_format($bm->giaban) }}đ</del></span>
                                        <span class="proOfPirceSale" style="color: #21a321;
                                                                        font-weight: 30px;
                                                                        font-family: revert;
                                                                        font-weight: 500;">
                                            {{ number_format($bm->giamgia) }}đ</span>
                                    @else
                                        <span class="proOfPirce" style="color: #21a321;
                                                                    font-weight: 30px;
                                                                    font-family: revert;
                                                                    font-weight: 500;">
                                            {{ number_format($bm->giaban) }}đ</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <h5 id="snacks">Snacks</h5>
        <div class="row ">
            @foreach ($snack as $key => $snacks)
                <div class="col-md-4 col-lg-4 mb-3">
                    <div class="shadow-none p-3 mb-3 bg-light rounded ">
                        <a onclick="favorite({{ $snacks->id }})" href="#" style="color:red"><i
                            class="{{ $snacks->like ? 'fas fa-heart' : 'far fa-heart text-dark' }} "></i></a>
                        <div class="thumbnail">
                            <a href="{{ url('TraAnh/xem-banh/' . $snacks->id . '/' . $snacks->slug) }}">
                                <img class="img-fluid w-100"
                                    src="{{ asset('public/uploads/anh/' . $snacks->hinhanh) }}">
                            </a>
                            <div class="view-detail-layer">
                                <a onclick="AddCart({{ $snacks->id }})" href="javascript:" title="Đặt Hàng">Đặt
                                    hàng</a>
                            </div>
                            <div class="caption text-center">
                                <div class="prodName">
                                    <h6 class="mt-2">{{ $snacks->tenbanh }}</h6>
                                </div>
                                <div class="proPrice">
                                    @if ($snacks->giamgia != 0)
                                        <span
                                            class="proOfPirce"><del>{{ number_format($snacks->giaban) }}đ</del></span>
                                        <span class="proOfPirceSale" style="color: #21a321;
                                                                        font-weight: 30px;
                                                                        font-family: revert;
                                                                        font-weight: 500;">
                                            {{ number_format($snacks->giamgia) }}đ</span>
                                    @else
                                        <span class="proOfPirce" style="color: #21a321;
                                                                    font-weight: 30px;
                                                                    font-family: revert;
                                                                    font-weight: 500;">
                                            {{ number_format($snacks->giaban) }}đ</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <h5 id="flan">Bánh Flan</h5>
        <div class="row ">
            @foreach ($flan as $key => $fl)
                <div class="col-md-4 col-lg-4 mb-3">
                    <div class="shadow-none p-3 mb-3 bg-light rounded ">
                        <a onclick="favorite({{ $fl->id }})" href="#" style="color:red"><i
                            class="{{ $fl->like ? 'fas fa-heart' : 'far fa-heart text-dark' }} "></i></a>
                        <div class="thumbnail">
                            <a href="{{ url('TraAnh/xem-banh/' . $fl->id . '/' . $fl->slug) }}">
                                <img class="img-fluid w-100" src="{{ asset('public/uploads/anh/' . $fl->hinhanh) }}">
                            </a>
                            <div class="view-detail-layer">
                                <a onclick="AddCartCake({{ $fl->id }})" href="javascript:" title="Đặt Hàng">Đặt
                                    hàng</a>
                            </div>
                            <div class="caption text-center">
                                <div class="prodName">
                                    <h6 class="mt-2">{{ $fl->tenbanh }}</h6>
                                </div>
                                <div class="proPrice">
                                    @if ($fl->giamgia != 0)
                                        <span
                                            class="proOfPirce"><del>{{ number_format($fl->giaban) }}đ</del></span>
                                        <span class="proOfPirceSale" style="color: #21a321;
                                                                        font-weight: 30px;
                                                                        font-family: revert;
                                                                        font-weight: 500;">
                                            {{ number_format($fl->giamgia) }}đ</span>
                                    @else
                                        <span class="proOfPirce" style="color: #21a321;
                                                                    font-weight: 30px;
                                                                    font-family: revert;
                                                                    font-weight: 500;">
                                            {{ number_format($fl->giaban) }}đ</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>

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
        console.log(id)
        
        // $.ajax({

        //     url: `{{ asset('add-cake-favorite/${id}') }}`,
        //     type: "GET",
        // }).done(function(response) {
        //     if (response) {

        //         if (response.fail) {
        //             alertify.warning(response.fail);
        //         } else {
        //             alertify.success('Đã thêm yêu thích thành công');
        //         }

        //         setTimeout(() => {

        //             location.reload();
        //         }, 1000);
        //     }

        // });
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
