@extends('TraAnh.chitietbaiviet')


@section('chitietbaiviet')
    <div class="container">
        <h3 class="text-center p-4" style="font-weight:bold;">{{ $baiviet->tenbaiviet }}<h3>
                <p class="text-muted text-center" style="font-size:14px;">Ngày đăng: {{ $baiviet->created_at }}</>
    </div>
    <div class="container">
        <img class="w-50 img-thumbnail rounded mx-auto d-block"
            src="{{ asset('public/uploads/anh/' . $baiviet->hinhanh) }}">
        <p class="pt-3 " style="line-height: 30px; font-size: large;">{{ $baiviet->noidung }}</p>
        <hr>
    </div>
    <div class="container">
        <h3 class="pt-4" style="color:green">BÀI VIẾT LIÊN QUAN</h3>
        <div class="container">
            <div class="row">
                @foreach ($baiviet_lienquan as $key => $value)
                    <div class="col-sm-3 pt-2">
                        <div class="card">

                            <div class="card-body">
                                <a href="{{ url('TraAnh/bai-viet/' . $value->id . '/' . $value->slug) }}" style="color:black;">
                                    <div class="text-center">
                                        <img class=" w-75" src="{{ asset('public/uploads/anh/' . $value->hinhanh) }}"
                                            alt="Hình ảnh">

                                    </div>

                                    <h5 class="card-title pt-2 text-center">{{ $value->tenbaiviet }}</h5>
                                    <p class="card-text">{{ $value->tomtat }}</p>
                                </a>
                            </div>

                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
