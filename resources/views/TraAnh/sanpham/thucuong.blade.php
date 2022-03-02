<div class="col-md-9">
    <div class="container">

        <div class="form-group col-md-4 col-lg-4 " style="float:right">
            <form action="">
                <select name="loc_sp" class="custom-select" onchange="this.form.submit();">
                    <option {{ request('loc_sp') == 'moi_nhat' ? 'selected' : '' }} value="moi_nhat">Sản phẩm mới
                        nhất</option>
                    <option {{ request('loc_sp') == 'gia_thap_cao' ? 'selected' : '' }} value="gia_thap_cao">Thứ tự
                        theo giá: thấp đến cao</option>
                    <option {{ request('loc_sp') == 'gia_cao_thap' ? 'selected' : '' }} value="gia_cao_thap">Thứ tự
                        theo giá: cao đến thấp</option>
                </select>
            </form>
        </div>




        <h5 id="trasua" class="pt-5">Trà sữa</h5>
        <div class="row p-2">
                @foreach ($trasua as $key => $ts)
                   
                        <div class="col-md-4 col-lg-4 mb-3">
                            <div class="shadow-none p-3 mb-3 bg-light rounded ">
                                <a onclick="favorite({{ $ts->id }})" class="add-thucuong-yeuthich"><i
                                        style="color: red"
                                        class="{{ $ts->like ? 'fas fa-heart' : 'far fa-heart text-dark' }}  "></i></a>

                                <div class="thumbnail">
                                    <a href="{{ url('TraAnh/xem-san-pham/' . $ts->id . '/' . $ts->slug) }}">
                                        <img class="img-fluid w-100"
                                            src="{{ asset('public/uploads/anh/' . $ts->hinhanh) }}">
                                    </a>
                                    <div class="view-detail-layer">
                                        <a onclick="AddCart({{ $ts->id }})" href="javascript:"
                                            title="Đặt Hàng">Đặt
                                            hàng</a>
                                    </div>
                                    <div class="caption text-center">
                                        <div class="prodName">
                                            <h6 class="mt-2">{{ $ts->tensanpham }}</h6>
                                        </div>
                                        <div class="proPrice">
                                            @if ($ts->giamgia != 0)
                                                <span
                                                    class="proOfPirce"><del>{{ number_format($ts->giaban) }}đ</del></span>
                                                <span class="proOfPirceSale" style="color: #21a321;
                                                                            font-weight: 30px;
                                                                            font-family: revert;
                                                                            font-weight: 500;">
                                                    {{ number_format($ts->giamgia) }}đ</span>
                                            @else
                                                <span class="proOfPirce" style="color: #21a321;
                                                                        font-weight: 30px;
                                                                        font-family: revert;
                                                                        font-weight: 500;">
                                                    {{ number_format($ts->giaban) }}đ</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                @endforeach
        
        </div>

        <h5 id="tratuoi">Trà tươi</h5>
        <div class="row p-4">
            @foreach ($tratuoi as $key => $tt)
                <div class="col-md-4 col-lg-4 mb-3">
                    <div class="shadow-none p-3 mb-3 bg-light rounded ">
                        <a onclick="favorite({{ $tt->id }})" class="add-thucuong-yeuthich" style="color: red"><i
                                class="{{ $tt->like ? 'fas fa-heart' : 'far fa-heart text-dark' }}"></i></a>
                        <div class="thumbnail">
                            <a href="{{ url('TraAnh/xem-san-pham/' . $tt->id . '/' . $tt->slug) }}">
                                <img class="img-fluid w-100" src="{{ asset('public/uploads/anh/' . $tt->hinhanh) }}">
                            </a>
                            <div class="view-detail-layer">
                                <a onclick="AddCart({{ $tt->id }})" href="javascript:" title="Đặt Hàng">Đặt
                                    hàng</a>
                            </div>
                            <div class="caption text-center">
                                <div class="prodName">
                                    <h6 class="mt-2">{{ $tt->tensanpham }}</h6>
                                </div>
                                <div class="proPrice">
                                    @if ($tt->giamgia != 0)
                                        <span
                                            class="proOfPirce"><del>{{ number_format($tt->giaban) }}đ</del></span>
                                        <span class="proOfPirceSale" style="color: #21a321;
                                                                        font-weight: 30px;
                                                                        font-family: revert;
                                                                        font-weight: 500;">
                                            {{ number_format($tt->giamgia) }}đ</span>
                                    @else
                                        <span class="proOfPirce" style="color: #21a321;
                                                                    font-weight: 30px;
                                                                    font-family: revert;
                                                                    font-weight: 500;">
                                            {{ number_format($tt->giaban) }}đ</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <h5 id="trakem">Trà kem</h5>
        <div class="row p-4">
            @foreach ($trakem as $key => $tk)
                <div class="col-md-4 col-lg-4 mb-3">
                    <div class="shadow-none p-3 mb-3 bg-light rounded ">
                        <a onclick="favorite({{ $tk->id }})" class="add-thucuong-yeuthich"  style="color: red"><i
                                class="{{ $tk->like ? 'fas fa-heart' : 'far fa-heart text-dark' }}"></i></a>
                        <div class="thumbnail">
                            <a href="{{ url('TraAnh/xem-san-pham/' . $tk->id . '/' . $tk->slug) }}">
                                <img class="img-fluid w-100" src="{{ asset('public/uploads/anh/' . $tk->hinhanh) }}">
                            </a>
                            <div class="view-detail-layer">
                                <a onclick="AddCart({{ $tk->id }})" href="javascript:" title="Đặt Hàng">Đặt
                                    hàng</a>
                            </div>
                            <div class="caption text-center">
                                <div class="prodName">
                                    <h6 class="mt-2">{{ $tk->tensanpham }}</h6>
                                </div>
                                <div class="proPrice">
                                    @if ($tk->giamgia != 0)
                                        <span
                                            class="proOfPirce"><del>{{ number_format($tk->giaban) }}đ</del></span>
                                        <span class="proOfPirceSale" style="color: #21a321;
                                                                        font-weight: 30px;
                                                                        font-family: revert;
                                                                        font-weight: 500;">
                                            {{ number_format($tk->giamgia) }}đ</span>
                                    @else
                                        <span class="proOfPirce" style="color: #21a321;
                                                                    font-weight: 30px;
                                                                    font-family: revert;
                                                                    font-weight: 500;">
                                            {{ number_format($tk->giaban) }}đ</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <h5 id="thucuongdam">Thức uống dầm</h5>
        <div class="row p-4">
            @foreach ($thucuongdam as $key => $tud)
                <div class="col-md-4 col-lg-4 mb-3">
                    <div class="shadow-none p-3 mb-3 bg-light rounded ">
                        <a onclick="favorite({{ $tud->id }})" class="add-thucuong-yeuthich" style="color:red"><i
                                class="{{ $tud->like ? 'fas fa-heart' : 'far fa-heart text-dark' }}"></i></a>
                        <div class="thumbnail">
                            <a href="{{ url('TraAnh/xem-san-pham/' . $tud->id . '/' . $tud->slug) }}">
                                <img class="img-fluid w-100"
                                    src="{{ asset('public/uploads/anh/' . $tud->hinhanh) }}">
                            </a>
                            <div class="view-detail-layer">
                                <a onclick="AddCart({{ $tud->id }})" href="javascript:" title="Đặt Hàng">Đặt
                                    hàng</a>
                            </div>
                            <div class="caption text-center">
                                <div class="prodName">
                                    <h6 class="mt-2">{{ $tud->tensanpham }}</h6>
                                </div>
                                <div class="proPrice">
                                    @if ($tud->giamgia != 0)
                                        <span
                                            class="proOfPirce"><del>{{ number_format($tud->giaban) }}đ</del></span>
                                        <span class="proOfPirceSale" style="color: #21a321;
                                                                        font-weight: 30px;
                                                                        font-family: revert;
                                                                        font-weight: 500;">
                                            {{ number_format($tud->giamgia) }}đ</span>
                                    @else
                                        <span class="proOfPirce" style="color: #21a321;
                                                                    font-weight: 30px;
                                                                    font-family: revert;
                                                                    font-weight: 500;">
                                            {{ number_format($tud->giaban) }}đ</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <h5 id="topping">Topping</h5>
        <div class="row p-4">
            @foreach ($topping as $key => $tp)
                <div class="col-md-4 col-lg-4 mb-3">
                    <div class="shadow-none p-3 mb-3 bg-light rounded ">

                        <a onclick="favorite({{ $tp->id }})" class="add-thucuong-yeuthich" style="color:red"><i
                                class="{{ $tp->like ? 'fas fa-heart' : 'far fa-heart text-dark' }}"></i></a>
                        <div class="thumbnail">
                            <a href="{{ url('TraAnh/xem-san-pham/' . $tp->id . '/' . $tp->slug) }}">
                                <img class="img-fluid w-100" src="{{ asset('public/uploads/anh/' . $tp->hinhanh) }}">
                            </a>
                            <div class="view-detail-layer">
                                <a onclick="AddCart({{ $tp->id }})" href="javascript:" title="Đặt Hàng">Đặt
                                    hàng</a>
                            </div>
                            <div class="caption text-center">
                                <div class="prodName">
                                    <h6 class="mt-2">{{ $tp->tensanpham }}</h6>
                                </div>
                                <div class="proPrice">
                                    @if ($tp->giamgia != 0)
                                        <span
                                            class="proOfPirce"><del>{{ number_format($tp->giaban) }}đ</del></span>
                                        <span class="proOfPirceSale" style="color: #21a321;
                                                                        font-weight: 30px;
                                                                        font-family: revert;
                                                                        font-weight: 500;">
                                            {{ number_format($tp->giamgia) }}đ</span>
                                    @else
                                        <span class="proOfPirce" style="color: #21a321;
                                                                    font-weight: 30px;
                                                                    font-family: revert;
                                                                    font-weight: 500;">
                                            {{ number_format($tp->giaban) }}đ</span>
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
