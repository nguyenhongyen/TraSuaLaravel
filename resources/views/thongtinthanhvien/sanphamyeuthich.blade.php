@extends('thongtinthanhvien.index_thanhvien')
@section('title')
   <title>Thông tin tài khoản</title>
@endsection

@section('sanpham_yeuthich')
<h4 class="text-center pb-4">SẢN PHẨM YÊU THÍCH</h4>

        <div class="row ">
            @foreach ($thucuong_yeuthich as $key => $value)
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="shadow-none p-3 bg-light rounded ">
                        <a href="#"><i class="far fa-heart"></i></a>
                        <div class="thumbnail">
                            
                                @if ($value->id_thucuong)
                                    <a href="{{ url('TraAnh/xem-san-pham/' .$value->thucuong->id."/". $value->thucuong->slug) }}">
                                    <img src="{{ asset('public/uploads/anh/' . $value->thucuong->hinhanh) }}"
                                            height="120" weight="100">
                                @else
                                    <a href="{{ url('TraAnh/xem-banh/' .$value->banhngot->id."/". $value->banhngot->slug) }}">
                                    <img src="{{ asset('public/uploads/anh/' . $value->banhngot->hinhanh) }}"
                                            height="120" weight="100">
                                @endif
                            </a>
                            <div class="view-detail-layer">
                                <a href="#" title="Đặt Hàng">Đặt hàng</a>
                            </div>
                            <div class="caption text-center">
                                <div class="prodName">
                                   
                                    @if ($value->id_thucuong)
                                        <h6 class="mt-2">{{ $value->thucuong->tensanpham }}</h6>
                                     @else
                                        <h6 class="mt-2">{{ $value->banhngot->tenbanh}}</h6>
                                     @endif
                                </div>
                                {{-- <div class="proPrice">
                                    @if ($value->thucuong->giamgia != 0)
                                        <span
                                            class="proOfPirce"><del>{{ number_format($value->thucuong->giaban) }}đ</del></span>
                                        <span class="proOfPirceSale" style="color: #21a321;
                                                                        font-weight: 30px;
                                                                        font-family: revert;
                                                                        font-weight: 500;">
                                            {{ number_format($value->thucuong->giamgia) }}đ</span>
                                    @else
                                        <span class="proOfPirce" style="color: #21a321;
                                                                    font-weight: 30px;
                                                                    font-family: revert;
                                                                    font-weight: 500;">
                                            {{ number_format($value->thucuong->giaban) }}đ</span>
                                    @endif
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
@endsection
